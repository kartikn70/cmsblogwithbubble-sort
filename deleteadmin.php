<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php require_once("include/db.php"); ?>
<?php
confirmlogin(); 
?>
<?php
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $Connection;
$Query="DELETE FROM registration WHERE id='$IdFromURL';";  
$Execute=mysqli_query($Connection,$Query);
if($Execute){
	$_SESSION["successMessage"]="Admin Deleted Successfully";
	Redirect_to("manageusers.php");
	}else{
	$_SESSION["errorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("manageusers.php");
		
	}
  
}
?>