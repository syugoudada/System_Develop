<?php
require_once("Repository.php");
class Account extends Repository{
  
  function __construct(string $name,string $password){
    parent::__construct($name,$password);
  }
  
  /**
   * アカウント登録
   * @param array $user 新規
   * @return boolean
   */

   public function save(array $user,$input_parameters=NULL){
    $password = $this->encrypt($user['password']);
    // $sql = "INSERT INTO account(name,password,point) VALUES ('$user[user]','$user[password]',0)";
    $sql = "INSERT INTO account(name,password,point) VALUES ('$user[user]','$password',0)";
    $user['sql'] = $sql;
    $result = parent::save($user);
    return $result;
   }

   /**
   * アカウント情報
   * @param array $user 
   * @return array $result ユーザ情報
   */

   public function find(array $user,$input_parameters=NULL){
    // $sql = "Select name,point from account where name = '$user[user]' && password = '$user[password]'";
    $user['sql'] = "Select name,point from account where name = '$user[user]'";
    $result = parent::find($user);
    return $result;
   }

  /**
   * アカウント存在
   * @param array $user ユーザー情報
   * @return boolean 
   */

  public function exist(array $user,$input_parameters = NULL){
    $user['sql'] = "SELECT COUNT(*) FROM account where name = '$user[user]'"; 
    $result = parent::exist($user);
    return $result;
  }

   /**
    * パスワ-ド比較
    */

   function password_resach($user){
     $user['password'] = "SELECT password from account where user = '$user[user]'";
   }
}