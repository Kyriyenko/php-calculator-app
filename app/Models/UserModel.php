<?php

namespace App\Models;

use App\Validator;



class UserModel extends Model
{
    #[Validator('required|min:2')]
    private string $firstName;

    #[Validator('required|min:2')]
    private string $secondName;

    #[Validator('required|email')]
    private string $email;

    #[Validator('required|min:6')]
    private string $password;

}