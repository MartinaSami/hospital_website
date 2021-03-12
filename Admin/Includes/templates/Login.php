<?php
session_start();
$navbar = '';
$pagetitle = 'Login';

include "inti.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['user'];
  $passw = $_POST['pass'];
  $stmt = $db->prepare("SELECT email , passwor , worker_id From staf WHERE  email =?  AND passwor =? ");
  $stmt->execute(array($username , $passw ));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();
  if ($count > 0) {
    // session_destroy();
    $_SESSION['email'] = $username;
    $_SESSION['user'] = $row["patient_name"];
    $_SESSION['ID'] = $row["patient_id"];
    $_SESSION['im'] = $row["img"];
    header("location: admin.php");
    exit();
  } else {
    $erorr = "password and email";
    echo "<style >
         #login {
      
            border: 6px solid transparent;
            border-radius: 3px;
            box-shadow: 0.5px 0.5px 2px 2px red;
         }
         </style>";
    echo '
         <div class="invalid-feedback">
         password or Email erorr.
           </div>
         <div class="alert alert-warning alert-dismissible fade show"  role="alert">
        <h3 style=" text-align: center; "> Something Roung in Password or Email </h3>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div> ';
  }
}
?>
<form id="login" class="needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <img src="<?php echo $im . 'ico.png'; ?>" class="mx-auto d-block" alt="Logo Heathy care">
  <h2 style="text-align:center;" class="content-group"> Login Healthy care </h2>
  <label class="lab" for="exampleInputEmail1" name="email">Email address</label>
  <input class="form-control form-control-lg" id="exampleInputEmail1" type="text" name="user" autocomplete="off" aria-describedby="inputGroupPrepend" required>
  <div class="invalid-feedback">
    Please Write a Email.
  </div>
  <label class="lab" for="exampleInputPassword1" name="password">Password</label>
  <input class="form-control form-control-lg" id="exampleInputPassword1" text="password" name="pass" autocomplete="off" aria-describedby="inputGroupPrepend" required>
  <div class="invalid-feedback">
    Please Write a password.
  </div>

  <input style="margin-top:40px; background-color:#008dde" class="btn btn-primary btn-lg btn-block" type="submit" value="login">
</form>
<?php
include "C:/xampp/htdocs/FinalProject/Admin/Includes/templates/footer.php";
?>