<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #eeeeee;
             }
        #e {
            position: absolute;
            top: 50%;
            left: 50%;
            padding: 10px;
            -ms-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 500px;
            background-color: #ffffff;
            border: 5px solid transparent;
            border-radius: 3px;
            box-shadow: 3px 3px 5px 5px rgba(0, 0, 0, 0.05);
           
        }
        #exampleInputEmail1,
        #exampleInputPassword1 {
            background-color: #EAEAEA;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class=" container" id="e" >
        <div class="content">
            <div class="text-center">
                <div> <img alt="" class="img-rounded" src="icon/ic.png" width="99px" style="margin: 5px 0px "
                        height="100px"></div>
                <h5 class="content-group">Login to your account </h5>
            </div>
            <div class="form">



            <form id="formst" class="form-group" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="margin:10px ">Email address</label>
                        <input type="email" class="form-control" style="margin:5px auto" id="exampleInputEmail1" name="email"required
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="margin:10px ">Password</label>
                        <input type="password" style="margin:5px auto" class="form-control" id="exampleInputPassword1"name="password"required>
                    </div>
                    <div class="form-group form-check" style="margin:10px ">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
      
                    <input type="submit" class="btn btn-primary btn-lg btn-block"></button>

   
    </div>
        </div>

        </div>
        </form>
    <script src="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <?php
  require_once "DBConfig.php";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email_err = $password_err = "";
  $email = $_POST['email'];                         //"ahmedkhaled58@yahoo.com";
  $password = $_POST['password'];                  //"12364111";
  $sql = "SELECT * FROM doctor where email= '".$email."' AND passwor ='".$password."'";
  $result = mysqli_query($conn, $sql);
 if(empty(trim($_POST["email"]))){
   $email_err = "Please Enter Your EMail !";
 }

if (mysqli_num_rows($result) > 0) {
    $row = $result -> fetch_row();
        setcookie("name", $row[1], time()+3600*60, "/","", 0);
    setcookie("id", $row[0], time()+3600, "/","", 0);
    // output data of each row
    session_start();
 
// Unset all of the session variables
$_SESSION = array();


// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: doc_profile.php");
       
    }else {
      $email_err= "your email or password is wrong, please try again !";
      echo "<h3>".$email_err."</h3>";
}
  }
  ?>
</body>

</html>