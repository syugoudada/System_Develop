<?php
require_once("Repository.php");
class Password_Change extends Repository{
  
  function __construct(string $name,string $password){
    parent::__construct($name,$password);
  }

  function find($user,$input_parameters=NULL){
    $user['sql'] = "SELECT password from account where name = '$user[name]";
    $result = parent::find($user);
    return $result;
  }

   /**
   * パスワード変更
   * @param array $user 現在の情報
   * @param string $new_password
   * @return boolean 
   */

  function update(array $user,$new_password,$input_parameters=NULL){
      $old_password = $this->find($user);
      if($this->decryption($old_password,$user['password'])){
      $sql = "UPDATE account set password = '$new_password' where user = '$user[user]'";
      $stmt = $this->dbh->prepare($sql); 
      $result = $stmt->execute($input_parameters);
      return $result;
    }else{
      return false;
    }
 }

}