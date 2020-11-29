<?php
require_once('../Repository/db_config.php');
require_once('../Repository/Product_Registration.php');
require_once('../File/file.php');
$myself = new Product_Registration(DB_USER, DB_PASS);

$author_info = ['title' => $_POST['title'], 'name' => $_POST['name'],'description'=>$_POST['description'] ,'genre' => $_POST['genre'], 'sub_genre' => $_POST['subgenre'], 'new_genre' => $_POST['new_genre'], 'price' => $_POST['price'], 'url' => $_POST['url'], 'submit' => $_POST['submit']];

foreach ($author_info as $key => $value) {
  $author_info[$key] = trim(htmlspecialchars($value,ENT_QUOTES,'UTF-8'));
}
var_dump($author_info);

if (isset($author_info['submit']) && $author_info['submit'] != '') {
  $myself->login();
  // $myself->register_author($author_info);
  // $myself->register_genre($author_info);
  // $myself->book_save($author_info);
}

/**
 * priceチェック
 * @param string $url
 * @return boolean 
 */

function check_price($price)
{
  return is_numeric($price);
}
