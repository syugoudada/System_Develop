<?php
  session_start();
  require_once("../Repository/account.php");
  header('charset=UTF-8');
  $myself = new Account('root','rootpass');

  $_SESSION["user"] = $_POST['user'];
  $_SESSION["password"] = $_POST['pass'];
  $myself-> login();
  if($myself->exist($_SESSION)){
    header('Location:index.php');
  }else{
    echo "失敗";
  }
?>