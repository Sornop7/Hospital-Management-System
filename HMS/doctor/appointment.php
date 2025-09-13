<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Total Appointment</title>
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
                         <h5 class="text-center my-3">Total Appointment</h5>
                        <?php
                            $query ="SELECT * FROM appointment WHERE status='pending'";

                            $res = mysqli_query($connect,$query);

                            $output = "";


                            $output .="

                                <table class='table table-bordered'>
                                    <tr>
                                        <td>ID</td>
                                        <td>Firstname</td>
                                        <td>Surname</td>
                                        <td>Gender</td>
                                        <td>Phone</td>
                                        <td>Appointment Date</td>           
                                        <td>Symptoms</td>
                                        <td>Date Booked</td>
                                        <td>Action</td>
                                    
                                    </tr>
                                ";      
                                
                                if(mysqli_num_rows($res) <1) {

                                    $output .= "
                                        <tr>
                                        <td colspan='8' class='text-center'>No Appointment Yet</td>
                                        </tr>
                                                
                                    
                                    ";
                                }


                                while($row = mysqli_fetch_array($res)) {

                                    $output .= "
                                    
                                    <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['firstname']."</td>
                                    <td>".$row['surname']."</td>
                                    <td>".$row['gender']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$row['appointment_date']."</td>
                                    <td>".$row['symptoms']."</td>        
                                    <td>".$row['date_booked']."</td>
                                    <td>
                                        <a href='discharge.php?id=".$row['id']."'>
                                            <button class='btn btn-info'>Check</button>
                                        </a>
                                    
                                    </td> 
                                    
                                    
                                    
                                    ";
                                }

                                $output .="
                                </tr>
                                </table>
                                    
                                ";

                                echo $output;
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>