<?php
// sessionを使用(データの保存、データベースを使用すれば使用必要なし)
session_start();

// フォームから送信されたデータを受け取り、sessionに保存
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["reset"])){ //name='reset'のボタンクリックの処理
        unset($_SESSION["board"]); //投稿内容を削除

    }elseif(isset($_POST["text"])){
    $write = $_POST["text"] ?? "";

    if(!empty($write)){
        $_SESSION["board"][] = $write;
    }}
};

// ui
echo "<form action='third.php' method='post'>";
echo "<label>kj-ban</label><br>";
echo "<textarea name='text' placeholder='入力'></textarea><br>";
echo "<button type='submit'>出力</button>";
echo "<button type='submit' name='reset' value='reset'>リセット</button>";
echo "</form>";

echo "<h3>下記内容</h3>";
// session内に保存された投稿内容を一覧表示
if(!empty($_SESSION["board"])){
    foreach($_SESSION["board"] as $post){
        echo "<p>{$post}</p>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 下書き -->
     <form action="data(post)" method="post">
        <label for="">掲示板</label>
        <p>入力</p>
        <textarea placeholder="ここへ入力"></textarea>
        <button type="submit">書き込み</button>
     </form>
     
     <h3 name="data(post)">書き込まれるよ</h3>
</body>
</html>