<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>カート</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>
    <body>
        <h1>ショッピングカート</h1>
        <?php
        //カートリポジトリを呼び出し
        require_once '../Repository/Cart_Repository.php';
        session_start();

        //カートクラスのインスタンス
        $myself = new Cart('root','rootpass');
        $myself->login();
        session_start();
        $_SESSION["cart"] = $product_id;

        //カートに入ってる商品のid入れる配列
        $product_id = [];

        //クリックされたら本のIDを取得
        $product_id = 1;

        //商品のIDを取得
        //$product_id = $_GET["id"];
        $_SESSION["cart"] = $product_id;

        //カートに入ったIDの配列をjsonに変換
        $jsonstr =  json_encode($product_id);
        print $jsonstr;
        $_SESSION["cart_json"] = $jsonstr;
        $myself->save($_SESSION);


        //カートの中身を表示
        //データベースログイン
        
        ?>
    
    </body>
</html>