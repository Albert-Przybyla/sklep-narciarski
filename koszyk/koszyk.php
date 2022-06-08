<?php
session_Start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Serwis Narciarski i Snowbordowy</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="index, follow" />
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="author" content="me" />
<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/nav.css" class="css">
<link rel="stylesheet" type="text/css" href="../css/cart.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="image"></div>
    <div class="site">
        <div class="box">
        <div class="koszyk">
        <?PHP
        require_once "../connect.php";

        $connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

        if ($connect->connect_errno!=0){
            echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
        }else{
            $result = @$connect->query("SELECT ID, nazwa, cena from produkty");
            $i = 0;
            while($row = $result->fetch_assoc()){

                if($_SESSION['id'.$row['ID']]>0){
                    $cena = $row['cena']*$_SESSION['id'.$row['ID']];

                    $i++;
                    echo '<div class="item"><div class="nazwa">'. $row['nazwa'].'</div>'.'<div class="cena">'.$cena.'</div>'.'<div class="ilosc">'. $_SESSION['id'.$row['ID']].'</div>';
                    echo '<form action="addToCart2.php" method="POST"><input type="hidden" name="ID" value="'.$row['ID'].'"/><input type="submit" value="+"/></form>';
                    echo '<form action="removeFromCart.php" method="POST"><input type="hidden" name="ID" value="'.$row['ID'].'"/><input type="submit" value="-"/></form>';
                    echo '</div>';
                    
                }
            }
            if($i==0){
                echo '<div class="pustka">twój koszyk jest pust udaj się na zakupy! </div>';
            }
            $connect->close();
        }
            ?>
            </div>
            <div class="zamow">
            <div class="title">Zamów! <i class="fas fa-shipping-fast"></i></div>
            <form action="zamawianie.php" method="POST">
                <p>zamów na adres z konta na które się zalogowałeś!
                <input type="radio" name="gdzie" value="adres z konta"></p>
                <div class="inny">
                <p>zamów na ten adres: 
                <input type="radio" name="gdzie" value="adres"></p>
                <p>miasto
                <input type="text" name="miasto"></p>
                <p>kod pocztowy
                <input type="text" name="kod"></p>
                <p>numer domu
                <input type="text" name="dom"></p>
                
                
                <input type="submit" class="submit" value="zamów">
                </div>
            </form>
            </div>
    </div>
    <a href="../index.php" class="link">
    <i class="fas fa-undo-alt"></i>
    </a>
    </div>
    </body>
    </html>