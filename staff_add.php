<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフ管理</title>
</head>
<body>
    
スタッフ管理<br>
<br>
<form action="staff_add_check.php" method="post">
    スタッフ名を入力してください。<br>
    <input type="text" name="name" style="width:200px"><br>
    パスワードを入力して下さい。<br>
    <input type="password" name="password" style="width:100px"><br>
    パスワードをもう一度入力して下さい。<br>
    <input type="password" name="password2" style="width:100px"><br>
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
</form>
</body>
</html>