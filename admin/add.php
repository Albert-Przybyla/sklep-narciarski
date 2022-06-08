<?php
session_start();

require_once "../connect.php";

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
  


$connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

if ($connect->connect_errno!=0){
    echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
}
else{
$obrazek = "./zdj/".$_FILES["fileToUpload"]["name"];
$Nazwa = $_POST['Nazwa'];
$opis = $_POST['opis'];
$cena = $_POST['cena'];
if(!$connect->query("INSERT INTO produkty VALUES (NULL, '$Nazwa', '$opis', '$cena', '$obrazek')")){
    echo 'blad';
}
header('location: admin.php');
$connect->close();
}
?>