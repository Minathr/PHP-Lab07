
<!DOCTYPE html>
<html>
	<head>
		<title>Lab07 - Registration</title>
        <link rel="stylesheet" type="text/css" href="http://bcitcomp.ca/twd/css/style.css" />
        <style>label {display: inline-block; width: 140px}
        </style>
	</head>
	<body>
	   
        <h1>Lab07 - Login / Registration System</h1>
        <h2>Register</h2>
        <?php
        
        session_start();
        
        if(isset($_SESSION['errormessage'])){
            //dipslay the error message and unset it
            echo "<fieldset style='background-color: pink;'>".$_SESSION['errormessage']."</fieldset>";
            unset($_SESSION['errormessage']);
        }
        
        ?>
        <br />
        <fieldset>
            <form method="POST" action="Processor.php">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" /><br />
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" /><br />
                <label for="confirmedPassword">Re type password:</label>
                <input type="password" name="confirmedPassword" id="confirmedPassword" /><br />
                <input type="submit" /><br />
            </form>
        </fieldset>
        <p>Already have an account? <a href="Lab07-Login.php">Login</a></p>
        
    </body>
</html>