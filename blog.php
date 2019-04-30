<!DOCTYPE>
<?php require_once("include/db.php") ?>
<?php require_once("include/sessions.php") ?>
<?php require_once("include/functions.php") ?>

<html>
    <head>
        <title>Blog Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/mystyles.css">
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
                <div class="collapse navbar-collapse" id="collapse">
                    <ul class="nav navbar-nav">
                        
                        <li><a class="active" href="blog.php"> Blog</a></li>
                     
                    </ul>
                    <form aciton="blog.php" class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="Search">
                        </div>
                        <button class="btn btn-default" name="SearchButton">Go</button>
                    </form>
                </div>
        </nav>
        <div class="container">
            <div class="blog-header">
        <h2>Live.Work.Create</h2>
            </div>
            <div class="row">
               <div class="col-sm-8"><!-- Main Area-->
                    <?php
                    if (isset($_GET["SearchButton"])) {
                        $Search = $_GET["Search"];
                        $viewQuery = "SELECT * FROM admin_panel
                                    WHERE date_time LIKE '%$Search%'
                                    OR title LIKE  '%$Search%' 
                                        OR post LIKE '%$Search%'";
                    } else {
                       
                    $viewQuery = "SELECT * FROM admin_panel ORDER BY date_time desc";}
                    
                    $Execute = mysqli_query($Connection, $viewQuery);
                    while ($DataRows = mysqli_fetch_array($Execute)) {
                        $Postid = $DataRows["id"];
                        $dateTime = $DataRows["date_time"];
                        $Title = $DataRows["title"];
                        $Category = $DataRows["category"];
                        $author = $DataRows["author"];
                        $Image = $DataRows["image"];
                        $Post = $DataRows["post"];
                     ?>
                        <div class="blogpost thumbnail">
                                <img class="img-responsive img-rounded" src="Upload/<?php echo $Image; ?>" >
                            <div class="caption">
                                <h1 id="heading"><?php echo htmlentities($Title) ?></h1>
                                <p class="description">Category: <?php echo htmlentities($Category); ?>
                                    Published on <?php echo htmlentities($dateTime) ?></p>
                                <p class="post"><?php
                                if (strlen($Post) > 150) {
                                    $Post = substr($Post, 0, 150) .'....';
                                }
                                echo htmlentities($Post);
                                ?></p>
                            </div>
                            <a href="fullpost.php?id=<?php echo $Postid; ?>"><span class="btn btn-info">Read More &rsaquo;&rsaquo; </span> </a>
                   
                        </div>
                    <?php } ?>
                    
                  </div><!-- Main area end -->
            
                        <div class="col-sm-offset-1 col-sm-3">
                            <h2>About Us</h2>
                            <p>A new reader lands on your page and wants to know more about you or your blog? Super! Lets make it as easy as possible for them to know why they're there: Yep! Put a mini bio near the top of the sidebar.</p>
                        </div>
                        </div>
            <div class="footer-copyright text-center py-3"> &copy;2018 Copyright:
      <a href="http://localhost/CMS%20Blog/dashboard.php"> CMS Blog.Inc</a>
    </div>
            </div>
    </body>
</html>
