<?php
include "includes/header.php";
 ?>


 
 <?php
include "includes/navbar.php";
 ?>







<div class="row">
<!-- main post content area-->
<div class="col l9 m9 s12">
<?php
if(isset($_GET['id']))
{
     $id=$_GET['id'];
     $id=mysqli_real_escape_string($con,$id);
     $id=htmlentities($id);
     $sql="select * from posts where id=$id";
     $res=mysqli_query($con,$sql);
     if(mysqli_num_rows($res)>0)
     {
         $sql2="select view from posts where id=$id";
         $res2=mysqli_query($con,$sql2);
         $row2=mysqli_fetch_assoc($res2);



         $view=$row2['view'];
         $view=$view+1;




         $sql3="update posts set view=$view where id=$id";
        mysqli_query($con,$sql3);
         $row=mysqli_fetch_assoc($res);
         $title=$row['title'];
         $content=$row['content'];
    ?>





    
    <div class="card-panel">
    <h5 class="center"><?php echo ucwords ($title);?></h5>
    <p class="flow-text">
    <?php echo $content?>
    </p>



<div class="card-panel">
<div class="row">
<div class="col l8 offset-l2 m10 offset-m1 s12">
<h5>Comment Here</h5>
<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<form action="post.php?id=<?php echo $id; ?>" method="POST">
<div class="input-field">
<input type="email" name="email" class="validate" placeholder="Enter Email">
<label for="email" data-error="Invalid Email Format"></label>
</div>
<div class="input-field">
<textarea name="comment" class="materialize-textarea" placeholder="Comment Here..."></textarea>
</div>
<div class="center">
<input type="submit" value="comment" name="submit" class="btn">
</div>
</form>
<h5>Comments</h5>
<ul class="collection">
<?php
$sql4="select * from comment where post_id=$id and status=1 order by id DESC";
$res4=mysqli_query($con,$sql4);
if(mysqli_num_rows($res4)>0)
{
    while($row=mysqli_fetch_assoc($res4))
    {
?>


<li class="collection-item">
<?php echo $row['comment_text']; ?>
<span class="secondary-content">
<?php echo $row['email']; ?>
</span>
</li>

<?php
    }
}
?>


</ul>

</div>
</div>
</div>



    <h5>Related Blogs</h5>
    <div class="row">
    <?php

$sql="select * from posts order by rand() limit 5";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
    while($row=mysqli_fetch_assoc($res))
    {

?>
<div class="col 13 m4 s6">
<div class="card small">
<div class="card-image">
<img src="img/<?php echo $row['image'];?>" alt="">
<span class="card-title red-text truncate"><?php echo $row['title'];?></span>
</div>
<div class="card-content truncate">
<?php echo $row['content'];?>

</div>
<div class="card-action blue center">
<a  href="post.php?id=<?php echo $row['id'];?>" class="white-text" target=""> Read More... </a>
</div>
</div>
</div>
<?php
    }
}
?>
    </div>
    </div>







    <?php
        }
    }
        else
        {
            header("Location: index.php");
        }
    
?>
</div> 











<!-- sidebar area-->
<div class="col l3 m3 s12">
<?php
include "includes/sidebar2.php";
 ?>
</div>



 
 <?php
include "includes/footer.php";
 ?>






<?php
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $id1=$_GET['id'];
    $email=mysqli_real_escape_string($con,$email);
    $email=htmlentities($email);


    $comment=mysqli_real_escape_string($con,$comment);
    $comment=htmlentities($comment);



    $id1=mysqli_real_escape_string($con,$id1);
    $id1=htmlentities($id);


    $sql3="insert into comment (email,comment_text,post_id) values('$email','$comment',$id)";
    $res3=mysqli_query($con,$sql3);
    if($res3)
    {
        $_SESSION['message']="<div class='chip  green white-text'> Comment Submitted Successfully. </div>";
        header ("Location: post.php?id=$id");
    }
    else
    {
        $_SESSION['message']="<div class='chip  red black-text'>Sorry, Something went wrong. </div>";
        header ("Location: post.php?id=$id");
    }
}
?>



