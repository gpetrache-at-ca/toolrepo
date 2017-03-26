<?php

namespace IlluminateEd\IEdTools\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Humbug\SelfUpdate\Updater;
use Humbug\SelfUpdate\VersionParser;
use Humbug\SelfUpdate\Strategy\ShaStrategy;
use Humbug\SelfUpdate\Strategy\GithubStrategy;

/**
 * References: 
 * https://github.com/padraic/humbug/blob/master/src/Command/SelfUpdate.php
 * https://mwop.net/blog/2015-12-14-secure-phar-automation.html
 */
class SelfUpdateCommand extends Command
{
    const PACKAGE_NAME = 'illuminateeducation/iedtools';
    const VERSION_FILE = 'iedtools.version';
    const FILE_NAME = 'iedtools.phar';
    
    protected $gh_download_url;

    protected function configure()
    {
        $this->setName('self-update')
            ->setDescription('Updates iedtools.phar to latest version');
    }
   
    protected function execute (InputInterface $input, OutputInterface $output)
    {
        $this->version = $this->getApplication()->getVersion();

        $this->updateToStableBuild();
    }

    protected function updateToStableBuild()
    {
        $this->update($this->getStableUpdater());
    }

    protected function getStableUpdater()
    {
        $updater = new Updater;
        $updater->setStrategy(Updater::STRATEGY_GITHUB);

        return $this->getGithubReleasesUpdater($updater);
    }

    protected function getGithubReleasesUpdater(Updater $updater)
    {
        $updater->getStrategy()->setPackageName(self::PACKAGE_NAME);
        $updater->getStrategy()->setPharName(self::FILE_NAME);
        $updater->getStrategy()->setCurrentLocalVersion($this->version);
        
        return $updater;
    }

    protected function update(Updater $updater)
    {
        try {
            $result = $updater->update();

            $new_version = $updater->getNewVersion();
            $old_version = $updater->getOldVersion();

            if ($result) {
                print_r("Updated to Version {$new_version}");               
            } else {
                print_r("Still in Version {$old_version}");
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function setGhDownloadUrl($gh_download_url)
    {
        $this->gh_download_url = $gh_download_url;

        return $this;
    }

    public function getGhDownloadUrl()
    {
        return $this->gh_download_url;
    }
}
