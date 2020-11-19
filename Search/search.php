<?php
header('Content-type:application/json; charset=utf8');
require_once('../Repository/Search_Like.php');

$myself = new Search_Like('root', 'rootpass');
$myself->login();
$result = $myself->search($_POST['title']);
$book["id"] = array();
$book["title"] = array();
foreach ($result as $value) {
  array_push($book["id"], $value['id']);
  array_push($book["title"], $value['name']);
}
echo json_encode($book, JSON_UNESCAPED_UNICODE);