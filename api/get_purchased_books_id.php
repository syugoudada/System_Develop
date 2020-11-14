<?php

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['test'])) {

    //値の取得
    if (isset($_GET['test'])) {
        $response['mode'] = 'debug';
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $userId = $_GET['id'];
        } else {
            $userId = 0;
        }
        $response['user'] = $userId;
    } else {
        $userId = $_POST['id'];
    }

    //DBファイルの操作
    require_once '../includes/DbOperation.php';
    $db = new DbOparation();

    $value = $db->getPurchasedBooks($userId);
    $response['error'] = false;
    $response['content'] = $value;
} else {
    $response['error'] = true;
    $response['messgae'] = 'あなたは承認されていません';
}

echo json_encode($response);
