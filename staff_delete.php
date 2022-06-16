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
    // $staff_code=$_GET["staff_code"];
    try {
        $staff_code =$_GET['staffcode'];

        // データベース接続
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn,$user,$password);
        $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        // SQL文を使ってレコードを追加
        $sql = 'SELECT name FROM mst_staff WHERE code=?';

        $stmt = $dbh->prepare($sql);
        $data[] =$staff_code;
        $stmt->execute($data);

        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name=$rec['name'];
    
        // データベースからの切断
        $dbh=null;
    }
    catch (\Exception $e) {
        print $e->getMessage();
        print 'ただいま障害をにより大変ご迷惑をおかけしております。';
        exit();
    }
    ?>

    スタッフ削除<br>
    <br>
    スタッフ名<br>
    <?php print $staff_name; ?>
    <br>
    <br>
    <form action="staff_delete_done.php" method="post">
        <input type="hidden" name="code" style="width:200px" value="<?php print $staff_code ?>"><br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>

</body>
</html>