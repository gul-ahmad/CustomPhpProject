<?php

use Core\App;
use Core\Database;
use Core\Validatator;

$db = App::resolve('Core/Database');

$post = $db->query(
    'select * from posts where id =:id',
    ['id' => $_POST['id']]
)->findOrFail();

$errors = [];


if (!Validatator::string($_POST['body'], 1, 500)) {

    $errors['body'] = 'A body having length of less than 500 is required.';
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'head' => 'Update Post',
        'errors' => $errors,
        'post' => $post,

    ]);
}

if (empty($errors)) {

    $db->query('update posts set body = :body where id =:id', [
        'body' => $_POST['body'],
        'id' => $_POST['id']

    ]);

    header('location: /notes');
    die();
}
