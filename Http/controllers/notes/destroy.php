<?php

use Core\App;
use Core\Database;

// $config = require(base_path('config.php'));
// $db = new Database($config);

$db = App::resolve('Core/Database');



$currentUserId = 3;

$id = $_POST['id'];

//$query = "select * from posts where id = :id,['id' => $id]";
$post = $db->query('select * from posts where id =:id', ['id' => $_POST['id']])->findOrFail();




authorize($post['user_id'] == $currentUserId);

$db->query("delete from posts where id = :id", [
    'id' => $_POST['id'],
]);

header('location: /notes');
view('notes/show.view.php', [
    'head' => 'Post Details',
    'post' => $post

]);
