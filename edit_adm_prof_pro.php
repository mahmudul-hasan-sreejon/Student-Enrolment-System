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
		</center>
			<?php
				if( isset($_GET['edit']) ) {
					$admno = mysql_real_escape_string($_GET['admno']);
					$result = mysql_query("SELECT * FROM stud_adm WHERE adm_no='$admno'");
					$row = mysql_fetch_array($result);
					if( mysql_num_rows($result) ) {
						echo "<center><a><img style='border:8px solid grey' width='120' height='120' src=images/student/".$row['img'].">";
						echo "</a>";

						echo '<form action="ph_upload.php" method="POST" enctype="multipart/form-data">';
							echo 'Add/Change Photo <input type="file" name="image" required style="width:180px">';
							echo '<input type="text" name="adm_no" value="'.$row['adm_no'].'" hidden>';
							echo '<input type="submit" value="Refresh" name="phupd" style="height:30px;width:100px">';
						echo "</form>";

						echo '<form action="edit_adm_prof_pro1.php" method="POST">';
							echo '<input type="text" name="adm_no" value="'.$row['adm_no'].'" hidden>';
							echo "<b>ADMISSION NO.</b>";
							echo '<b><font color="red">'.$row['adm_no'].'</font></b>';

							echo "<table border=\"20\" width=\"700\" height=\"100\" cellspacing=\"3\" cellpadding=\"1\" bordercolor='#21DBD9' bgcolor='#E5F4F4'>";

								echo "<TR bgcolor='#E5F4F4'>";
									echo '<TD><b><font color="blue">1. NAME OF STUDENT</b></TD>';
									echo '<TD><center>'.$row['name'].'</center></TD>';
								echo '</TR>';

								echo "<TR bgcolor='#E5F4F4'>";
									echo '<TD><b><font color="blue">2. ADMISSION YEAR</font></b></TD>';
									echo "<TD>";
										echo "<center>";
											echo '<select name="year">';
												echo '<option value="'.$row['year'].'">'.$row['year'].'</option>';
												echo "<option>--------</option>";
												echo "<option>1992</option>";
												echo "<option>1993</option>";
												echo "<option>1994</option>";
												echo "<option>1995</option>";
												echo "<option>1996</option>";
												echo "<option>1997</option>";
												echo "<option>1998</option>";
												echo "<option>1999</option>";
												echo "<option>2000</option>";
												echo "<option>2001</option>";
												echo "<option>2002</option>";
												echo "<option>2003</option>";
												echo "<option>2004</option>";
												echo "<option>2005</option>";
												echo "<option>2006</option>";
												echo "<option>2007</option>";
												echo "<option>2008</option>";
												echo "<option>2009</option>";
												echo "<option>2010</option>";
												echo "<option>2011</option>";
												echo "<option>2012</option>";
												echo "<option>2013</option>";
												echo "<option>2014</option>";
											echo "</select>";
										echo "</center>";
									echo "</TD>";
								echo "</TR>";
								
								echo "<TR bgcolor='#E5F4F4'>";
									echo '<TD><b><font color="blue">3. TRANSFER CERTIFICATE</b></TD>';
									echo "<TD>";
										echo "<center>";
											echo '<select name="tc_issue" required>';
												echo '<option value="'.$row['tc_issue'].'">'.$row['tc_issue'].'</option>';
												echo "<option>--------</option>";
												echo "<option>ISSUED</option>";
												echo "<option>NOT-ISSUED</option>";
											echo "</select>";
										echo "</center>";
									echo "</TD>";
								echo "</TR>";

								echo "<TR bgcolor='#E5F4F4'>";
									echo "<TD bgcolor='#E5F4F4'><b><font color='blue'>4. NAME OF THE VILLAGE / TOWN</b></TD>";
									echo '<TD><center><input type="text" name="twnvill" value="'.$row['twnvill'].'" required maxlength="30"></center></TD>';
								echo "</TR>";

								echo "<TR bgcolor='#E5F4F4'>";
									echo "<TD><b><font color='blue'>5. DATE OF BIRTH</b></TD>";
									echo '<TD><center><input type="date" name="dob" value="'.$row['dob'].'" required></center></TD>';
								echo "</TR>";

								echo "<TR bgcolor='#E5F4F4'>";
									echo "<TD><b><font color='blue'>6. GENDER</b></TD>";
									echo "<TD>";
										echo "<center>";
											echo '<select name="gen" required>';
												echo '<option value="'.$row['gen'].'">'.$row['gen'].'</option>';
												echo "<option>--------</option>";
												echo "<option>Male</option>";
												echo "<option>Female</option>";
												echo "<option>Other</option>";
											echo "</select>";
										echo "</center>";
									echo "</TD>";
								echo "</TR>";

								echo "<TR bgcolor='#E5F4F4'>";
									echo "<TD><b><font color='blue'>7. RELIGION</b></TD>";
									echo '<TD><center><input type="text" name="religion" value="'.$row['religion'].'" required maxlength="15"></center></TD>';
								echo "</TR>";

								echo "<TR bgcolor='#E5F4F4'>";
									echo "<TD><b><font color='blue'>8. CASTE</b></TD>";
									echo '<TD><center><input type="text" name="caste" value="'.$row['caste'].'" required maxlength="40"></center></TD>';
								echo "</TR>";


								echo "<TR bgcolor='#E5F4F4'>";
									echo "<TD><b><font color='blue'>9. COMMUNITY</b></TD>";
									echo "<TD>";
										echo "<center>";
											echo '<select name="comunit" required>';
												echo '<option value="'.$row['comunit'].'">'.$row['comunit'].'</option>';
												echo "<option>--------</option>";
												echo "<option>None</option>";
												echo "<option>OC</option>";
												echo "<option>BC</option>";
												echo "<option>MBC</option>";
												echo "<option>SC</option>";
												echo "<option>ST</option>";
											echo "</select>";
										echo "</center>";
									echo "</TD>";
								echo "</TR>";

							echo "</table>";

								echo "<br>";

								echo '<table border="20" width="700" height="100" cellspacing="3" cellpadding="1" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';
									echo "<center><b>10. LIVING WITH PARENTS / GUARDIAN</center>";

									echo "<TR bgcolor='#E5F4F4'>";
										echo "<TD><b><font color='blue'>(a) Name of the Parent / Guardian</b></TD>";
										echo '<TD><center><input type="text" name="fname" value="'.$row['fname'].'" required maxlength="50"></center></TD>';
									echo "</TR>";

									echo "<TR bgcolor='#E5F4F4'>";
										echo "<TD><b><font color='blue'>(b) Parent / Guardian's Occupation</b></TD>";
										echo '<TD><center><textarea name="f_ed_qua" rows="4" cols="27" required maxlength="100">'.$row['f_ed_qua'].'</textarea></center></TD>';
									echo "</TR>";

									echo "<TR bgcolor='#E5F4F4'>";
										echo "<TD><b><font color='blue'>(c) Full Address with Post No.</b></TD>";
										echo '<TD><center><textarea name="f_add_pin" rows="4" cols="27" required maxlength="100">'.$row['f_add_pin'].'</textarea></center></TD>';
									echo "</TR>";
									
									echo "<TR bgcolor='#E5F4F4'>";
										echo "<TD><b><font color='blue'>(d) Contact No.</b></TD>";
										echo '<TD><center><input type="text" name="ph_no" value="'.$row['ph_no'].'" required maxlength="18"></center></TD>';
									echo "</TR>";

								echo "</table>";

								echo "<br>";

								echo "<center><b>FOR OFFICE USE</b></center>";
								echo '<table border="20" height="100"  cellspacing="3" cellpadding="1" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';

									echo "<TR bgcolor='#E5F4F4'>";
										echo "<TD><b><font color='blue'>11. DEPARTMENT WITH CLASS NO.</b></TD>";
										echo "<TD>";
											echo "<center>";
												echo '<select name="cls_adm" required>';
													echo '<option value="'.$row['cls_adm'].'">'.$row['cls_adm'].'</option>';
													echo "<option>--------</option>";
													echo "<option>CSE</option>";
													echo "<option>ECE</option>";
													echo "<option>BBA</option>";
												echo "</select>";
											
												echo '<select name="cls_sec" required>';
													echo '<option value="'.$row['cls_sec'].'">'.$row['cls_sec'].'</option>';
													echo "<option>--------</option>";
													echo "<option>A</option>";
													echo "<option>B</option>";
													echo "<option>C</option>";
													echo "<option>D</option>";
													echo "<option>E</option>";
													echo "<option>F</option>";
													echo "<option>G</option>";
												echo "</select>";
											echo "</center>";
										echo "</TD>";

										echo "<TD><b><font color='blue'>12. MEDIUM</b></TD>";
										echo "<TD>";
											echo "<center>";
												echo '<select name="med_adm" required>';
													echo '<option value="'.$row['med_adm'].'">'.$row['med_adm'].'</option>';
													echo "<option>--------</option>";
													echo "<option>Bangla</option>";
													echo "<option>English</option>";
												echo "</select>";
											echo "</center>";
										echo "</TD>";

										echo "<TD><b><font color='blue'>13. GROUP</b></TD>";
										echo "<TD>";
											echo "<center>";
												echo '<select name="grop_adm" required>';
													echo '<option value="'.$row['grop_adm'].'">'.$row['grop_adm'].'</option>';
													echo "<option>--------</option>";
													echo "<option>Science</option>";
													echo "<option>Commerce</option>";
													echo "<option>Arts</option>";
												echo "</select>";
											echo "</center>";
										echo "</TD>";
									echo "</TR>";

									echo "<TR bgcolor='#E5F4F4'>";
										echo "<TD><b><font color='blue'>14. DATE OF ADMISSION</b></TD>";
										echo '<TD><center><input type="date" name="dat_adm" value="'.$row['dat_adm'].'" required></center></TD>';
										echo "<TD><b><font color='blue'>15. EMIS Number</b></TD>";
										echo '<TD><center><input type="text" name="emis_no" value="'.$row['emis_no'].'"></center></TD>';
									echo "</TR>";

								echo "</table>";

								echo "<br>";

								echo '<table height="50" cellspacing="3" cellpadding="8" bordercolor=\'#21DBD9\' bgcolor=\'#E5F4F4\'>';
									echo "<TR bgcolor='#E5F4F4'>";
										echo '<TD><center><input type="submit" value="Save" name="upd" style="height:30px;width:130px"></center></TD>';
										echo '<TD><center><input type="button" value="Cancel" style="width:120px; height:30px" onclick="window.location =\'dashboard.php\'"></center></TD>';
									echo "</TR>";
								echo "</table>";
							echo "</form>";
					}
					else {
						echo "</br></br></br></br></br></br></br></br>";
						echo "<center><h3>"."Admission Number not Found"."</h3></center>";
						echo '<p><center><input type="button" style="height:70px/;width:150px" value="Retry" onclick="window.location =\'edit_adm_prof.php\'" /></center></p>';
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