<?php
include "includes/header.php";


if(isset($_POST['signup']))
{
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];


    //SQL injection attack
    $email=mysqli_real_escape_string($con,$email);
    $username=mysqli_real_escape_string($con,$username);
    $password=mysqli_real_escape_string($con,$password);


    //Crosssite scripting attack (accesses attack)
    $email=htmlentities($email);
    $username=htmlentities($username);
    $password=htmlentities($password);
    $password=password_hash($password,PASSWORD_BCRYPT);


    $sql1="select * from user where email='$email' or username='$username'";
    $sql="insert into user(email,username,password) values('$email','$username','$password')";
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)>0)
    {
        
        header("Location: login.php");
        $_SESSION['message']="<div class='chip  red black-text'>Account already exists,please login to Continue</div>";
    
    }
    else
    {
 #echo $email,$username,$password;


 $sql="insert into users(email,username,password) values('$email','$username','$password')";
 $result=mysqli_query($con,$sql);


 if($result)
 {
     header("Location: login.php");
     $_SESSION['message']="<div class='chip  green white-text'>Sign up Successfully, Login to Continue</div>";
 }
 else
 {
   header("Location: login.php");
    $_SESSION['message']="<div class='chip  red black-text'>Something went wrong,Please Sign up again</div>";
 }

    }

   

}