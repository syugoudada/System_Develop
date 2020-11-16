<?php
session_start();
$_SESSION['user'] = $_SESSION['user'];
$_SESSION['password'] = $_SESSION['password'];
#クッキーを書くuser
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>トップ画面</h1>
  <form action="../Password_Change/change.php" method="POST">
    <input type="submit" value="送信">
  </form>
</body>
</html>