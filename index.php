<?php

require_once 'Calculator.php';

$calculator = new Calculator(8, 2);

echo 'addition = ' . $calculator->addition() . '<br>';
echo 'subtraction = ' . $calculator->subtraction()  . '<br>';
echo 'multiplication = ' . $calculator->multiplication() . '<br>';
echo 'division = ' . $calculator->division() . '<br>';
