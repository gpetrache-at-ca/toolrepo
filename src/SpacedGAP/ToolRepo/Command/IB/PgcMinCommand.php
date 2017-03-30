<?php

namespace SpacedGAP\ToolRepo\Command\IB;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PgcMinCommand extends Command
{
    protected function configure()
    {
        $this->setName('ib:pgcmin');
    }
   
    protected function execute (InputInterface $input, OutputInterface $output)
    {
    }
}
