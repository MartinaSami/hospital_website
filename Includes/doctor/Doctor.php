<style>
.media .profile-thumb img {
    width: 200px;
    height: 200px;
    border: 3px solid #fff;
    -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
}

.media-left img:not(.media-preview),
.media-right img:not(.media-preview),
.thumbnail .media img:not(.media-preview) {
    width: 150px;
    height: 150px;
    max-width: none;
}

.img-circle {
    border-radius: 50%;
}

img {
    vertical-align: middle;
}

img {
    border: 0;
}
</style>
<?php
session_start();
if (isset($_SESSION['doctor_id'], $_SESSION['name'])) {
    $pagetitle = 'Doctor page';
    $ic = '<i class="fas fa-bell"></i>';
    include 'inti.php';
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';

    if ($action == 'main') {
        ?>
<div class="container" style="margin-top:10px;">
    <div class='row'>
        <?php
        $a = $_SESSION['doctor_id'];
        $d = date('Y-m-d') ; 
        $stm = $db->prepare("SELECT * FROM  reservation WHERE  doctor_id = ?  and reservation_day = ? ");
        $stm->execute(array($a,$d));
        $ro = $stm->fetchAll();
        $coun = $stm->rowCount();
        if ($coun > 0) {
            foreach( $ro as $e ){
             $ww= $e['patient_id'];
             $st = $db->prepare("SELECT * FROM  patient WHERE  patient_id = ?");
             $st->execute(array($ww));
             $r = $st->fetchAll();
             $cou = $st->rowCount();
             if ($cou > 0) {
                 $i=$r[0]['img'];
                 $w=$r[0]['patient_name'];
              
            
        
?>

        <div class="col-4">
            <div class="thumbnail">
                <div class="container" style="margin-top:20px;">
                    <img class="rounded mx-auto d-block" width='100px' height="100px"
                        src="../templates/image/<?php echo $i ?>" alt="Patient">
                </div>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>?action=patient ">
                    <input type="text" name="dada" value="<?php echo $ww ;?>" hidden />
                    <div class="caption text-center">
                        <h6 class="text-semibold no-margin"><b> <?php echo $w ;?> <span>

                                </span> </b><small class="display-block"></small></h6>
                    </div>
                    <div class='container-md text-center'>
                        <input type="submit" class="btn btn-danger" value="View" name='re'
                            style="color:white; width:100px; ">
                    </div>
                </form>
            </div>
        </div>

        <?php
        }
    }
}?>
    </div>
</div>
<?php
 }
if ($action == 'patient') {
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['re']))
        { 
            $pa=$_POST['dada'];
            $st = $db->prepare("SELECT * FROM  patient WHERE  patient_id = ?");
            $st->execute(array($pa));
            $row = $st->fetchAll();
            $cou = $st->rowCount();
            if ($cou > 0) {
                
                $i=$row[0]['img'];
                $w=$row[0]['patient_name'];
                $ii=$row[0]['patient_id'];
                $br=$row[0]['birth_date'];
                $ma=$row[0]['Marital'];
                $ge=$row[0]['gender'];
                $pho=$row[0]['phone_number'];

             
            
            
            ?>
<div class="row">
    <div class="col-12">
        <form action="#">
            <div class="panel panel-flat">
                <div class="col-12">
                    <div class="panel-heading">
                        <h5 class="panel-title">Patient Details<a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a></h5>
                    </div>
                    <div class="panel-body">

                        <div class='row'>
                            <div class="col-2 media-left">
                                <a href="#" class="profile-thumb">
                                    <img src="../templates/image/<?php echo $i; ?>" class="img-circle" alt="">
                                </a>
                            </div>
                            <div class="col-6 media-body" style="margin-left:50px;">
                                <h2> <?php echo $w ; ?> </h2> <br>
                                <h2>Regno&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $ii ; ?> </h2>
                            </div>
                            <div class="col-4 media-body ml-3">
                                <h4 style="color:white"> - </h4>
                                <h4 style="color:white"> - </h4>
                                <h4> Registered Date : 2017-06-25 </h4>
                            </div>
                        </div>
                        <hr>
                        <h5></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Personal Details<a class="heading-elements-toggle"><i
                                                    class="icon-more"></i></a><a class="heading-elements-toggle"><i
                                                    class="icon-more"></i></a>
                                        </h6>

                                    </div>
                                    <div class="panel-body" style="display: block;">
                                        <div class="tabbable tab-content-bordered panel border-teal">
                                            <div class="tab-content">
                                                <table style="border-color: white; width:100%;"
                                                    class="table table-responsive" align="center">
                                                    <tbody>
                                                        <tr style="border-color: white;">
                                                            <td style="border-color: white;">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </td>
                                                            <td style="border-color: white; align:left;">
                                                                <b>Patientname</b></td>
                                                            <td style="border-color: white;"><?php echo $w ; ?> </td>
                                                            <td style=" border-color: white;"></td>
                                                        </tr>
                                                        <tr style="border-color: white;">
                                                            <td style="  border-color: white;"></td>
                                                            <td style="  border-color: white;"><b>Age</b></td>
                                                            <td style="  border-color: white;"><?php echo $br ; ?> </td>
                                                            <td style="  border-color: white;"></td>
                                                        </tr>
                                                        <tr style="border-color: white;">
                                                            <td style="  border-color: white;"></td>
                                                            <td style="  border-color: white;"><b>Gender</b>
                                                            </td>
                                                            <td style="  border-color: white;">
                                                                <?php  if($ma == 1){echo 'Male';}else{ echo 'femail';}  ?>
                                                            </td>
                                                            <td style="  border-color: white;"></td>
                                                        </tr>
                                                        <tr style="border-color: white;">
                                                            <td style="  border-color: white;"></td>
                                                            <td style="  border-color: white;"><b>Contact
                                                                    Number</b>
                                                            </td>
                                                            <td style="  border-color: white;"><?php echo $pho; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Medical Details<a class="heading-elements-toggle"><i
                                                    class="icon-more"></i></a><a class="heading-elements-toggle"><i
                                                    class="icon-more"></i></a>
                                        </h6>

                                    </div>

                                    <div class="panel-body" style="display: block;">
                                        <div class="tabbable tab-content-bordered panel border-teal">
                                            <div class="tab-content">
                                                <table style="border-color: white; width:100%;"
                                                    class="table table-responsive">
                                                    <tbody>
                                                        <tr style="border-color: white;">
                                                            <td style="border-color: white;">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </td>
                                                            <td style="border-color: white; align:left;">
                                                                <b>Patientname</b></td>
                                                            <td style="border-color: white;">test patient</td>
                                                            <td style=" border-color: white;"></td>
                                                        </tr>
                                                        <tr style="border-color: white;">
                                                            <td style="  border-color: white;"></td>
                                                            <td style="  border-color: white;"><b>Age</b></td>
                                                            <td style="  border-color: white;">3</td>
                                                            <td style="  border-color: white;"></td>
                                                        </tr>
                                                        <tr style="border-color: white;">
                                                            <td style="  border-color: white;"></td>
                                                            <td style="  border-color: white;"><b>Gender</b>
                                                            </td>
                                                            <td style="  border-color: white;">Male</td>
                                                            <td style="  border-color: white;"></td>
                                                        </tr>
                                                        <tr style="border-color: white;">
                                                            <td style="  border-color: white;"></td>
                                                            <td style="  border-color: white;"><b>Contact
                                                                    Number</b>
                                                            </td>
                                                            <td style="  border-color: white;">789899989</td>
                                                            <td style="  border-color: white;"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class=container>

                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item active">
                                <a href="#reg" data-toggle="tab">Prescription</a>
                            </li>
                            <li class="nav-item">
                                <a href="#basic-tab2" data-toggle="tab">Laboratory Test</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="reg">
                                <br>
                                <div class="col-md-12 text-right"> <button type="button" class="btn btn-outline-dark"
                                        data-toggle="modal" data-target="#myModal"> New
                                        Prescription </button>
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style='width:800px; height:500px'>
                                                <div class="container tab-pane active" id="reg">
                                                    <br>
                                                    <form method='POST' name='med' >
                                                        <div class="row">
                                                            <div class="form-group col-sm-3">
                                                                <label for="Medicine" class="req">Medicine</label>
                                                                <input class="form-control " id="name" type="text"
                                                                    value="" name="name" autocomplete="off">
                                                            </div>
                                                            <div class="form-group col-sm-2">
                                                                <label for="Medicine" class="req">Time as day</label>
                                                                <input size="45" maxlength="45" class="form-control"
                                                                    name="tim" id="tim" type="text">
                                                            </div>
                                                            <div class="form-group col-sm-2">
                                                                <label for="Medicine" class="req">No of days</label>
                                                                <input class="form-control" name="non" id="non"
                                                                    type="text">
                                                            </div>
                                                            <div class="form-group col-sm-3">
                                                                <label>When to take</label>
                                                                <select name='atta' id='atta' class="form-control">
                                                                    <option value="" selected="selected">Please Select
                                                                    </option>
                                                                    <option value="After meal">After meal</option>
                                                                    <option value="Before meal">Before meal</option>
                                                                    <option value="Night">Night</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-2"  onclick="add();">
                                                                <button type="button" id="add" class="btn btn-primary">
                                                                    <i class="fas fa-5x fa-plus-square">
                                                                    </i> </button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <table data-provides="rowlink" id='table' name='tab'
                                                                class="table toggle-square ">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Medicine</th>
                                                                        <th>Time as day</th>
                                                                        <th>No of days</th>
                                                                        <th>When to take</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </form>
                                                    <script>
                                                    function add() {

                                                        var nam = document.getElementById("name").value;
                                                        var tim = document.getElementById("tim").value;
                                                        var non = document.getElementById("non").value;
                                                        var atta = document.getElementById("atta").value;
                                                        var tr = document.createElement('tr');
                                                        var td1 = tr.appendChild(document.createElement('td'));
                                                        var td2 = tr.appendChild(document.createElement('td'));
                                                        var td3 = tr.appendChild(document.createElement('td'));
                                                        var td4 = tr.appendChild(document.createElement('td'));
                                                        var td5 = tr.appendChild(document.createElement('td'));
                                                        td1.innerHTML = nam;
                                                        td2.innerHTML = tim;
                                                        td3.innerHTML = non;
                                                        td4.innerHTML = atta;
                                                        td5.innerHTML = 'Cancel';
                                                        td5.onclick = function()
                                                            {
                                                            index = this.parentElement.rowIndex;
                                                            table.deleteRow(index);
                                                            console.log(index);
                                                        };
                                                        
                                                        document.getElementById("table").appendChild(tr);
                                                        
                                                    }
                                                    </script>
                                                    <script>
                                                    /*
                                                    var index , table = document.getElementById("table");
                                                    for (var i = 0; i < table.rows.length ; i++)
                                                    {
                                                        table.rows[i].cells[4].onclick = function()
                                                        {
                                                            index = this.parentElement.rowIndex;
                                                            table.deleteRow(index);
                                                            console.log(index);
                                                        };
                                                    };
                                                     */
                                                    </script>
                                                    <div class="row">
                                                        <div class="form-group text-center col-sm-6">
                                                            <label for="" class="">Case history</label>
                                                            <textarea rows="3" cols="50" class="form-control"
                                                                placeholder="Write case history ...."
                                                                name="Prescription[casehistory]"
                                                                id="Prescription_casehistory"></textarea>
                                                            <div class="errorMessage" id="Prescription_casehistory_em_"
                                                                style="display:none">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <div class="form_sep">
                                                        <br>
                                                        <input class="btn btn-success btn-lg ml-auto"
                                                            style=" margin:10px;" type="submit" name="sep" value="Save">
                                                        <input class="btn btn-success btn-lg ml-auto" type="button"
                                                            class="btn btn-danger" data-dismiss="modal"
                                                            style=" margin:0px;" type="submit" name="sep" value="Back">
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <table style="border-color: white;" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl no:</th>
                                            <th>Consultation Date</th>
                                            <th>Treatment for</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2017-06-29</td>
                                            <td>MALARIA</td>
                                            <td> <a href="/index.php/core/prescription/view/id/7" class="btn bg-teal "
                                                    target="_blank">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="basic-tab2">
                                <br>
                                <div class="col-md-12 text-right"> <button class="btn btn-outline-dark">New Lab
                                        Test</button> </div><br>
                                <table style="border-color: white;" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl no:</th>
                                            <th>Consultation Date</th>
                                            <th>Lab Test</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2020-06-27</td>
                                            <td></td>
                                            <td> <a href="/index.php/core/labtestresult/resultview/id/2"
                                                    class="btn bg-teal" target="_blank">View Test Result</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </form><!-- content -->
    </div>
</div>
<?php
            }   
        }}
    ?>
<?php
 }
if ($action == 'main') 
    ?>
<?php
    
        include 'footer.php';
}
?>