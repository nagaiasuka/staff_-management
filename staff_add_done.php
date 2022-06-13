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
        $sql = 'INSERT INTO mst_staff(name,password)VALUES (?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] =$staff_name;
        $data[] =$staff_pass;
        $stmt->execute($data);
    
        // データベースからの切断
        $dbh=null;
    
        print $staff_name;
        print 'さんを追加しました。<br>';
    }
    catch (PDOException $e){
        print $e->getMessage();
        print 'ただいま障害をにより大変ご迷惑をおかけしております。';
        exit();
    }

    ?>

    <a href="staff_list.php">戻る</a>

</body>
</html>