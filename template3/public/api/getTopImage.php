<?php 
    try {
        $db = new SQLite3("../../../db/happyposition.db");
        // 取得（SELECT）
        $result = $db->query('SELECT* FROM top_image');
        // 配列を初期化
        $ary = array();
        // 配列にデータベースの各行を追加
        while ($rows = $result->fetchArray()) {
            array_push($ary, $rows);
        }
        // 配列を JSON データとして出力
        echo json_encode($ary, JSON_UNESCAPED_UNICODE);
        $db->close();
    }
    catch(Exception $e) {
        print 'DB接続でエラーが発生';
        print $e->getTraceAsString();
    }
?>