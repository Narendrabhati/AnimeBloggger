<?php
include "includes/header.php";


if(isset($_POST['login']))
{
    
    $username=$_POST['username'];
    $password=$_POST['password'];


    //SQL injection attack
    $username=mysqli_real_escape_string($con,$username);
    $password=mysqli_real_escape_string($con,$password);


    //Crosssite scripting attack (accesses attack)
    $username=htmlentities($username);
    $password=htmlentities($password);
    $sql="select password from users where username='$username'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $pass=$row['password'];
    if(password_verify($password,$pass))
    {
        $_SESSION['username']=$username;
        header ("Location: dashboard.php");
    }
    else
    {
        header ("Location: login.php");
        $_SESSION['message']="<div class='chip  red black-text'>Sorry, Credentials don't match </div>";
    }

}
?>