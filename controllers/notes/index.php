<?php

use Core\Database;

$config = require(base_path('config.php'));

$db = new Database($config);
//$head = "Notes";

$query = "select * from posts where user_id = 3";
$posts = $db->query($query)->get();

//$notes = [];



//require "views/notes/index.view.php";

view('notes/index.view.php', [
    'head' => 'Notes',
    'posts' => $posts

]);
