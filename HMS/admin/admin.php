<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin </title>
    </head>
    <body>
        <?php
         include("../include/header.php");

        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left : -30px;">
                        <?php

                            include("sidenav.php");
                            include("../include/connection.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class= "text-center">All Admin</h5>

                                    <?php
                                    $ad=$_SESSION['admin'];
                                    $query = "SELECT * FROM admin WHERE username !='$ad'AND ID!=1";
                                    $res = mysqli_query($connect,$query);

                                    $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th style='width : 10%;''>Action</th>
                                    </tr> 

                                    ";
                                    if(mysqli_num_rows($res) < 1){
                                        $output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";

                                    }

                                    while($row = mysqli_fetch_array($res)) {
                                        $id = $row[0];
                                        $username = $row['username'];
                                        //!-->Concatenation assignment	$txt1 .= $txt2	Appends $txt2 to $txt1
                                        $output .=" 
                                        <tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                            <a href='?action=delete&id= $id' class='btn btn-warning'>Remove</a>
                                        </td>
                                        ";
                                    }
                                    
                                    $output .="
                                    </tr>

                                    </table>
                                    ";

                                    echo $output;



                                    if(isset($_GET['id'])) {
                                        $id= $_GET['id'];

                                        $query = "DELETE FROM admin WHERE id='$id'";
                                        mysqli_query($connect,$query);
                                    }
                                    
                                     ?>   


                                </div>
                                <div class="col-md-6">
                                    <?php

                                    if(isset($_POST['add'])) {
                                        $uname = $_POST['uname'];
                                        $pass = $_POST['pass'];
                                        $image = $_FILES['img']['name'];

                                        $error = array();

                                        if(empty($uname)) {
                                            $error['u'] = "Enter Admin Username";
                                        }else if(empty($pass)) {
                                            $error['u'] = "Enter Admin Password";
                                        }else if(empty($image)) {
                                            $error['u'] = "Add Admin Picture";
                                        }

                                        if(count($error) ==0) {
                                            $q ="INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')";

                                            $result = mysqli_query($connect,$q);

                                            if($result) {

                                                move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                            }else{

                                            }
                                        }
                                    }


                                    if(isset($error['u'])) {
                                        $er = $error['u'];

                                        $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                    }else{
                                        $show = "";
                                    }//The enctype attribute specifies how the form-data should be encoded when submitting it to the server
                                    //Textual form controls—like <input>s, <select>s, and <textarea>s—are styled with the .form-control class. Included are styles for general appearance, focus state, sizing, and more.
                                    //The .form-group class is the easiest way to add some structure to forms. It provides a flexible class that encourages proper grouping of labels, controls, optional help text, and form validation messaging. By default it only applies margin-bottom, but it picks up additional styles in .form-inline as needed. Use it with <fieldset>s, <div>s, or nearly any other element.
                                    ?>
                                <h5 class= "text-center">Add Admin</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $show; ?>
                                    </div>
                                    <div class="from-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="from-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>

                                    <div class="from-group">
                                        <label>Add Admin Picture</label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <input type="submit" name="add" value="Add New Admin" class="btn btn-success">
                                </form>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>