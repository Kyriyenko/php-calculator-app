<?php

require __DIR__ . '/vendor/autoload.php';

$formGenerator = new \App\FormGenerator();

echo $formGenerator->generateForm([
    new \App\Elements\Checkbox('my_checkbox', 'is_checked', description: 'First checkbox'),
    new \App\Elements\Checkbox('my_checkbox', 'is_checked', description: 'Second checkbox'),
    new \App\Elements\Text('name', 'name', description: 'Name'),
    new \App\Elements\Text('second_name', 'second_name', description: 'Second name'),
    new \App\Elements\Text('comment', 'comment', description: 'Leave your comment here'),
    new \App\Elements\Time('time', 'time', description: 'Time'),
    new \App\Elements\Submit(value: 'confirm'),
]);