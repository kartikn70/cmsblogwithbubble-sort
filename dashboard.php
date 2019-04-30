<!DOCTYPE>
<?php require_once("include/sessions.php") ?>
<?php require_once("include/functions.php") ?>
<?php require_once("include/db.php") ?>
<?php
confirmlogin(); 
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/adminstyles.css">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="naver-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="blog.php">
                        <font color="#6ed3cf"> <h1 class="head" style="margin-top:-10px">CMS Blog</h1></font>
                    </a>
                </div>
          
                   
                
        </nav> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <ul id="sideBar"class="nav nav-pills nav-stacked">
                        <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-th "></span>&nbsp; Dashboard</a></li>
						<li><a href="admin.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Authors</a></li>
                        <li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt "></span>&nbsp; New Post</a></li>
                        <li><a href="categories.php"><span class="glyphicon glyphicon-tags "></span>&nbsp; Sections</a></li>
                        <li><a href="manageusers.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Manage Users</a></li>
                        <li><a href="blog.php"><span class="glyphicon glyphicon-user "></span>&nbsp; Preview</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out "></span>&nbsp; Logout</a></li>
                    </ul>
                </div><!-- Sidebar done-->
                <div class="col-sm-10">
                        <div><?php echo errormessage();
                        echo successMessage();
                        ?></div>
                    <h2>Dashboard</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Post Title</th>
                                <th>Date & Time</th>
                                <th>Author</th>
                                <th>Section</th>
                                <th>Action</th>
                                <th>Details</th>
                            </tr>   
                            <?php
                            $viewQuery ="SELECT * FROM admin_panel ORDER BY date_time desc;";
                            $Execute = mysqli_query($Connection, $viewQuery);
                            $no=0;
                    while ($DataRows = mysqli_fetch_array($Execute)) {
                                   $Postid = $DataRows["id"];
                                    $dateTime = $DataRows["date_time"];
                                    $Title = $DataRows["title"];
                                    $Category = $DataRows["category"];
                                    $author = $DataRows["author"];
                                    $Image = $DataRows["image"];
                                    $Post = $DataRows["post"];
                                    $no++;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td style="color:#6ed3cf"><?php if(strlen($Title)>150){
                                $Title= substr($Title, 0,150).'...';}
                                    echo $Title; ?></td>
                                <td><?php echo $dateTime; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><?php echo $Category; ?></td>  
                                <td><a href="editpost.php?Edit=<?php echo $Postid ?>"><span class="btn btn-warning">Edit</span></a>
                                    <a href="deletepost.php?delete=<?php echo $Postid ?>" target="_blank"><span class="btn btn-danger">Delete</span></a></td>
                                <td><a href="fullpost.php?id=<?php echo $Postid  ?>"><span class="btn btn-primary">Preview</span></a></td>
                                
                                
                            </tr>
                            
                    <?php } ?>
                                
                            
                            
                        </table>
                    </div>
                  
                    
                </div><!-- Ending main space-->
            </div><!-- Ending row -->
        </div><!-- Ending container space-->
        <div id="Footer">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">&copy; 2018 Copyright:
                <a href="http://localhost/CMS%20Blog/dashboard.php"> CMS Blog.Inc</a>
            </div>
            <!-- Copyright -->
            <!-- Footer -->
        </div>

    </body>
</html>
