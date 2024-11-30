<?php
session_start(); //sessionを使用

echo "<form action='main.php' method='post'>";
echo "<label>掲示板ンぐ</label><br>";
echo "<textarea name='massage' placeholder='入力'></textarea><br>";
echo "<button type='submit'>書き込み</button><br>";
echo "</form>";

if($_SERVER["REQUEST_METHOD"] === "POST"){ //リクエストメソッドが使用されたらpost内容をsessionに保存
$message = $_POST["massage"] ?? ""; //メッセ―ジを受け取る

$_SESSION["messages"][] = $message; //sessionに配列messagesを作成しmessageを追加
}

foreach($_SESSION["messages"] as $post){ //配列messagesをpostの数繰り返す
echo "<p>{$post}</p>";} //post内容
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