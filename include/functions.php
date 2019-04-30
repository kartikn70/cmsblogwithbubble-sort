
<?php require_once("db.php") ?>
<?php require_once("sessions.php") ?>
<?php
function redirect_to($new_location){
header("Location:".$new_location) ; 
exit;
}
function login_attempt($Username,$Password){
    $Connection = mysqli_connect('localhost','kartik','Extremis70','cms');
    $query =" SELECT * FROM registration 
             WHERE username='$Username' AND password='$Password'";
    $execute= mysqli_query($Connection, $query);
    if($admin= mysqli_fetch_assoc($execute)){
        return $admin;
    }
    else{
        null;
    }
}
function login(){
    if(isset($_SESSION["user_id"])){
        return true;
    }
}
    function confirmlogin(){
    if(!login()){
        redirect_to("login.php");
    }
}
?>
