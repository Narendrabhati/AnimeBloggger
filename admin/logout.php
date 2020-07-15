<?php
include "includes/header.php";

if(isset($_SESSION['username']))
{
unset($_SESSION['username']);

$_SESSION['message']="<div class='chip   orange black-text'> Logout Successfully. </div>";
header("Location: login.php");
}
else
{
    $_SESSION['message']="<div class='chip   white black-text'> Login to Continue </div>";
    header("Location: login.php");
}