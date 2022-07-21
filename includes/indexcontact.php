<?php

if (isset($_POST["submit"])){
    
    $uname = $_POST["uname"];
    $uemail = $_POST["uemail"];
    $phone = $_POST["phone"];
    $message = $_POST["messages"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputContact($uname, $uemail, $phone, $message) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    indexContactUs($conn, $uname, $uemail, $phone, $message);

}

else{
    header("location: ../index.php");
}