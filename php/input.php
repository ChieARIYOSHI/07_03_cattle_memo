<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/input.css">
  <link rel="icon" href="../img/icon.ico">
  <title>牛さんメモ</title>
</head>

<body>
  <main class="input_main">
    <div class="title">
      <img class="icon" src="../img/icon.png" alt="牛さんのアイコン">
      <h1>新しい牛さんを登録</h1>
    </div>

    <form action="create.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <!-- <a href="todo_read.php">一覧画面</a> -->
        <div class="input_form">
          <div class="input_item">
            <p class="color"></p>名前
          </div>
          <input class="input_text" type="text" name="cattle_name" value="" placeholder="いと よしこ"><br>
          <div class="input_item">
            <p class="color"></p>IDナンバー
          </div>
          <input class="input_text" type="text" name="id_number" value="" placeholder="11111-1111-1"><br>
          <div class="input_item">
            <p class="color"></p>誕生日
          </div>
          <input class="input_text" type="date" name="birthday" value=""><br>
          <div class="input_item">
            <p class="color"></p>性別
          </div>
          <input type="radio" name="gender" value="雄牛 ♂"> 雄牛 ♂　
          <input type="radio" name="gender" value="雌牛 ♀"> 雌牛 ♀<br>
          <div class="input_item">
            <p class="color"></p>写真
          </div>
          <input type="file" name="img" value=""><br>
          <div class="input_item">
            <p class="color"></p>性格・特長
          </div>
          <textarea name="feacher" rows="8" cols="32" placeholder="例）食いしん坊、臆病者、活発、甘えん坊"></textarea>
        </div>
      </fieldset>
      <button class="submit_btn">送信</button>
    </form>
  </main>
</body>
</html>