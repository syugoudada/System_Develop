<?php
  session_start();
  require_once("../Repository/account.php");
  header('charset=UTF-8');
  $myself = new Account('root','rootpass');

  $user["user"] = $_POST['user'];
  $user["password"] = $_POST['pass'];
  $myself-> login();
  if($myself->exist($user)){
    header('Location:index.html');
  }else{
    echo "失敗";
  }
?>