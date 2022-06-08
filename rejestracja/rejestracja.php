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
<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" type="text/css" href="../css/nav.css" />
<link rel="stylesheet" href="../css/user.css" class="css">
<link rel="stylesheet" href="../css/useradd.css" class="css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<div class="image"></div>
    <div class="site">
        <div class="box">
        <div class="title">Rejsetracja</div>
            <form action="register.php" method="post">
            <div class="formbox">
            <div class="leftrej">
            Login <span>*</span> <br>
            <input type="text" class="text" name="login" /><br>

            <?php
                if(isset($_SESSION['bladNick'])){
                echo '<div class="blad">'.$_SESSION['bladNick'].'</div>';
                unset($_SESSION['bladNick']);
                }
                ?>
            imie <span>*</span> <br>
            <input type="text" class="text" name="firstName" /><br>
            <?php
                if(isset($_SESSION['bladImie'])){
                echo '<div class="blad">'.$_SESSION['bladImie'].'</div>';
                unset($_SESSION['bladImie']);
                }
                ?>
            nazwisko <span>*</span> <br>
            <input type="text" class="text" name="lastName" /><br>
            <?php
                if(isset($_SESSION['bladNazwisko'])){
                echo '<div class="blad">'.$_SESSION['bladNazwisko'].'</div>';
                unset($_SESSION['bladNazwisko']);
                }
                ?>
            E mail <span>*</span> <br>
            <input type="text" class="text" name="email" /><br>
            <?php
                if(isset($_SESSION['bladEmail'])){
                echo '<div class="blad">'.$_SESSION['bladEmail'].'</div>';
                unset($_SESSION['bladEmail']);
                }
                ?>
            hasło <span>*</span> <br>
            <input type="password" class="text" name="passwd" /><br>
            powtórz hasło <span>*</span> <br>
            <input type="password" class="text" name="passwd2" /><br>
            <?php
                if(isset($_SESSION['bladHasla'])){
                echo '<div class="blad">'.$_SESSION['bladHasla'].'</div>';
                unset($_SESSION['bladHasla']);
                }
                ?>
            <label>
            <input type="checkbox" name="regulamin" /> Akceptuję Regulamin strony <span>*</span>
            </label><br>
            <?php
                if(isset($_SESSION['bladReg'])){
                echo '<div class="blad">'.$_SESSION['bladReg'].'</div>';
                unset($_SESSION['bladReg']);
                }
                ?>
            </div>
            <div class="leftrej">
            <p>część opcjonalna:</p>
            ulica: <br>
            <input type="text" class="text" name="ulica" /><br>
            nr. domu: <br>
            <input type="text" class="text" name="dom" /><br>
            kod pocztowy: <br>
            <input type="text" class="text" name="kod" pattern="[0-9]{2}\-[0-9]{3}" title="Format xx-xx/><br>
            <?php
                if(isset($_SESSION['bladkod'])){
                echo '<div class="blad">'.$_SESSION['bladkod'].'</div>';
                unset($_SESSION['bladkod']);
                }
                ?>
            miejscowość: <br>
            <input type="text" class="text" name="miasto" /><br>

            </div>
            </div>
                            <div class="bottom">
                <a href="../logowanie/logowanie.php" class="button">masz już konto? <br> zaloguj się!</a>
                <input class="button" type="submit" value="zarejestruj się" />
                </div>
            </form>
        </div>

        <a href="../index.php" class="link">
        <i class="fas fa-undo-alt"></i>
        </a>

</div>
</body>
</html>