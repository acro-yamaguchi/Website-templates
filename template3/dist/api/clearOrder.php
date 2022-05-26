<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $id = intval($req['id']);

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");

        $stmt = $db->prepare("UPDATE news SET publish_order = NULL WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        echo $result;
    }
    catch(Exception $e) {
        print 'DB接続でエラーが発生';
        print $e->getTraceAsString();
    }
?>