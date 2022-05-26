<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $name = $req['name'];
    $image_base64 = $req['image'];

    $img = base64_decode($image_base64);
    file_put_contents('../../storage/'.$name, $img);
?>