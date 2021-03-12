<?php
SESSION_start();
include "DBconnection.php";
include 'go.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['dood']))
  {
$sv = rand(1, 1000000);
$xxx=$_SESSION['ID'];
$tt=$_POST['titi'];
$doctori=$_POST['ddd'];

$stmt = $db->prepare("INSERT INTO 
  reservation
  (doctor_id, patient_id, reservation_day, reservation_code,	reservation_time )
  VALUES(?,?,?,?,?) ");
$stmt->execute(array( $doctori , $xxx, $tt , $sv , time() ));
header("location: Home_user.php?action=main"); 
}
}

?>
