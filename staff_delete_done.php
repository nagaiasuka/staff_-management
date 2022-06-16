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
        
        
        // データベース接続
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn,$user,$password);
        $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        // SQL文を使ってレコードを追加
        $sql = 'DELETE FROM mst_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
    
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
    削除しました。<br>
    <a href="staff_list.php">戻る</a>

</body>
</html>