<!DOCTYPE>
<?php require_once("include/db.php") ?>
<?php require_once("include/sessions.php") ?>
<?php require_once("include/functions.php") ?>
<?php
if (isset($_POST["Submit"])) {
    $Username = $_POST["username"];
    $Password = $_POST["password"];
    $admin = "Kartik Nayak";
    if (empty(($Username) || ($Password))) {
        $_SESSION["errorMessage"] = "All fields must be filled";
        redirect_to("login.php");
    }
    else {
       $found =login_attempt($Username,$Password);
       $_SESSION["user_id"] =$found["id"];
        $_SESSION["username"] =$found["username"];
       if($found){
           $_SESSION["successMessage"]="Hey,   {$_SESSION["username"]}";
	Redirect_to("dashboard.php");
       }
       else{
           $_SESSION["errorMessage"]="Login Unsucccesfull";
	Redirect_to("login.php");
       }
    }

}  
?>
<html>
    <head>
        <title>Login</title>
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
               
                <div class="col-sm-offset-4 col-sm-4">
                    <h2>Login</h2>
<?php
echo errorMessage();
echo successMessage();
?>
                    <div>
                        <form action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">

                                    <label for="username"><span class="FieldInfo">Username: </span></label>
                                    <input class="form-control " type="text" name="username" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password"><span class="FieldInfo">Password: </span></label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                                </div>    
                                <input class="btn btn-primary " type="Submit" name="Submit" value="Log In">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- Ending row -->
        </div><!-- Ending container space-->


        <!-- Copyright -->
        <div id="Footer">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">&copy; 2018 Copyright:
                <a href="http://localhost/CMS%20Blog/dashboard.php"> CMS Blog.Inc</a>
            </div>

            <!-- Footer -->
        </div>

    </body>
</html>