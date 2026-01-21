<?php 

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//initialize our api
include_once('../core/initialize.php');

//instantiate post
$post = new Post($db);

//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

//create post
if($post->delete()){
    echo json_encode(
        array('message' => 'Post deleted.')
    );
}else{
    echo json_encode(
        array('message' => 'Post not deleted')
    );
}