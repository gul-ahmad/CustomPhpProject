<?php

$config = require('config.php');

$db = new Database($config);
$head = "Notes";

$query = "select * from posts where user_id = 3";
$posts = $db->query($query)->get();

//$notes = [];



require "views/notes.view.php";
