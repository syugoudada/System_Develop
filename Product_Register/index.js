$.ajax({
  type: "POST",
  url: "sub_genre.php",
  data: sub_genre,
  dataType: "json",
  success: function (msg) {
    console.log(msg);
  }
});
