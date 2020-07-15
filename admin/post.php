<?php
include "includes/navbar.php";

if(isset($_SESSION['username']))
{

?>



<div class="row main">
<div class="col s12 m12 l12">
<div class="card-panel">
<ul class="collection with-header">
<li class="collection-header black">
<h5 class="red-text">Recent Posts</h5>
<span id="msg">

</span>
</li>



<?php
$sql="select * from posts order by id desc";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
  while($row=mysqli_fetch_assoc($result))
  {
?>

<li class="collection-item">
<a href=""> <?php echo $row['title']?> </a>
<br>
<span><a href="edit.php?id=<?php echo $row['id']; ?>"><i class="material-icons tiny">edit</i>Edit</a> |
 <a href="" id="<?php echo $row['id']; ?>" 
  class="delete"><i class="material-icons tiny red-text">clear</i>Delete</a> | 
 <a href=""><i class="material-icons tiny green-text">share</i>Share</a></span>
</li>

<?php

  }
}
else
{
  echo "<div class='chip orange black-text'>You haven't published any post yet, 
  Publish your first post by clicking the edit circular button.</div>";
}
?>
</ul>

</div>
</div>
</div>





<div class="fixer-action-btn">
<a href="write.php" class="btn-floating btn btn-large white-text pulse right">
<i class="material-icons">edit</i></a>
</div>






<script> 
const del=document.querySelectorAll(".delete");
del.forEach(function(item,index)
{
  item.addEventListener("click",deleteNow)
})

function deleteNow(e)
{
  e.preventDefault();
  if(confirm("Do you really want to delete this post?"))
  {
    const xhr=new XMLHttpRequest();
    xhr.open("GET","delete.php?id="+Number(e.target.id),true)
    xhr.onload=function()
    {
      const messg=xhr.responseText;
      const msg=document.getElementById("msg")
      msg.innerHTML=messg;
    }
    xhr.send();
  }
  
}
</script>




<?php
include "includes/footer.php";
    }
    else
    {
      $_SESSION['message']="<div class='chip   white black-text'> Login to Continue </div>";
      header("Location: login.php");
    }

?>