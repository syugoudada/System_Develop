<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../Css/register.css">
  <title>Document</title>
</head>
<body>
  <div>
    <form method="POST" enctype="multipart/form-data">
      タイトル:<input type="text" name="title">
      著者名:<input type="text" name="author"><br>
      説明:<textarea style="resize:none" name="description"></textarea>
      ジャンル:<select name="genre" id="genre">
      <option disabled selected>ジャンルを選択してください</option>
        <option value="">マンガ</option>
        <option value="">参考書</option>
        <option value="">小説</option>
      </select>
      <script>
        $(function(){
          $('#plusbutton').click(function(){
            var click = $(this);
            if(click.hasClass('plus')){
              $('#subgenre').show();
              click.val("-");
              click.removeClass('plus');
              $('.register').append('<input type="text" placeholder="こんにちは">');
            }else{
              $('#subgenre').hide();
              click.val('+');
              click.addClass('plus');
            }
          });
        });  
      </script>
      <select name="subgenre" id="subgenre" class="subgenre">
      <option disabled selected>ジャンルを選択してください</option>
      <option>新規追加</option>
      </select>
      <input type="button" id="plusbutton" class="plus" value = "+"><br>
      <div class="register">
      </div>
      価格:<input type="text" name="price"><br>
      引用:<input type="text" name="url"><br>
      <input type="file" name="myfile">
      <button name="submit">Upload</button>
    </form>
  </div>
</body>
</html>