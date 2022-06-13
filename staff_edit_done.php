<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    // エラートラップtry
    try{

        // データの受け取り
        $staff_code = $_POST['code'];
        $staff_name = $_POST['name'];
        $staff_pass = $_POST['pass'];
    
        // 入力データの安全対策
        $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'utf-8');
        $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'utf-8');
        
     
        // データベース接続
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn,$user,$password);
        $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        // SQL文を使ってレコードを追加
        $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] =$staff_name;
        $data[] =$staff_pass;
        $data[] =$staff_code;
        $stmt->execute($data);
    
        // データベースからの切断
        $dbh=null;
    

    }
    catch (PDOException $e){
        print $e->getMessage();
        print 'ただいま障害をにより大変ご迷惑をおかけしております。';
        exit();
    }

    ?>
    修正しました。<br>
    <a href="staff_list.php">戻る</a>

</body>
</html>