<?php
	$conn = mysql_connect("localhost","root","1") or die("Connection to Server failed");
	$db = mysql_select_db("db",$conn) or die("Connection to Database failed");
?>