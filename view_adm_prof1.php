<?php
	include_once("bg.php");
	include_once("config.php");
	ob_start();
	session_start();

	if( (!isset($_SESSION['stduid2'])) && (!isset($_SESSION['stdpwd2'])) ) {
		header('Location: default.php');
	}
?>

<?php
	if( isset($_GET['view']) ) {
		$admno = mysql_real_escape_string($_GET['admno']);
		$result = mysql_query("SELECT * FROM stud_adm WHERE adm_no='$admno'");
		$row = mysql_fetch_array($result);
?>

<html>
	<body>
		<center>
			<?php
				echo "<center><a href='images/student/".$row['img']."' target='_blank'><img style='border:8px solid grey' width='120' height='120' src=images/student/".$row['img'].">";
				echo "</a><br>";
			?>

			<input type="text" name="adm_no" value="<?php echo $row['adm_no'];?>" hidden>
			<br>
			<b>ADMISSION NO.</b>
			<b><font color="red"><?php echo $row['adm_no'];?></font></b>

			<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
				<TR>
					<TD><b><font color="blue">1. NAME OF STUDENT</b></TD>
					<TD><center><?php echo $row['name'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color="blue">2. ADMISSION YEAR</font></b></TD>
					<TD><center><?php echo $row['year'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>3. TRANSFER CERTIFICATE</b></TD>
					<TD><center><?php echo $row['tc_issue'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>4. NAME OF THE VILLAGE / TOWN</b></TD>
					<TD><center><?php echo $row['twnvill'];?></center></TD>
				</TR>
				
				<TR>
					<TD><b><font color='blue'>5. DATE OF BIRTH</b></TD>
					<TD><center><?php echo $row['dob'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>6. GENDER</b></TD>
					<TD><center><?php echo $row['gen'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>7. RELIGION</b></TD>
					<TD><center><?php echo $row['religion'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>8. CASTE</b></TD>
					<TD><center><?php echo $row['caste'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>9. COMMUNITY</b></TD>
					<TD><center><?php echo $row['comunit'];?></center></TD>
				</TR>

			</table>

			<br>

			<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
				<center><b>10. LIVING WITH PARENTS / GUARDIAN</center>

				<TR>
					<TD><b><font color='blue'>(a) Name of the Parent / Guardian</b></TD>
					<TD><center><?php echo $row['fname'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>(b) Parent / Guardian's Occupation</b></TD>
					<TD><center><?php echo $row['f_ed_qua'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>(c) Full Address with Post No.</b></TD>
					<TD><center><?php echo $row['f_add_pin'];?></center></TD>
				</TR>

				<TR>
					<TD><b><font color='blue'>(d) Contact No.</b></TD>
					<TD><center><?php echo $row['ph_no'];?></center></TD>
				</TR>

			</table>

			<br>

			<center><b>FOR OFFICE USE</b></center>
			<table border="20" height="100"  cellspacing="3" cellpadding="1" bordercolor='#21DBD9' bgcolor='#E5F4F4'>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>11. DEPARTMENT WITH CLASS NO.</b></TD>
					<TD>
						<center>
							<?php echo $row['cls_adm'];?>&nbsp-
							'<?php echo $row['cls_sec'];?>'
						</center>
					</TD>

					<TD><b><font color='blue'>12. MEDIUM</b></TD>
					<TD><center><?php echo $row['med_adm'];?></center></TD>

					<TD><b><font color='blue'>13. GROUP</b></TD>
					<TD><center><?php echo $row['grop_adm'];?></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>14. DATE OF ADMISSION</b></TD>
					<TD><center><?php echo $row['dat_adm'];?></center></TD>

					<TD><b><font color='blue'>15. EMIS Number</b></TD>
					<TD><center><?php echo $row['emis_no'];?></center></TD>
				</TR>

			</table>

			<br>

			<table  height="50" cellspacing="3" cellpadding="8" bordercolor='#21DBD9' bgcolor='#E5F4F4'>

				<TR bgcolor='#E5F4F4'>
					<TD><center><input type="button" value="Go to Home" style="width:120px; height:30px" onclick="window.location ='dashboard.php'"></TD>
				</TR>

			</table>
		</center>
	</body>
</html>

<?php
	}
	ob_end_flush();
?>