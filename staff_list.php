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
    try {
        // データベース接続
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn,$user,$password);
        $dbh ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
        // SQL文を使ってレコードを追加
        $sql = 'SELECT code,name FROM mst_staff WHERE 1';

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    
        // データベースからの切断
        $dbh=null;

        print 'スタッフ一覧<br><br>';

        print '<form method="post" action="staff_edit.php" >';
        while(true){
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec == false){
                break;
            }
            print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
            print $rec['name'];
            print '<br>';
        }
        print '<input type="submit" value="修正" >';
        print '</form>';
    }
    catch(Exception $e) {
        print $e->getMessage();
        print 'ただいま障害をにより大変ご迷惑をおかけしております。';
        exit();
    }
    ?>
</body>
</html>