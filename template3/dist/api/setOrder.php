<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $order = intval($req['order']);
    $id = intval($req['id']);

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");

        $stmt = $db->prepare("SELECT * FROM news WHERE publish_order = ?");
        $stmt->bindParam(1, $order, PDO::PARAM_INT);
        $result = $stmt->execute();
        
        if($result){
            $stmt = $db->prepare("UPDATE news SET publish_order = NULL WHERE publish_order=:order");
            
            if($order == 0){
                $stmt->bindParam(':order', $order, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(':order', $order, PDO::PARAM_INT);
            }
    
            $result = $stmt->execute();
        }

        if($id == 0){
            exit();
        }

        $stmt = $db->prepare("UPDATE news SET publish_order=:order WHERE id=:id");

        $stmt->bindParam(':order', $order, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $result2 = $stmt->execute();
        if($result2){
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }

    }
    catch(Exception $e) {
        print 'DB接続でエラーが発生';
        print $e->getMessage();
    }
    finally {
        $db = null;
    }
?>