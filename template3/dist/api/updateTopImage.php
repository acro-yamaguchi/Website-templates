<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $image = $req['image'];
    $create_at = date("Y-m-d");

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");
        $stmt = $db->prepare("UPDATE top_image SET image_url=:image_url, create_at=:create_at WHERE rowid = 1");

        if($image == null) {
            $stmt->bindParam( ':image_url', $image, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam( ':image_url', $image, PDO::PARAM_STR);
        }
        $stmt->bindParam( ':create_at', $create_at, PDO::PARAM_STR);

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