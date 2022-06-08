<?php 

session_start();

require_once "../connect.php";

        $connect = @new mysqli($host, $db_user, $db_passwd, $db_name);

        if ($connect->connect_errno!=0){
            echo "error: ".$connect->connect_errno; // . " Opis: ". $connect->connect_error;
        }else{
            


            $connect->close();
        }


?>