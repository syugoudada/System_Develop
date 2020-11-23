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
        /** 
         *カートに入れた商品を表示
         *$product_id 商品id
         *$jsonstr jsonファイルの変数
         * 
        **/
        $cart = $myself->find($_SESSION);

        var_dump($cart);
        //カートの中身を表示
        ?>

        
    
    </body>
</html>