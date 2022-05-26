<?php 
    $userId = 'https://www.happyposition.com/#/top';
    $pass = password_hash('https://www.happyposition.com', PASSWORD_DEFAULT);

    try {
        $db = new PDO("sqlite:../../../db/happyposition.db");
        // 取得（SELECT）
        $stmt = $db->prepare("INSERT INTO users (
            userId, pass
        ) VALUES (
            :userId, :pass
        )");

        $stmt->bindParam( ':userId', $userId, PDO::PARAM_STR);
        $stmt->bindParam( ':pass', $pass, PDO::PARAM_STR);

        $result = $stmt->execute();
    }
    catch(Exception $e) {
        print 'DB接続でエラーが発生';
        print $e->getTraceAsString();
    }
    finally {
        $db = null;
    }
?>