<?PHP 
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['passwd']))){
    header('Location: ../index.php');
    exit();
}

require_once "../connect.php";


$connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

if ($connect->connect_errno!=0){
    echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
}
else{
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    $passwd2 = $_POST['passwd2'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];


    //login 
    if((strlen($login)<3) || (strlen($login)>20)){
        $_SESSION['bladNick'] = 'Nieprawidłowa długość loginu powinien składać się z 3 - 20 znaków';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }
    if(ctype_alnum($login)==false){
        $_SESSION['bladNick'] = 'Login może składać się tylko z liter i cyfr';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }
    $result = $connect->query("SELECT id FROM uzytkownicy WHERE user='$login'");
    if($result->num_rows>0){
        $_SESSION['bladNick'] = 'podany login istnieje już w bazie danych';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }

    //imie i nazwisko
    if((strlen($firstName)<3) || (strlen($firstName)>20)){
        $_SESSION['bladImie'] = 'Nieprawidłowa długość imienia, powinno składać się z 3 - 20 znaków';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }
    if((strlen($lastName)<3) || (strlen($lastName)>20)){
        $_SESSION['bladNazwisko'] = 'Nieprawidłowa długość nazwiska, powinno składać się z 3 - 20 znaków';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }

    //email
    $emailb = filter_var($email, FILTER_SANITIZE_EMAIL);
    if((filter_var($emailb, FILTER_VALIDATE_EMAIL)==false) || ($emailb != $email)){
        $_SESSION['bladEmail'] = 'Nie poprawny Email';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }
    $result = $connect->query("SELECT id FROM uzytkownicy WHERE email='$email'");
    if($result->num_rows>0){
        $_SESSION['bladEmail'] = 'podany Email istnieje już w bazie danych';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }

    //haslo
    if(strlen($passwd)<8){
        $_SESSION['bladHasla'] = 'hasło jest za krótkie, minimum 8 znaków';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }
    if($passwd != $passwd2){
        $_SESSION['bladHasla'] = 'hasła się różnią';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }
    //regulamin
    if(!isset($_POST['regulamin'])){
        $_SESSION['bladReg'] = 'zaakceptuj regulamin';
        header('location: rejestracja.php');
        $connect->close();
        exit();
    }

    $passwd = password_hash($passwd, PASSWORD_DEFAULT);

    if($connect->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$passwd', '$email', '$firstName', '$lastName')")){
        $_SESSION['login'] = $login;
        $_SESSION['passwd'] = $passwd2;
        header('location: ../logowanie/logon.php');
    }
    if((!empty($_POST['ulica'])&&(!empty($_POST['dom']))&&(!empty($_POST['kod']))&&(!empty($_POST['miasto'])))){
        if ($result = @$connect->query("SELECT id from uzytkownicy WHERE user='$login'")){
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $id = $row['id'];
            }
        $ulica = $_POST['ulica'];
        $dom = $_POST['dom'];
        $kod = $_POST['kod'];
        $miasto = $_POST['miasto'];
        if ( !preg_match('/^[0-9]{2}-?[0-9]{3}$/Du', $kod) ) {
            $_SESSION['bladkod'] = 'podaj własciwy kod pocztowy';
            header('location: rejestracja.php');
            exit();
        }
        $ulica = htmlentities($ulica, ENT_QUOTES, "UTF-8");
        $dom = htmlentities($dom, ENT_QUOTES, "UTF-8");
        $miasto = htmlentities($miasto, ENT_QUOTES, "UTF-8");
        $connect->query("INSERT INTO adresy VALUES (NULL, '$ulica', '$dom', '$kod', '$miasto', '$id')");
    }
    header('location: ../logowanie/logon.php');
    $connect->close();
}
}
?>