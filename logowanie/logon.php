<?php

    session_start();

    if ((isset($_POST['login'])) || (isset($_POST['passwd'])) || (isset($_SESSION['login'])) || (isset($_SESSION['passwd']))){

    require_once "../connect.php";

    $connect = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connect->connect_errno!=0){
        echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
    }
    else{
        if(isset($_POST['login'])){
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];
        }elseif(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        $passwd = $_SESSION['passwd'];
        }

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if ($result = @$connect->query("SELECT * from uzytkownicy WHERE user='$login'")){
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                
                    if(password_verify($passwd, $row['pass'])){
                    $_SESSION['logged'] = true;
                    $_SESSION['user'] = $row['user'];
                    $_SESSION['userFirstName'] = $row['userFirstName'];
                    $_SESSION['userLastName'] = $row['userLastName'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userid'] = $row['id'];

                    $koszyk = @new mysqli($host, $db_user, $db_password, $db_name);

                    if ($koszyk->connect_errno!=0){
                        echo "error: ".$koszyk->connect_errno; // . " Opis: ". $connect->connect_error;
                    }
                    else{
                        if ($resultkoszyk = @$connect->query("SELECT ID from produkty")){
                            if($resultkoszyk->num_rows>0){
                                while($rowk = $resultkoszyk->fetch_assoc()){
                                    $_SESSION['id'.$rowk['ID']] = 0;
                                }

                            }
                        }
                        $koszyk->close();
                    }
                        
                        
                    unset($_SESSION['blad']);
                    if($_SESSION['user']=='admin'){
                        $result->close();
                        header('location: ../admin/admin.php');
                    }else{
                    $result->close();
                    header('Location: ../index.php'); 
                    }
                }else{
                    $_SESSION['blad'] = '<div class="blad">Nieprawidłowy login lub hasło!</div>';
                    header('location: logowanie.php');
                }
            }else{
                $_SESSION['blad'] = '<div class="blad">Nieprawidłowy login lub hasło!</div>';
                header('location: logowanie.php');
            }
        }

        $connect->close();
    }
}else{
    header('location: ../index.php');
}
?>