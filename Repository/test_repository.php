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

    public function find(array $user, $input_parameters = NULL){
        $user['sql'] = "select * from product";
        $result = parent::find($user);
        return $result;
    }

}
