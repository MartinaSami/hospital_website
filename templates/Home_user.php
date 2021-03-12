<?php
session_start();
if (isset($_SESSION['ID'], $_SESSION['user'])) {
    $pagetitle = 'Home user';
    $ic = '<i class="fas fa-bell"></i>';
    include 'inti.php';

    $action = isset($_GET['action']) ? $_GET['action'] : 'home';

    if ($action == 'edit') {
        $stmt = $db->prepare("SELECT *  FROM  patient WHERE  patient_id= ?");
        $stmt->execute(array($_SESSION['ID']));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
        $_SESSION['user'] = $row["patient_name"];
        if ($count > 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $pname = $_POST['full'];
                $u_name = $_POST['user'];
                $u_email = $_POST['email'];
                $u_phone = $_POST['phone'];
                $u_address = $_POST['adder'];
                $u_birth = $_POST['date'];
                $u_status = $_POST['status'];
                $stmt = $db->prepare("UPDATE  patient SET patient_name=? , username=? ,email=? ,  phone_number=? , ddress=? , Marital=?  WHERE patient_id =  ?");
                $stmt->execute(array($pname, $u_name, $u_email, $u_phone, $u_address, $u_status, $_SESSION['ID']));
                $_SESSION['user'] = $row["patient_name"];
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=Home_user.php?action=edit\">";
                header('Location: ' . $_SERVER['Home-user.php']);
            }



?>
<h2 class="text-center"
    style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;padding:30px">
    Sign Up Healthy Care </h2>

<div class=" container">
    <div class="content">
        <form method="POST">
            <div class="col-md-12">
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="validationCustom01">Full name</label>
                            <input type="text" class="form-control form-control-lg" id="validationCustom01"
                                aria-describedby="inputGroupPrepend" value='<?php echo $row["patient_name"] ?>'
                                name="full" required>

                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="validationCustomUsername">Username</label>
                            <div class="input-group">

                                <input type="text" value='<?php echo $row["username"] ?>'
                                    class="form-control form-control-lg" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" name="user" required>
                                <div class="invalid-feedback">
                                    Please Write a username.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" value='<?php echo $row["email"] ?>' class="form-control form-control-lg"
                                name="email" autocomplete="off" id="inputEmail4" aria-describedby="inputGroupPrepend"
                                required>

                            <div class="valid-feedback">
                                Looks good!
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="validationCustomUsername">Password</label>
                            <input value='<?php echo $row["passwor"] ?>' type="password"
                                class="form-control form-control-lg" id="validationCustomUsername"
                                aria-describedby="inputGroupPrepend" name="pass" autocomplete="off" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="req" for="Patientregistration_mobile">Contact
                                    number</label> <input value='<?php echo $row["phone_number"] ?>' type="text"
                                    class="form-control form-control-lg" id="validationCustom01"
                                    aria-describedby="inputGroupPrepend" name="phone" autocomplete="off" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="text-danger" aria-describedby="inputGroupPrepend"
                                    id="Patientregistration_mobile_em_" style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="req" for="Patientregistration_Date_of_Birth">Date Of Birth</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input value='<?php $row["birth_date"] ?>' type="date"
                                        class="form-control form-control-lg" name="date" id="validationCustom01"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="text-danger" id="Patientregistration_patientage_em_" style="display:none">
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="req" for="Patientregistration_patient_type">Marital Status</label>
                                <select value='<?php echo $row["Marital"] ?>' class="custom-select custom-select-lg"
                                    name="status" aria-describedby="inputGroupPrepend" id="validationCustom04" required>
                                    <option disabled></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Legally separated"> Legally separated </option>
                                    <option value="Widowed">Widowed</option>
                                </select>

                                <div class="text-danger" id="Patientregistration_patient_type_em_" style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputAddress">Address </label>
                                <input value="<?php echo $row['ddress'] ?>" type="text"
                                    class="form-control form-control-lg" name="adder"
                                    aria-describedby="inputGroupPrepend" id="validationCustom01" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">

                            <button value=" Update " id="update_button" \ class="btn btn-lg btn-primary btn-block"
                                action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                                style="padding: 10px;margin-top: 20px;"> Update</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

        }
    } elseif ($action == "main") {
        $a = $_SESSION['ID'];
        $stm = $db->prepare("SELECT * FROM  reservation WHERE  patient_id = ?");
        $stm->execute(array($a));
        $ro = $stm->fetchAll();
        $coun = $stm->rowCount();
        if ($coun > 0) {
            $ww=$ro[0]['doctor_id'];
            $q=$ro[0]['reservation_day'];
            $st = $db->prepare("SELECT * FROM  doctor WHERE  doctor_id = ?");
            $st->execute(array($ww));
            $r = $st->fetchAll();
            $cou = $st->rowCount();
            if ($coun > 0) {
              
                $n=$r   [0]['doctor_name'];
           

        ?>
<div class="container col-sm-3">
  <div class="toast" data-autohide="false">
    <div class="toast-header">
      <strong class="mr-auto text-primary" style='font-size:22px;'> Don’t Forget Reservation In   <strong class="mr-auto text-primary" style='font-size:25px;'><?php echo $q ;?></strong> </strong>
      <small class="text-muted">  </small>
      <button type="button" style='font-size:55px;' class="ml-6 mb-1 close text" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
    <strong class="text-success" style='font-size:25px;'>  <?php echo $n ;?></strong>
    </div>
  </div>
</div>
<?php
}
    }
?>

<h1 class="text-center" style="margin-top: 40px; margin-bottom:20px;"> <?php echo $_SESSION['user'] ?> Appointment </h1>
<div class="container">
    <div class="table-responsive">
        <table class="main-table text-center table table-bordered">

            <tr>
                <td>Patiant name</td>
                <td>Doctor name</td>
                <td>Date</td>
                <!--<td>Room</td>-->
                <td>code</td>
                <td>control</td>
            </tr>

            <?php
                    $a = $_SESSION['ID'];
                    $z = $_SESSION['user'];
                    $stmt = $db->prepare("SELECT doctor_id , reservation_day ,   reservation_code FROM  reservation WHERE patient_id=$a");
                    $stmt->execute();
                    $row = $stmt->fetchAll();
                    $count = $stmt->rowCount();
                    if ($count > 0) {
                        foreach ($row as $r) {

                            $c = $r['doctor_id'];
                            $v = $r['reservation_day'];
                            $b = $r['reservation_code'];
                            $stmt = $db->prepare("SELECT doctor_name  FROM  doctor WHERE doctor_id=$c");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $b) {
                                    $l = $b['doctor_name'];
                            //        $m = $b['room_number'];
                                    $t = rand(1, 1000);
                                    
                                    echo '<tr>';
                                    echo "<td>"  . $z . "</td>";
                                    echo "<td>"  . $l . "</td>";
                                    echo "<td>"  . $v . "</td>";
                                   // echo "<td>"  . $m . "</td>";
                                    echo "<td>"  . $t . "</td>";
                                    echo '<form method="POST" action="de.php"" >';
                                    echo  '<input type="text" name="dod" value="'.$c.'" hidden  />';
                                    echo '<td>  <input type="submit" class="btn btn-danger"value="cancel"/> </td>';
                                    echo '</form>';
                                    echo "</tr>";
                                }
                            }
                        }
                    }

                    ?>
        </table>
    </div>
