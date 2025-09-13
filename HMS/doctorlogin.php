<?php

session_start();

include("include/connection.php");

if(isset($_POST['login'])) {

    $uname= $_POST['uname'];
    $password= $_POST['pass'];

    $error = array();

    $q = "SELECT * FROM doctors WHERE username='$uname' AND password = '$password'";
    $qq= mysqli_query($connect,$q);

    $row = mysqli_fetch_array($qq);

    if(empty($uname)) {
        $error['login'] = "Enter Username";
    }else if(empty($password)) {
        $error['login'] = "Enter Password";
    }else if($row['status'] == "Pending") {
        $error['login'] = "Please Wait for the admin to confirm";
    }else if($row['status'] == "Rejected") {
        $error['login'] = "Try again Later";
    }

    if(count($error)==0) {
       
        $query = "SELECT * FROM doctors WHERE username='$uname' AND password = '$password'";

        $res= mysqli_query($connect,$query);

        if(mysqli_num_rows($res)) {

            echo "<script>alert('done')</script>";

            $_SESSION['doctor']=$uname;

            header("Location:doctor/index.php");
        }else{
            echo "<script>alert('Invalid Account')</script>";
        }
    } 
}

 if (isset($error['login'])) {
     $l = $error['login'];

     $show= "<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
    $show = "";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Doctor Login Page</title>
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
                    <h5 class="card-title text-center my-2">Doctors Login</h5>

                    <div>
                        <?php echo $show; ?>
                    </div>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off">
                        </div>

                        <input type="submit" name="login" class="btn btn-warning" value="Login">

                        <p>I don't have an account <a href="apply.php">Apply Now!!!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
</html>