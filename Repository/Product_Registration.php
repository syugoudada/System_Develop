<?php
require_once("Repository.php");
require_once("db_config.php");
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

  function register_author(array $author,$input_parameters=NULL){
    if(isset($author["url"]) && $author["url"] != ""){
      $sql = "insert into author values('$author[name]','$author[url]')";
    }else{
      $sql = "insert into author values('$author[name]')";
    }
    $stmt = $this->dbh->prepare($sql); 
    $result = $stmt->execute($input_parameters);
    return $result;
  }

  /**
   * ジャンル,id取得
   * @return $result ジャンル,id
   */

  function genre(){
    $author['sql'] = "SELECT id,name from category where id <= 25";
    $result = parent::find($author);
    return $result;
  }

  /**
   * サブジャンル取得
   * @param $id 親ジャンル
   * @return $result サブジャンル
   */

  function sub_genre($id){
    $sql['sql'] = "SELECT id,name from category where parent_id = $id";
    $result = parent::find($sql);
    return $result;
  }

  /**
   * サブジャンル登録
   * @param array $genre
   * @return boolean
   */

  function sub_genre_save(array $genre){
    $genre['sql'] = "Insert into categoly(name,parent_id) values($genre[title]',$genre[parent_id])";
    $result = parent::save($genre['sql']);
    return $result;
 }

 /**
  * 本情報
  * @param array $book_information
  * @return boolean 
  */

 function save($book_information){
  $categoly['sql'] = "Select id from category where name = '$book_information[subgenre]' && parent_id = '$book_information[id]'";
  $author['sql'] = "Select id from author where name = '$book_information[author]'";
  $book['category'] = parent::find($categoly);
  $book['author'] = parent::find($author);
  $book_information['sql'] = "Insert into product(author_id,name,category_id,description,price,evaluation_avg) values($book[author][0]['id'],$book_information[name],$book[category][0]['id'],$book_information[description],$book_information[price])";
  $result = parent::save($book_information);
  return $result;
 }

 /**
  * 商品参照登録
  * @
  * @return boolean $result
  */

  function product_reference($book_description){
    $product['sql'] = "Select id from product where name = '$book_description[name]'";
    $product_id = parent::find($product);
    $reference_save['sql'] = "Insert into product_reference(product_id,reference) values('$product_id[id]',".PDF_PATH."pdf$product_id[id]')";
  }
}