<?php
	include_once("config.php");
	include_once("bg.php");
	ob_start();
	session_start();

	if( (!isset($_SESSION['stduid2'])) && (!isset($_SESSION['stdpwd2'])) ) {
		header('Location: default.php');
	}

	if( isset($_POST['enroll']) ) {
		$admno = mysql_real_escape_string($_POST['admno']);
		$name = mysql_real_escape_string($_POST['name']);
		$sql1 = "INSERT INTO stud_id(adm_no) VALUES('$admno')";
		$result1 = mysql_query($sql1);

		if( $result1 ) {
			$sql2 = "INSERT INTO stud_adm(adm_no,name) 
			VALUES('$admno','$name')";
			$result2 = mysql_query($sql2);

			$sql5 = "UPDATE last_entry SET adm_no='$admno',name='$name' WHERE id='1'";
			$result5 = mysql_query($sql5);

			$sql6 = "INSERT INTO extra1(adm_no,name) 
			VALUES('$admno','$name')";
			$result6 = mysql_query($sql6);

			$sql7 = "INSERT INTO extra2(adm_no,name) 
			VALUES('$admno','$name')";
			$result7 = mysql_query($sql7);

			$sql8 = "INSERT INTO extra3(adm_no,name) 
			VALUES('$admno','$name')";
			$result8 = mysql_query($sql8);

			echo "</br></br></br></br></br></br></br></br>";
			echo "<center><h3>"."Enrolled Successfully"."</h3></center>";
			echo '<center><input type="button" style="height:30px" value="Go to Home" onclick="window.location =\'dashboard.php\'" /></center>';
		}
		else {
			echo "</br></br></br></br></br></br></br></br>";
			echo "<center><h3>"."Admission Number already Exists / Invalid Details"."</h3></center>";
			echo '<p><center><input type="button" style="height:70px/;width:150px" value="Retry" onclick="window.location =\'enroll.php\'" /></center></p>';
			echo '<p><center><input type="button" style="height:70px/;width:150px" value="Go to Home" onclick="window.location =\'dashboard.php\'" /></center></p>';
		}
	}
	else {
		echo "</br></br></br></br></br></br></br></br>";
		echo "<center><h3>"."Unauthorized Entry"."</h3></center>";
		echo '<p><center><input type="button" style="height:30px/;width:200px" value="Go to Home" onclick="window.location =\'dashboard.php\'" /></p>';
	}

	ob_end_flush();
?>