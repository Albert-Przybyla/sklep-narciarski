<?php
session_start();
$produkt = $_POST['nazwa'];

require_once "../connect.php";


$connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

if ($connect->connect_errno!=0){
    echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
}
else{
if(!empty($_POST['opis'])){
$opis = $_POST['opis'];
if(!$connect->query("UPDATE produkty SET opis='$opis' Where nazwa='$produkt'")){
    echo 'blad';
}
}
if(!empty($_FILES['fileToUpload'])){
    $target_dir = "../zdj/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
  $uploadOk = 0;
}

if (!$uploadOk == 0){
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
$obrazek = "./zdj/".$_FILES["fileToUpload"]["name"];
if(!$connect->query("UPDATE produkty SET zdj='$obrazek' Where nazwa='$produkt'")){
    echo 'blad';
}


}
if(!empty($_POST['cena'])){
$cena = $_POST['cena'];
if(is_numeric($cena)){
if(!$connect->query("UPDATE produkty SET cena='$cena' Where nazwa='$produkt'")){
    echo 'blad';
}
}else{
    echo 'int kurwo';
}
}
if(!empty($_POST['nowaNazwa'])){
$nowaNazwa = $_POST['nowaNazwa'];
if(!$connect->query("UPDATE produkty SET nazwa='$nowaNazwa' Where nazwa='$produkt'")){
    echo 'blad';
}



}
header('location: zmiana.php');
$connect->close();
}
?>