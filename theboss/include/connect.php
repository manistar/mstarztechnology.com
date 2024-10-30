<?php
$con=mysql_connect("localhost","leanbayo_leanuser","455") or die ("DOWN!");
	if ($con) {
		mysql_select_db("ams",$con);
     
	}
	else
	{
		die("DOWN");
	}	

?>
