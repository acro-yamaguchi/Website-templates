<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $id = intval($req['id']);
    $bool = intval($req['put_on_list']);

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");
        $stmt = $db->prepare("UPDATE news SET put_on_list = :put_on_list WHERE id = :id");

        $stmt->bindParam( ':put_on_list', $bool, PDO::PARAM_INT);
        $stmt->bindParam( ':id', $id, PDO::PARAM_INT);

        $result = $stmt->execute();

        if($result) {
            echo true;
        } else {
            echo false;
        }
    }
    catch(Exception $e) {
        print 'DB接続でエラーが発生';
        print $e->getTraceAsString();
        echo false;
    }
    finally {
        $db = null;
    }
?>