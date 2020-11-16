<?php
require_once '../Repository/Search_Like.php';
session_start();
$myself = new Search_Like('root','rootpass');
$myself->login();
$result = $myself->search("この");
var_dump($result);
foreach($result as $value){
  print($value['name']);
}