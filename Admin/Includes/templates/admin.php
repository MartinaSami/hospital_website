<?php
session_start();
$pagetitle = 'Adminpage';
include("inti.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}



//start Dashboard to admin page
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

if ($action == 'home') {
?>


<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doctors</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo getCount('doctor_id', 'doctor'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">200</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PATIENT</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php echo getCount('patient_name', 'patient'); ?></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">STAFF</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php // echo getCount('staff_id', 'staff'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-plus-circle fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php
} elseif ($action == 'Hospital_Registration') {

    $stmt = $db->prepare("SELECT * FROM hospital_data ");
    $stmt->execute();
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {

    ?>
<div class="Hospital_Registration">
    <div class="row">
        <div class="info col-9">
            <form class="needs-validation" novalidate action="logo.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col">
                        <label>Hospital code</label>
                        <input type="text" class="form-control" name="code"
                            value="<?php echo $row["Hospital_code"];  ?>">
                    </div>
                    <div class="form-group col">
                        <label>Hospital name</label>
                        <input type="text" class="form-control" name="name"
                            value="<?php echo $row["Hospital_name"];  ?>">
                    </div>
                    <div class="form-group col">
                        <label>Address</label>
                        <input type="addres" class="form-control" name="address" value="<?php echo $row["ddress"];  ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Year of establishment</label>
                        <select class="custom-select" name="year" required>
                            <option value="">Select year</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>

                    <div class="form-group col">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" value="<?php echo $row["Country"];  ?>">
                    </div>
                    <div class="form-group col">
                        <label>State</label>
                        <input type="text" class="form-control" name="state" value="<?php echo $row["stat"];  ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row["Email"];  ?>">
                    </div>
                    <div class="form-group col">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" name="number"
                            value="<?php echo $row["Contact_Number"];  ?>">
                    </div>
                    <div class="form-group col">
                        <label>Number of Buildings</label>
                        <input type="text" class="form-control" name="numberb"
                            value="<?php echo $row["Number_of_Buildings"];  ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="custom-file col-8">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-row col-1">

                    </div>
                    <div class=" col-3">
                        <button type="submit" name="save" class="btn btn-success btn-lg  btn-block">UPDATE</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="col-0.5">
        </div>
        <div class="col-1">
            <div class="hospital_info">
                <div class="hospital_img" style="display:block; padding-bottom:30px;">
                    <img class="mx-auto d-block" src="<?php echo $im . 'ico.png' ?>" width="100px" height="100px;">
                </div>
                <div class="text-center">
                    <h6 class="Namehospital" style="display:block; padding-bottom:30px;font-size:30px;"> HealthyCare
                    </h6>
                    <small style="display:block; padding-bottom:30px;font-size:20px;">HealthyCare@gmail.com</small>
                    <i class="fab fa-facebook-square" style="font-size:30px;"></i>
                    <i class=" fab fa-twitter" style="font-size:30px;"></i>
                    <i class=" fab fa-google-drive" style="font-size:30px;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
} elseif ($action == 'Add Departments') {

    ?>
<div class="row">
    <div class="col-md-6 depn">
        <Form action="logo.php" method="POST">
            <h2 class="text-center">New Department</h2>
            <div class="form-group">
                <label>Department name</label>
                <input size="50" name='naame' maxlength="50" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label>Select Floor</label>
                <select name="floor" class="form-control">

                    <?php
                        $stmt = $db->prepare("SELECT Floor_Name FROM floor WHERE dep_id is NULL ");
                        $stmt->execute();
                        $row = $stmt->fetchAll();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                            echo '<option value="">Please Select Floor</option>';
                            foreach ($row as $use) {
                                echo "<option >" . $use['Floor_Name'] . "</option>";
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label>Head name</label>
                <input class="form-control" type="text" name="head" maxlength="35">
            </div>
            <div class="form-group">
                <label>Contact number</label>
                <input size="45" maxlength="45" class="form-control" name="nuum" type="text">
            </div>

            <div class="text-right">
                <input class="btn btn-success btn-lg  btn-block" type="submit" name="dppp">
            </div>
    </div>
    </form>
    <div class="col-md-6 dep">
        <h2 class="text-center">Hospital Departments</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sl.No.</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Department Floor</th>
                        <th scope="col">Head Name</th>
                        <th scope="col">Contact Number</th>
                            <th scope=" col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <?php
                            $stmt = $db->prepare("SELECT * FROM departments");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    echo '  <td>' . $use['department_id'] . '</td>';
                                    echo '  <td>' . $use['department_name'] . '</td>';
                                    echo '  <td>' . $use['department_location'] . '</td>';
                                    echo '  <td>' . $use['department_head'] . '</td>';
                                    echo '  <td>' . $use['Contact_number'] . '</td>';
                            ?>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    <tr class="odd">
                        <?php
                                }
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<?php
} elseif ($action == 'New Employee Type') {

?>

<div class="row">
    <div class="col-md-6 depn">
        <h2 class="text-center">New Employee Type</h2>
        <form action="logo.php" method="POST">
            <div class="form-group">
                <label>Employee type</label>
                <input size="50" maxlength="50" name='emp' class="form-control" type="text">

            </div>
            <div class="text-right">

                <input class="btn btn-success btn-lg ml-auto" type="submit" name="ad" value="Add Employee Type">

            </div>
        </form>
    </div>
    <div class="col-md-6 dep">
        <h2 class="text-center">Hospital Departments</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sl.No.</th>
                        <th scope="col">Employee Type</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <?php

                            $stmt = $db->prepare("SELECT * FROM add_employee_type");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    echo '  <td>' . $use['id_employee _type'] . '</td>';
                                    echo '  <td>' . $use['employee_type'] . '</td>';

                            ?>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    <tr class="odd">
                        <?php
                                }
                            }
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
} elseif ($action == 'New Building') {
?>

<div class="row">
    <div class="col-md-6 depn">
        <form action="logo.php" method="POST">
            <h2 class="text-center">New Building</h2>
            <div class="form-group">
                <label>Buiding name</label>
                <input size="50" maxlength="50" name='name' class="form-control" type="text">
                <label>Building code</label>
                <input size="50" maxlength="50" name=" code" class="form-control" type="text">
            </div>
            <div class="text-right">
                <input class="btn btn-success btn-lg ml-auto" type="submit" name="bu" value="Add Employee Type">
            </div>
        </form>
    </div>
    <div class="col-md-6 dep">
        <h2 class="text-center">Hospital Buildings</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Building Name</th>
                        <th scope="col">Building Code </th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <?php

                            $stmt = $db->prepare("SELECT * FROM building");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    echo '  <td>' . $use['Buiding_name'] . '</td>';
                                    echo '  <td>' . $use['Building_id'] . '</td>';

                            ?>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    <tr class="odd">
                        <?php
                                }
                            }
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
} elseif ($action == 'New Floor') {
?>

<div class="row">
    <div class="col-md-6 depn">
        <form action="logo.php" method="POST">
            <h2 class="text-center">New Floor</h2>
            <div class="form-group">
                <label>Floor Name</label>
                <input size="50" maxlength="50" name="name" class="form-control" type="text">
                <label>Floor Code</label>
                <input size="50" maxlength="50" name="code" class="form-control" type="text">
                <div class="form-group">
                    <label>Building Name</label>
                    <select name="bbb" class="form-control">
                        <?php
                            $stmt = $db->prepare("SELECT * FROM building  ");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                echo '<option >Select Building</option>';
                                foreach ($row as $use) {
                                    echo "<option>" . $use['Buiding_name'] . "</option>";
                                }
                            }
                            ?>
                    </select>
                </div>
            </div>
            <div class="text-right">
                <input class="btn btn-success btn-lg ml-auto" type="submit" name="fl" value="Add Employee Type">
            </div>
        </form>
    </div>
    <div class="col-md-6 dep">
        <h2 class="text-center">Hospital Buildings</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Floor Nam</th>
                        <th scope="col">Floor Code </th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <?php

                            $stmt = $db->prepare("SELECT * FROM floor");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    echo '  <td>' . $use['Floor_Name'] . '</td>';
                                    echo '  <td>' . $use['Floor_Code'] . '</td>';

                            ?>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    <tr class="odd">
                        <?php
                                }
                            }
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
} elseif ($action == 'New room') {
?>

<div class="row">
    <div class="col-md-6 depn">
        <form action="logo.php" method="POST">
            <h2 class="text-center">New room</h2>
            <div class="form-group">
                <label>Room Name</label>
                <input size="50" maxlength="50" name="room" class="form-control" type="text">
                <label>Room Code</label>
                <input size="50" maxlength="50" name="code" class="form-control" type="text">
                <div class="form-group">
                    <label>Floor Name</label>
                    <select name="bpb" class="form-control">
                        <?php
                            $stmt = $db->prepare("SELECT * FROM floor  ");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                echo '<option >Select Building</option>';
                                foreach ($row as $use) {
                                    $w= $use['Building_id'] ;
                                    $stmt = $db->prepare("SELECT Buiding_name FROM building Where  Building_id=?  ");
                                    $stmt->execute(array($w));
                                    $row = $stmt->fetchAll();
                                    $count = $stmt->rowCount();
                                    if ($count > 0) {
                                        foreach ($row as $use1) {
                                    
                                    echo "<option value='".$use['Floor_Name']  ."' >" .$use1['Buiding_name'] .'&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;' .$use['Floor_Name'] . "</option>";
                                }
                            }
                        }}
                            ?>
                    </select>
                </div>
            </div>
            <div class="text-right">
                <input class="btn btn-success btn-lg ml-auto" type="submit" name="ro" value="Add ROOM">
            </div>

        </form>
    </div>
    <div class="col-md-6 dep">
        <h2 class="text-center">Hospital Buildings</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">room Nam</th>
                        <th scope="col">room Code </th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <?php

                            $stmt = $db->prepare("SELECT * FROM room1");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    echo '  <td>' . $use['room_name'] . '</td>';
                                    echo '  <td>' . $use['room_code'] . '</td>';

                            ?>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    <tr class="odd">
                        <?php
                                }
                            }
                    ?>

                    </tr>
                </tbody>
        </div>
    </div>
