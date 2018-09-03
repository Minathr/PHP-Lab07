<?php

session_start();

$username = "";
$password = "";
$dbPassword = "";
$errormessage = "";


if( isset($_POST['username']) && trim($_POST['username']) != null ){
    $username = trim($_POST['username']);
} else {
    $errormessage = $errormessage . "<p>Please input your username.</p>";
}

if( isset($_POST['password'])){
    $password = $_POST['password'];
} else {
    $errormessage = $errormessage . "<p>Please input your password.</p>";
}

if ($errormessage == ""){
    //check the db
    //connect to db
    require_once("dbinfo.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if( mysqli_connect_errno() != 0 ){
        $_SESSION['errormessage'] = "<p>Connection to DB failed.</p>";
        header("location: Lab07-Login.php");
        die();
    }
    //retrieve the username
    $safeUsername = $mysqli->real_escape_string($username);
    $safePassword = $mysqli->real_escape_string($password);
    $saltedPassword = $safePassword . "GahjA%&*GHva";
    $encryptedPassword = md5($saltedPassword);
    $selectQuery = "SELECT username FROM users WHERE username ='".$safeUsername."' AND password ='".$encryptedPassword."';";
    $resultSet = $mysqli->query( $selectQuery );
    $rows = $resultSet->num_rows;
    if ($rows != 1){
        //send the proper error
        $_SESSION['errormessage'] = "<p>The username or Password is wrong.</p>";
        header("location: Lab07-Login.php");
        die();
    } else {
        //build a salted, user specific strong id
        $browserDetails = $_SERVER["HTTP_USER_AGENT"];
        $strong_id = "mT1iH9nR9a0" . session_id() . $browserDetails;

        //save this user info in a session
        $_SESSION['authentication'] = $strong_id;
        $_SESSION['username'] = $safeUsername;

        header("Location: Lab07-Page01.php");
    }
} else {
    //username or password is wrong

    $_SESSION['errormessage'] = $errormessage;
    header("Location: Lab07-Login.php");
}

?>










