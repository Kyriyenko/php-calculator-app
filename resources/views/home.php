<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <?php

    $formGenerator = new \App\FormGenerator('POST', 'save-data');

    echo $formGenerator->generateForm([
        new \App\Elements\Text('first_name', 'first_name', description: 'First Name'),
        new \App\Elements\Text('second_name', 'second_name', description: 'Second Name'),
        new \App\Elements\Email('email', 'email', description: 'Email'),
        new \App\Elements\Password('password', 'password', description: 'Password'),
        new \App\Elements\Submit(value: 'confirm'),
    ]);

    ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>