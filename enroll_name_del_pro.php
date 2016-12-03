<?php
	include_once("bg.php");
	include_once("config.php");
	ob_start();
	session_start();

	if( (!isset($_SESSION['stduid2'])) || (!isset($_SESSION['stdpwd2'])) || (!isset($_SESSION['maspwd2'])) ) {
		header('Location:deladmin.php');
	}
?>

<html>
	<body>
		<br><br><br><br><br>
		<center>
			<?php
				if( isset($_GET['delete']) ) {
					$admno = mysql_real_escape_string($_GET['admno']);
					$result = mysql_query("SELECT * FROM stud_adm WHERE adm_no='$admno'");
					$row = mysql_fetch_array($result);
					if( mysql_num_rows($result) ) {
						echo '<form action="enroll_name_del_confirm.php" method="GET">';
							echo "<table border=\"20\" height=\"100\" cellspacing=\"5\" cellpadding=\"5\" bordercolor='#21DBD9' bgcolor='#E5F4F4'>";
								echo '<input type="text" name="admno" value="'.$row['adm_no'].'" hidden>';

								echo "<TR>";
									echo "<TD><b>ADMISSION NO.</b></TD>";
									echo '<TD><center>'.$row['adm_no'].'</center></TD>';
								echo '</TR>';

								echo '<TR>';
									echo '<TD><b>PHOTO</b></TD>';
									echo '<TD><center>';
									echo "<center><img width='120' height='120' src=images/student/".$row['img']."></center>";
									echo "</center></TD>";
								echo "</TR>";

								echo "<TR>";
									echo "<TD><b>NAME OF STUDENT</b></TD>";
									echo "<TD><center>".$row['name']."</center></TD>";
								echo "</TR>";

								echo "<TR>";
									echo "<TD><b>DEPARTMENT</b></TD>";
									echo "<TD><center>".$row['cls_adm']."</center></TD>";
								echo "</TR>";

								echo "<TR>";
									echo "<TD></TD>";
									echo "<TD>";
										echo "<center>";
											echo '<input type="submit" value="Confirm" name="deleteconfirm" style="height:30px;width:120px">';
											echo "&nbsp;&nbsp;";
											echo '<input type="button" value="Cancel" style="width:120px; height:30px" onclick="window.location =\'dashboard.php\'">';
										echo "</center>";
									echo "</TD>";
								echo "</TR>";
							echo "</table>";
						echo "</form>";
					}
					else {
						echo "<br><br>";
						echo "<center><h3>"."No Such Admission Found"."</h3></center>";
						echo '<p><center><input type="button" style="height:30px/;width:200px" value="Retry" onclick="window.location =\'enroll_name_del.php\'" /></center></p>';
						echo '<p><center><input type="button" style="height:30px/;width:200px" value="Go to Home" onclick="window.location =\'dashboard.php\'" /></center></p>';
					}
				}

				ob_end_flush();
			?>
		</center>
	</body>
</html>