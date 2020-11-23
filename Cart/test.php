<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>カート</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>
    <body>
        <h1>メインテスト</h1>
        <?php
        //カートリポジトリを呼び出し
        require_once '../Repository/test_repository.php';
        session_start();

        $myself = new test('root','rootpass');
        $myself->login();
        $product = $myself->find($_SESSION);?><br><?php
        //var_dump($product);
        //echo $product[0]["id"];
        foreach($product as $value_id){
            $id = $value_id["id"];
        }

        foreach ($product as $value){
            print $value["name"];?>
            <form action="Cart_add.php" method="POST">
                <input type="hidden" name="book_id" value=<?= "$value[id]" ?>>
                <button class="prodct_id" type="submit">カートに入れる</button>
            </form>
            <?php
            print "<br>";
        }
        ?>
    
    </body>
</html>