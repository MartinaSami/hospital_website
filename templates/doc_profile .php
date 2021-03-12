<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/user.css">
    
    
</head>

<body >
    <!--                top -->
    <header>
        <div class="bg-dark collapse show" id="navbarHeader">
            <div class="container" id="backgrou">
                <div class="row" id="backgro">
                    <div class="col-sm-8 col-md-7 py-4" id="backgr">
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4" id="backg">
                        <h4 class="text-white" style="position: relative; left: 230px; "><?php
echo $_COOKIE["name"];
?></h4>
                        <img src="icon/azsx.jpg" class="rounded-circle" alt="Cinque Terre" height="400px"
                            style="position: relative; left: 140px; ">
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm" id="back">
            <div class="container d-flex justify-content-between" id="bac">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="icon/ic.png" height="60px">
                    <strong style="margin: 10px; font-family: 'Times New Roman', Times, serif;">Doctor Profile</strong>
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Patient_id</th>
                      <th>Reservation_time</th>
                    
                    </tr>
                  </thead>
                  <tfoot>
  
                  <?php
  require_once "DBConfig.php";

  $doctorId = $_COOKIE['id'];
  $sql2 = "SELECT * FROM reservation where doctor_id =$doctorId";
  if($result = mysqli_query($conn, $sql2)){
      if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['patient_id'] . "</td>";
                      echo "<td>" . $row['reservation_time'] . "</td>";
                   
                      
              }
            }}
                                  mysqli_free_result($result);
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>




        



        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>room_number</th>
                      <th>room_availability</th>
                      <th>room_type</th>
                      <th>room_price</th>
                      <th>room_location</th>
                      
    
                    </tr>
                  </thead>
                  <tfoot>
                   
                  <?php
  require_once "DBConfig.php";

  $sql = "SELECT * FROM room";
  if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['room_number'] . "</td>";
                      echo "<td>" . $row['room_availability'] . "</td>";
                      echo "<td>" . $row['room_type'] . "</td>";
                      echo "<td>" . $row['room_price'] . "</td>";
                      echo "<td>" . $row['room_location'] . "</td>";
                    
                      echo "<td>";
                     echo "</td>";
                  echo "</tr>";
              }
            }}
                                  mysqli_free_result($result);
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        

      </div>
  

    
    </div>
    
  </div>






        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
               
 <center class="form-inline" style=" background-color:#white;margin-top:50px";>
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="txt" value="Enter Medicine Name " style="margin-top:30px;padding:20px;font-size:20px;color:black">
  </div>
  
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="medicine" class="sr-only">Medicine</label>
    <input type="text" class="form-control" id="medicine_name" name = "medicine_name" placeholder="MEDICINE">
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <label for="medicine" class="sr-only">ID</label>
    <input type="number" class="form-control" id="patient_id"name = "patient_id" placeholder="Patient_Id">
  </div>

  
  
  
  <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>



  <?php
  require_once "DBConfig.php";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $name = $_POST['medicine_name'];
  

$patientId = $_POST['patient_id'];  
                           
                         

  $sql = " INSERT INTO medicine (medicine_name,patient_id)
  VALUES ('$name',$patientId)";

  
     $retval = mysqli_query($conn, $sql);        
     if(! $retval ) {
         //echo "Enter data again\n";
         die('Could not enter data: ' . mysqli_error($conn));
      }
      else {
      echo "Entered data successfully\n";
 
      mysqli_close($conn);
  
 // Unset all of the session variables
 $_SESSION = array();
  
 // Destroy the session.
 session_destroy();
  
 // Redirect to login page
 header("location: doc_profile.php");
 
   }
 }
   ?>
 </form>
        </center>    
    <script src="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="js/je.js"> </script>
    <script src="js/Edit.js"></script>
</body>

</html>