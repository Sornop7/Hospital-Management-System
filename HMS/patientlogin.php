<?php

session_start();

include("include/connection.php");

if(isset($_POST['login'])) {

    $uname= $_POST['uname'];
    $pass= $_POST['pass'];



    if(empty($uname)) {
        $error['login'] = "Enter Username";
    }else if(empty($pass)) {
        $error['login'] = "Enter Password";
    }else{
        $query = "SELECT * FROM patient WHERE username='$uname' AND password = '$pass'";

        $res= mysqli_query($connect,$query);

        if(mysqli_num_rows($res)) {

            header("Location:patient/index.php");

            $_SESSION['patient'] = $uname;
        }else{
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}

    



?>


<!DOCTYPE html>
<html>
    <head>
        <title>Patient Login Page</title>
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
                    <h5 class="card-title text-center my-2">Patient Login</h5>


                    <form method="post">
                        <div class="mb-3">
                            <label >Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="mb-3">
                            <label >Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">

                        <p>I don't have an account <a href="account.php">Click here.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>