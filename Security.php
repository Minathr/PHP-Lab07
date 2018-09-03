<?php

@session_start();

$browserDetails = $_SERVER["HTTP_USER_AGENT"];
$strong_id = "mT1iH9nR9a0" . session_id() . $browserDetails;
if( $_SESSION['authentication'] != $strong_id){
	$_SESSION['errormessage'] =  "<p>Your access has been blocked.</p>";
	header("Location: Lab07-Login.php");	
} else if( isset($_SESSION['username']) && $_SESSION['authentication'] == $strong_id ){
	
}else{
	$_SESSION['errormessage'] =  "<p>You need to log in first.</p>";
	header("Location: Lab07-Login.php");
}	
?>