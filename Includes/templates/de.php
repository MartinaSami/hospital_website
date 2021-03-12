       <?php 
       include 'DBconnection.php';
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $er=$_POST['dod'];
        $a = $_SESSION['ID'];
        $z = $_SESSION['user'];
        $stmt = $db->prepare("SELECT * FROM  reservation WHERE doctor_id = ?  and patient_id= ?");
        $stmt->execute(array($er , $a));
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count > 0) {
            foreach ($row as $b) {
                $w = $b['doctor_id'];
            }
        $stmt=$db->prepare( "DELETE   FROM  reservation WHERE doctor_id = ? and  patient_id=? ");
        $stmt->execute(array($er ,$a));
        header("location: Home_user.php?action=main");
        }
    }
        ?>