<?php
include "includes/navbar.php";


if(isset($_SESSION['username']))
{
?>





<div class="main">
<form action="write.php" method="POST" enctype="multipart/form-data">
<div class="card-panel">


<?php
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
?>



<h5>Post Title</h5>
<textarea name="title" class="materialize-textarea" placeholder="Title For Post" ></textarea>

<h5>Featured Image</h5>
<div class="input-field file-field">
<div class="btn">
Upload file
<input type="file" name="image">
</div>
<div class="file-path-wrapper">
<input type="text" class="file-path">
</div>
</div>

<h5>Post Content</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor">
</textarea>


<div class="center">
<input type="submit" value="publish" name="publish" class="btn white-text">
</div>


<?php




if(isset($_POST['publish']))
{
  $data=$_POST['ckeditor'];
  $data=mysqli_real_escape_string($con,$data);
 


  $title=$_POST['title'];
  $title=mysqli_real_escape_string($con,$title);
  $title=htmlentities($title);



  $image=$_FILES['image'];
  $img_name=$_FILES['image']['name'];
  $img_size=$_FILES['image']['size'];
  $tmp_dir=$_FILES['image']['tmp_name'];
  $type=$_FILES['image']['type'];
  if($type=="image/jpeg" || $type=="image/png" || $type=="image/jpg")
  {
    if($img_size <=2097152)
    {
      move_uploaded_file($tmp_dir,"../img/".$img_name);



  $sql="insert into posts (title,content,image) values('$title','$data','$img_name')"; 
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



  else
  {
    $_SESSION['message']="<div class='chip red white-text'> Sorry, Image size exceded by 2 MB.</div>";
  header("Location: write.php");
  }
  }

else
{
  $_SESSION['message']="<div class='chip red white-text'> Sorry, Image format is not supported.</div>";
  header("Location: write.php");
}
} 

?>
</div>
</form>



      <!--JavaScript at end of body for optimized loading-->
     
      <script type="text/javascript" 
    src="../js/ckeditor/ckeditor.js"></script>
	

    <?php
    include "includes/footer.php";
}
else
{
  $_SESSION['message']="<div class='chip  white black-text'> Login to Continue </div>";
    header("Location: login.php");
}
    ?>
    
  