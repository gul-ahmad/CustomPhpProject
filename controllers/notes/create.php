<?php

use Core\Database;
use Core\Validatator;

$config = require(base_path('config.php'));

require base_path('Core/Validator.php');

$db = new Database($config);
//$head = "Create a Post";

//dd($_SERVER);


$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!Validatator::string($_POST['body'], 1, 500)) {

        $errors['body'] = 'A body having length of less than 500 is required.';
    }

    if (empty($errors)) {

        $db->query('INSERT INTO posts(body,user_id) VALUES(:body,:user_id)', [
            'body' => $_POST['body'],
            'user_id' => 3

        ]);
    }
}


//require "views/notes/create.view.php";
view('notes/create.view.php', [
    'head' => 'Create A Post',

]);
