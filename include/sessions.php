<?php
session_start();
function errorMessage(){
  if(isset($_SESSION["errorMessage"])){
    $Output="<div class =\"alert alert-danger\">";
    $Output.=htmlentities($_SESSION["errorMessage"]);
    $Output.="</div>";
    $_SESSION["errorMessage"]=null;
    return $Output;

  }
}
function successMessage(){
  if(isset($_SESSION["successMessage"])){
    $Output="<div class =\"alert alert-success\">";
    $Output.=htmlentities($_SESSION["successMessage"]);
    $Output.="</div>";
    $_SESSION["successMessage"]=null;
    return $Output;

  }
}
 ?>
