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
    <ul>
    <?php
        require_once "../connect.php";

        $connect = @new mysqli($host, $db_user, $db_passwd, $db_name);
        
        if ($connect->connect_errno!=0){
            echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
        }
        else{
            $result = @$connect->query("SELECT * from uzytkownicy WHERE user != 'admin'");
            $i = 0;
            while($row = $result->fetch_assoc()){
                // if($i%3==0){
                //     if($i!=0){
                //     echo "</div>";
                //     echo '<div class="slide">';
                //     }
                // }
                // $i++;
                echo '<li>';
                echo "<p>".$row['id'].", ". $row['userFirstName']. ", ". $row['userLastName']. ", ". $row['user'].", ". $row['email']."</p>";
                echo '</li>';
            }
            $connect->close();
        }
    
    ?>
    </ul>
</div></div>
</div>
</body>
</html>