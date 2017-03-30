<?php

namespace SpacedGAP\ToolRepo\Console;

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME      = 'Tool Repository';

    public function __construct($version)
    {
        parent::__construct(static::NAME, $version);
    }
}

