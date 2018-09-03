<!DOCTYPE html>
<html>
	<head>
		<title>Sessions: Lab05 - page A</title>
        <link rel="stylesheet" type="text/css" href="http://bcitcomp.ca/twd/css/style.css" />
	</head>
	<body>
	   <h1>Lab07 - Login / Registration System</h1>
            <h2>Page01</h2>
        
        <?php
        require_once("Security.php");	
        
        echo "<h4>Hello ".$_SESSION['username']."!</h4>";
        
        ?>
        
        <p>You have been successfully logged in!</p>
        <p>Only authorized users can view this page.</p>
        <br/>
        <p><a href="Lab07-Logout.php">Logout</a></p>
       
	</body>
</html>