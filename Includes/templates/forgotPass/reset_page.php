<?php
include("inti.php");?>
  <title>SB Admin 2 - Forgot Password</title>
  <link rel="stylesheet" href="<?php echo $cs ?>bootstrap.css"> 
    <link rel="stylesheet" href="<?php echo $cs ?>all.min.css">
    <link rel="stylesheet" href="<?php echo $cs ?>bootstrap-datetimepicker.min.css" media="screen">  
    <link rel="stylesheet" href="<?php echo $cs ?>backend.css">

<?php
$email=$_GET["email"];
$reset_token=$_GET["reset_token"];
$connection = mysqli_connect("localhost", "sa", "!@#healthy12345", "hospital");
$sql="select * from patient where email='".$email."'";
 $r = $connection->query($sql);
    if( mysqli_num_rows($r)>0){
         
    }
    else{
           echo "Email does not exists";


    }

    $user=mysqli_fetch_object($r);
    if ($user->reset_token == $reset_token)
{
    ?>
    <div class='container'style='margin:300px' >
    <form method="POST" action="new_pass.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
         
        <input type="password" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" name="new_password" placeholder="Enter new password">
        <input  class="btn btn-outline-secondary" style='margin:40px 450px' type="submit" value="Change password">
    </form>
    </div>
    <?php
}
else
{
    echo "Recovery email has been expired";
}
?>
<script src="<?php echo $js ?>jquery.js"></script>
<script src="<?php echo $js ?>bootstrap.min.js"></script>
<script src="<?php echo $js ?>bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script src="<?php echo $js ?>backend.js"></script>
