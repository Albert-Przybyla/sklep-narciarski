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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<div class="image"></div>
<div class="site">
        <div class="box">
            <div class="title">Logowanie</div>
            <form action="logon.php" method="post" class="form">
                <div class="dane">
                Login: <br>
                <input class="text" type="text" name="login" /> <br>
                Hasło: <br>
                <input class="text" type="password" name="passwd" /> <br>

                <div class="blad"></div>
                <?php
                if(isset($_SESSION['blad'])){
                echo $_SESSION['blad'];
                }else{
                    echo'<div class="blad"></div>';
                }
                ?>
                                </div>
                <div class="bottom">
                <a href="../rejestracja/rejestracja.php" class="button">nie masz konta? <br> zarejestruj się!</a>
                <input class="button" type="submit" value="zaloguj się" />
                </div>



            </form>
        </div>
        <a href="../index.php" class="link">
        <i class="fas fa-undo-alt"></i>
        </a>


</div>
<script src="skrypt.js"></script>
</body>
</html>