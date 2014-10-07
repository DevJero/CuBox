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
	require("../include/nosession.php");
	require("../include/mysqlcon.php");

	echo "<div id=uicenter>";

	$resultmodule = mysqli_query($con,"SELECT * FROM module ORDER BY pos");

	while ($row = mysqli_fetch_object($resultmodule))
    {
   		if ($row->status ==1)
			{
				include("../module/$row->name.php");
			}
    }	

    echo "</div>";


	
	mysqli_close($con);

?>



</body>

</html>