<?php
session_start();
if ((!isset($_SESSION['user'])) && ($_SESSION['user'] != 'admin')){
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Panel administratora</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="index, follow" />
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="author" content="me" />
<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" type="text/css" href="main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<header>
<div class="cos">
<div class="title">
Panel Administracyjny
</div>
<div class="title"><a href="../logout.php">powrót do strony głównej i wylogowanie</a></div>
</div></header>
<div class="container">
<div class="box">
<nav>
<ul>
    <a href="admin.php"><li><p>zamówienia</p></li></a>
    <a href="klienci.php"><li><p>klienci</p></li></a>
    <a href="dodawanie.php"><li><p>dodawanie produktu</p></li></a>
    <a href="produkty.php"><li><p>przeglądanie produktów</p></li></a>
    <a href="zmiana.php"><li><p>zmiana produktów</p></li></a>

    </ul>

</nav>    
<div class="right">
<form enctype="multipart/form-data" action= "add.php" method ="post">
    nazwa: <br>
    <input type="text" name="Nazwa" /><br>
    opis: <br>
    <input type="text" name="opis" /><br>
    cena: <br>
    <input type="number" name="cena" /><br>
    Zdjęcie: <br>
    <input type="file" name="fileToUpload" /><br>
    <input type="submit" value="zatwierdź" />
</form>
</div></div></div></div>
</body>
</html>