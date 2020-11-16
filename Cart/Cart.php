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


        /** 
         *カートに入れた商品をデータベースに格納
         *$product_id 商品id
         *$jsonstr jsonファイルの変数
         * 
        **/
        //カートに入ってる商品のid入れる配列
        $product_id = [];
        $_SESSION["cart"] = $product_id;

        //テスト
        $product_id[] = 1;
        $product_id[] = 100;
        $product_id[] = 101;
        $product_id[] = 102;
        $product_id[] = 103;
        
        

        //商品のIDを取得
        //$product_id[] = $_GET["id"];

        //カートに入ったIDの配列をjsonに変換
        $jsonstr =  json_encode($product_id);
        //print $jsonstr;
        $_SESSION["cart_json"] = $jsonstr;
        //var_dump($_SESSION);
        $myself->save($_SESSION);


        /** 
         *カートに入れた商品を表示
         *$product_id 商品id
         *$jsonstr jsonファイルの変数
         * 
        **/
        
        $cart = $myself->find($_SESSION);
        print $cart;
        //カートの中身を表示

        
        ?>
    
    </body>
</html>