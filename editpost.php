<!DOCTYPE>
<?php require_once("include/db.php") ?>
<?php require_once("include/sessions.php") ?>
<?php require_once("include/functions.php") ?>
<?php
confirmlogin(); 
?>
<?php
if (isset($_POST["Submit"])) {
    global $Connection;
    $Title = mysqli_real_escape_string($Connection, $_POST["Title"]);
    $Category = mysqli_real_escape_string($Connection, $_POST["Category"]);
    $Post = mysqli_real_escape_string($Connection, $_POST["Post"]);
    $Image = $_FILES["Image"]["name"];
    $Target = "Upload/" . basename($_FILES["Image"]["name"]);
    $admin = "Kartik Nayak";
    date_default_timezone_set("Asia/Karachi");
    $currentTime = time();
    $dateTime = strftime("%B %d, %Y %H:%M:%S", $currentTime);
    $dateTime;
    if (empty($Title)) {
        $_SESSION["errorMessage"] = "Title cannot be empty";
        redirect_to("addnewpost.php");
    } elseif (strlen($Title) < 2) {
        $_SESSION["errorMessage"] = "Title must be at-least 2 characters";
        redirect_to("addnewpost.php");
    } else {
        $editFromURL=$_GET['Edit'];
        $query ="UPDATE admin_panel SET date_time='$dateTime',title='$Title',category='$Category',author='$admin',image='$Image',post='$Post' WHERE id='$editFromURL'";
      
        $Execute = mysqli_query($Connection, $query) or die(mysqli_error($Connection));
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

        if ($Execute) {
            $_SESSION["successMessage"] = "Post Updated successfully";
            redirect_to("dashboard.php");
        } else {
            echo mysqli_error($Connection);
            $_SESSION["errorMessage"] = "Something went wrong!";
            redirect_to("deashboard.php");
        }
    }
}
?>
<!DOCTYPE>
<html>
    <head>
        <title>Edit Post</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/adminstyles.css">
        <style>
            .FieldInfo{
                color: rgb(59, 58, 54);
                font-family: :Bitter, Georgia,"Times New Roman",Times,serif;
                font-size:1.2em;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">

                    <ul id="sideBar"class="nav nav-pills nav-stacked">
                        <li><a href="dashboard.php"><span class="glyphicon glyphicon-th "></span>&nbsp; Dashboard</a></li>
						<li><a href="admin.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Authors</a></li>
                        <li class="active"><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt "></span>&nbsp; Posts</a></li>
                        <li> <a href="categories.php"><span class="glyphicon glyphicon-tags "></span>&nbsp; Sections</a></li>
                        <li><a href="manageusers.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Manage Users</a></li>
                        <li><a href="blog.php"><span class="glyphicon glyphicon-equalizer "></span>&nbsp; Preview</a></li>
                       
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp; Logout</a></li>
                    </ul>
                </div><!-- Sidebar done--> 
                <div class="col-sm-10">
                    <h2>Edit Post</h2>
                    <?php
                    echo errorMessage();
                    echo successMessage();
                    ?>
                    <div>
                        <?php
                        $searchQuery = $_GET["Edit"];
                        $query = "SELECT * FROM admin_panel WHERE id='$searchQuery'";
                        $Execute = mysqli_query($Connection, $query);
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $Title = $DataRows["title"];
                            $Category = $DataRows["category"];
                            $Image = $DataRows["image"];
                            $Post = $DataRows["post"];
                        }
                        ?>
                        <form action="editpost.php?Edit=<?php echo $searchQuery; ?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="title"><span class="FieldInfo">Title: </span></label>
                                    <input value="<?php echo $Title ?>"type="text " class="form-control" name="Title" id="title" placeholder="Title">
                                </div>

                                <div class="form-group">Section
                                    <span class="FieldInfo">Current Section: <?php echo $Category ?>

                                    </span>
                                    <label for="categoryselect"><span class="FieldInfo">Category: </span></label>
                                    <select class="form-control" id="categoryselect" name="Category">

<?php
$viewQuery = "SELECT * FROM categories ORDER BY date_time desc";
$result = mysqli_query($Connection, $viewQuery);

while ($DataRows = mysqli_fetch_array($result)) {
    $id = $DataRows["id"];
    $CategoryName = $DataRows["name"];
    ?>
                                            <option> <?php echo $CategoryName; ?></option>

<?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <label for="imageselect"><span class="FieldInfo">Image: </span></label>
                                    <input type="file" class="form-control" name="Image" id="imageselect">
                                </div>
                                <div class="form-group">

                                    <label for="postarea"><span class ="FieldInfo">Post: </span></label>
                                    <textarea class="form-control" name="Post" id="postarea">
<?php echo $Post ?>
                                    </textarea>
                                </div>
                                <br>
                                <input class="btn btn-primary "type="Submit" name="Submit" value="Update">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- Ending main space-->
        </div><!-- Ending row -->
        <!-- Ending container space-->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">&copy; 2019 Copyright:
            <a href="http://localhost/CMS%20Blog/dashboard.php"> CMS Blog.Inc</a>
        </div>
        <!-- Copyright -->
        <!-- Footer -->
    </div>

</body>
</html>
