<?php

require __DIR__ . '/vendor/autoload.php';

use App\Date;

$date = new Date(2001, 9, 22);
$date2 = new Date(2004, 12, 22);


dump('Is data the same: ' . $date->isDatesEqual($date2));
dump('get format: ' . $date->format('Y-m-d H:i:s'));

dump('Difference: ');
var_dump($date->getDifference($date2));
