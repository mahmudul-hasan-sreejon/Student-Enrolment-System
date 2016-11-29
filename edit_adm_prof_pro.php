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
	if(isset($_GET['edit']))
	{
	$admno=mysql_real_escape_string($_GET['admno']);
	$result =mysql_query("SELECT * FROM stud_adm WHERE adm_no='$admno'");
	$row = mysql_fetch_array($result);
?>

<html>
	<head></head>
	<title></title>
	<body>
		<?php
			echo "<center><img style='border:8px solid grey' width='120' height='120' src=images/student/".$row['img'].">";
			echo "</a>";
		?>

		<form action="ph_upload.php" method="POST" enctype="multipart/form-data">
		Add/Change Photo <input type="file" name="image" required style="width:180px">
			<input type="text" name="adm_no" value="<?php echo $row['adm_no'];?>" hidden>
			<input type="submit" value="Refresh" name="phupd" style="height:30px;width:100px">
		</form>

		<form action="edit_adm_prof_pro1.php" method="POST">
			<input type="text" name="adm_no" value="<?php echo $row['adm_no'];?>" hidden>
			<b>ADMISSION NO.</b>
			<b><font color="red"><?php echo $row['adm_no'];?></font></b>

			<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor='#21DBD9' bgcolor='#E5F4F4'>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color="blue">1. NAME OF STUDENT</b></TD>
					<TD><center><?php echo $row['name'];?></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color="blue">2. ADMSSION YEAR</font></b></TD>
					<TD>
						<center>
							<select name="year">
								<option value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
								<option>1992</option>
								<option>1993</option>
								<option>1994</option>
								<option>1995</option>
								<option>1996</option>
								<option>1997</option>
								<option>1998</option>
								<option>1999</option>
								<option>2000</option>
								<option>2001</option>
								<option>2002</option>
								<option>2003</option>
								<option>2004</option>
								<option>2005</option>
								<option>2006</option>
								<option>2007</option>
								<option>2008</option>
								<option>2009</option>
								<option>2010</option>
								<option>2011</option>
								<option>2012</option>
								<option>2013</option>
								<option>2014</option>
							</select>
						</center>
					</TD>
				</TR>
			
				<TR bgcolor='#E5F4F4'>
					<TD><b><font color="blue">3. TRANSFER CERTIFICATE</b></TD>
					<TD>
						<center>
							<select name="tc_issue" required>
								<option value="<?php echo $row['tc_issue'];?>"><?php echo $row['tc_issue'];?></option>
								<option>ISSUED</option>
								<option>NOT-ISSUED</option>
							</select>
						</center>
					</TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD bgcolor='#E5F4F4'><b><font color='blue'>4. NAME OF THE VILLAGE / TOWN</b></TD>
					<TD><center><input type="text" name="twnvill" value="<?php echo $row['twnvill'];?>" required maxlength="30"></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>5. DATE OF BIRTH</b></TD>
					<TD><center><input type="date" name="dob" value="<?php echo $row['dob'];?>" required></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>6. GENDER</b></TD>
					<TD>
						<center>
							<select name="gen" required>
								<option value="<?php echo $row['gen'];?>"><?php echo $row['gen'];?></option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</center>
					</TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>7. RELIGION</b></TD>
					<TD><center><input type="text" name="religion" value="<?php echo $row['religion'];?>" required maxlength="15"></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>8. CASTE</b></TD>
					<TD><center><input type="text" name="caste" value="<?php echo $row['caste'];?>" required maxlength="40"></center></TD>
				</TR>


				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>9. COMMUNITY</b></TD>
					<TD>
						<center>
							<select name="comunit" required>
								<option value="<?php echo $row['comunit'];?>"><?php echo $row['comunit'];?></option>
								<option>None</option>
								<option>OC</option>
								<option>BC</option>
								<option>MBC</option>
								<option>SC</option>
								<option>ST</option>
							</select>
						</center>
					</TD>
				</TR>

			</table>

			<br>

			<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
			<center><b>10. LIVING WITH PARENTS/GUARDIAN</center>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>(a) Name of the Parent / Guardian</b></TD>
					<TD><center><input type="text" name="fname" value="<?php echo $row['fname'];?>" required maxlength="50"></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>(b) Parent / Guardian's Occupation</b></TD>
					<TD><center><textarea name="f_ed_qua" rows="4" cols="27" required maxlength="100"><?php echo $row['f_ed_qua'];?></textarea></center></TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>(c) Full Address with Post No.</b></TD>
					<TD><center><textarea name="f_add_pin" rows="4" cols="27" required maxlength="100"><?php echo $row['f_add_pin'];?></textarea></center></TD>
				</TR>
				
				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>(d) Contact No.</b></TD>
					<TD><center><input type="text" name="ph_no" value="<?php echo $row['ph_no'];?>" required maxlength="18"></center></TD>
				</TR>

			</table>

			<br>

			<center><b>FOR OFFICE USE</b></center>
			<table border="20" height="100"  cellspacing="3" cellpadding="1" bordercolor='#21DBD9' bgcolor='#E5F4F4'>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>11. CLASS</b></TD>
					<TD>
						<center>
							<select name="cls_adm" required>
								<option value="<?php echo $row['cls_adm'];?>"><?php echo $row['cls_adm'];?></option>
								<option>CSE</option>
								<option>ECE</option>
								<option>BBA</option>
							</select>
						
							<select name="cls_sec" required>
								<option value="<?php echo $row['cls_sec'];?>"><?php echo $row['cls_sec'];?></option>
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>D</option>
								<option>E</option>
								<option>F</option>
								<option>G</option>
							</select>
						</center>
					</TD>

					<TD><b><font color='blue'>12. MEDIUM</b></TD>
					<TD>
						<center>
							<select name="med_adm" required>
								<option value="<?php echo $row['med_adm'];?>"><?php echo $row['med_adm'];?></option>
								<option>Bangla</option>
								<option>English</option>
							</select>
						</center>
					</TD>

					<TD><b><font color='blue'>13. GROUP</b></TD>
					<TD>
						<center>
							<select name="grop_adm" required>
								<option value="<?php echo $row['grop_adm'];?>"><?php echo $row['grop_adm'];?></option>
								<option>CSE</option>
								<option>BBA</option>
								<option>ECE</option>
							</select>
						</center>
					</TD>
				</TR>

				<TR bgcolor='#E5F4F4'>
					<TD><b><font color='blue'>14. DATE OF ADMISSION</b></TD>
					<TD><center><input type="date" name="dat_adm" value="<?php echo $row['dat_adm'];?>" required></center></TD>
					<TD><b><font color='blue'>15. EMIS Number</b></TD>
					<TD><center><input type="text" name="emis_no" value="<?php echo $row['emis_no'];?>"></center></TD>
				</TR>

			</table>

			<br>

			<table height="50" cellspacing="3" cellpadding="8" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
				<TR bgcolor='#E5F4F4'>
					<TD><center><input type="submit" value="Save" name="upd" style="height:30px;width:130px"></center></TD>
					<TD><center><input type="button" value="Cancel" style="width:120px; height:30px" onclick="window.location ='dashboard.php'"></center></TD>
				</TR>
			</table>
		</form>
	</body>
</html>

<?php
}
	ob_end_flush();
?>