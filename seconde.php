<?php
// sessionを使用(データの保存、データベースを使用すれば使用必要なし)
session_start();

// フォームから送信されたデータを受け取り、sessionに保存
if($_SERVER["REQUEST_METHOD"] === "POST" ){  //ポストメソッドが使用されたら
    // if($__POST)でダメな理由　⇒左記ではPOSTデータが空かどうかの判定になる（使用された判定×）
    $wight = $_POST["going"]; //$wightにPOSTデータの"going"を保存

    if(!empty($wight)){ //"weight"が空でないなら(emptyで判定)
        $_SESSION["goings"][] = $wight; //session配列に保存
    }
    
}
// ui
echo "<form action='seconde.php' method='post'>"; //form second.php内のアクション　post(送信)メソッド
echo "<label>けいじばん</label><br>";
echo "<textarea name='going' placeholder='入力'></textarea><br>"; //nameを"going"にして送信
echo "<button type='submit'>出力</button>"; //submit　でデータ送信ボタン
echo "</form>";

// session内に保存された投稿内容を一覧表示
echo "<h3>内容</h3>";
if(!empty($_SESSION["goings"])){ //goingsが空でないなら
    foreach($_SESSION["goings"] as $post){ //配列"going"を$postの個数繰り返し処理
        echo "<p>{$post}</p>";
    }
}


?>

