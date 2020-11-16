<?php
require_once '../Repository/Search_Like.php';
session_start();
$myself = new Search_Like('root','rootpass');
$myself->login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title></title>
</head>
<body>
  <div class="contents">
    <input type="text" class="search_bar" placeholder="入力してください">
  </div>
  <script src="search_like.js"></script>
</body>
</html>


<?php
// $result = $myself->search("この");
// foreach($result as $value){
//   print($value['name']);
// }
?>
