<?php

class DbOparation
{
    private $conn;

    /**
     * Constructor
     */
    function __construct()
    {
        require_once 'DbConnect.php';
        //DBに接続
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    /**
     * Select
     *
     * @param String $sql
     * @param array $input_parameters
     * @return array
     */
    private function select(String $sql, $input_parameters = null)
    {
        $stmt = $this->conn->prepare($sql);

        $flag = $stmt->execute($input_parameters);
        if (!$flag) {
            return false;
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Insert
     *
     * @param String $sql
     * @param array $input_parameters
     * @return bool
     */
    private function insert(String $sql, $input_parameters = null)
    {
        $stmt = $this->conn->prepare($sql);
        $flag = $stmt->execute($input_parameters);
        return $flag;
    }

    /**
     * Get all gategories
     *
     * @return array all categories
     */
    function getCategories()
    {
        $res = $this->select('SELECT * FROM category ORDER BY id');
        return $res;
    }


    /**
     * Get purchased book ids
     *
     * @param Int $userId If set 0 to this param, return all products.
     * @return array
     */
    function getPurchasedBooks(Int $userId)
    {
        if ($userId == 0) {
            $res = $this->select('SELECT id FROM product');
        } else {
            $res = $this->select('SELECT product_id FROM purchase WHERE account_id = ?', array($userId));
        }
        return $res;
    }
}
