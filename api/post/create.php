<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: apllication/json');
header('Access-Control-Allow-Method: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,
// Access-Control-Allow-Method, Authorization, X-Requested-with');

require_once '../../config/Database.php';
require_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));


$post->title = $data->title;
$post->body = $data->body;
$post->category_id = $data->category_id;


if( $post->create() ){
    echo json_encode([
        'message' => 'Post created'
    ]);
} else {
    echo json_encode([
        'message' => 'Fail'
    ]);
}


?>