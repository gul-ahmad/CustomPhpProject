<?php

$config = require('config.php');

require('Validator.php');

$db = new Database($config);
$head = "Create a Post";

//dd($_SERVER);


$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //  $validator = new Validatator();

    if (!Validatator::string($_POST['body'], 1, 500)) {

        $errors['body'] = 'A body having length of less than 500 is required.';
    }
    // if (strlen($_POST['body']) > 500) {

    //     $errors['body'] = 'The body shoud not be greater than 500 chars';
    // }

    if (empty($errors)) {

        $db->query('INSERT INTO posts(body,user_id) VALUES(:body,:user_id)', [
            'body' => $_POST['body'],
            'user_id' => 3

        ]);
    }
}


require "views/note-create.view.php";
