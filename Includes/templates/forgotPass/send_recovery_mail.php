<?php
include("inti.php");?>
  <title>SB Admin 2 - Forgot Password</title>
  <link rel="stylesheet" href="<?php echo $cs ?>bootstrap.css"> 
    <link rel="stylesheet" href="<?php echo $cs ?>all.min.css">
    <link rel="stylesheet" href="<?php echo $cs ?>bootstrap-datetimepicker.min.css" media="screen">  
    <link rel="stylesheet" href="<?php echo $cs ?>backend.css">

<?php
  
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\autoload.php';

$reset_token="";
$connection = mysqli_connect("localhost", "sa", "!@#healthy12345", "hospital");
$email=$_POST["email"];
 $sql="select * from patient where email='".$email."'";
 $r =  mysqli_query($connection, $sql);
    if( mysqli_num_rows($r)>0){
        
        
   $reset_token=time().md5($email);
     
   
        
    }
    else{
           echo "Email does not exists";


    }
    $sql="update patient set reset_token='$reset_token' where email='$email'";
    mysqli_query($connection, $sql);
    $message="<p>please click the link below to reset your password</p>";
    $message.="<a href='localhost/FinalProject/Includes/templates/forgotPass/"."reset_page.php?email=$email&amp;reset_token=$reset_token'>";
   
    $message .= "Reset password";
$message .= "</a>";

    $message.="</a>";
     function send_mail($to, $subject, $message)
{
	

	

	
    $mail = new PHPMailer(true);
 
    try {
        //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'healthycare018@gmail.com';                     // SMTP username
    $mail->Password   = 'abdallah011';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
 
    $mail->setFrom('
    healthycare018@gmail.com', 'your_name');
    //Recipients
    $mail->addAddress($to);
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
 
    $mail->send();
    ?>
    <div class='container text-center card-body'>
    
    <?php
    echo '<h2>Message has been sent Check your Email</h2>' . '</div>';

    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
  

send_mail($email, "Reset password", $message);


  ?>
  <script src="<?php echo $js ?>jquery.js"></script>
<script src="<?php echo $js ?>bootstrap.min.js"></script>
<script src="<?php echo $js ?>bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script src="<?php echo $js ?>backend.js"></script>
