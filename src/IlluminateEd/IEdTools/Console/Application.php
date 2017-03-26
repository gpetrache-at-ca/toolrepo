<?php

namespace IlluminateEd\IEdTools\Console;

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME      = 'Illuminate Education Tools';
    const VERSION   = '0.1.0';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }
}

