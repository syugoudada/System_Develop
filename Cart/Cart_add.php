<?php
if(!isset($_POST)){
    print "ポストされてない";
}

//カートリポジトリを呼び出し
require_once '../Repository/Cart_Repository.php';
session_start();

//カートクラスのインスタンス
$myself = new Cart('root','rootpass');
$myself->login();

//カートに入ってる商品のid入れる配列
//セッションに入ってるか入ってないかの処理
if(isset($_SESSION["cart"])){
    $product["id"] = $_SESSION;
}else{ 
    $product["id"] = array();
}

//商品のIDを取得
array_push($product["id"], $_POST["book_id"]);

$_SESSION["cart"] = $product;

$_SESSION["cart_json"] = json_encode($product);
$myself->save($_SESSION);

//TODO: カートに追加

header('Location:Cart.php');