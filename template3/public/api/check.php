<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $id = $req['id'];
    $token = $req['token'];

    if($id === '' || $token === ''){
        echo false;
        exit();
    }

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");
    } catch (Exception $e) {
        echo false;
    }

    try {
        $stmt = $db -> prepare('SELECT * FROM token WHERE id=? AND token=?');
        $stmt -> bindParam(1, $id, PDO::PARAM_STR);
        $stmt -> bindParam(2, $token, PDO::PARAM_STR);
        $result = $stmt -> execute();
    }
    catch (Exeption $e) {
        $db = null;
        echo false;
        exit();
    }

    $db = null;
    echo $result;
    exit();
?>