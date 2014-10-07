<!DOCTYPE html>
<html>
<head>
<link href="../css/style.css" rel="stylesheet">
</head>

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
            echo "<form action='$_SERVER[PHP_SELF]' method='post'>";
            echo "<div class=loginout><input id=buttonfont style=padding-left:6px; type=submit name='Login' value='Login' ></div>"; 
            echo "<h2 style=margin-left:85px;>Neuen Benutzer anlegen</h2><br>"; 
            echo "Benutzername:<br>";
            echo "<input type=text size=24 maxlength=50 name='username'><br><br>";

            echo "Passwort:<br>";
            echo "<input type=password size=24 maxlength=50 name='password'><br><br>";

            echo "Passwort wiederholen:<br>";
            echo "<input type=password size=24 maxlength=50 name='password2'><br><br>";
            
            echo "<div class=loginout style=margin-bottom:-4px;><input id=buttonfont style=padding-left:6px; type=submit name='Abschicken' value='Abschicken' ></div>";
            echo "</form>";
            echo "</div>";
        }
        else
        {
            if (isset($_POST['Login'])) {
                header("LOCATION: login.php");
            }

            require("../include/mysqlcon.php"); 

            $username = $_POST["username"]; 
            $password = $_POST["password"]; 
            $password2 = $_POST["password2"]; 

            if($password != $password2 OR $username == "" OR $password == "") 
                { 
                    echo "<nav>";
                    echo "<ul>";
                    echo "<li><a>CUBOARD</a></li>";
                    echo "</ul>";
                    echo "</nav>";
                    echo "<div class=box align=center>";
                    echo "Eingabefehler. <br>Bitte alle Felder korrekt ausf&uuml;llen. <br><a href=\"signup.php\">Zur&uuml;ck</a>";
                    echo "</div>";
                    exit;
                }

            $password = md5($password); 

            $query = "SELECT id FROM login WHERE username LIKE '$username'";
            $result = mysqli_query($con,$query); 
            $menge = mysqli_num_rows($result); 

            if($menge == 0) 
                { 
                $eintrag = "INSERT INTO login (username, password) VALUES ('$username', '$password')"; 
                $eintragen = mysqli_query($con, $eintrag); 

                if($eintragen == true) 
                    { 
                        echo "<nav>";
                        echo "<ul>";
                        echo "<li><a>CUBOARD</a></li>";
                        echo "</ul>";
                        echo "</nav>";
                        echo "<div class=box align=center>";
                        echo "Benutzer <b>$username</b> wurde erstellt. <br><a href=\"login.php\">Login</a>"; 
                        echo "</div>";                          
                    } 
                else 
                    { 
                        echo "<nav>";
                        echo "<ul>";
                        echo "<li><a>CUBOARD</a></li>";
                        echo "</ul>";
                        echo "</nav>";
                        echo "<div class=box align=center>";
                        echo "Fehler beim Erstellen des Benutzer. <br><a href=\"signup.php\">Zur&uuml;ck</a>";  
                        echo "</div>";                         
                    } 
                } 

            else 
                { 
                    echo "<nav>";
                    echo "<ul>";
                    echo "<li><a>CUBOARD</a></li>";
                    echo "</ul>";
                    echo "</nav>";
                    echo "<div class=box align=center>";
                    echo "Benutzername bereits vorhanden. <br><a href=\"signup.php\">Zur&uuml;ck</a>";  
                    echo "</div>";                     
                }            
        }
 

?>

</body>
</html>