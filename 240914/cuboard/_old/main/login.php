<!DOCTYPE html>
<html>
<head>
<link href="../css/style.css" rel="stylesheet">
</head>

<?php
require("../include/checkmlogin.php");
?>
<body>
    <?php error_reporting(E_ALL ^  E_NOTICE);

	if ($_SERVER['REQUEST_METHOD'] != "POST")
        {
            echo "<nav>";
            echo "<ul>";
            echo "<li><a>CUBOARD</a></li>";
            echo "</ul>";
            echo "</nav>";
            echo "<div class=box align=center>";
            echo "<h2>Login</h2>";
            echo "<form action='$_SERVER[PHP_SELF]' method='post'>";
            echo "Username:<br>";
            echo "<input type=text size=24 maxlength=50 name='username'><br><br>";

            echo "Passwort:<br>";
            echo "<input type=password size=24 maxlength=50 name='password'><br><br>";

            echo "Noch kein User?<br>";
            echo "<p><a href='signup.php'>Registriere dich hier</a></p><br>";

            echo "<input id=buttonfont style=padding-left:6px; type=submit value='Abschicken'><br>";
            echo "</form>";
            echo "</div>";
        }
        else
        {

			session_start(); 

			require("../include/mysqlcon.php");

			$username = $_POST["username"]; 
			$password = md5($_POST["password"]); 

			$query = "SELECT username, password FROM login WHERE username LIKE '$username' LIMIT 1";
			$ergebnis = mysqli_query($con,$query);  
			$row = mysqli_fetch_object($ergebnis); 

            if ($username == "" OR $password == "") 
            {
                echo "<nav>";
                echo "<ul>";
                echo "<li><a>CUBOARD</a></li>";
                echo "</ul>";
                echo "</nav>";
                echo "<div class=box align=center>";
                echo "Eingabefehler. <br>Bitte Benutzername und Passwort korrekt ausf&uuml;llen. <br><a href=\"login.php\">Zur&uuml;ck</a>";
                echo "</div>";
            }

			elseif ($row->password == $password) 
    		{ 
    			$_SESSION["username"] = $username; 
    			header("LOCATION: home.php");
    		} 

			else 
    		{
                echo "<nav>";
                echo "<ul>";
                echo "<li><a>CUBOARD</a></li>";
                echo "</ul>";
                echo "</nav>";
                echo "<div class=box align=center>";
                echo "Benutzername und/oder Passwort falsch. <br><a href=\"login.php\">Zur&uuml;ck</a>"; 
                echo "</div>";      		        
    		} 
    	}

	?>

</body>
</html>