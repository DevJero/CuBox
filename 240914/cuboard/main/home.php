<!DOCTYPE HTML>
<html>

<head>
<link href="../css/style.css" rel="stylesheet">
<script language="javascript" type="text/javascript">

function updatebutton(id,value,code,rid){
   var xmlhttp;
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  			xmlhttp.onreadystatechange=function()
 			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    	{			
	    			var id = document.getElementById('id');
    				var value = document.getElementById('value');
            		var code = document.getElementById('code');
            		var rid = document.getElementById('rid');
    			}
  			}
    		
    		var queryString = "?id=" + id + "&value=" + value + "&code=" + code + "&rid=" + rid;
    		xmlhttp.open("POST", "../functions/buttonupdate.php" + queryString, false);
    		xmlhttp.send();

		}

    </script>    
</head>

<?php

include("../include/nosession.php");
?>


<body id="home">

<nav>
	<ul class="cf">
		<li><a class="dropdown" href="#">HOME</a>
			<ul>
				<!-- <li><a href="music.php">MUSIC</a></li> -->
    			<li><a href="settings.php">SETTINGS</a></li>
			</ul>	
		</li>
	</ul>
</nav>




<?php

	echo "</table>";

	echo "<table id=uitablerow1>";
	echo "<tr>";

	echo "<td>";
		echo "<div class=box>";
		echo "<h2>Wetter</h2>";
		echo "<h3>Aktuell</h3>";

		echo "</div>";

	echo "</td>";
	
	echo "</tr>";
	echo "</table>";


	require("../include/mysqlcon.php");
	
	$resultroom = mysqli_query($con,"SELECT * FROM room ORDER BY rid");
	$settingsquery = mysqli_query($con,"SELECT * FROM settings");

	echo "<table id=uitablerow2>";
	echo "<tr>";
	echo "<td>";
	
	echo "<form action='$_SERVER[PHP_SELF]' method=POST >";
	while ($row = mysqli_fetch_object($resultroom))
    {
    	$rid=$row->rid;
		echo "<div class=box>";
		echo "<h2>$row->room</h2>";
		echo "<h3>Ger&auml;testatus</h3>";
		$result = mysqli_query($con,"SELECT * FROM control LEFT JOIN room ON control.rid=room.rid ORDER BY control.pos");
		while ($row = mysqli_fetch_object($result))
        {
            if ($row->rid==$rid)
            {
            	echo "<table>";
            	echo "<tr>";
				echo "<td>$row->name</td>";
				if ($row->status ==1)
				{	
					echo "<td><Button id=buttonfont class=an onclick=updatebutton('$row->cid','$row->status','$row->code','$rid') >an</Button></td>";
				}
 				else
 				{
 					echo "<td><Button id=buttonfont onclick=updatebutton('$row->cid','$row->status','$row->code','$rid') >aus</Button></td>";
 				}
 				echo "</tr>";    
 				echo "</table>";
 			}           
        }
        $onetime=1;
        while ($row = mysqli_fetch_object($settingsquery))
        {	
        	if ($onetime==1) {
        		echo "<h2>Controlsettings</h2>";
				echo "<h3>Aktuelle Einstellungen</h3>";
        	}
            echo "<table>";
            echo "<tr>";
			echo "<td style=width:350px;>$row->funktion</td>";
			if ($row->status ==1)
			{	
				echo "<td><div id=homeview class=an>an</div></td>";
			}
 			else
 			{
 				echo "<td><div id=homeview>aus</div></td>";
 			}
 			echo "</tr>";    
 			echo "</table>"; 	
 			$onetime=$onetime+1;		           
        }
        mysqli_free_result($result); 					
		echo "</div>";
	}

	echo "</form>";

	echo "</td>";
	echo "</tr>";
	

	echo "<table id=uitablerow3>";
	echo "<tr>";

	echo "<td>";
		echo "<div class=box>";
		echo "<h2>News</h2>";
		echo "<h3>Aktuell</h3>";

		echo"Hier kommt ein RSS Feed hin";

		echo "</div>";

	echo "</td>";
	
	echo "</tr>";
	echo "</table>";


	
	mysqli_close($con);

?>



</body>

</html>