</div>

<?php
} elseif ($action == 'Staff registration') {
?>
<div class="contant">
    <h2 style="padding: 10px"> Add Staff Detail </h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Staff Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">View Details</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane  active" id="home">
            <form action="logo.php" method="POST" enctype="multipart/form-data">
                <div class="tab-pane active">
                    <br>
                    <fieldset>
                        <legend class="text-semibold"><b style="color:#008080">PERSONAL DETAILS:-</b></legend>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employee Type</label>
                                <select class="form-control" name="type">
                                    <option value="">Select Type</option>
                                    <?php
                                        $stmt = $db->prepare("SELECT employee_type FROM add_employee_type  ");
                                        $stmt->execute();
                                        $row = $stmt->fetchAll();
                                        $count = $stmt->rowCount();
                                        if ($count > 0) {
                                            foreach ($row as $use) {
                                                echo "<option>" . $use['employee_type'] . "</option>";
                                            }
                                        }
                                        ?>
                                </select>
                                <div class="text-danger" id="Staffregistration_employeetypeid_em_" style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="reg_input_name" class="req">Register Number</label>
                            <input class="form-control" type="text" name="id" maxlength="20" value="7654321S102">
                        </div>
                        <div class="form-group col-md-4">
                            <label style="margin-bottom: 10px">image</label>
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" style="margin-top:28px; " for="customFile">Choose
                                file</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input size="50" maxlength="50" class="form-control" name='name' type="text">
                                <div class="text-danger" id="Staffregistration_firstname_em_" style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Salary</label>
                                <input size="50" maxlength="50" class="form-control" name='salary' type="text">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>SSN</label>
                                <input class="form-control" name="ssn" type="text" maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="Gender">Gender</label>
                            <select class="form-control" name="gender" data-required="true">
                                <option value="prompt">Please Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" name="BD" class="form-control simple">
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-sm-4">
                            <label for="Blood_Group">Blood Group</label>
                            <select class="form-control" name="blood">
                                <option value="prompt">Please Select</option>
                                <option value="1">A+</option>
                                <option value="2">A-</option>
                                <option value="3">B+</option>
                                <option value="4">B-</option>
                                <option value="5">O+</option>
                                <option value="6">O-</option>
                                <option value="7">AB+</option>
                                <option value="8">AB-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="adderss"></textarea>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Qualification</label>
                            <input size="45" maxlength="45" name="qulification" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label> Shift</label>
                        <select class="form-control" name="shift">
                            <option value="" selected="selected">Please Select</option>
                            <option value="Morning">Morning</option>
                            <option value="Evening">Evening</option>
                        </select>
                    </div>
                </div>
                </fieldset>
                <fieldset>
                    <legend class="text-semibold"><b style="color:#008080">DEPARTMENT DETAILS:-</b></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hospital Department</label>
                                <select class="form-control" name="dep">
                                    <?php
                                 echo     "<option> Select Department </option>";
                                        $stmt = $db->prepare("SELECT department_name FROM departments  ");
                                        $stmt->execute();
                                        $row = $stmt->fetchAll();
                                        $count = $stmt->rowCount();
                                        if ($count > 0) {
                                            foreach ($row as $use) {
                                                echo "<option >" . $use['department_name'] . "</option>";
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Date Of Joining</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" name="DS" class="form-control simple">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Date Of Retirement</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                    <input type="text" name="DE" class="form-control form_date">
                                </div>
                            </div>
                        </div>

                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-semibold"><b style="color:#008080">CONTACT DETAILS:-</b></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="req" for="Staffregistration_Email_address">Email Address</label>
                                <input size="45" maxlength="45" class="form-control" name="email" type="text">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="req" for="Staffregistration_Contact_number">Contact Number</label>
                                <input size="45" maxlength="45" class="form-control" name="num" type="text">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-semibold"><b style="color:#008080">EMERGENCY CONTACT DETAILS:-</b></legend>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Name</label> <input size="45" maxlength="45" name="emna" class="form-control"
                                    type="text">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input size="45" maxlength="45" name="emnum" class="form-control" type="text">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label ">Relationship</label> <input name=" emrel" size="45" maxlength="45"
                                    class="form-control" type="text">

                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="text-right">
                    <input class="btn bg-teal" type="submit" name="staf"> </div>
            </form>
        </div>
        <div class="tab-pane  fade" id="menu1">
            <div class="tab-pane">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>

                    </thead>
                    <tbody>
            
                    </tbody>
                </table>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th id="staffregistration-grid_c0">Sl.No.</th>
                            <th id="staffregistration-grid_c1">name</th>
                            <th id="staffregistration-grid_c2">Employee_Type</th>
                            <th id="staffregistration-grid_c3">Address</th>
                            <th id="staffregistration-grid_c4">Phone</th>
                            <th id="staffregistration-grid_c5">Qualification</th>
                            <th class="button-column" id="staffregistration-grid_c6">Manage</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr class="odd">
                            <?php

                            $stmt = $db->prepare("SELECT * FROM staf");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    $aw=$use['email'];
                                    echo '  <td>' . $use['worker_id'] . '</td>';
                                    echo '  <td>' . $use['worker_name'] . '</td>';
                                
                                    echo '  <td>' . $use['phonenumber'] . '</td>';
                                    echo '  <td>' . $aw . '</td>';
                                    echo '  <td>' . $use['Employee_Type'] . '</td>';
                                    echo '  <td>' . $use['phonenumber'] . '</td>';
                                

                            ?>
                            <td width="5%">
                                <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                                <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                            </td>
                        <tr class="odd">
                            <?php
                                }
                            }
                    ?>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
} elseif ($action == 'Specialization') {
?>

<div class="row">

    <div class="col-md-6 depn">
        <form action="logo.php" method="POST">
            <h2 class="text-center">New Specialization</h2>
            <div class="form-group">
                <label>Specialization</label>
                <input size="50" maxlength="50" name="seeee" class="form-control" type="text">
            </div>
            <div class="text-right">
                <input class="btn btn-success btn-lg ml-auto" type="submit" name="sep" value="add sep">
            </div>
        </form>
    </div>
    <div class="col-md-6 dep">
        <h2 class="text-center">Specializations</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sl.No.</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td width="5%">1</td>
                        <td width="15%">kepala rumah sakit</td>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
} elseif ($action == 'Medication_Treatment_For') {
?>

<div class="row">
    <div class="col-md-6 depn">

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h2 class="text-center">Treatment For
                </h2>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="Treatmentfor_treatmentfor_name">Treatment name</label> <input class="form-control"
                        name="Treatmentfor[treatmentfor_name]" id="Treatmentfor_treatmentfor_name" type="text">
                    <div class="text-danger" id="Treatmentfor_treatmentfor_name_em_" style="display:none"></div>
                </div>
                <div class="form-group">
                    <label for="Treatmentfor_treatmentfor_cost">Treatment Cost</label> <input class="form-control"
                        name="Treatmentfor[treatmentfor_cost]" id="Treatmentfor_treatmentfor_cost" type="text">
                    <div class="text-danger" id="Treatmentfor_treatmentfor_cost_em_" style="display:none"></div>
                </div>
                <div class="text-right">
                    <input class="btn bg-teal" type="submit" name="yt0" value="Create"> </div>
            </div>
        </div>


    </div>
    <div class="col-md-6 dep">
        <h2 class="text-center">Specializations</h2>
        <div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sl.No.</th>
                        <th scope="col">Treatment For</th>
                        <th scope="col">Treatment Cost</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td width="5%">1</td>
                        <td width="15%">haappy</td>
                        <td width="15%">haappy</td>
                        <td width="5%">
                            <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                            <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
} elseif ($action == 'Medication_Prescription') {
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-flat">
            <div class="header">
                <h5 class="panel-title">Add prescription
                </h5>
            </div>
            <div class="panel-body">
                <div class="tabbable">
                    <div class="tab-content">
                        <div class="tab-pane active" id="reg">
                            <br>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="Patient" class="req">Patient</label>
                                    <select class="form-control" name="Prescription[patientregistrationid]"
                                        id="Prescription_patientregistrationid">
                                        <option value="">Select Patient</option>
                                    </select>
                                    <div class="text-danger" id="Prescription_patientregistrationid_em_"
                                        style="display:none"></div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="Patient" class="req">Treatment for</label>
                                    <select class="form-control" name="Prescription[treatmentforid]"
                                        id="Prescription_treatmentforid">
                                        <option value="">Select treatment</option>
                                    </select>
                                    <div class="text-danger" id="Prescription_treatmentforid_em_" style="display:none">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label for="Medicine" class="req">Medicine</label>
                                    <input class="form-control ui-autocomplete-input" id="inventoryitem_name"
                                        type="text" value="" name="inventoryitem_name" autocomplete="off">
                                    <div class="text-danger" id="Prescriptiondetails_medicineid_em_"
                                        style="display:none"></div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="Medicine" class="req">Time as day</label>
                                    <input size="45" maxlength="45" class="form-control"
                                        name="Prescriptiondetails[timeasday]" id="Prescriptiondetails_timeasday"
                                        type="text">
                                    <div class="errorMessage" id="Prescriptiondetails_timeasday_em_"
                                        style="display:none"></div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="Medicine" class="req">No of days</label>
                                    <input class="form-control" name="Prescriptiondetails[noofdays]"
                                        id="Prescriptiondetails_noofdays" type="text">
                                    <div class="errorMessage" id="Prescriptiondetails_noofdays_em_"
                                        style="display:none"></div>
                                </div>

                                <div class="form-group col-sm-3" id="whentotake">
                                    <label for="" class="req">When to take</label>
                                    <select class="form-control" name="Prescriptiondetails[whentotake]"
                                        id="Prescriptiondetails_whentotake">
                                        <option value="" selected="selected">Please Select</option>
                                        <option value="After meal">After meal</option>
                                        <option value="Before meal">Before meal</option>
                                        <option value="Night">Night</option>
                                    </select>
                                    <div class="text-danger" id="Prescriptiondetails_whentotake_em_"
                                        style="display:none"></div>
                                </div>

                                <div class="form-group col-sm-2">
                                    <!--<div class="form_sep">-->
                                    <label>&nbsp;</label>
                                    <p><a href="javascript:addcodeplus();" class="btn bg-teal" align="right"
                                            title="Addition"><span class="glyphicon glyphicon-plus"></span></a></p>
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="form-group" id="salaryamount">
                                <table data-provides="rowlink" data-page-size="20" data-filter="#mailbox_search"
                                    class="table toggle-square default footable-loaded footable" id="codetable">
                                    <thead>
                                        <tr>
                                            <th>Medicine</th>
                                            <th>Time as day</th>
                                            <th>No of days</th>
                                            <th>When to take</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="" class="">Case history</label>
                                    <textarea rows="3" cols="50" class="form-control"
                                        placeholder="Write case history ...." name="Prescription[casehistory]"
                                        id="Prescription_casehistory"></textarea>
                                    <div class="errorMessage" id="Prescription_casehistory_em_" style="display:none">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12" >
                                        <div class="form_sep">
                                            <br>
                                            <input class="btn btn-success btn-lg ml-auto" style=" margin:10px;" type="submit" name="sep" value="Save">
                                            
                                            <input class="btn btn-success btn-lg ml-auto"  style=" margin:0px;" type="submit" name="sep" value="Back">
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="basic-tab2">
                            <br>
                            <p>
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl no:</th>
                                            <th>Date</th>
                                            <th>Patient name</th>
                                            <th>Patient id</th>
                                            <th>Treatment for</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2017-06-25</td>
                                            <td>test patient</td>
                                            <td>P102</td>
                                            <td></td>
                                            <td> <a href="/index.php/core/prescription/view/id/1"
                                                    class="btn bg-teal btn-sm ">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2017-06-25</td>
                                            <td>test patient</td>
                                            <td>P102</td>
                                            <td></td>
                                            <td> <a href="/index.php/core/prescription/view/id/2"
                                                    class="btn bg-teal btn-sm ">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>2017-06-25</td>
                                            <td>test patient</td>
                                            <td>P102</td>
                                            <td></td>
                                            <td> <a href="/index.php/core/prescription/view/id/3"
                                                    class="btn bg-teal btn-sm ">View</a></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
} elseif ($action == 'Doctor registration') {
?>
<div class="contant">
    <h2 style="padding: 10px"> Add Doctor Details </h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Staff Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">View Details</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane  active" id="home">
            <div class="tab-pane active">
                <form action="logo.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <fieldset>
                                <legend class="text-semibold"><b style="color:#008080">PERSONAL DETAILS:-</b>
                                </legend>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="reg_input_name" class="req">Doctor Name</label>
                                        <input class="form-control" type="text" name='dname' maxlength="11"
                                            autocomplete="off" aria-describedby="inputGroupPrepend">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Specialization</label>
                                                <select name="pp" class="form-control">
                                                    <?php
                                        echo "<option> Select Specialization </option>";
                                        $stmt = $db->prepare("SELECT * FROM specialization1  ");
                                        $stmt->execute();
                                        $row = $stmt->fetchAll();
                                        $count = $stmt->rowCount();
                                        if ($count > 0) {
                                            foreach ($row as $use) {?>
                                                    <option value='<?php echo $use['Specialization_id'] ; ?>'>
                                                        <?php echo $use['Specialization_name'] ;?> </option>
                                                    <?php
                                            }
                                        }
                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Department</label>
                                            <select name="dd" class="form-control">
                                                <?php
                                 echo     "<option> Select Department </option>";
                                        $stmt = $db->prepare("SELECT * FROM departments  ");
                                        $stmt->execute();
                                        $row = $stmt->fetchAll();
                                        $count = $stmt->rowCount();
                                        if ($count > 0) {
                                            foreach ($row as $use) {
                                                ?>
                                                <option value='<?php echo $use['department_id'] ; ?>'>
                                                    <?php echo $use['department_name'] ;?> </option>
                                                <?php
                                            }
                                        }
                                        ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>SSN</label>
                                            <input size="30" maxlength="30" class="form-control" type="text" name='ss'
                                                autocomplete="off" aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            <input class="form-control" type="text" maxlength="13" name='contac'
                                                autocomplete="off" aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Date Of Birth</label>
                                        <div class="input-group date" id="form_date" data-target-input="nearest">
                                            <input type="text" name='bd'
                                                class="form-control form_date datetimepicker-input"
                                                data-target="#datetimepicker1" autocomplete="off"
                                                aria-describedby="inputGroupPrepend" />
                                            <div class="input-group-append" data-target="#datetimepicker1"
                                                data-toggle="form_date">
                                                <div class="input-group-text"><i class="fa fa-calendar form_date"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label>Email</label>
                                        <input size="45" maxlength="45" class="form-control" name=" emai" type="text"
                                            autocomplete="off" aria-describedby="inputGroupPrepend">
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>password</label>
                                            <input class="form-control" type="text" name='pass' maxlength="13"
                                                autocomplete="off" aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea size="45" maxlength="45" name='adres' class="form-control"
                                                autocomplete="off" aria-describedby="inputGroupPrepend"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label>Doctor Duty Type</label>
                                        <select class="form-control" 
                                            id=" Doctordetails_drshift" name="Duty">
                                            <option value="" selected="selected">Please Select</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="">Consultant Room
                                                No</label>
                                            <input class="form-control" name="room" type="text" autocomplete="off"
                                                aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Consultant Fee</label>
                                            <input class="form-control" name="money" type="text" autocomplete="off"
                                                aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>gender</label>
                                            <select class="form-control" "
                                            id=" Doctordetails_drshift" name='type'>
                                                <option value="" selected="selected">Please Select</option>
                                                <option value="Morning">Mail</option>
                                                <option value="Evening">Femail</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Date Of Joining</label>
                                        <div class="input-group date" id="form_date" data-target-input="nearest">
                                            <input type="text" name='dj'
                                                class="form-control form_date datetimepicker-input"
                                                data-target="#datetimepicker1" autocomplete="off"
                                                aria-describedby="inputGroupPrepend" />
                                            <div class="input-group-append" data-target="#datetimepicker1"
                                                data-toggle="form_date">
                                                <div class="input-group-text"><i class="fa fa-calendar form_date"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group col-sm-4">
                                        <label style="margin-bottom: 10px">image</label>
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" style="margin-top:28px; "
                                            for="customFile">Choose
                                            file</label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="text-semibold"><b style="color:#008080">DUTY TIMINGS:-</b></legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>In Time</label>
                                            <div class="input-group date" id="form_time" data-target-input="nearest">
                                                <input type="text" class="form-control form_time datetimepicker-input"
                                                    data-target="#datetimepicker1" name='inn' autocomplete="off"
                                                    aria-describedby="inputGroupPrepend" />
                                                <div class="input-group-append" data-target="#datetimepicker1"
                                                    data-toggle="form_time">
                                                    <div class="input-group-text"><i class="fa fa-clock form_time"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label>Out Time</label>
                                        <div class="input-group date" id="form_time" data-target-input="nearest">
                                            <input type="text" class="form-control form_time datetimepicker-input"
                                                data-target="#datetimepicker1" name='ouut' autocomplete="off"
                                                aria-describedby="inputGroupPrepend" />
                                            <div class="input-group-append" data-target="#datetimepicker1"
                                                data-toggle="form_time">
                                                <div class="input-group-text"><i class="fa fa-clock form_time"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label> </label>
                                        <div class="input-group">
                                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <button class="btn btn-primary  btn-block  dropdown-toggle" href="#"
                                                        id="aas" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Choose Days
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="aas">
                                                        <label style="display: block; margin:5px"> <input value="1"
                                                                name="daay[]" id="day" type="checkbox"> Sunday</label>
                                                        <label style="display: block; margin:5px"> <input value="2"
                                                                name="daay[]" id="day" type="checkbox"> Monday</label>
                                                        <label style="display: block;margin:5px"> <input value="3"
                                                                name="daay[]" id="day" type="checkbox"> Tuesday</label>
                                                        <label style="display: block;margin:5px"> <input value="4"
                                                                name="daay[]" id="day" type="checkbox">
                                                            Wednesday</label>
                                                        <label style="display: block;margin:5px"> <input value="5"
                                                                name="daay[]" id="day" type="checkbox"> Thursday</label>
                                                        <label style="display: block;margin:5px"> <input value="6"
                                                                name="daay[]" id="day" type="checkbox"> Friday</label>
                                                        <label style="display: block;margin:5px"> <input value="7"
                                                                name="daay[]" id="day" type="checkbox"> Saturday</label>
                                                    </div>


                                                </div>
                                            </nav>
                                        </div>
                            </fieldset>
                            <div class="text-center " style="margin:20px;">
                                <div class="text-center" style="display:inline-block;padding:10px">
                                    <input class="ad btn btn-success btn-lg ml-auto" type="submit" name="addoc"
                                        value="Add Doctor">
                                </div>
                                <div class="text-center" style="display:inline-block;padding:10px">
                                    <a class="sh btn btn-success btn-lg ml-auto"
                                        value="IF YOU HAVE  OUTSIDE CONSULTING">IF YOU HAVE OUTSIDE CONSULTING
                                    </a>
                                </div>
                            </div>
                            <fieldset class='hid'>
                                <legend class="text-semibold"><b style="color:#008080">OUTSIDE CONSULTING DETAILS:-</b>
                                </legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea size="45" name='dress' maxlength="45" class="form-control"
                                                autocomplete="off" aria-describedby="inputGroupPrepend"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <label> </label>
                                        <div class="input-group">
                                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <button class="btn btn-primary  btn-block  dropdown-toggle" href="#"
                                                        id="soka" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Choose Days
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="soka">
                                                        <label style="display: block; margin:5px"> <input value="1"
                                                                name="dy[]" id="dy" type="checkbox"> Sunday</label>
                                                        <label style="display: block; margin:5px"> <input value="2"
                                                                name="dy[]" id="dy" type="checkbox"> Monday</label>
                                                        <label style="display: block;margin:5px"> <input value="3"
                                                                name="dy[]" id="dy" type="checkbox"> Tuesday</label>
                                                        <label style="display: block;margin:5px"> <input value="4"
                                                                name="dy[]" id="dy" type="checkbox"> Wednesday</label>
                                                        <label style="display: block;margin:5px"> <input value="5"
                                                                name="dy[]" id="dy" type="checkbox"> Thursday</label>
                                                        <label style="display: block;margin:5px"> <input value="6"
                                                                name="dy[]" id="dy" type="checkbox"> Friday</label>
                                                        <label style="display: block;margin:5px"> <input value="7"
                                                                name="dy[]" id="dy" type="checkbox"> Saturday</label>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                            </fieldset>
                            <fieldset class='hidd'>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="" for="Doctordetails_Consulting_start">Consulting
                                                Start</label>
                                            <div class="input-group date" id="form_time" data-target-input="nearest">
                                                <input type="text" name='intim'
                                                    class="form-control form_time datetimepicker-input"
                                                    data-target="#datetimepicker1" autocomplete="off"
                                                    aria-describedby="inputGroupPrepend" />
                                                <div class="input-group-append" data-target="#datetimepicker1"
                                                    data-toggle="form_time">
                                                    <div class="input-group-text"><i class="fa fa-clock form_time"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="">Consulting End</label>
                                            <div class="input-group date" id="form_time" data-target-input="nearest">
                                                <input type="text" name='outtim'
                                                    class="form-control form_time datetimepicker-input"
                                                    data-target="#datetimepicker1" autocomplete="off"
                                                    aria-describedby="inputGroupPrepend" />
                                                <div class="input-group-append" data-target="#datetimepicker1"
                                                    data-toggle="form_time">
                                                    <div class="input-group-text"><i class="fa fa-clock form_time"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Outside
                                                Consulting Fee</label>
                                            <input size="45" maxlength="45" class="form-control" name='confee'
                                                type="text" autocomplete="off" aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Extra Fee</label>
                                            <input size="45" maxlength="45" class="form-control" name='extra'
                                                type="text" autocomplete="off" aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="text-center hiddd" style="margin:20px;">
                                <div class="text-center" style="display:inline-block;padding:10px;">
                                    <input class=" btn btn-success btn-lg ml-auto" type="submit" name="pusha"
                                        value="Add Employee Type">
                                </div>
                                <div class="text-center" style="display:inline-block;padding:10px;">
                                    <a class=" ba btn btn-success btn-lg ml-auto"
                                        value="IF YOU Do Not HAVE  OUTSIDE CONSULTING">
                                        IF YOU Do Not HAVE OUTSIDE CONSULTING
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane  " id="menu1">
            <div class="tab-pane">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Doctor Id</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Specialization </th>
                            <th scope="col"> Room No</th>
                            <th scope="col"> Consultant Fee </th>
                            <th scope="col"> In Time </th>
                            <th scope="col"> Out Time </th>
                            <th scope="col"> EDIT </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <?php

                            $stmt = $db->prepare("SELECT * FROM doctor");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                foreach ($row as $use) {
                                    $aw=$use['Consultant_Fee'];
                                    echo '  <td>' . $use['doctor_id'] . '</td>';
                                    echo '  <td>' . $use['doctor_name'] . '</td>';
                                    $sp= $use['Specialization_id'] ;
                                    $stmt = $db->prepare("SELECT * FROM specialization1 where Specialization_id = ?");
                                    $stmt->execute(array($sp));
                                    $row = $stmt->fetchAll();
                                    $count = $stmt->rowCount();
                                    if ($count > 0) {
                                        foreach ($row as $use1) {
                                        echo '  <td>' . $use1['Specialization_name'] . '</td>';
                                        }
                                    }
                                    echo '  <td>' . $use['room'] . '</td>';
                                    echo '  <td>' . $aw . '</td>';
                                    echo '  <td>' . $use['time_in'] . '</td>';
                                    echo '  <td>' . $use['time_out'] . '</td>';
                                

                            ?>
                            <td width="5%">
                                <a href=""><i class="fas fa-pen" style="margin: 5px"></i></a>
                                <a href=""><i class="fas fa-times" style="margin: 5px"></i></a>
                            </td>
                        <tr class="odd">
                            <?php
                                }
                            }
                    ?>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
} else if ($action == 'Add Patient') {
?>
<div class=" container">
    <div class="content">
        <div class="text-center">
            <h2 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">
                Sign Up Healthy Care </h2>
        </div>
        <form class="needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"
            enctype="multipart/form-data">
            <div class="col-md-12">
                <br />
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="validationCustom01">Full name</label>
                            <input type="text" class="form-control form-control-lg" id="validationCustom01"
                                aria-describedby="inputGroupPrepend" name="full" required>

                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Write a First name.
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="validationCustomUsername">Username</label>
                            <div class="input-group">

                                <input type="text" class="form-control form-control-lg" id="validationCustomUsername"
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
                            <input type="email" class="form-control form-control-lg" name="email" autocomplete="off"
                                id="inputEmail4" aria-describedby="inputGroupPrepend" required>

                            <div class="invalid-feedback">
                                Please Write a username.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="validationCustomUsername">Password</label>

                        <input type="password" class="form-control form-control-lg" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" name="pass" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Please Write a password.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="req" for="Patientregistration_mobile">Contact
                                number</label> <input type="text" class="form-control form-control-lg"
                                id="validationCustom01" aria-describedby="inputGroupPrepend" name="phone"
                                autocomplete="off" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Write a Contact Number .
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
                                <input type="text" id="simple" class="form-control form-control-lg" name="date"
                                    id="validationCustom01" aria-describedby="inputGroupPrepend" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please select a Date.
                                </div>
                            </div>
                            <div class="text-danger" id="Patientregistration_patientage_em_" style="display:none">
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="Patientregistration_sex_em_">Gender</label>
                        <select class="custom-select custom-select-lg" aria-describedby="inputGroupPrepend" name="gen"
                            id="validationCustom04" required>
                            <option value="">Please Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a Gender.
                        </div>
                        <div class="text-danger" id="Patientregistration_sex_em_" style="display:none"></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="req" for="Patientregistration_patient_type">Marital Status</label>
                            <select class="custom-select custom-select-lg" name="status"
                                aria-describedby="inputGroupPrepend" id="validationCustom04" required>
                                <option value="">Please Select</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Divorced</option>
                                <option value="4">Legally separated </option>
                                <option value="5">Widowed</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose a Marital Status.
                            </div>
                            <div class="text-danger" id="Patientregistration_patient_type_em_" style="display:none">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="inputAddress">Address </label>
                            <input type="text" class="form-control form-control-lg" name="adder"
                                aria-describedby="inputGroupPrepend" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Write a Address.
                            </div>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>


                </div>

                <br>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="save"
                            style="padding: 10px;margin-top: 20px;">Add Patient</button>
                    </div>
                </div>

            </div>
    </div>


    </form>
</div>

<?php





}elseif ($action == 'Pharmacy Item') {

?>
<div class="row">
<div class="col-md-6 depn">




<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {


            $medicine_code = $_POST['codee'];
            $stmt = $db->prepare("SELECT * FROM medicine where medicine_code=$medicine_code ");
            //$query_run= mysqli_query();
            $stmt->execute();
            $row = $stmt->fetchAll();
            $count = $stmt->rowCount();
            if ($count > 0) {
           // $row['medicine_code']
           foreach ($row as $b)
           {
         
             //$row['medicine_quantity']
          //   $row['medicine_price']
           //  $row['production_date']
           //  $row['expired_date']
           
?>


<Form action="logo.php" method="POST">
<input type="hidden" name='dd' value="<?php echo   $medicine_code; ?>">

    <h2 class="text-center">Add Medicine</h2>
    <div class="form-group">
        <label>Medicine Name</label>
        <input size="50" name='medicine_name' maxlength="50" class="form-control" type="text" value ="<?php echo $b['medicine_name'];?>">
    </div>
    <div class="form-group">
    <label>Medicine Quantity</label>
        <input size="50" name='medicine_quantity' maxlength="50" class="form-control" type="text"value ="<?php echo $b['medicine_quantity'];?>">

           
       
    </div>
    <div class="form-group">
        <label>Medicine Price</label>
        <input class="form-control" type="text" name="medicine_price" maxlength="35"value ="<?php echo $b['medicine_price'];?>">
    </div>
    <div class="form-group">
        <label>Production Date</label>
        <input type="date"size="45" maxlength="45" class="form-control" name="production_date" type="text"value ="<?php echo $b['production_date'];?>">
    </div>
    <div class="form-group">
        <label>Expired Date</label>
        <input type="date"size="45" maxlength="45" class="form-control" name="expired_date" type="text"value ="<?php echo $b['expired_date'];?>">
    </div>
    <div class="text-right">
            <input class="btn btn-success btn-lg  btn-block" type="submit" name="badawy"value="Update Mdeicine">
        </div>

<?php
           }

}
}
}
else {


?>

    <Form action="logo.php" method="POST">
    
        <h2 class="text-center">Add Medicine</h2>
        <div class="form-group">
            <label>Medicine Name</label>
            <input size="50" name='medicine_name' maxlength="50" class="form-control" type="text">
        </div>
        <div class="form-group">
        <label>Medicine Quantity</label>
            <input size="50" name='medicine_quantity' maxlength="50" class="form-control" type="text">

               
           
        </div>
        <div class="form-group">
            <label>Medicine Price</label>
            <input class="form-control" type="text" name="medicine_price" maxlength="35">
        </div>
        <div class="form-group">
            <label>Production Date</label>
            <input type="date"size="45" maxlength="45" class="form-control" name="production_date" type="text">
        </div>
        <div class="form-group">
            <label>Expired Date</label>
            <input type="date"size="45" maxlength="45" class="form-control" name="expired_date" type="text">
        </div>





        <div class="text-right">
            <input class="btn btn-success btn-lg  btn-block" type="submit" name="martina"value="Add Medicine">
        </div>

<br>


        <div class="text-right">
            <input class="btn btn-success btn-lg  btn-block" type="submit" name="amr"value="Delete Mdeicine">
        </div>
        <br>

      
<br>
</form>
<?php
}
?>

