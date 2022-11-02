<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: apllication/json');

require_once '../../config/Database.php';
require_once '../../models/Category.php';

$database = new Database();

$db = $database->connect();

$category = new Category($db);
$result = $category->read();

$num = $result->rowCount();

if($num > 0) {
    $post_arr['data'] = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                extract($row);

        $post_item = [
            'id' => $id,
            'name' => $name,
            'slug' => $slug
        ];

        array_push($post_arr['data'],$post_item);

    }

    echo json_encode($post_arr);
} else {
    echo json_encode(['message' => 'gagal']);
}

?>