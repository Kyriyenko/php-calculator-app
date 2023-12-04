<?php

namespace App\Models;

use App\Validator;

class Model
{
    public function insert(array $params = [])
    {
        $validationErrors = Validator::validate($this, $params);

        if (empty($validationErrors)) {
            echo 'Success';
            return;
        }

        foreach ($validationErrors as $error) {
            echo $error;
        }
    }


}