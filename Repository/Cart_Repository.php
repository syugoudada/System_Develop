<?php
require_once "Repository.php";
date_default_timezone_set('Asia/Tokyo');

class Cart extends Repository
{
    public $value;
    function __construct(string $name, string $password)
    {
        parent::__construct($name, $password);
    }

    /**
     * カートの配列
     * @param array $user 購入商品
     * @return boolean
     */

    //public function save(array $user, $input_parameters = NULL){
    //    $user['sql'] = "UPDATE account SET cart_json = '$user[cart_json]' where name = '$user[user]'";
    //    $result = parent::save($user);
    //    return $result;
    //}

    public function save(array $user, $input_parameters=NULL){
        $user['sql'] = "UPDATE account SET cart_json = '$user[cart_json]' where name = '戸田麻陽'";
        $result = parent::save($user);
        return $result;
    }

    /**
     * 商品ID
     * @param array $user カート
     * @return $result cart_json
     */

    //テスト
    public function find_cart(array $user, $input_parameters=NULL){
        $user['sql'] = "select cart_json from account where name = '戸田麻陽'";
        $result = parent::find($user);
        return $result;
    }

    //public function find_cart(array $user, $input_parameters=NULL){
    //    $user['sql'] = "select cart_json from account where name = '戸田麻陽'";
    //    $result = parent::find($user);
    //    return $result;
    //}


    public function find(array $user, $input_parameters=NULL){
        $json = $this->find_cart($user);
        $product_id = json_decode($json[0]["cart_json"],true);
        $ids = $product_id["id"];
        $result = array();
        foreach ($ids as $id) {
            $user['sql'] = "select id, name, price from product where id = $id";
            array_push($result, parent::find($user));
        }
        return $result;
    }




    //public function find(array $user, $input_parameters=NULL){
    //    $product_id = json_decode($this->find_cart($user));
//
    //    foreach ($product_id as $value) {
    //        $user['sql'] = "select * from product where id = '$value'";
    //    }
    //    $result = parent::find($user);
    //    var_dump($result);
    //    return $result;
    //}
}
