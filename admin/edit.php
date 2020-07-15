<?php
include "includes/navbar.php";

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($con,$id);
    $id=htmlentities($id);

    $sql="select * from posts where id=$id";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_assoc($res);
    ?>




<div class="main">
<form action="edit_check.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
<div class="card-panel">


<?php
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
?>



<h5>Post Title</h5>
<textarea name="title" class="materialize-textarea" placeholder="Title For Post" >
<?php
echo $row['title'];
?>
</textarea>


<h5>Post Content</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor">
<?php
echo $row['content'];
?>
</textarea>


<div class="center">
<input type="submit" value="Update" name="publish" class="btn white-text">
</div>


<?php




if(isset($_POST['publish']))
{
  $data=$_POST['ckeditor'];
  $data=mysqli_real_escape_string($con,$data);
  $data=htmlentities($data);


  $title=$_POST['title'];
  $title=mysqli_real_escape_string($con,$title);
  $title=htmlentities($title);

  $sql="insert into posts (title,content) values('$title','$data')"; 
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

?>
</div>
</form>



      <!--JavaScript at end of body for optimized loading-->
     
    <script type="text/javascript" 
    src="../js/ckeditor/ckeditor.js"></script>
	

    <?php
    include "includes/footer.php";
    ?>
    

    <?php
    }
    else
    {
        redirect("Location:dashboard.php");
    }
}
?>