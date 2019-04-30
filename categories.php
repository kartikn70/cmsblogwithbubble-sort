<?php require_once("include/db.php") ?>
<?php require_once("include/sessions.php") ?>
<?php require_once("include/functions.php") ?>
<?php
confirmlogin(); 
?>
<?php
if(isset($_POST["Submit"])){
      $Category= $_POST["Category"];
      date_default_timezone_set("Asia/Kolkata");
      $currentTime = time();
      $dateTime = strftime("%B %d, %Y %H:%M:%S",$currentTime);
      $dateTime;
      $admin="Kartik Nayak";
      if(empty($Category)){
      $_SESSION["errorMessage"]="All fields must be filled";
      redirect_to("categories.php");
    }elseif(strlen($Category)>25){
    $_SESSION["errorMessage"]="Name must be below 25 characters";
    redirect_to("categories.php");
  }else {
    global $Connection;
    $query="INSERT INTO categories(date_time,name,author)
    VALUES('$dateTime','$Category','$admin')";
    $Execute= mysqli_query($Connection,$query);
    if($Execute){
    $_SESSION["successMessage"] ="Section added successfully";
    redirect_to("categories.php");
  }else{
    $_SESSION["errorMessage"] ="Adding Section failed";
    redirect_to("categories.php");
  }
  }
}

 ?>
<!DOCTYPE>
<html>
  <head>
    <title>Sections</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/adminstyles.css">
    <style>
    .FieldInfo{
      color: rgb(59, 58, 54);
      font-family: Bitter, Georgia,"Times New Roman",Times,serif;
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
            <li class="active" ><a href="categories.php"><span class="glyphicon glyphicon-tags "></span>&nbsp; Sections</a></li>
            <li><a href="manageusers.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Manage Users</a></li>
            <li><a href="blog.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Preview</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp; Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-10">
          <h2>Sections</h2>
          <?php
          echo errorMessage();
          echo successMessage();
           ?>
          <div>
            <form action="categories.php" method="post">
              <fieldset>
                <div class="form-group">

                <label for="cat_name"><span class="FieldInfo">Name : </span></label>
                <input class="form-control" type="text" name="Category" id="cat_name" placeholder="Name">
              </div>

              <input class="btn btn-primary " type="Submit" name="Submit" value="Add new Section">
              </fieldset>
            </form>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <tr>
                  <th>No.</th>
                  <th>Date & Time</th>
                  <th>Section Name</th>
                  <th>Author</th>
                  <th>Actions</th>
              </tr>
              <?php

                $viewQuery = "SELECT * FROM categories ORDER BY date_time desc";
                $result = mysqli_query($Connection,$viewQuery);
                $no = 0;
                while ($DataRows=mysqli_fetch_array($result)) {
                  $id=$DataRows["id"];
                  $date_time=$DataRows["date_time"];
                  $name=$DataRows["name"];
                  $author=$DataRows["author"];
                  $no++;
                ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $date_time ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $author ?></td>
                <td><a href="deletecategory.php?id=<?php echo $id ?>"><span class="btn btn-danger">Delete</span></a></td>


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

