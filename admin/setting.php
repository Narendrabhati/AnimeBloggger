<?php
include "includes/navbar.php";
?>



<div class="main">
<div class="card-panel">
<h5 class="center">Settings</h5>

<?php
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);  
}
?>





<form action="setting.php" method="POST">
<input type="password" name="password" placeholder="Change Password ">
<input type="password" name="conf_password" placeholder="Confirm Password ">


<div class="center">
<input type="submit" name="update" value="Change Password" class="btn">
</div>
</form>
</div>
</div>




<?php
include "includes/footer.php";
?>






<?php
if(isset($_POST['update']))
{
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($con,$password);
    $password=htmlentities($password);



    $conf_password=$_POST['conf_password'];
    $conf_password=mysqli_real_escape_string($con,$conf_password);
    $conf_password=htmlentities($conf_password);


    if($conf_password===$password)
    {
        $username=$_SESSION['username'];
        $password=password_hash($password,PASSWORD_BCRYPT);
        $sql="update users set password='$password' where username='$username'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
    $_SESSION['message']="<div class='chip  green white-text'> Password Changed Successfully. </div>";
    header("Location: setting.php");
        }
        else
        {
        $_SESSION['message']="<div class='chip  red black-text'> Sorry, Something went wrong,
         Please try again. </div>";
        header("Location: setting.php");  
        }
    }
    else
    {
        $_SESSION['message']="<div class='chip  red black-text'> Password don't match. </div>";
        header("Location: setting.php");
    }
}
  
?>