<form action ="<?php echo'admin.php?action=Pharmacy Item ';?> "method="POST">
<br>
<br>
<input type ="text" name= "codee" placeholder ="Enter medicine code to search"class="form-control">
<br>


<input type="submit" name="search" value=" Search Medicine"class="btn btn-success btn-lg  btn-block">
</form>

<?php


       





?>




<?php


} else if ($action == 'SMS') {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Bulk SMS</h4>
            </div>
            <div class="">
                <form action="logo.php" method="POST">
                    <div class="row">
                        <div class="col-md-5" id="phone">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" name="phone" placeholder="Phone number" type="text">
                            </div>
                        </div>
                        <div class="col-md-2" id="or">
                            <label for="reg_input"> </label><br>
                            <b>
                                <center>OR</center>
                            </b>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="reg_input">SMS For</label>
                                <select class="form-control" data-required="true" name="Smsnotification[sms_for]"
                                    id="Smsnotification_sms_for">
                                    <option value="prompt">Please select</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-5" id="patient" style="display:none">
                            <div class="form-group">
                                <label for="reg_input">SMS For Patients In</label>
                                <select class="form-control" data-required="true" name="Smsnotification[patient]"
                                    id="Smsnotification_patient">
                                    <option value="" selected="selected">Please select</option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-3" id="staff" style="display:none">
                            <div class="form-group">
                                <label for="reg_input">SMS For Staff In</label>
                                <select class="form-control" data-required="true" name="Smsnotification[staff]"
                                    id="Smsnotification_staff">
                                    <option value="prompt">Please select</option>

                                </select>

                            </div>
                            <div class="col-md-3" id="doctor" style="display:none">
                                <div class="form-group">
                                    <label for="reg_input">SMS For Doctors In</label>
                                    <select class="form-control" data-required="true" name="Smsnotification[doctor]"
                                        id="Smsnotification_doctor">
                                        <option value="prompt">Please select</option>
                                        <option value="1">Common to all</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3" id="department" style="display:none">
                                <div class="form-group">
                                    <label for="reg_input">Department</label>
                                    <select class="form-control" name="Smsnotification[hospitaldepartmentid]"
                                        id="Smsnotification_hospitaldepartmentid">
                                        <option value="">Select Department</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3" id="designation" style="display:none">
                                <div class="form-group">
                                    <label for="reg_input">Designation</label>
                                    <select class="form-control" name="Smsnotification[designationid]"
                                        id="Smsnotification_designationid">
                                        <option value="">Select Designation</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3" id="specialization" style="display:none">
                                <div class="form-group">
                                    <label for="reg_input">Specialization</label>
                                    <select class="form-control" name="Smsnotification[doctorspecializationid]"
                                        id="Smsnotification_doctorspecializationid">
                                        <option value="">Select Designation</option>


                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row" id="message">
                            <div class="form-group col-md-5">
                                <label for="reg_input_name" class="req">Message</label>
                                <textarea rows="2" cols="50" class="form-control" name="msg"
                                    placeholder="Enter your message here.."></textarea>
                            </div>
                            <div class=" col-md-2">
                            </div>
                            <div class="form-group  col-md-5 " style="margin-top:40px ">
                                <div class=" text-Right">
                                    <button class="btn btn-primary btn-block" type="submit" name="sms">Send SMS</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div><!-- content -->
</div>











<?php
}

echo '</main>';
?> <?php
    //End Dashboard to Admin page
    include("footer.php");
    ?>