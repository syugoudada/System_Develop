<?php
require_once("Repository.php");
class Product_Registration extends Repository{
  function __construct(string $name,string $password){
    parent::__construct($name,$password);
  }

  /**
   * 著者が登録されているか
   * @param array $author[name] 著者
   * @return boolean 
   */

  function exist(array $author, $input_parameters = NULL){
    $sql = "select id from author where name = '$author[name]'";
    $stmt = $this->dbh->prepare($sql); 
    $flag = $stmt->execute($input_parameters);
    if(!$flag){
      return false;
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * 著者登録
   * @param array $author[name] 著者 $author[url] 著者のホームページ
   * @return boolean 
   */

  function Url(array $author,$input_parameters=NULL){
    if(isset($author["url"]) && $author["url"] != ""){
      $sql = "insert into author values('$author[name]','$author[url]')";
    }else{
      $sql = "insert into author values('$author[name]')";
    }
    $stmt = $this->dbh->prepare($sql); 
    $result = $stmt->execute($input_parameters);
    return $result;
  }

  

  function genre(array $author){

  }
}