<?php
require_once('../Repository/db_config.php');
require_once('../Repository/Product_Registration.php');
$myself = new Product_Registration(DB_USER, DB_PASS);

$author_info = ['title' => $_POST['title'], 'name' => $_POST['name'], 'genre' => $_POST['genre'], 'sub_genre' => $_POST['sub_genre'], 'new_genre' => $_POST['new_genre'], 'price' => $_POST['price'], 'url' => $_POST['url'], 'pdf' => $_POST['pdf'], 'submit' => $_POST['submit']];

if (isset($author_info['submit']) && $author_info['submit'] != '') {
  $myself->login();
  if (url($author_info, $myself)) {

  } else {
    exit;
  }
}

function CheckUrl($checkurl)
{
  if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $checkurl)) {
    return true;
  }
  return false;
}

function url(array $author, $myself)
{
  if ($author['name'] != '') {
    if (CheckUrl($author['url'])) {
      if ($myself->register_author($author)) {
        echo "著者登録成功";
        return true;
      } else {
        echo "失敗";
        return false;
      }
    } else {
      echo "正しい形式で入力してください";
      return false;
    }
  }
}
