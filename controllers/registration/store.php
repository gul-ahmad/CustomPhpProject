<?php

use Core\App;
use Core\Database;
use Core\Validatator;

//$config = require(base_path('config.php'));
require base_path('Core/Validator.php');

//$db = new Database($config);
$db = App::resolve('Core/Database');

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validatator::string($password, 7, 25)) {

    $errors['password'] = 'Password must be greater than 7 chars and less than 25 chars.';
}

if (!Validatator::email($email)) {

    $errors['email'] = 'Pleae provide a valid email address';
}

if (!empty($errors)) {

    return view('registration/create.view.php', ['errors' => $errors]);
}


$user = $db->query('select * from users where email =:email', ['email' => $email])->find();

if ($user) {

    header('location: /register');
    exit();
} else {
    $db->query('INSERT INTO users(email,password) VALUES(:email,:password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    login($user);

    header('location: /');
    exit();
}
