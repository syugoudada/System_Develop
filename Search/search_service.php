<?php
header('Content-type:application/json; charset=utf8');
require_once('../Repository/Search_Like.php');

$myself = new Search_Like('root', 'rootpass');
$myself->login();
$result = $myself->search($_POST['title']);
$book["id"] = array();
$book["name"] = array();
$book["price"] = array();
foreach ($result as $value) {
  array_push($book["id"], $value['id']);
  array_push($book["name"], $value['name']);
  array_push($book["price"],$value['price']);
}
echo json_encode($book, JSON_UNESCAPED_UNICODE);
// $product_id = json_encode($book_id, JSON_UNESCAPED_UNICODE);
?>