</div>
<?php
    }
    elseif ($action == "take") {

?>
<div class="container" style=" margin-top: 150px; margin-top: <?php if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['rele']))
    {$s = 10;
echo $s; 
    }}
?>px;">
    <form action="Home_user.php?action=take" method="POST">
        <div class="card">
            <div class="card-header" style="background-color: #173753;">
                <h5 class="text-center" style="font-size: 40px ; color: white;">Select Profile </h5>
            </div>
            <div class="card-body" style="background-color: #173753;">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="req" for="Doctordetails_Department"
                            style="font-size: 30px ;color: white;">Specialization</label>
                        <select class="custom-select custom-select-lg" name="specialization" id="f">
                            <?php
                                    $stmt = $db->prepare("SELECT specialization_id FROM doctor ");
                                    $stmt->execute();
                                    $row = $stmt->fetchAll();
                                    $count = $stmt->rowCount();
                                    if ($count > 0) {
                                        echo '<option value="">Please Select Specialization</option>';
                                        foreach ($row as $use) {
                                            echo "<option >" . $use['degree'] . "</option>";
                                        }
                                    }
                                    ?>
                        </select>
                    </div>
                    <?php 
                                $iddoc =0;
                                ?>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="req" style="font-size: 30px ;color: white;">Doctor
                                Name</label>
                            <select class="custom-select custom-select-lg" c name="doctor" id="s">
                                <?php
                                        $sp=$_SESSION['ID'];
                                        $GLOBALS['iddoc']= '';
                                        $stmt = $db->prepare("SELECT doctor_name  ,doctor_id FROM doctor  ");
                                        $stmt->execute();
                                        $row = $stmt->fetchAll();
                                        $count = $stmt->rowCount();
                                        if ($count > 0) {
                                            echo '<option >' . "Select Spec" . '</option>';
                                            $stm = $db->prepare("SELECT * FROM reservation where  patient_id = ? ");
                                            $stm->execute(array($sp));
                                            $ro = $stm->fetchAll();
                                            $cou = $stm->rowCount();
                                            if( $cou > 0 ){
                                                $a=array();
                                                for ( $x = 0 ; $x < $cou ; $x++ )
                                                {
                                                    $a[] =$ro[$x][0];
                                                }
                                                $b=array();
                                                for ( $z = 0 ; $z < $count ; $z++ )
                                                {
                                                    $b[] =$row[$z][1];
                                                }
                                                $result=array_diff($b,$a);
                                              foreach ( $result as $w)
                                              {
                                                $s = $db->prepare("SELECT *  FROM doctor where doctor_id =?  ");
                                                $s->execute(array($w));
                                                $r = $s->fetchAll();
                                                $co = $s->rowCount();
                                                if ($co > 0) {
                                                $nd = $r['doctor_name'];
                                                 
                                                echo "<option   value ='".$w."' >" . $nd . "</option>";
                                              }
                                            }
                                            }
                                        }   
                                        ?>
                            </select>

                            <?php
                               /*
                  $stm = $db->prepare("SELECT * FROM reservation where  patient_id = ? ");
                  $stm->execute(array($sp));
                  $ro = $stm->fetchAll();
                  $cou = $stm->rowCount();
                  $a=array();
                  for ( $x = 0 ; $x < $cou ; $x++ )
                  { 
                   $a[] =$ro[$x][0];
                  
                  }
                  echo "<pre>";
                  print_r($a);
                  */
                        ?>
                        </div>
                    </div>
                    <script>
                    var da = '';
                    var se = '';

                    function hehe() {
                        var se = document.getElementById("s");
                        var da = se.options[se.selectedIndex].value;
                        document.getElementById("hesa").value = se.options[se.selectedIndex].value;
                    };
                    </script>
                    <input type="hidden" name='fd' value="s" id='hesa'>
                    <div class="col-sm-4" onclick="hehe()">
                        <input type="submit" class="btn btn-danger" value="GO" name='rele'
                            style="color:white;; margin-right: 450px;width: 250px; margin-top: 52px  ; ">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
    ?>


