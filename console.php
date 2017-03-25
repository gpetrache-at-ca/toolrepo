<?php
require_once "vendor/autoload.php";

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;

$app = new Application('Illuminate Education Tools', 'v0.1.0');

$app->run(new ArgvInput());
