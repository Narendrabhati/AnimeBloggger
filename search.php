<?php
include "includes/header.php";
include "includes/navbar.php";

if(isset($_GET['submit']))
{
    $q=$_GET['search'];
    $q=mysqli_real_escape_string($con,$q);
    $q=htmlentities($q);
    $sql="select * from posts where title like '$q' or content like 'q' or title like '%$q%' or content like '%$q%'";
    $res=mysqli_query($con,$sql);


    if(mysqli_num_rows($res)>0)
    {
        ?>
        <div class="row">
        <!-- this is main content area-->
        <div class="col 19 m9 s12">
        <?php
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
        ?>
</div>
<div class="col l3 m3 s12"> 
<?php
include "includes/sidebar2.php";
 ?>
 </div>
</div>



        <?php
    }
    else
    {

    ?>

    <h5> No data found, try again</h5>

    <?php
    }
}
else
{
    header("Location: index.php");
}
 ?>