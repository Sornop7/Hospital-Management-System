<?php
session_start();

include("include/connection.php");

if(isset($_POST['login']))  {

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if(empty($username))  {
        $error['admin'] = "Enter Username";
    }else if(empty($password)){
        $error['admin'] = "Enter Password";
    }

    if(count($error)==0)  {

        $query = "SELECT * FROM admin  WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have Login As an Admin')</script>";

            $_SESSION['admin'] = $username;

            header("Location: admin/index.php");
            exit();

        }else{
            echo "<script>alert('Invalid Username or Password')</script>";

        }
        
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
</head>
<body style="background-image: url(img/hospital.jpg); background-repeat: no-repeat; background-size: cover;">
    <?php
    include("include/header.php");
    ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-dark">
                <img src="img/login.jpg" class="card-img-top" alt="Login Image">
                <div class="card-body">
                    <form method="post" class="my-2">
                        <div>
                            <?php
                            if(isset($error['admin'])) {
                                $sh = $error['admin'];
                                //$show = "<h4 class='alert alert-danger'>$sh</h4>";
                            } else {
                                $show = "";
                            }
                            echo $show;
                            ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="color: white;">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" style="color: white;">Password</label>
                            <input type="password" name="pass" class="form-control">
                        </div>

                        <input type="submit" name="login" class="btn btn-success" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



