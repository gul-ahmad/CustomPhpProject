<?php



//$db = new Database($config);

use Core\App;
use Core\Validatator;
use Http\Forms\LoginForm;



//$config = require(base_path('config.php'));
require base_path('Core/Validator.php');

$db = App::resolve('Core/Database');

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if (!$form->validate($email, $password)) {

    return view('session/create.view.php', [
        'errors' => $form->errors(),

    ]);
};




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
