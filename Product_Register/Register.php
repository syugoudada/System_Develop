<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../Css/register.css">
  <title>Document</title>
</head>

<body>
  <div>
    <form method="POST" action="register_service.php">
      タイトル:<input type="text" name="title">
      著者名:<input type="text" name="name"><br>
      説明:<textarea style="resize:none" name="description"></textarea>
      <div class="register">
        ジャンル:<select name="genre" id="genre">
          <option disabled selected>ジャンルを選択してください</option>
          <?php
          require_once('../Repository/Product_Registration.php');
          require_once('../Repository/db_config.php');
          $myself = new Product_Registration(DB_USER, DB_PASS);
          $myself->login();
          $genre = $myself->genre();
          foreach ($genre as $value) {
            print("<option value='$value[id]'>$value[name]</option>");
          }
          ?>
        </select>
        <script>
          $(function() {
            //一つ目のジャンル選択後button有効か
            $('#genre').change(function(){
              $("#plusbutton").prop("disabled",false);
            });

            //subgenre表示とボタン文字切り替え
            $('#plusbutton').click(function() {
              var click = $(this);
              if (click.hasClass('plus')) {
                $('#subgenre').show();
                click.val("-");
                click.removeClass('plus');
                if ($('#subgenre').val() === "add") {
                  $('.new_genre').show();
                }
                $('#subgenre').change(function() {
                  if ($(this).val() === "add") {
                    $('.new_genre').show();
                  } else {
                    $(".new_genre").hide().val("");
                  }
                });
              } else {
                $(".new_genre").hide().val("");
                $('#subgenre').hide();
                click.val('+');
                click.addClass('plus');
              }
            });
          });
        </script>
        <select name="subgenre" id="subgenre" class="subgenre">
          <script>
            //ajax(subgenre取得)
            $(function() {
              $('#genre').change(function() {
                sub_genre = {"sub_id": $('#genre').val()};
                $.ajax({
                  type: "POST",
                  url: "sub_genre.php",
                  data: sub_genre,
                  dataType: "json",
                  success: function(msg) {
                    $('select#subgenre option').remove();
                    $('#subgenre').append("<option disabled selected>ジャンルを選択してください</option>");
                    $.each(msg,function(index,value){
                      $('#subgenre').append("<option value='" + value['id'] + "'>" + value['name'] + "</option>");
                    });
                    $('#subgenre').append("<option value='add'>新規追加</option>");
                  }
                });
              });
            });
          </script>
        </select>
        <input type="text" class="new_genre" placeholder="新規登録してください" hidden>
        <input type="button" id="plusbutton" class="plus" value="+" disabled><br>
      </div>
      価格:<input type="text" name="price"><br>
      引用:<input type="text" name="url"><br>
      <input type="file" name="pdf">
      <button name="submit">Upload</button>
    </form>
  </div>
</body>

</html>