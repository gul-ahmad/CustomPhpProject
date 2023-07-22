<?php

$config = require('config.php');

$db = new Database($config);
$head = "Notes";

$currentUserId = 3;

$id = $_GET['id'];

//$query = "select * from posts where id = :id,['id' => $id]";
$post = $db->query('select * from posts where id =:id', ['id' => $_GET['id']])->findOrFail();



// if ($post['user_id'] != $currentUserId) {
//     abort(403);
// }

authorize($post['user_id'] == $currentUserId);
require "views/note.view.php";
