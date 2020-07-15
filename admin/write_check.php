<?php

include "includes/header.php";


if(isset($_POST['publish']))
{
  $data=$_POST['ckeditor'];
  $data=mysqli_real_escape_string($con,$data);
  $data=htmlentities($data);


  $title=$_POST['title'];
  $title=mysqli_real_escape_string($con,$title);
  $title=htmlentities($title);

  

  
      $sql="insert into posts (title,content) values('$title','$data',)"; 
      $result1=mysqli_query($con,$sql);
      if($result1)
      {
    $_SESSION['message']="<div class='chip green white-text'> Post is Publihed.</div>";
    header("Location: write.php");
      }
      else
      {
        $_SESSION['message']="<div class='chip red black-text'> Sorry Something went wrong.</div>";
    
        header("Location: write.php");
      }
    }

  )


   
 
}


?>