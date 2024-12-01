<?php
require_once "../db/connect.php"; //ファイル読み込み (once)1度のみ読み込み

if($_SERVER["REQUEST_METHOD"] === "POST"){ //form送信時に実施
$name = $_POST[`name`]; //フォームから送信された"name"の値を$nameに代入

if(!empty($name)){ //$nameが空でないなら実施
    $sql = "INSERT INTO `name` (`name`) VALUES (:name)"; //sql文
    $stmt = $pdo->prepare($sql); //sql文を実行する準備(プレースホルダーの準備)
    $stmt->bindValue(":name", $name,PDO::PARAM_STR); //プレースホルダー　":name"を$nameにバインド
    $stmt->execute(); //クエリを実施
}else{
    echo "入力して下さい";
}}


$sql = "SELECT * FROM name ORDER BY id DESC"; //sql文
$stmt = $pdo->query($sql); //pdoオブジェクトでクエリを実施(権限問題?)
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC); //クエリを取り出し
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>出力</h3>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="入力">
        <button type="submit">出力</button>
    </form>
</body>
</html>




<?php
echo "<h3>表示</h3>";

if ($posts) {
    foreach ($posts as $post) {
        echo "<p>{$post['name']}</p>";
    }
}else{
    echo "<p>データなし</p>";
}

?>



