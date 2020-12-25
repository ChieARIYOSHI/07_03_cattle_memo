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
  exit('sqlError:'.$error[2]); // 失敗時􏰁エラー出力
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $output = "";
  foreach ($result as $record) {
    //誕生日から月齢を算出
    //誕生日の年月日をそれぞれ取得
    $birth_year = (int)date("Y", strtotime($record["birthday"]));
    $birth_month = (int)date("m", strtotime($record["birthday"]));
    $birth_day = (int)date("d", strtotime($record["birthday"]));
    //現在の年月日を取得
    $now_year = (int)date("Y");
    $now_month = (int)date("m");
    $now_day = (int)date("d");
    
    //月齢を計算
    $age = ($now_year - $birth_year)*12 + ($now_month - $birth_month);
    //「日」で月齢を微調整
    if($now_day < $birth_day) {
      $age--;
    }
    
    // var_dump($age);
    // exit();

    $output .= "<li>名前　　{$record["cattle_name"]}</li><li>誕生日　{$record["birthday"]}</li><li>月齢　　{$age} ヶ月</li><li>性別　　{$record["gender"]}</li><li>特長　　{$record["feacher"]}</li><br>";
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