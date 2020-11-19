<?php
require_once('Repository.php');
class Search_Like extends Repository{

  function __construct(string $name,string $password){
    parent::__construct($name,$password);
  }

  public function search(string $bookname){
    $sql['sql'] = "SELECT id,name,price FROM product WHERE name LIKE '$bookname%'";
    $result = parent::find($sql);
    return $result;
  }


}