<?php
require_once("Repository.php");
class Password_Change_Repository extends Repository{
  
  function __construct(string $name,string $password){
    parent::__construct($name,$password);
  }

  public function find($user,$input_parameters=NULL){
    $user['sql'] = "SELECT password from account where name = '$user[user]'";
    $result = parent::find($user);
    return $result;
  }

   /**
   * パスワード変更
   * @param array $user 現在の情報
   * @param string $new_password
   * @return boolean 
   */

  function update(array $user,$old,$new_password,$input_parameters=NULL){
    $old_password = $this->find($user);
    if($this->decryption($old,$old_password[0]['password'])){
      $new_password = $this->encrypt($new_password);
      $sql = "UPDATE account SET password = '$new_password' where name = '$user[user]'";
      var_dump($sql);
      $stmt = $this->dbh->prepare($sql); 
      $result = $stmt->execute($input_parameters);
      return $result;
    }else{
      return false;
    }
  }
}