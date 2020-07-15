<?php
include "includes/header.php";
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($con,$id);
    $id=htmlentities($id);
    $sql="update comment set status=0 where id=$id";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        echo "<div class='chip  orange black-text'> Comment Removed Successfully. </div>";
        
    }
    else
    {
        echo "<div class='chip  red black-text'>Sorry, Something went wrong. </div>";
    }
}
?>