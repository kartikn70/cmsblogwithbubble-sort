<?php require_once("Include/sessions.php"); ?>
<?php require_once("Include/functions.php"); ?>
<?php require_once("Include/db.php"); ?>
<?php
confirmlogin(); 
?>
<?php

    $Connection;

if($Execute){
	$_SESSION["successMessage"]="Section Deleted Successfully";
	Redirect_to("categories.php");
	}else{
	$_SESSION["errorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("categories.php");
		
	}
       
    
}

?>