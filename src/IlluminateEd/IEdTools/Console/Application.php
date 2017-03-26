<?php

namespace IlluminateEd\IEdTools\Console;

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME      = 'Illuminate Education Tools';

    public function __construct($version)
    {
        parent::__construct(static::NAME, $version);
    }
}

