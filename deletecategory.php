<?php require_once("Include/sessions.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/db.php"); ?>
<?php
confirmlogin(); 
?>
<?php
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
    $Connection;
$Query="DELETE FROM categories WHERE id='$IdFromURL' ";
$Execute=mysqli_query($Connection,$Query);
if($Execute){
	$_SESSION["successMessage"]="Section Deleted Successfully";
	Redirect_to("categories.php");
	}else{
	$_SESSION["errorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("categories.php");
		
	}
       
    
}

?>