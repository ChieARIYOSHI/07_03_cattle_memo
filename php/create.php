<?php
// var_dump($_POST);
// exit();

if (
    !isset($_POST['cattle_name']) || $_POST['cattle_name']=='' || !isset($_POST['id_number']) || $_POST['id_number']=='' || !isset($_POST['birthday']) || $_POST['birthday']=='' || !isset($_POST['gender']) || $_POST['gender']=='' || !isset($_POST['img']) || $_POST['img']=='' || !isset($_POST['feacher']) || $_POST['feacher']=='') {
        exit('ParamError'); 
      }
      
      $cattle_name = $_POST['cattle_name'];
      $id_number = $_POST['id_number'];
      $birthday = $_POST['birthday'];
      $gender = $_POST['gender'];
      $img = $_POST['img'];
      $feacher = $_POST['feacher'];

      
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
      
      //SQL作成&実行
      $sql = 'INSERT INTO cattle_memo(id, cattle_name, id_number, birthday, gender, img, feacher) VALUES(NULL, :cattle_name, :id_number, :birthday, :gender, :img, :feacher)';
      
      //画像データ
      // $img_data = file_get_contents($_FILES['image']['tmp_name']);
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':cattle_name', $cattle_name, PDO::PARAM_STR); $stmt->bindValue(':id_number', $id_number, PDO::PARAM_STR); $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR); $stmt->bindValue(':gender', $gender, PDO::PARAM_STR); $stmt->bindValue(':img', $img, PDO::PARAM_STR); $stmt->bindValue(':feacher', $feacher, PDO::PARAM_STR);
      $status = $stmt->execute(); // SQLを実行

      if ($status == false) {
        $error = $stmt->errorInfo();
        exit('sqlError:' . $error[2]);
      } else {
        header('Location:read.php');
      }
      
      ?>