<?php
session_start(); //sessionを使用

if($_SERVER["REQUEST_METHOD"] === "POST"){ //リクエストメソッドが使用されたらpost内容をsessionに保存
    $message = $_POST["massage"] ?? ""; //メッセ―ジを受け取る
    
    if(!empty($message)){
    $_SESSION["messages"][] = $message; //sessionに配列messagesを作成しmessageを追加
    }}

echo "<form action='main.php' method='post'>";
echo "<label>掲示板ンぐ</label><br>";
echo "<textarea name='massage' placeholder='入力'></textarea><br>";
echo "<button type='submit'>書き込み</button><br>";
echo "</form>";
{
if(!empty($_SESSION["messages"]))
foreach($_SESSION["messages"] as $post){ //配列messagesをpostの数繰り返す
echo "<p>{$post}</p>";}} //post内容

?>
