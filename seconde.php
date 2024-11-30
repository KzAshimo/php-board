<?php
// sessionを使用
session_start();
// post内容を保存（配列に保存）
if($_SERVER["REQUEST_METHOD"] === "POST" ){
    $wight = $_POST["going"];

    if(!empty("going")){
        $_SESSION["goings"][] = $wight;
    }
    
}
// ui
echo "<form action='seconde.php' method='post'>";
echo "<label>けいじばん</label><br>";
echo "<textarea name='going' placeholder='入力'></textarea><br>";
echo "<button type='submit'>出力</button>";
echo "</form>";

// post内容をくり返し処理で書き込み処理
echo "<h3>内容</h3>";
if(!empty($_SESSION["goings"])){
    foreach($_SESSION["goings"] as $post){
        echo "<p>{$post}</p>";
    }
}


?>

