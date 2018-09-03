<?php

session_start();

$_SESSION['logout'] =  "<p>You have been logged out.</p>";
header("Location: Lab07-Login.php");

?>