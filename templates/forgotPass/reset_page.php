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
    <form method="POST" action="new_pass.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
         
        <input type="password" name="new_password" placeholder="Enter new password">
        <input type="submit" value="Change password">
    </form>
    <?php
}
else
{
    echo "Recovery email has been expired";
}