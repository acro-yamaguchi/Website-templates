<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $name = $req['name'];
    $email = $req['email'];
    $phone = intval($req['phone']);
    $category = $req['category'];
    $title = $req['title'];
    $content = $req['content'];
    $create_at = date("Y-m-d H:i:s");

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");
        // 取得（SELECT）
        $stmt = $db->prepare("INSERT INTO mails (
            name, email, phone, category, title, content, create_at
        ) VALUES (
            :name, :email, :phone, :category, :title, :content, :create_at
        )");

        $stmt->bindParam( ':name', $name, PDO::PARAM_STR);
        $stmt->bindParam( ':email', $email, PDO::PARAM_STR);
        $stmt->bindParam( ':phone', $phone, PDO::PARAM_INT);
        $stmt->bindParam( ':category', $category, PDO::PARAM_STR);
        $stmt->bindParam( ':title', $title, PDO::PARAM_STR);
        $stmt->bindParam( ':content', $content, PDO::PARAM_STR);
        $stmt->bindParam( ':create_at', $create_at, PDO::PARAM_STR);

        $result = $stmt->execute();

        if($result) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }
    catch(Exception $e) {
        print 'DB接続でエラーが発生';
        print $e->getTraceAsString();
    }
    finally {
        $db = null;
    }
?>