<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php

$formGenerator = new \App\FormGenerator('POST', 'save-data');

echo $formGenerator->generateForm([
    new \App\Elements\Checkbox('my_checkbox', 'is_checked', description: 'First checkbox'),
    new \App\Elements\Checkbox('my_checkbox', 'is_checked', description: 'Second checkbox'),
    new \App\Elements\Text('name', 'name', description: 'Name'),
    new \App\Elements\Text('second_name', 'second_name', description: 'Second name'),
    new \App\Elements\Text('comment', 'comment', description: 'Leave your comment here'),
    new \App\Elements\Submit(value: 'confirm'),
]);

?>

</body>
</html>