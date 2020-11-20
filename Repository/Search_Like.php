<?php
require_once('Repository.php');
class Search_Like extends Repository{

  function __construct(string $name,string $password){
    parent::__construct($name,$password);
  }

  public function search(string $bookname){
    $sql['sql'] = "SELECT pu.id,pu.name,pu.price,pu.evaluation_avg,au.name as author_name FROM product pu, author au WHERE pu.author_id = au.id and pu.name LIKE '$bookname%'";
    $result = parent::find($sql);
    return $result;
  }
}
