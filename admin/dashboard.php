<?php

include "includes/navbar.php";

    if(isset($_SESSION['username']))
    {

    ?>







 <!---  Main content starts from  here--->
<div class="main">
<div class="row">


<!---- Recent Posts------>
<div class="col l6 m6 s12">
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











<!---Comments--->

<div class="col l6 m6 s12">
<ul class="collection with-header">
<li class="collection-header black">
<h5 class="red-text">Recent Comments</h5>
<span id="msg1"></span>
<span id="msg2"></span>
</li>



<?php
$sql4="select * from comment order by id DESC";
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
</br>
<span><a href="" class="approve"id="<?php echo $row['id'];?>"><i class="material-icons tiny green-text">done</i>Approve</a> |
 
 
 <a href="" class="remove"id="<?php echo $row['id'];?>"><i class="material-icons tiny red-text">clear</i>Remove</a> </span>
</li>

<?php
    }
}
?>
<li class="collection-item">


</li>
</ul>
</div>
</div>







<div class="fixer-action-btn">
<a href="write.php" class="btn-floating btn btn-large white-text pulse right">
<i class="material-icons">edit</i></a>
</div>


<script>

const approve=document.querySelectorAll(".approve");
approve.forEach(function(item,index)
{
  item.addEventListener("click",approveNow)
})

function approveNow(e)
{
  e.preventDefault();
  if(confirm("Do you want to approve this comment?"))
  {
    const xhr=new XMLHttpRequest();
    //xhr= XML https request
    xhr.open("GET","approve.php?id="+Number(e.target.id),true)
    xhr.onload=function()
    {
      const messg=xhr.responseText;
      const msg=document.getElementById("msg1")
      msg.innerHTML=messg;
    }
    xhr.send();
  }
  
}

</script>






<script>

const remove=document.querySelectorAll(".remove");
remove.forEach(function(item,index)
{
  item.addEventListener("click",removeNow)
})

function removeNow(e)
{
  e.preventDefault();
  if(confirm("Do you want to remove this comment?"))
  {
    const xhr=new XMLHttpRequest();
    //xhr= XML https request
    xhr.open("GET","remove.php?id="+Number(e.target.id),true)
    xhr.onload=function()
    {
      const messg=xhr.responseText;
      const msg=document.getElementById("msg2")
      msg.innerHTML=messg;
    }
    xhr.send();
  }
  
}

</script>








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
      $_SESSION['message']="<div class='chip  red black-text'> Login to Continue </div>";
      header("Location: login.php");
    }

?>