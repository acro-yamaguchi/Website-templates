<?php 
    header('Content-Type: application/json; charset=utf-8');

    $json = file_get_contents("php://input");
    $req = json_decode($json, true);
    //POST送信チェック
    if(!empty($req)){
        $name = $req['name'];
        $email = $req['email'];
        $phone = $req['phone'];
        $category = $req['category'];
        $title = $req['title'];
        $content = $req['content'];

        //メール送信処理
        $from = $email;
        $to = 'info@happyposition.com';
        $subject = $name . '様からのお問い合わせ';
        $message = '【カテゴリ】 '.$category."\n".'【件名】 '.$title."\n".'【お問い合わせ内容】'."\n".$content;

        //フォームの内容が空でなければ（再チェック）メールを送信
        if(!empty($from) && !empty($subject) && !empty($message)){
            mb_language("Japanese");
            mb_internal_encoding("UTF-8");

            //メール送信
            $result = mb_send_mail($to, $subject, $message, "From:".$from);

            //送信結果を出力&送信できたら内容をDBに保存
            if($result) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        //空の項目がありエラー
        } else {
            echo json_encode(array('result' => false));
        }
    }
?>