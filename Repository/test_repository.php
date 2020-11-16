<?php
require_once "Repository.php";
date_default_timezone_set('Asia/Tokyo');

class test extends Repository
{
    public $value;
    function __construct(string $name, string $password)
    {
        parent::__construct($name, $password);
    }

    /**
     * 商品ID
     * @param array $user 商品
     * @return array $result 商品ID アカウントID
     */

    public function find(array $user, $input_parameters = NULL)
    {
        // $password = $this->encrypt($user['password']);
        $product_sql = "select id from product where name = '$this->value'";
        $user_sql = "select id from account where name = 'user'";
        $user['sql'] = $product_sql;
        $result['product_id'] = parent::find($user);
        $user['sql'] = $user_sql;
        $result['user_id'] = parent::find($user);
        return $result;
    }
}
