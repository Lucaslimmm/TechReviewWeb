<?php
session_start();
include('../includes/dbh.inc.php');
include('message.php');

if(isset($_POST['user_delete'])){
    $user_id = $_POST['delete_id'];
    $query = "DELETE FROM users WHERE usersId = $user_id";
    $query_run = mysqli_query($conn, $query);

    if($query_run == true)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header('Location: registered.php');
        exit();
    }else
    {
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: registered.php');
        exit();
    }

}

if(isset($_POST['cmt_delete'])){
    $id = $_POST['delete_cmt'];
    $query = "DELETE FROM contact_us WHERE id = $id";
    $query_run = mysqli_query($conn, $query);

    if($query_run == true)
    {
        $_SESSION['message'] = "Comment Deleted Successfully";
        header('Location: contactform.php');
        exit();
    }else
    {
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: contactform.php');
        exit();
    }

}




if(isset($_POST['updateuser'])){
    $id = $_POST['edit_id'];
    $uname = $_POST['Ename'];
    $email = $_POST['Eemail'];
    $uid = $_POST['Euid'];
    $password = $_POST['Epwd'];

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users SET usersName='$uname', usersEmail='$email', usersUid='$uid', usersPwd='$hashedPwd' 
              WHERE usersId = $id ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Update Successfully";
        header('Location: registered.php');
        exit();
    }
   
}
?>
