<?php
include "includes/header.php";
?>


 <?php
include "includes/navbar.php";     
 ?>




<div class="row">
<!-- this is main content area-->
<div class="col 19 m9 s12">
<!-- column, small, large, medium-->



<?php

$sql="select * from posts order by id DESC";
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




 <!-- style="height:500px; background:#f4f4f4"--> 
</div>




<!--style="height:500px; background:red"-->
<!-- this is sidebar area-->
<div class="col l3 m3 s12"> 


<?php
include "includes/sidebar2.php";
 ?>


<!-- <div style="margin-top:800px"></div> -->



<?php
include "includes/footer.php";
 ?>

     


  