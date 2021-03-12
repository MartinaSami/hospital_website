<?php
include("DBconnection.php");
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['martina'])) {
        $medicine_name = $_POST['medicine_name'];
 
       $medicine_quantity = $_POST['medicine_quantity'];
         $medicine_price = $_POST['medicine_price'];

     
     $production_date = $_POST['production_date'];
     $expired_date= $_POST['expired_date'];
      
    
    $stmt = $db->prepare("INSERT Into medicine ( medicine_name , medicine_quantity, medicine_price , production_date , expired_date )  values (?,?,?,?,?) ");
    $stmt->execute(array( $medicine_name, $medicine_quantity ,   $medicine_price ,  $production_date, $expired_date));   
    header("location: admin.php?action=Pharmacy Item");
  
      }
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['amr'])) {
        $medicine_name = $_POST['medicine_name'];
 
       
   
    
    $stmt = $db->prepare("DELETE * FROM medicine where medicine_name=?");
    $stmt->execute(array( $medicine_name));   
    header("location: admin.php?action=Pharmacy Item");
  
      }
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['badawy'])) {
        $medicine_code = $_POST['dd'];
        $medicine_name = $_POST['medicine_name'];
 
        $medicine_quantity = $_POST['medicine_quantity'];
         $medicine_price = $_POST['medicine_price'];

     
     $production_date = $_POST['production_date'];
     $expired_date= $_POST['expired_date'];
      
   
    
        $stmt = $db->prepare("UPDATE medicine SET medicine_name= ?, medicine_quantity= ? , medicine_price=?  , production_date=? , expired_date =?  WHERE medicine_code= ? ");
        $stmt->execute(array($medicine_name, $medicine_quantity, $medicine_price,$production_date,$expired_date ,  $medicine_code));
     
    header("location: admin.php?action=Pharmacy Item");
  
      }
    }


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['save'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $year = $_POST['year'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $numberb = $_POST['numberb'];
    $idd = 198;
    $prfile =  time() . '_' .  $_FILES['image']['name'];
    $tar = 'image/' . $prfile;
    move_uploaded_file($_FILES['image']['tmp_name'], $tar);
    echo 'helllllos';
    $stmt = $db->prepare("UPDATE hospital_data SET Hospital_code= ?, Hospital_name= ? , ddress=?  , Email=? , Year_of_establishment =?,	Country= ? , stat= ?, 	Contact_Number = ?  ,	Number_of_Buildings = ? , icon= ?  WHERE id= ? ");
    $stmt->execute(array($code, $name, $address, $email, $year, $country, $state, $number, $numberb, $prfile, $idd));
    header("location: admin.php?action=Hospital_Registration");
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['staf'])) {
    $n=$_POST['name'];
    $i=$_POST['id'];
    $t=$_POST['type'];
   // $image=$_POST['image'];
    $s=$_POST['salary'];
    $ss=$_POST['ssn'];
    $g=$_POST['gender'];
    $BD=$_POST['BD'];
    $b=$_POST['blood'];
    $a=$_POST['adderss'];
    $q=$_POST['qulification'];
    $sh=$_POST['shift'];
    $dep=$_POST['dep'];
    $ds=$_POST['DS'];
    $de=$_POST['DE'];
    $em=$_POST['email'];
    $nu=$_POST['num'];
    $emn=$_POST['emna'];
    $emnu=$_POST['emnum'];
    $emr=$_POST['emrel'];
    $prfile =  time() . '_' .  $_FILES['image']['name'];
    $tar = 'image/' . $prfile;
    move_uploaded_file($_FILES['image']['tmp_name'], $tar);
    $stmt = $db->prepare("INSERT INTO staf ( worker_name , email , passwor ,  gender, phonenumber , ddress, ssn, birthdate ,
     dateofjoin, shift, salary, Qualification,  Date_Of_Retirement, img, Department, Employee_Type, EMERGENCY_NAME, EMERGENCY_CONTENT, 
     EMERGENCY_Relationship) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($n,$em,null,$g,$nu,$a,$ss,$BD,$ds,$sh,$s,$q,$de,$prfile,$dep,$t,$emn,$emnu,$emr ));
    header("location: admin.php?action=Staff registration"); 
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['ad'])) {
    $em = $_POST['emp'];
    $stmt = $db->prepare("INSERT Into add_employee_type ( employee_type  ) value  (?)");
    $stmt->execute(array($em));
    header("location: admin.php?action=New Employee Type");
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['bu'])) {
    $n = $_POST['name'];
    $c = $_POST['code'];
    $stmt = $db->prepare("INSERT Into building ( Buiding_name  ,Building_id ) value  (?,?)");
    $stmt->execute(array($n, $c));
    header("location: admin.php?action=New Building");
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['fl'])) {
    $n = $_POST['name'];
    $c = $_POST['code'];
    $v = $_POST['bbb'];
    $stmt = $db->prepare("SELECT * FROM building  WHERE Buiding_name = '$v' ");
    $stmt->execute();
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
    if ($count > 0) {
      foreach ($row as $use) {
        echo   $use['Buiding_name'];
        $x = $use['Building_id'];
        $stmt = $db->prepare("INSERT Into floor ( Floor_Name  ,Floor_Code , Building_id ) value  (?,? ,?)");
        $stmt->execute(array($n, $c, $x));
        header("location: admin.php?action=New Floor");
      }
    }
  }
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['ro'])) {
    $na = $_POST['room'];
    $ca = $_POST['code'];
    $va = $_POST['bpb'];
    $stmt = $db->prepare("SELECT * FROM floor  WHERE Floor_Name = '$va' ");
    $stmt->execute();
    $row = $stmt->fetchAll();
    $count = $stmt->rowCount();
    if ($count > 0) {
      foreach ($row as $use) {
        echo   $use['Floor_Name'];
        $x = $use['floor_id'];
        $stmt = $db->prepare("INSERT Into room1 ( room_name  ,room_code , floor_id ) value  (?,? ,?)");
        $stmt->execute(array($na, $ca, $x));
        header("location: admin.php?action=New room");
      }
    }
  }
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['dppp'])) {
    $nnn = $_POST['naame'];
    $fl = $_POST['floor'];
    $he = $_POST['head'];
    $nuu = $_POST['nuum'];
    $x = rand(1, 1000);
    $stmt = $db->prepare("INSERT Into departments( 	department_id	,department_name ,	department_location ,department_head , Contact_number ) values ( ?,?,?,?,?)");
    $stmt->execute(array($x, $nnn, $fl, $he, $nuu));
    $stmt = $db->prepare("UPDATE  floor  set dep_id = $x  where Floor_Name = ? ");
    $stmt->execute(array($fl));
    header("location: admin.php?action=Add Departments");
  }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['sep'])) {
    $em = $_POST['seeee'];
    $stmt = $db->prepare("INSERT Into specialization1 ( Specialization_name   ) value  (?)");
    $stmt->execute(array($em));
    header("location: admin.php?action=Specialization");
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['addoc'])) {
    
    $sp = $_POST['pp'];
    $name = $_POST['dname'];
    $address = $_POST['adres'];
    $dpp = $_POST['dd'];
    $ssn = $_POST['ss'];
    $shift = $_POST['Duty'];
    $email = $_POST['emai'];
    $number = $_POST['contac'];
    $passwor = $_POST['pass'];
    $birth=$_POST['bd'];
    $tim = $_POST['ouut'];   $ti = $_POST['inn'];
    $room=rand(1, 1000) ;//$_POST['room'];
    $money=$_POST['money'];
    $gende=$_POST['type'];
    $datajoin=$_POST['dj'];
    $x = rand(1, 1000);
    $az = $_POST['daay'];
    $prfile =  time() . '_' .  $_FILES['image']['name'];
    $tar = 'doctor/' . $prfile;
    move_uploaded_file($_FILES['image']['tmp_name'], $tar); 
    $stmt = $db->prepare("INSERT Into doctor ( doctor_id , doctor_name, Specialization_id, department_id, email, passwor , gender, Phone_number, Addres,birth_date, Consultant_Fee, date_of_join, doctor_shift, img, room ,time_in,time_out )  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
    $stmt->execute(array($x, $name , $sp , $dpp, $email, $passwor, $gende, $number, $address , $birth, $money, $datajoin, $shift ,$prfile, $room,$ti,$tim));
        if(  $az[0] == '1'  ){
           $su= '1' ;}
          else
          {
            $su=NULL;
          } 
        if(  $az[0] == '2' || $az[1] == '2'  ){
        $mo= '2' ;}
          else
          {
             $mo=NULL;
          }
        if(  $az[0] =='3' || $az[1] == '3' || $az[2] == '3'){
           $tu= '3' ;
          }
          else
          {
            $tu=NULL;
          }
        if(  $az[0] == '4' || $az[1] == '4' || $az[2] == '4' || $az[3] == '4'  ){
            $we= '4' ;}
          else
          {
             $we=NULL;
          }
        if(  $az[0] == '5' || $az[1] == '5' || $az[2] == '5' || $az[3] == '5' || $az[4] == '5'   ){
          $th= '5' ;}
          else
          {
           $th=NULL;
          }
        if(  $az[0] == '6' || $az[1] == '6' || $az[2] == '6' || $az[3] == '6' || $az[4]=='6' || $az[5]=='6'   ){
          $fr= '6' ;}
          else
          {
             $fr=NULL;
         }
        
        if(  $az[0] == '7' || $az[1] == '7' || $az[2] == '7' || $az[3] == '7' || $az[4]=='7' || $az[5]=='7' || $az[6]=='7'  ){
           $sa= '7' ;}
          else
          {
             $sa=NULL;
          }
          $stmt = $db->prepare("INSERT Into day_workk (Sunday, Monday, Tuesday,Wednesday, Thursday, Friday, Saturday, docto, type)  values (?,?,?,?,?,?,?,?,?) ");
          $stmt->execute(array($su, $mo , $tu , $we, $th, $fr, $sa, $x ,'IN' ));
       
       foreach( $az as $a  )
       {
         echo $a;
       }
       header("location: admin.php?action=Doctor registration");
      }
    }
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['pusha'])) {
    $sp = $_POST['pp'];
    $name = $_POST['dname'];
    $address = $_POST['adres'];
    $dpp = $_POST['dd'];
    $ssn = $_POST['ss'];
    $shift = $_POST['Duty'];
    $email = $_POST['emai'];
    $number = $_POST['contac'];
    $passwor = $_POST['pass'];
    $birth=$_POST['bd'];
    $tim = $_POST['ouut'];   $ti = $_POST['inn'];
    $room=rand(1, 1000) ;//$_POST['room'];
    $money=$_POST['money'];
    $gende=$_POST['type'];
    $datajoin=$_POST['dj'];
    $x = rand(1, 1000);
    $intimeo = $_POST['intim'];
    $outtimeo = $_POST['outtim'];
    $feee = $_POST['confee'];
    $extrafee = $_POST['extra'];
    $addresso = $_POST['dress'];
    $az = $_POST['daay'];
    $aza = $_POST['dy'];
    $prfile =  time() . '_' .  $_FILES['image']['name'];
    $tar = 'doctor/' . $prfile;
    move_uploaded_file($_FILES['image']['tmp_name'], $tar); 
    $stmt = $db->prepare("INSERT Into doctor ( doctor_id , doctor_name, Specialization_id, department_id, email, passwor , gender, Phone_number, Addres,birth_date, Consultant_Fee, date_of_join, doctor_shift, img, room ,time_in,time_out )  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
    $stmt->execute(array($x, $name , $sp , $dpp, $email, $passwor, $gende, $number, $address , $birth, $money, $datajoin, $shift ,$prfile, $room,$ti,$tim));   
    if(  $az[0] == '1'  ){
           $su= '1' ;}
          else
          {
            $su=NULL;
          } 
        if(  $az[0] == '2' || $az[1] == '2'  ){
        $mo= '2' ;}
          else
          {
             $mo=NULL;
          }
        if(  $az[0] =='3' || $az[1] == '3' || $az[2] == '3'){
           $tu= '3' ;
          }
          else
          {
            $tu=NULL;
          }
        if(  $az[0] == '4' || $az[1] == '4' || $az[2] == '4' || $az[3] == '4'  ){
            $we= '4' ;}
          else
          {
             $we=NULL;
          }
        if(  $az[0] == '5' || $az[1] == '5' || $az[2] == '5' || $az[3] == '5' || $az[4] == '5'   ){
          $th= '5' ;}
          else
          {
           $th=NULL;
          }
        if(  $az[0] == '6' || $az[1] == '6' || $az[2] == '6' || $az[3] == '6' || $az[4]=='6' || $az[5]=='6'   ){
          $fr= '6' ;}
          else
          {
             $fr=NULL;
         }
        
        if(  $az[0] == '7' || $az[1] == '7' || $az[2] == '7' || $az[3] == '7' || $az[4]=='7' || $az[5]=='7' || $az[6]=='7'  ){
           $sa= '7' ;}
          else
          {
             $sa=NULL;
          }
          $stmt = $db->prepare("INSERT Into day_workk (Sunday, Monday, Tuesday,Wednesday, Thursday, Friday, Saturday, docto, type)  values (?,?,?,?,?,?,?,?,?) ");
          $stmt->execute(array($su, $mo , $tu , $we, $th, $fr, $sa, $x ,'IN' ));
          $stmt = $db->prepare("INSERT Into doctorout (doctor_id, addres, Consulting_Start ,Consulting_End, Consulting_Fee, Extra_Fee)  values (?,?,?,?,?,?) ");
          $stmt->execute(array($x, $addresso  , $intimeo   ,$outtimeo , $feee, $extrafee));
       
          if(  $aza[0] == '1'  ){
            $suu= '1' ;}
           else
           {
             $suu=NULL;
           } 
         if(  $aza[0] == '2' || $aza[1] == '2'  ){
         $moo= '2' ;}
           else
           {
              $moo=NULL;
           }
         if(  $aza[0] =='3' || $aza[1] == '3' || $aza[2] == '3'){
            $tuu= '3' ;
           }
           else
           {
             $tuu=NULL;
           }
         if(  $aza[0] == '4' || $aza[1] == '4' || $aza[2] == '4' || $aza[3] == '4'  ){
             $wee= '4' ;}
           else
           {
              $wee=NULL;
           }
         if(  $aza[0] == '5' || $aza[1] == '5' || $aza[2] == '5' || $aza[3] == '5' || $aza[4] == '5'   ){
           $thh= '5' ;}
           else
           {
            $thh=NULL;
           }
         if(  $aza[0] == '6' || $aza[1] == '6' || $aza[2] == '6' || $aza[3] == '6' || $aza[4]=='6' || $aza[5]=='6'   ){
           $frr= '6' ;}
           else
           {
              $frr=NULL;
          }
         
         if(  $aza[0] == '7' || $aza[1] == '7' || $aza[2] == '7' || $aza[3] == '7' || $aza[4]=='7' || $aza[5]=='7' || $az[6]=='7'  ){
            $saa= '7' ;}
           else
           {
              $saa=NULL;
           }
           $stmt = $db->prepare("INSERT Into day_workk (Sunday, Monday, Tuesday,Wednesday, Thursday, Friday, Saturday, docto, type)  values (?,?,?,?,?,?,?,?,?) ");
           $stmt->execute(array($suu, $moo , $tuu , $wee, $thh, $frr, $saa, $x ,'OUT' ));
        
       header("location: admin.php?action=Doctor registration");
      }
    }

   
