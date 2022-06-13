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

    // データの受け取り
    $staff_code = $_POST['code'];
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['password'];
    $staff_pass2 = $_POST['password2'];

    // 入力データの安全対策
    $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'utf-8');
    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'utf-8');
    $staff_pass2 = htmlspecialchars($staff_pass2,ENT_QUOTES,'utf-8');


    // 名前の入力確認
    if($staff_name == ''){
        print 'スタッフ名が入力されていません。<br>';
    }else{
        print 'スタッフ名：';
        print $staff_name;
        print '<br>';
    }

    // パスワードの入力確認
    if($staff_pass == ''){
        print 'パスワードが入力されていません.<br>';
    }

    // passとpass2の比較
    if($staff_pass != $staff_pass2){
        print 'パスワードが一致しません。<br>';
    }

    if($staff_name=='' || $staff_pass=='' || $staff_pass2==''){
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    }else{
        $staff_pass=md5($staff_pass);
        print '<form action="staff_edit_done.php" method="post">';
        print '<input type="hidden" name="name" value="'.$staff_code.'">';
        print '<input type="hidden" name="name" value="'.$staff_name.'">';
        print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '<input type="submit" value="OK">';
        print '</form>';

    }

    ?>

</body>
</html>