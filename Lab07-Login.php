
<!DOCTYPE html>
<html>
	<head>
		<title>Lab07 - Login</title>
        <link rel="stylesheet" type="text/css" href="http://bcitcomp.ca/twd/css/style.css" />
        <style>label {display: inline-block; width: 140px;}
        </style>
	</head>
	<body>
	    <h1>Lab07 - Login / Registration System</h1>
        <h2>Login</h2>
<?php
session_start();

//if there are messages to show...
if(isset($_SESSION['errormessage'])){
    //dipslay the error message
    echo "<fieldset style='background-color: pink;'>".$_SESSION['errormessage']."</fieldset>";
    // the error message
    unset($_SESSION['errormessage']);
}

if(isset($_SESSION['message'])){
    //dipslay the error message
    echo "<fieldset style='background-color: darkseagreen;'>".$_SESSION['message']."</fieldset>";
    // the error message
    unset($_SESSION['message']);
}

if(isset($_SESSION['logout'])){
    echo "<fieldset style='background-color: darkseagreen;'>".$_SESSION['logout']."</fieldset>";
    //destroy session
    $_SESSION = array();
    session_destroy();
}
?>
        <br />
        <fieldset>
            <form method="POST" action="Authorizor.php">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php
        if( isset($_COOKIE['username']) ){
            echo $_COOKIE['username'];
        }
        ?>" /><br />
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" /><br />
                <label for="rememberme">Remember Me:</label>
                <input type="checkbox" name="rememberme" id="rememberme" 		/><br />
                <input type="submit" /><br />
            </form>
        </fieldset>
	<p>Do not have an account? <a href="Lab07-Register.php">Register</a>!</p>
	</body>
</html>