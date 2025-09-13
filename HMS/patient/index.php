<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Patient Dashboard</title>
    </head>
    <body>
        <?php
        include("../include/header.php");
        include("../include/connection.php");
        ?>
        <div class ="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style = "margin-left : -30px;">
                        <?php
                        include("sidenav.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <h5 class="my-3">Patient Dashboard</h5>


                        <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                                     
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Profile</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="profile.php" ><i class ="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                                     
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                <h5 class="text-white my-4">Book Appointment</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="appointment.php" ><i class ="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                                     
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                <h5 class="text-white my-4">My Invoice</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="invoice.php" ><i class ="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <?php
                           if(isset($_POST['send'])) {

                              $title = $_POST['send'];
                              $message= $_POST['message'];

                              if(empty($title)) {

                              }else if(empty($message)) {

                              }else{

                                $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

                                $res = mysqli_query($connect,$query);

                                if($res) {

                                    echo "<script>alert('You have sent Your Report')</script>";
                                }
                              }
                           }
                        ?>
                        <div class ="container-fluid my-3">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card text-white bg-dark">
                                        <div class="card-body">
                                            <h5 class="card-title text-center my-2">Send A Report</h5>


                                            <form method="post">
                                                <div class="mb-3">
                                                    <label >Title</label>
                                                    <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter Title of the report">
                                                </div>

                                                <div class="mb-3">
                                                    <label >Massage</label>
                                                    <input type="text" name="message" class="form-control" autocomplete="off" placeholder="Enter Message">
                                                </div>

                                                <input type="submit" name="send" class="btn btn-success my-2" value="Send Report">

                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
     
       

    </body>
</html>