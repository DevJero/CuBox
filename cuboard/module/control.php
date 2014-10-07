<?php

	$resultroom = mysqli_query($con,"SELECT * FROM room ORDER BY rid");

	echo "<table id=uitablerow>";
	echo "<tr>";
	echo "<td>";
	
	echo "<form action='$_SERVER[PHP_SELF]' method=POST >";
	echo "<div class=homebox>";
	echo "<h2>Control</h2>";
	while ($row = mysqli_fetch_object($resultroom))
    {
    	$rid=$row->rid;
		
		echo "<h3>$row->room</h3>";
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
        mysqli_free_result($result); 					
		
	}
	echo "</div>";
	echo "</form>";

	echo "</td>";
	echo "</tr>";
	echo "</table>";

?>