<?php
include "includes/navbar.php";


if(isset($_POST['publish']))
{
    $id=$_GET['id'];
    $id= mysqli_real_escape_string($con,$id);
    $id=htmlentities($id);
    
    

  $data=$_POST['ckeditor'];
  $data=mysqli_real_escape_string($con,$data);
  $data=htmlentities($data);


  $title=$_POST['title'];
  $title=mysqli_real_escape_string($con,$title);
  $title=htmlentities($title);

  $sql="update posts set title='$title',content='$data' where id=$id"; 
  $result1=mysqli_query($con,$sql);
  if($result1)
  {
$_SESSION['message']="<div class='chip green white-text'> Post is Updated Successfully.</div>";
header("Location: edit.php?id=".$id);
  }
  else
  {
    $_SESSION['message']="<div class='chip red black-text'> Sorry Something went wrong.</div>";

    header("Location: edit.php?id=".$id);
  }
}

?>
