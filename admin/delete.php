<?php
include "includes/header.php";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($con,$id);
    $id=htmlentities($id);
    $sql="delete from posts where id=$id";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        echo "<div class='chip green white-text'> Post Deleted Successfully.</div>";
    }
    else
    {
        echo "<div class='chip red black-text'> Something went wrong.</div>";
    }
}
?>