<?php

include("include/connection.php");

if(isset($_POST['create'])) {

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_pass= $_POST['con_pass'];

    $error = array();

    if(empty($fname)) {
        $error['ac'] = "Enter Firstname";
    } else if(empty($sname)) {
        $error['ac'] = "Enter Surname";
    }else if(empty($uname)) {
        $error['ac'] = "Enter Username";
    }else if(empty($email)) {
        $error['ac'] = "Enter Email Address";
    }else if(empty($gender)) {
        $error['ac'] = "Select Your Gender";
    }else if(empty($phone)) {
        $error['ac'] = "Enter Phone Number";
    }else if(empty($country)) {
        $error['ac'] = "Select Country";
    }else if(empty($password)) {
        $error['ac'] = "Enter Password";
    }else if($con_pass != $password) {
        $error['ac'] = "Both Password do not match";
    }

    if(count($error)==0) {

        $query = "INSERT INTO patient(firstname,surname,username,email,gender,phone,country,password,date_reg,profile) VALUES
        ('$fname','$sname','$uname','$email','$gender','$phone','$country', '$password',NOW(),'patient.jpg')";

        $res = mysqli_query($connect,$query);

        if($res) {

            echo "<script>alert('You have Successfully Applied')</script>";

            header("Location: patientlogin.php");
        }else{

            echo "<script>alert('Failed')</script>";

        }
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
    </head>
    <body style = "background-image: url(img/hospital.jpg);background-size: cover;
    background-repeat: no-repeat;">

    <?php
        include("include/header.php");
    ?>

    <div class="container-fluid my-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h5 class="card-title text-center my-2">Create Account</h5>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter confirm password">
                        </div>

                        <input type="submit" name="create" value="Create Account" class="btn btn-warning">
                        <p> I already have an account <a href="patientlogin.php">Click here</a></p> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

        
    </body>
</html>