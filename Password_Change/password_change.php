<?php
session_start();
require_once('../Repository/Password_Change_Repository.php');
$myself = new Password_Change_Repository('root', 'rootpass');
$myself->login();
if ($myself->update($_SESSION, $_POST['oldpass'], $_POST['newpass'])) {
  print("変更しました");
} else {
  print("パスワードが違います");
}
