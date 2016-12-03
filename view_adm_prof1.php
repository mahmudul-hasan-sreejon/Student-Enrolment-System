<?php
	include_once("bg.php");
	include_once("config.php");
	ob_start();
	session_start();

	if( (!isset($_SESSION['stduid2'])) && (!isset($_SESSION['stdpwd2'])) ) {
		header('Location: default.php');
	}
?>



<html>
	<body>
		<center>
			<?php
				if( isset($_GET['view']) ) {
					$admno = mysql_real_escape_string($_GET['admno']);
					$result = mysql_query("SELECT * FROM stud_adm WHERE adm_no='$admno'");
					$row = mysql_fetch_array($result);
					if( mysql_num_rows($result) ) {
						echo "<center><a href='images/student/".$row['img']."' target='_blank'>";
						echo "<img style='border:8px solid grey' width='120' height='120' src=images/student/".$row['img'].">";
						echo "</a><br>";

						echo '<input type="text" name="adm_no" value="'.$row['adm_no'].'" hidden>';
						echo "<br>";
						echo "<b>ADMISSION NO.</b>";
						echo '<b><font color="red">'.$row['adm_no'].'</font></b>';

						echo '<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';
							echo "<TR>";
								echo '<TD><b><font color="blue">1. NAME OF STUDENT</b></TD>';
								echo '<TD><center>'.$row['name'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo '<TD><b><font color="blue">2. ADMISSION YEAR</font></b></TD>';
								echo '<TD><center>'.$row['year'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo '<TD><b><font color="blue">3. TRANSFER CERTIFICATE</b></TD>';
								echo '<TD><center>'.$row['tc_issue'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>4. NAME OF THE VILLAGE / TOWN</b></TD>";
								echo '<TD><center>'.$row['twnvill'].'</center></TD>';
							echo "</TR>";
							
							echo "<TR>";
								echo "<TD><b><font color='blue'>5. DATE OF BIRTH</b></TD>";
								echo '<TD><center>'.$row['dob'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>6. GENDER</b></TD>";
								echo '<TD><center>'.$row['gen'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>7. RELIGION</b></TD>";
								echo '<TD><center>'.$row['religion'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>8. CASTE</b></TD>";
								echo '<TD><center>'.$row['caste'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>9. COMMUNITY</b></TD>";
								echo '<TD><center>'.$row['comunit'].'</center></TD>';
							echo "</TR>";

						echo "</table>";

						echo "<br>";

						echo "<center><b>10. LIVING WITH PARENTS / GUARDIAN</center>";
						echo '<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';
							
							echo "<TR>";
								echo "<TD><b><font color='blue'>(a) Name of the Parent / Guardian</b></TD>";
								echo '<TD><center>'.$row['fname'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>(b) Parent / Guardian's Occupation</b></TD>";
								echo '<TD><center>'.$row['f_ed_qua'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>(c) Full Address with Post No.</b></TD>";
								echo '<TD><center>'.$row['f_add_pin'].'</center></TD>';
							echo "</TR>";

							echo "<TR>";
								echo "<TD><b><font color='blue'>(d) Contact No.</b></TD>";
								echo '<TD><center>'.$row['ph_no'].'</center></TD>';
							echo "</TR>";

						echo "</table>";

						echo "<br>";

						echo "<center><b>FOR OFFICE USE</b></center>";
						echo '<table border="20" height="100"  cellspacing="3" cellpadding="1" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';

							echo "<TR bgcolor='#E5F4F4'>";
								echo "<TD><b><font color='blue'>11. DEPARTMENT WITH CLASS NO.</b></TD>";
								echo "<TD>";
									echo "<center>";
										echo $row['cls_adm']." ".$row['cls_sec'];
									echo "</center>";
								echo "</TD>";

								echo "<TD><b><font color='blue'>12. MEDIUM</b></TD>";
								echo '<TD><center>'.$row['med_adm'].'</center></TD>';

								echo "<TD><b><font color='blue'>13. GROUP</b></TD>";
								echo '<TD><center>'.$row['grop_adm'].'</center></TD>';
							echo "</TR>";

							echo "<TR bgcolor='#E5F4F4'>";
								echo "<TD><b><font color='blue'>14. DATE OF ADMISSION</b></TD>";
								echo '<TD><center>'.$row['dat_adm'].'</center></TD>';

								echo "<TD><b><font color='blue'>15. EMIS Number</b></TD>";
								echo '<TD><center>'.$row['emis_no'].'</center></TD>';
							echo "</TR>";

						echo "</table>";

						echo "<br>";

						echo '<table  height="50" cellspacing="3" cellpadding="8" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';

							echo "<TR bgcolor='#E5F4F4'>";
								echo '<TD><center><input type="button" value="Go to Home" style="width:120px; height:30px" onclick="window.location =\'dashboard.php\'"></TD>';
							echo "</TR>";

						echo "</table>";
					}
					else {
						echo "</br></br></br></br></br></br></br></br>";
						echo "<center><h3>"."Admission Number not Found"."</h3></center>";
						echo '<p><center><input type="button" style="height:70px/;width:150px" value="Retry" onclick="window.location =\'view_adm_prof.php\'" /></center></p>';
						echo '<p><center><input type="button" style="height:70px/;width:150px" value="Go to Home" onclick="window.location =\'dashboard.php\'" /></center></p>';
					}
				}
			?>
		</center>
	</body>
</html>

<?php
	ob_end_flush();
?>