<?php
include "DBconnection.php";
if (isset($_GET['f'])  && !empty($_GET['f'])) {
    SESSION_START();
    echo '<select class="custom-select custom-select-lg" name="doctor" onclick="hehe()" id="s" >';
    $id = $_GET['f'];
    $sp=$_SESSION['ID'];
    $stmt = $db->prepare("SELECT doctor_name ,doctor_id FROM doctor WHERE  degree=? ");
    $stmt->execute(array($id));
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
                  foreach( $r as $t){
                   $nd = $t['doctor_name'];
                   echo "<option   value ='".$w."' >" . $nd . "</option>";
                  }
            }
          }
        }
        else
        {
            foreach( $row as $e){
                $nd = $e['doctor_name'];
                $w = $e['doctor_id'];
                echo "<option   value ='".$w."' >" . $nd . "</option>";
               }
        }
}
    echo '</select>';
  
    $_SESSION['do'] = $_POST['doctor'];
}