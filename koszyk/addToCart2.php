<?PHP
session_Start();

$new = $_POST["ID"];

// if((isset($_SESSION['login']) && (isset($_SESSION['passwd'])){
// echo $_POST["nazwa"];


$_SESSION['id'.$new]++;
// }else{
//     header('location: logowanie.php')
// }
header('location: koszyk.php')

?>