</div>
<?php
  $sw=$_POST['fd'];
  $stmt = $db->prepare("SELECT * FROM  doctor WHERE doctor_id= ?");
  $stmt->execute(array($sw));
  $row = $stmt->fetchAll();
          $count = $stmt->rowCount();
          if ($count > 0) {
            foreach ($row as $b) {
              $wq=$b['doctor_id'];
              $mo=$b['Consultant_Fee'];
              $im=$b['img'];
              $na=$b['doctor_name'];
              $i=$b['time_in'];
              $io=$b['time_out'];
              $ag=$b['birth_date'];
              $ph=$b['Phone_number'];
              $sp=$b['Specialization_id'];
              $shit=$b['doctor_shift'];
              $r=$b['room'];
              
        ?>
<div class="row" style="margin:50px;padding:20px;">
    <div class="col col-12">

        <div class="card">
            <div class="thumb thumb-rounded thumb-slide" style="padding:10px">

                <img src="../../Admin/Includes/templates/doctor/<?php echo $im ; ?>" width="160px" height="250px"
                    class="card-img-top" alt="...">

            </div>

            <div class="row" style="margin:0px;background:#f5f5f5; padding:20px">
                <div class="col-sm-6">
                    <div class="panel border-left-lg border-left-danger invoice-grid timeline-content">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="text-semibold no-margin-top">Profile
                                        Information</h6>
                                    <ul class="list list-unstyled">
                                        <li>Name : <?php echo $na ; ?> </li>
                                        <li>Born : <span class="text-semibold"> <?php echo $ag ; ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="text-semibold text-right no-margin-top" style="color:white">-</h6>
                                    <ul class="list list-unstyled text-right">
                                        <li>Fees: <span class="text-semibold"> <?php echo $mo ; ?></span>
                                        </li>
                                        <li>Specialization: <span class="text-semibold">
                                                <?php 
                                              $stm = $db->prepare("SELECT * FROM  specialization1 WHERE Specialization_id = '$sp' ");
                                              $stm->execute();
                                              $ro= $stm->fetchAll();
                                                      $coun = $stm->rowCount();
                                                      if ($coun > 0) {
                                                        foreach ($ro as $a) {
                                                      echo $a['Specialization_name'] ;
                                                        }
                                                    }
                                             ?>
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a>
                            <div class="container">
                                <span class="heading-text">
                                    <span class="status-mark border-danger position-left"></span>
                                    Contact Number: <span class="text-semibold"> <?php echo $ph ; ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel border-left-lg border-left-success invoice-grid timeline-content">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="text-semibold no-margin-top">Consulting
                                        Details</h6>
                                    <ul class="list list-unstyled">
                                        <li>Shift :<?php echo $shit ; ?> </li>
                                        <li>Room Number: <span class="text-semibold"> <?php echo $r ; ?> </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">

                                    <ul class="list list-unstyled text-right">
                                        <li style="color:white">-
                                        </li>
                                        <li>In Time: <span class="text-semibold"> <?php echo $i ; ?></span>
                                        </li>
                                        <li>Out Time: <span class="text-semibold"></span> <?php echo $io ; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a>
                            <div class="heading-elements container">
                                <span class="heading-text">
                                    <span class="status-mark border-success  position-left">
                                        <?php 
                                       echo ' </span>Consulting
                                        Days: <span class="text-semibold">';
    
                                              $st = $db->prepare("SELECT * FROM  day_workk WHERE docto = '$sw' and type='IN' " );
                                              $st->execute();
                                              $ro= $st->fetchAll();
                                                      $cou = $stm->rowCount();
                                                      if ($cou > 0) {
                                                        foreach ($ro as $a) {
                                                        $su = $a['Sunday'];
                                                        $mo = $a['Monday'];
                                                        $tu = $a['Tuesday'];
                                                        $we = $a['Wednesday'];
                                                        $th = $a['Thursday'];
                                                        $fr = $a['Friday'];
                                                        $sa = $a['Saturday'];
                                                        $az=array( $su
                                                        ,$mo
                                                        ,$tu
                                                        ,$we
                                                        ,$th
                                                        ,$fr
                                                        ,$sa);
                                                        if(  $az[0] == '0'  ){
                                                            echo '--' ;
                                                            echo 'Monday ' ;}
                                                           else
                                                           {
                                                             $su=NULL;
                                                           } 
                                                         if(  $az[0] == '1' || $az[1] == '1'  ){
                                                            echo '--' ;
                                                            echo 'Tuesday ';}
                                                           else
                                                           {
                                                              $mo=NULL;
                                                           }
                                                         if(  $az[0] =='2' || $az[1] == '2' || $az[2] == '2'){
                                                            echo '--' ;
                                                            echo 'Wednesday ' ;
                                                           }
                                                           else
                                                           {
                                                             $tu=NULL;
                                                           }
                                                         if(  $az[0] == '3' || $az[1] == '3' || $az[2] == '3' || $az[3] == '3'  ){
                                                            echo '--' ;
                                                            echo 'Thursday ' ;}
                                                           else
                                                           {
                                                              $we=NULL;
                                                           }
                                                         if(  $az[0] == '4' || $az[1] == '4' || $az[2] == '4' || $az[3] == '4' || $az[4] == '4'   ){
                                                            echo '--' ;
                                                            echo 'Friday ' ;}
                                                           else
                                                           {
                                                            $th=NULL;
                                                           }
                                                         if(  $az[0] == '5' || $az[1] == '5' || $az[2] == '5' || $az[3] == '5' || $az[4]=='5' || $az[5]=='5'   ){
                                                            echo '--' ;
                                                            echo 'Saturday ' ;}
                                                           else
                                                           {
                                                              $fr=NULL;
                                                          }
                                                         
                                                         if(  $az[0] == '6' || $az[1] == '6' || $az[2] == '6' || $az[3] == '6' || $az[4]=='6' || $az[5]=='6' || $az[6]=='6'  ){
                                                            echo '--' ;
                                                            echo 'Sunday ';}
                                                           else
                                                           {
                                                              $sa=NULL;
                                                           }
                                                        }
                                                    }
                                             ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                                        $s = $db->prepare("SELECT * FROM  doctorout WHERE doctor_id = '$sw' " );
                                              $s->execute();
                                              $d= $s->fetchAll();
                                                      $co = $s->rowCount();
                                                      if ($co > 0) {
                                                        foreach ($d as $s) {
                                                     $ad= $s['addres'] ;
                                                     $ti= $s['Consulting_Start'] ;
                                                     $to= $s['Consulting_End'] ;
                                                     $me= $s['Consulting_Fee'] ;
                                                     $meo= $s['Extra_Fee'] ;
                                                     ?>
                <div class="col-sm-12">
                    <div class="panel border-left-lg border-left-primary invoice-grid timeline-content">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <h6 class="text-semibold no-margin-top">Outside
                                        Consulting Details</h6>
                                    <ul class="list list-unstyled">
                                        <li>Shift :</li>
                                        <li>Consultant Fees: <span class="text-semibold"><?php echo $me;?> </span></li>
                                        <li>Consultant Extra Fees: <span class="text-semibold"> <?php echo $meo;?>
                                            </span></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="text-semibold text-right no-margin-top" style="color:white">
                                        -</h6>
                                    <ul class="list list-unstyled text-right">
                                        <li>In Time: <span class="text-semibold"><?php echo $ti;?> </span></li>
                                        <li>Out Time: <span class="text-semibold">-</span><?php echo $to;?> </li>
                                        <li>Address: <span class="text-semibold">-</span><?php echo $ad;?> </li>
                                    </ul>

                                </div>
                                <?php
            }}
                                ?>

                            </div>
                        </div>

                        <div class="panel-footer panel-footer-condensed"><a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a>
                            <div class="heading-elements">
                                <span class="heading-text">
                                    <span class="status-mark border-primary position-left">
                                        <?php 
                                              $st = $db->prepare("SELECT * FROM  day_workk WHERE docto = '$sw' and type='OUT' " );
                                              $st->execute();
                                              $ro= $st->fetchAll();
                                                      $cou = $stm->rowCount();
                                                      if ($cou > 0) {
                                                        foreach ($ro as $a) {
                                                        $su = $a['Sunday'];
                                                        $mo = $a['Monday'];
                                                        $tu = $a['Tuesday'];
                                                        $we = $a['Wednesday'];
                                                        $th = $a['Thursday'];
                                                        $fr = $a['Friday'];
                                                        $sa = $a['Saturday'];
                                                        $az=array( $su
                                                        ,$mo
                                                        ,$tu
                                                        ,$we
                                                        ,$th
                                                        ,$fr
                                                        ,$sa);
                                                        echo '</span>Consulting Days: <span class="text-semibold">';
                                                        if(  $az[0] == '0'  ){
                                                            echo '--' ;
                                                            echo 'Monday ' ;}
                                                           else
                                                           {
                                                             $su=NULL;
                                                           } 
                                                         if(  $az[0] == '1' || $az[1] == '1'  ){
                                                            echo '--' ;
                                                            echo 'Tuesday ';}
                                                           else
                                                           {
                                                              $mo=NULL;
                                                           }
                                                         if(  $az[0] =='2' || $az[1] == '2' || $az[2] == '2'){
                                                            echo '--' ;
                                                            echo 'Wednesday ' ;
                                                           }
                                                           else
                                                           {
                                                             $tu=NULL;
                                                           }
                                                         if(  $az[0] == '3' || $az[1] == '3' || $az[2] == '3' || $az[3] == '3'  ){
                                                            echo '--' ;
                                                            echo 'Thursday ' ;}
                                                           else
                                                           {
                                                              $we=NULL;
                                                           }
                                                         if(  $az[0] == '4' || $az[1] == '4' || $az[2] == '4' || $az[3] == '4' || $az[4] == '4'   ){
                                                            echo '--' ;
                                                            echo 'Friday ' ;}
                                                           else
                                                           {
                                                            $th=NULL;
                                                           }
                                                         if(  $az[0] == '5' || $az[1] == '5' || $az[2] == '5' || $az[3] == '5' || $az[4]=='5' || $az[5]=='5'   ){
                                                            echo '--' ;
                                                            echo 'Saturday ' ;}
                                                           else
                                                           {
                                                              $fr=NULL;
                                                          }
                                                         
                                                         if(  $az[0] == '6' || $az[1] == '6' || $az[2] == '6' || $az[3] == '6' || $az[4]=='6' || $az[5]=='6' || $az[6]=='6'  ){
                                                            echo '--' ;
                                                            echo 'Sunday ';}
                                                           else
                                                           {
                                                              $sa=NULL;
                                                           }
                                                        }
                                                    }
                                             ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" container-lg">
                    <form action="req.php" method="POST">
                        <input type="hidden" name='ddd' value="<?php echo $_POST['fd']; ?>">
                        <input type="hidden" name='dd' value="<?php echo $_SESSION['ID']; ?>">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>Date Of Joining</label>
                                <div class="input-group date" id="form_date" data-target-input="nearest">
                                    <input type="text" name='titi' class="form-control form_date datetimepicker-input"
                                        data-target="#datetimepicker1" autocomplete="off"
                                        aria-describedby="inputGroupPrepend" />
                                    <div class="input-group-append" data-target="#datetimepicker1"
                                        data-toggle="form_date">
                                        <div class="input-group-text"><i class="fa fa-calendar form_date"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-danger" value="REQUEST" name='dood'
                                    style="color:white;width: 250px; margin-top: 30px  ; ">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
            }
        }
}
?>


<?php
    }
    include 'footer.php';
} else {
    header('location: Login.php');
}

?>