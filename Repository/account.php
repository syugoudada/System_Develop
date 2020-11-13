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
    // $password = $this->encrypt($user['password']);
    $sql = "Select name,point from account where name = '$user[user]' && password = '$user[password]'";
    // $sql = "Select name,point from account where name = '$user[user]' && password = '$password'";
    $user['sql'] = $sql;
    $result = parent::find($user);
    return $result;
   }

  /**
   * アカウント存在
   * @param array $user ユーザー情報
   * @return boolean 
   */

  public function exist(array $user,$input_parameters = NULL){
    // $password = $this->encrypt($user['password']);
    $sql = "SELECT COUNT(*) FROM account where name = '$user[user]' && password = '$user[password]'"; 
    $user['sql'] = $sql;
    $result = parent::exist($user);
    return $result;
  }

  /**
   * パスワード変更
   * @param array $user 現在の情報
   * @param string $new_password
   */

   function update(array $user,$new_password,$input_parameters=NULL){
      $sql = "UPDATE account set password = '$new_password' where user = '$user[user]' and password = '$user[password]'";
      $stmt = $this->dbh->prepare($sql); 
      $result = $stmt->execute($input_parameters);
      return $result;
   }

   /**
    * パスワ-ド比較
    */

  //  function password_resach($user){
  //    $sql = "SELECT password from account where user = '$user[user]' and password = '$user[password]'";
  //  }
}