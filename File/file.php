<?php
/**
 * pdfの登録
 * @param stirng $id
 * @return boolean 
 */

function pdf_register(string $id){
  $name = $_FILES['myfile']['name'];
  $tmp_file = $_FILES['myfile']['tmp_name'];
  move_uploaded_file($tmp_file,PDF_PATH.$name);
  if (rename(PDF_PATH . $name, PDF_PATH . "pdf$id.pdf")) {
    return true;
  } else {
    return false;
  }
}

/**
 * 画像の登録
 * @param stirng $id
 * @return boolean 
 */

function image_register(string $id){
  $name = $_FILES['image']['name'];
  $tmp_file = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp_file,IMAGE_PATH.$name);
  if (rename(IMAGE_PATH . $name, IMAGE_PATH . "image$id.png")) {
    return true;
  } else {
    return false;
  }
}


?>