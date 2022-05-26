<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $id = intval($req['id']);
    $title = $req['title'];
    $summary = $req['summary'];
    $content = $req['content'];
    $image = $req['image'];
    $create_at = date("Y-m-d");

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");

        $stmt = $db->prepare("UPDATE news SET title=:title, summary=:summary, content=:content, create_at=:create_at, image=:image WHERE id=:id");
        $stmt->bindParam( ':id', $id, PDO::PARAM_INT);
        $stmt->bindParam( ':title', $title, PDO::PARAM_STR);
        $stmt->bindParam( ':summary', $summary, PDO::PARAM_STR);
        $stmt->bindParam( ':content', $content, PDO::PARAM_STR);
        $stmt->bindParam( ':create_at', $create_at, PDO::PARAM_STR);
        if($image == null){
            $stmt->bindParam( ':image', $image, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam( ':image', $image, PDO::PARAM_STR);
        }

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