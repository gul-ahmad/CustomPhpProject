<?php

use Core\App;
use Core\Database;

// $config = require(base_path('config.php'));

// $db = new Database($config);
$db = App::resolve('Core/Database');
//$head = "Notes";


$currentUserId = 3;

$post = $db->query(
    'select * from posts where id =:id',
    ['id' => $_GET['id']]
)->findOrFail();

authorize($post['user_id'] == $currentUserId);
//require "views/notes/show.view.php";
view('notes/show.view.php', [
    'head' => 'Post Details',
    'post' => $post

]);
