<?php
$navbar ='';
$pagetitle = "Sign Up";
include "inti.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pname = $_POST['full'];
    $u_name = $_POST['user'];
    $u_email = $_POST['email'];
    $u_pass = $_POST['pass'];
    $u_gender = $_POST['gen'];
    $u_phone = $_POST['phone'];
    $u_address = $_POST['adder'];
    $u_birth = $_POST['date'];
    $u_status = $_POST['status'];
    $id = rand(1, 1000000);
    $sn = rand(5659, 10009999);
    $stmt = $db->prepare("SELECT patient_id FROM  patient WHERE  patient_id = ?  ");
    $stmt->execute(array($id));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        header("location: SignUp.php");
    } else {
        if(isset($_POST['save']))
        {
        $prfile=  time() . '_' .  $_FILES['image']['name'];
        $tar= 'image/'.$prfile ;
        move_uploaded_file($_FILES['image']['tmp_name'],$tar);
        $stmt = $db->prepare("INSERT INTO 
        patient(patient_id, patient_name,  username, email, passwor, gender,   phone_number,  ddress, birth_date,ssn, Marital, img )
       VALUES( ?,?, ?, ? , ?, ?, ?, ?, ?, ?,? , ?  ) ");
        $stmt->execute(array($id, $pname, $u_name, $u_email, $u_pass,  $u_gender,  $u_phone, $u_address, $u_birth, $sn, $u_status , $prfile ));
        header("location: Login.php"); 
    }
         
    }
} 

?>
<div class=" container">
    <div class="content">
        <div class="text-center">
            <div> <img alt="" class="img-rounded" src="<?php echo $im ?>ic.png" width="99px" style="margin: 5px 0px "
                    height="100px">
                <h2 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: black;">
                    Sign Up Healthy Care </h2>
            </div>
        </div>
        <form class="needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
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
                                <input type="date" class="form-control form-control-lg" name="date"
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
                            style="padding: 10px;margin-top: 20px;">Sign in</button>
                    </div>
                    <div class="form-group col-sm-4">
                        <a href="Login.php "
                            style=" float: right; margin: 10px; padding: 10px; font-family:'Times New Roman', Times, serif; font-size: 20px;">
                            If you have an Acount click here </a>
                    </div>
                </div>

            </div>
    </div>


    </form>
</div>
<?php include "footer.php" ?>