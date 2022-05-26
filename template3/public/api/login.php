<?php
    /* 
    POSTされたログイン情報を照合し、照合失敗なら'false'、
    何かしらのエラーが発生した場合は'error'、
    照合に成功した場合はランダム生成されるid（文字列）とトークンを返す。
    */

    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);

    $userId = $req['userId'];
    $pass = $req['pass'];

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");
    } catch (Exception $e) {
        echo json_encode(array('result' => 'error'));
    }

    try {
        $stmt = $db -> prepare('SELECT * FROM users WHERE userId=?');
        $stmt -> bindParam(1, $userId, PDO::PARAM_STR);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    catch (Exeption $e) {
        $db = null;
        echo json_encode(array('result' => 'error'));
        exit();
    }

    if(isset($result['userId'])){
        if (password_verify($pass, $result['pass'])) {
            $id = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789@%"), 0, 32);
            $token = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz0123456789@%"), 0, 32);
            
            try {
                $stmt = $db -> prepare('INSERT INTO token (id, token) VALUES (?, ?)');
                $stmt -> bindParam(1, $id, PDO::PARAM_STR);
                $stmt -> bindParam(2, $token, PDO::PARAM_STR);
                $result2 = $stmt -> execute();
            }
            catch (Exeption $e) {
                $db = null;
                echo json_encode(array('result' => 'error'));
                exit();
            }
            
            if($result2) {
                $db = null;
                $res = $id . '?' . $token;
                echo json_encode(array('result' => $res));
                exit(); 
            } else {
                $db = null;
                echo json_encode(array('result' => 'error'));
                exit();    
            }

        } else {
            $db = null;
            echo json_encode(array('result' => 'false'));
            exit();  
            
        }
    } else {
        $db = null;
        echo json_encode(array('result' => 'false'));
        exit();  
    }

?>