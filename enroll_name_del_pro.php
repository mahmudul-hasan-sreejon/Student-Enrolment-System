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
			?>
			
			<form action="enroll_name_del_confirm.php" method="GET">
				<table border="20" height="100" cellspacing="5" cellpadding="5" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
					<input type="text" name="admno" value="<?php echo $row['adm_no'];?>" hidden>

					<TR>
						<TD><b>ADMISSION NO.</b></TD>
						<TD><center><?php echo $row['adm_no'];?></center></TD>
					</TR>

					<TR>
						<TD><b>PHOTO</b></TD>
						<TD><center><?php echo "<center><img width='120' height='120' src=images/student/".$row['img'].">";?></center></TD>
					</TR>

					<TR>
						<TD><b>NAME OF STUDENT</b></TD>
						<TD><center><?php echo $row['name'];?></center></TD>
					</TR>

					<TR>
						<TD><b>DEPARTMENT</b></TD>
						<TD><center><?php echo $row['cls_adm'];?></center></TD>
					</TR>

					<TR>
						<TD></TD>
						<TD>
							<center>
								<input type="submit" value="Confirm" name="deleteconfirm" style="height:30px;width:120px">
								&nbsp;&nbsp;
								<input type="button" value="Cancel" style="width:120px; height:30px" onclick="window.location ='dashboard.php'">
							</center>
						</TD>
					</TR>
				</table>
			</form>

			<?php
				}
				else {
					echo "<center><h3>"."No Such Admission found"."</h3></center>";
					echo '<p><center><input type="button" style="height:30px/;width:200px" value="Retry" onclick="window.location =\'enroll_name_del.php\'" /></center></p>';
					echo "</br></br>";
					echo '<p><center><input type="button" style="height:30px/;width:200px" value="Go to Home" onclick="window.location =\'dashboard.php\'" /></center></p>';
				}
				
				ob_end_flush();
			?>

		</center>
	</body>
</html>

