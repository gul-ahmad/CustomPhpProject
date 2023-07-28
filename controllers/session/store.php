<?php



//$db = new Database($config);

use Core\App;
use Core\Validatator;

$db = App::resolve('Core/Database');

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validatator::string($password)) {

    $errors['password'] = 'Please provide your password.';
}

if (!Validatator::email($email)) {

    $errors['email'] = 'Pleae provide a valid email address';
}

if (!empty($errors)) {

    return view('session/create.view.php', [
        'errors' => $errors,

    ]);
}


$user = $db->query('select * from users where email =:email and password=:password', [
    'email' => $email,
])->find();

if ($user) {

    if (password_verify($password, $user['password'])) {

        login([

            'email' => $email,
        ]);

        header('location: /');
        die();
    }
}


return view('session/create.view.php', [
    'errors' => 'No matching account found for this email and password!',
]);
