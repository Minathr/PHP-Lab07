<?php

session_start();

$username = "";
$password = "";
$dbUsername = "";
$dbPassword = "";
$confirmedPassword = "";
$errormessage = "";

if( isset($_POST['username']) && trim($_POST['username']) != null ){
    $username = trim($_POST['username']);
} else {
    $errormessage = $errormessage . "<p>Please input your username.</p>";
}

if( isset($_POST['password']) && trim($_POST['password'])!=null){
    $password = $_POST['password'];
    if ( strlen($password) < 8 ) {
        $errormessage = $errormessage . "<p>Your password must have the minimum of 8 characters.</p>";
    }
} else {
    $errormessage = $errormessage . "<p>Please input your password.</p>";
}

if( isset($_POST['confirmedPassword']) && trim($_POST['confirmedPassword'])!=null){
    $confirmedPassword = $_POST['confirmedPassword'];
    if ( $confirmedPassword != $password ) {
        $errormessage = $errormessage . "<p>Passwords do not match.</p>";
    }
} else {
    $errormessage = $errormessage . "<p>Please retype your password.</p>";
}

if ( isset($_POST['rememberme']) ) {
    setcookie("username", $username , time()+60*60*24*7);
}

if ($errormessage == ""){

    //create the user
    require_once("dbinfo.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if( mysqli_connect_errno() != 0 ){
        $_SESSION['errormessage'] = "<p>Connection to DB failed.</p>";
        header("location: Lab07-Register.php");
        die();
    }
    
    //retrieve the user's password
    $safeUsername = $mysqli->real_escape_string($username);
    $safePassword = $mysqli->real_escape_string($password);
    $saltedPassword = $safePassword . "GahjA%&*GHva";
    $encryptedPassword = md5($saltedPassword);
    
    $selectQuery = "SELECT password FROM users WHERE username ='".$safeUsername."';";
    $result = $mysqli->query( $selectQuery );
    $rows = $result->num_rows;
    if ($rows == 0){
        $insertQuery = "INSERT INTO users (username, password) VALUES ('".$safeUsername."','".$encryptedPassword."');";
        $resultSet = $mysqli->query( $insertQuery );

        if ($resultSet == true){
            //success message
            $_SESSION['message'] = "<p>Your account has been created successfully</p>";
            header("Location: Lab07-Login.php");
        } else {
            $_SESSION['errormessage'] = "There was a problem with creating the account. Please try again.";
            header("Location: Lab07-Register.php");
        }
    } else {
        //username or password is wrong
        $_SESSION['errormessage'] = "The username '".$username."' already exists, please choose a different one.";
        header("Location: Lab07-Register.php");
    }
}
?>










