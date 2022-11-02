<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: apllication/json');

require_once '../../config/Database.php';
require_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

$post->readSingle();
$post_arr['data'] = [
   'id' => $post->id,
   'title' => $post->title,
   'body' => $post->body ,
    'category_name' => $post->category_name ,
   'category_id' => $post->category_id
];

print_r(json_encode($post_arr))
?>