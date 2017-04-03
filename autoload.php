<?php

foreach ([__DIR__ . '/../../autoload.php', __DIR__ . '/vendor/autoload.php'] as $file) {
    if (file_exists($file) && !defined('TOOLREPO_COMPOSER_INSTALL')) {
        define('TOOLREPO_COMPOSER_INSTALL', $file);
        break;
    }
}
unset($file);
if (! defined('TOOLREPO_COMPOSER_INSTALL')) {
    fwrite(STDERR, 'You need to run "composer.phar install" to install ToolRepo.' . PHP_EOL);
    exit(1);
} 
$loader = require_once TOOLREPO_COMPOSER_INSTALL;

return $loader;

