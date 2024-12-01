<?php
$dsn = "mysql:host=localhost;dbname=db_board;charset=utf8"; //データベースの接続を設定
$username = "root"; //username
$password = ""; //pass

try{
    $pdo = new PDO($dsn,$username,$password); //pdoオブジェクトを作成
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //エラー時の処理を設定(デフォ)

    echo "接続成功"; //接続成功した際のメッセージ（後ほど削除）
}catch(PDOException $e){ //接続エラーの時の処理
    die("データベース接続エラー:" . $e->getMessage()); //メッセージ
}
?>