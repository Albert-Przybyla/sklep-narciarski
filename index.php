<?php
session_start();
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
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/nav.css" class="css">
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    
    <div id="site" ></div>
    <nav>
    <ul>
    <a href="#site"><li><i class="fas fa-skiing"></i> Home</li></a>
    <a href="#site2"><li><i class="fas fa-book-reader"></i> o nas</li></a>
    <a href="#site3"><li><i class="fas fa-poll-h"></i> oferta</li></a>
    <a href="#site4"><li><i class="fas fa-store"></i> sklep</li></a>
    <a href="#site5"><li><i class="fas fa-address-card"></i> kontakt</li></a>
    <li><div class="menu">
        <i class="fas fa-user-alt"></i>
        konto
        </div>
    </li>
    </ul>
    </nav>
    <div class="navigation">
        <ul class="navigation__list">
                <?php
                if(isset($_SESSION['logged'])&&($_SESSION['logged']==true)){
                echo "<li class='userinfo'>zalogowałeś się jako:<br>";
                echo $_SESSION['user']."<br>"; 
                echo "email: <br>";
                echo $_SESSION['email']."</li>";
                echo '<a href=koszyk/koszyk.php><li class="navigation__item"><i class="fas fa-shopping-basket"></i><br>koszyk</li></a>';
                echo '<a href="logout.php"><li class="navigation__item"><i class="fas fa-sign-out-alt"></i><br>wyloguj się</li></a>';
                }else{
                echo '<a href="logowanie/logowanie.php"><li class="navigation__item"><i class="fas fa-sign-in-alt"></i><br>zaloguj się</li></a>';
                echo '<a href="rejestracja/rejestracja.php"><li class="navigation__item"><i class="fas fa-user-plus"></i><br>zarejestruj się</li></a>';
                }
                ?>

        </ul>
    </div>
    <div id="site1">
        <header>
            <div class="logo">
            Serwis<br>
            Sprzętu<br>
            Narciarskiego
            </div>
        </header>
    </div>
    <div id="site2">
        <div class="title">
            <p>O nas</p>
        </div>
        <div class="content">
            <div class="inner">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </div>
            <div class="inner">
                <img src="serwis_narciarski.jpg">
            </div>

        </div>

    </div>
    <div id="site3">
        <div class="title">
            <p>Oferta</p>
        </div>
        <div class="content">
            <div class="inner3">
                <div class="left">
                <ul>
                    <li>
                        <p>Ostrzenie </p>
                        <p>ręczne ostrzenie nart na kąt wybrany przez klienta</p>
                        <p>Cena: 50zł</p>
                    </li>
                    <li>
                        <p>Ostrzenie </p>
                        <p>ręczne ostrzenie nart na kąt wybrany przez klienta</p>
                        <p>Cena: 50zł</p>
                    </li>
                    <li>
                        <p>Ostrzenie </p>
                        <p>ręczne ostrzenie nart na kąt wybrany przez klienta</p>
                        <p>Cena: 50zł</p>
                    </li>
                    <li>
                        <p>Ostrzenie </p>
                        <p>ręczne ostrzenie nart na kąt wybrany przez klienta</p>
                        <p>Cena: 50zł</p>
                    </li>
                    <li>
                        <p>Ostrzenie </p>
                        <p>ręczne ostrzenie nart na kąt wybrany przez klienta</p>
                        <p>Cena: 50zł</p>
                    </li>
                </ul>
                </div>
                <div class="right">
                    <?PHP
                    if (!isset($_SESSION['user'])){
                        echo '<a href="logowanie/logowanie.php">';
                    }

                    ?>
                <form action="umawianie.php">
                    <div class="form">
                    <p>Umów się na serwis!</p>
                    Data: <input type="date" name="data"/><br>
                    Ostrzenie <input type="checkbox" name="ostrzenie" /><br>
                    Ostrzenie <input type="checkbox" name="ostrzenie" /><br>
                    Ostrzenie <input type="checkbox" name="ostrzenie" /><br>
                    Ostrzenie <input type="checkbox" name="ostrzenie" /><br>
                    Ostrzenie <input type="checkbox" name="ostrzenie" /><br>
                    <input type="submit" value="umów serwis"/>
                    </div>
                    <?PHP if (!isset($_SESSION['user'])){
                        echo '</a>';
                    } ?>
                </form>
                </div>
            </div>
        </div>

    </div>
    <div id="site4">
        <div class="title">
            <p>Sklep</p>
        </div>
        <div id="gap">


        <div class="slide active">
            <?PHP
            require_once "connect.php";

            $connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

            if ($connect->connect_errno!=0){
                echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
            }else{
                $result = @$connect->query("SELECT * from produkty");
                $i = 0;
                $j = 1;
                while($row = $result->fetch_assoc()){
                    if($i%6==0){
                        if($i!=0){
                            echo '</div>';
                            echo '<div class="slide">';
                            $j++;
                        }
                    }
                    $i++;
                    echo '<div class="item">';
                    echo '<div class="nazwa">'. $row['nazwa'].'</div>';
                    echo '<div class="opis">'.$row['opis'].'</div>';
                    echo '<div class="zdj"><img src="'. $row['zdj'].'"></div>';
                    echo '<div class="cena">Cena: '. $row['cena'].' zł</div>';
                    echo '<form method="POST" id="form" action="koszyk/addToCart.php">';
                    echo '  <input type="hidden" id="ID" name="ID" value="'.$row['ID'].'"/>';
                    echo '  <button type="submit">Do koszyka!</button>';
                    echo '</form>';
                    echo '</div>';
                }
                $connect->close();
            }
                ?>
        
        </div>
        <?php
            // $connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

            // if ($connect->connect_errno!=0){
            //     echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
            // }else{
            //     $result = @$connect->query("SELECT nazwa from produkty");
            //         if(isset($_POST['nazwa']))
            //         echo $_POST['nazwa'];
            //         $connect->close();
            // }
            

        ?>
        <script>
// $(document).ready(function(){
//     $("button").click(function(){
//         var formData = {
//             'nazwa'              : $('input[name=nazwa]').val(),
//         };
//         // process the form
//         $.ajax({
//             type        : 'POST', 
//             url         : 'form.php', 
// 			data        : formData
 
//         })
//             .done(function(data) {
// 				$('#test').html(data);
 
//             });
//         event.preventDefault();
//     });
 
// });
        </script> 


        </div>
            <div class="skip">
                <div id="left"><a href="#site4"><i class="fas fa-angle-left"></i></a></div>
                <div class="nrStr">1 z <?php echo $j; ?></div>
                <div id="right"><a href="#site4"><i class="fas fa-angle-right"></i></a></div>
            </div>
    </div>
    <div id="site5">
        <div class="title">
            <p>kontakt</p>
                <div class="kontakt">+48 542 324 745<br>
                ul. Przełajowa 4, Poznań, 61-622</div>
        </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2432.963674763758!2d16.944480315623956!3d52.42545587979649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045b5edeffa813%3A0x3edd774fcdd963fe!2sPrze%C5%82ajowa%204%2C%2061-622%20Pozna%C5%84!5e0!3m2!1spl!2spl!4v1620247548903!5m2!1spl!2spl" style="border:0;" allowfullscreen="" loading="fast"></iframe>

    </div>
    <footer>
            <div class="logo">
            Serwis<br>
            Sprzętu<br>
            Narciarskiego
            </div>
            <div class="social">
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-facebook-messenger"></i>
            <i class="fab fa-youtube"></i>
            </div>

    </footer>



    <script src="skrypt.js"></script>
    </body>
    </html>