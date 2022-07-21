<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;

    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;

    if($pwd !== $pwdRepeat) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
}
else{
    $result = false;
    return $result;
}

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd, $roleid) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, roleid) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $roleid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function adminCreateUser($conn, $name, $email, $username, $pwd, $roleid) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, roleid) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/registered.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $roleid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admin/registered.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;

    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd, $roleid) {

    $uidExsits = uidExists($conn, $username, $username, $roleid);

    if($uidExsits === false){
        header("location: ../login.php?error=wrongUid");
        exit();
    }

    $pwdHashed = $uidExsits["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false){
        header("location: ../login.php?error=wrongPassword");
        exit();
    }

    else if($checkPwd == true){
        session_start();
        $_SESSION["userid"] = $uidExsits["usersId"];
        $_SESSION["useruid"] = $uidExsits["usersUid"];


        header("location: ../index.php");
        exit();
    }

}


function emptyInputContact($uname, $uemail, $phone, $message){
    $result;

    if(empty($uname) || empty($uemail) || empty($phone) || empty($message)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function contactUs($conn, $uname, $uemail, $phone, $message) {
    $sql = "INSERT INTO contact_us (uname, uemail, phone, messages) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../contact.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $uname, $uemail, $phone, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../contact.php?error=none");
    exit();
}

function indexContactUs($conn, $uname, $uemail, $phone, $message) {
    $sql = "INSERT INTO contact_us (uname, uemail, phone, messages) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $uname, $uemail, $phone, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}