<?php
require_once "../db/connect.php"; //ファイル読み込み (once)1度のみ読み込み

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




<!-- 以下修正 -->


<?php

$name = $_POST["name"];

if(!empty($name)){
    $sql = "INSERT INTO `name` (`name`) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":name", $name,PDO::PARAM_STR);
    $stmt->execute();
}else{
    echo "入力して下さい";
}

?>
