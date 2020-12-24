<?php
// DB接続情報
$dbn = 'mysql:dbname=gsacf_d07_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'SELECT * FROM cattle_memo';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status==false) {
  $error = $stmt->errorInfo(); 
  exit('sqlError:'.$error[6]); // 失敗時􏰁エラー出力
  } else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  $output = "";
  foreach ($result as $record) {
    $output .= "<li>名前　　{$record["cattle_name"]}</li><li>ID　　　{$record["id_number"]}</li><li>誕生日　{$record["birthday"]}</li><li>性別　　{$record["gender"]}</li><li>特長　　{$record["feacher"]}</li><br>";
  } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/read.css">
  <link rel="icon" href="../img/icon.ico">
  <title>牛さんメモ</title>
</head>

<body>
  <main class="list_main">
    <div class="title">
      <img class="icon" src="../img/icon.png" alt="牛さんのアイコン">
      <h1>牛さんリスト</h1>
    </div>
  
    <fieldset>
      <ul id="output">
        <?= $output ?>
      </ul>
    </fieldset>
  
    <a class="submit_btn" href="input.php">新しい牛さんを登録</a>
  </main>
</body>

</html>