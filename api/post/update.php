<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: apllication/json');
header('Access-Control-Allow-Method: PUT');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,
// Access-Control-Allow-Method, Authorization, X-Requested-with');

require_once '../../config/Database.php';
require_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->title = $data->title;
$post->body = $data->body;
$post->category_id = $data->category_id;


if( $post->update() ){
    echo json_encode([
        'message' => 'Post updated'
    ]);
} else {
    echo json_encode([
        'message' => 'Fail'
    ]);
}


?>