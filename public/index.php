<?php

require  '../vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler('/var/www/public/logs/logs.log', Level::Warning));

$log->error('Bar');

$logFilePath = '/var/www/public/logs/logs.log';

if (file_exists($logFilePath)) {
    $logContents = file_get_contents($logFilePath);

    echo nl2br($logContents);
} else {
    echo 'FILE NOT FOUND.';
}