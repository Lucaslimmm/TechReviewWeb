<?php

if (isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $username = $_POST["uid"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $roleid = $_POST["roleid"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../admin/register-user.php?error=wronginput");
        exit();
    }
    if (invalidUid($username) !== false){
        header("location: ../admin/register-user.php?error=wronginput");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../admin/register-user.php?error=wronginput");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../admin/register-user.php?error=wronginput");
        exit();
    }
    if (uidExists($conn,$username,$email) !== false){
        header("location: ../admin/register-user.php?error=wronginput");
        exit();
    }

    adminCreateUser($conn, $name, $email, $username, $pwd, $roleid);

}

else{
    header("location: ../admin/registered.php");
}