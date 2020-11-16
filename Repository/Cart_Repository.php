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
        var_dump($result);
        return $result;
    }

    /**
     * 商品ID
     * @param array $user カート
     * @return $result cart_json
     */

    public function find_cart(array $user, $input_parameters=NULL){
        $user['sql'] = "select cart_json from account where name = '$user[user]'";
        $result = parent::find($user);
        return $result;
    }

    public function find(array $user, $input_parameters=NULL){
        $id = $this->find_cart($user);
        var_dump($id);
        $product_id = [];
        $product_id[] = json_decode($id, true);
        var_dump($product_id);
        foreach ($product_id as $value) {
            $user['sql'] = "select * from product where name = '$value'";
        }
        $result = parent::find($user);
        return $result;
    }
}
