<!DOCTYPE>
<?php require_once("include/db.php") ?>
<?php require_once("include/sessions.php") ?>
<?php require_once("include/functions.php") ?>
<?php
confirmlogin(); 
?>
    <?php
if (isset($_POST["Submit"])) {
    $Username = $_POST["username"];
    $Password = $_POST["password"];
    $ConfirmPassword = $_POST["confirmpassword"];
    date_default_timezone_set("Asia/Kolkata");
    $currentTime = time();
    $dateTime = strftime("%B %d, %Y %H:%M:%S", $currentTime);
    $dateTime;
    $admin = "Kartik Nayak";
    if (empty(($Username) || ($Password) || ($ConfirmPassword))) {
        $_SESSION["errorMessage"] = "All fields must be filled";
        redirect_to("manageusers.php");
    }
 elseif (($Password) != ($ConfirmPassword)) {
    $_SESSION["errorMessage"] = "Passwords do not match";
    redirect_to("manageusers.php");
} else {
    global $Connection;
    $query = "INSERT INTO registration(date_time,username,password)
    VALUES('$dateTime','$Username','$Password')";
    $Execute = mysqli_query($Connection, $query);
    if ($Execute) {
        $_SESSION["successMessage"] = "User added successfully";
        redirect_to("manageusers.php");
    } else {
        $_SESSION["errorMessage"] = "Adding Username failed";
        redirect_to("manageusers.php");
    }
}
}
?>
<html>
    <head>
        <title>Users</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/adminstyles.css">
        <style>
            .FieldInfo{
                color: rgb(59, 58, 54);
                font-family : Bitter, Georgia,"Times New Roman",Times,serif;
                font-size:1.2em;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <h1>CMS Blog</h1>
                    <ul id="sideBar" class="nav nav-pills nav-stacked">
                        <li><a href="dashboard.php"><span class="glyphicon glyphicon-th "></span>&nbsp; Dashboard</a></li>
						<li><a href="admin.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Authors</a></li>
                        <li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt "></span>&nbsp; New Post</a></li>
                        <li ><a href="categories.php"><span class="glyphicon glyphicon-tags "></span>&nbsp; Sections</a></li>
                        <li  class="active"><a href="manageusers.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Manage Users</a></li>.                
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp; Logout</a></li>
                    </ul>
                </div><!-- Sidebar done-->
                <div class="col-sm-10">
                    <h2>Sign Up</h2>
<?php
echo errorMessage();
echo successMessage();
?>
                    <div>
                        <form action="manageusers.php" method="post">
                            <fieldset>
                                <div class="form-group">

                                    <label for="username"><span class="FieldInfo">Username: </span></label>
                                    <input class="form-control " type="text" name="username" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password"><span class="FieldInfo">Password: </span></label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                </div>  
                                <div class="form-group">
                                    <label for="confirmpassword"><span class="FieldInfo">Confirm Password: </span></label>
                                    <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                                </div>    
                                <input class="btn btn-primary " type="Submit" name="Submit" value="Sign Up">
                            </fieldset>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>No.</th>
                                <th>Date & Time</th>
                                <th>Admin</th>
  
                                <th>Action</th>
                            </tr>
<?php
$viewQuery = "SELECT * FROM registration ORDER BY date_time desc";
$result = mysqli_query($Connection, $viewQuery);
$no = 0;
while ($DataRows = mysqli_fetch_array($result)) {
    $id = $DataRows["id"];
    $date_time = $DataRows["date_time"];
    $name = $DataRows["username"];
  
    $no++;
    ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $date_time ?></td>
                                    <td><?php echo $name ?></td>
                                    
                                    <td> <a href="deleteadmin.php?id=<?php echo $id ?>"><span class="btn btn-danger">Delete</span></a></td>

                                </tr>
<?php } ?>

                        </table>

                    </div>
                </div><!-- Ending main space-->
            </div><!-- Ending row -->
        </div><!-- Ending container space-->


        <!-- Copyright -->
        <div id="Footer">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">&copy; 2019 Copyright:
                <a href="http://localhost/CMS%20Blog/dashboard.php"> CMS Blog.Inc</a>
            </div>

            <!-- Footer -->
        </div>

    </body>
</html>