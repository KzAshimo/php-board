<?php
$dsn = "mysql:host=localhost;dbname=db_board;charset=utf8"; //データベースの接続を設定
$username = "root"; //username
$password = ""; //pass

try{
    pdo = new PDO($dsn,$username,$password);

    
    echo "接続完了"
}catch{

}

?>