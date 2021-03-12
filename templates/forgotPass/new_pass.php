<?php
 
$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = $_POST["new_password"];
 //con
$connection = mysqli_connect("localhost", "sa", "!@#healthy12345", "hospital");
 //con
$sql = "SELECT * FROM patient WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_object($result);
    if ($user->reset_token == $reset_token)
    { 
        $sql = "UPDATE patient SET passwor='$new_password' WHERE email='$email' AND reset_token='$reset_token'";
        mysqli_query($connection, $sql);
 
        echo "Password has been changed";
    }
    else
    {
        echo "Recovery email has been expired";
    }
}
else
{
    echo "Email does not exists";
}