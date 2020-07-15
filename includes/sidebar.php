<ul class="collection">
<li class="collection-item">
<h5>Search</h5>
<div class="input-field">
<input type="text" id="search" name="search" placeholder="Search here....">
<div class="center">
<input type="submit" class="btn" value="search">
</div>
</div>







<div class="collection with-header">
<h5 style="padding-left:20px" >Trending Blogs</h5>


<?php
$sql="select * from posts order by view DESC limit 5";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_assoc($res))
{
?>

<a href="post.php?id= <?php echo $row['id']; ?>" class="collection-item grey lighten-3">
<?php echo $row['title']; ?>
</a>

<?php
}
}
?>
</div>
</div>