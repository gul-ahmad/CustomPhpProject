<?php

namespace Http\Forms;

use Core\Validatator;

class LoginForm

{
    protected $errors = [];

    public function validate($email, $password)
    {

        if (!Validatator::string($password)) {

            $this->errors['password'] = 'Please provide your password.';
        }

        if (!Validatator::email($email)) {

            $this->errors['email'] = 'Pleae provide a valid email address';
        }

        return empty($this->errors);
    }

    public function errors()
    {

        return $this->errors;
    }
}
