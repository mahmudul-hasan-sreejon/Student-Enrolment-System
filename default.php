<?php
	include_once("bg.php");
	include_once("config.php");
	session_start();
	ob_start();
?>

<html>
	<head></head>
	<title></title>
	<body>

		<center>
			<img draggable='false' width='100' height='100' src=images/background/logo.png>
			<h2>Institute of Science and Technology<h2>
			<h3>Student Enrolment System</h3>
			<table border="20" height="100" cellpadding="10" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
				<form action="default.php" method="POST" autocomplete="off">
					<TR>
						<TD><b>Email</b></TD>
						<TD><input type="email" name="uid" autofocus placeholder="xxx@xxx.com" style="width:180px;height:20px" required></TD>
					</TR>

					<TR>
						<TD><b>Password</b></TD>
						<TD><input type="password" name="pwd" style="width:180px;height:20px" required>
						</TD>
					</TR>

					<TR>
						<TD><b></b></TD>
						<TD>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" value="Log In" name="loger" style="height:30px;width:80px">
						</TD>
					</TR>
				</form>
			</table>

			<?php
				if( isset($_POST['loger']) ) {
					$uid = mysql_real_escape_string($_POST['uid']);
					$pwd = mysql_real_escape_string($_POST['pwd']);
					$result = mysql_query("SELECT * FROM user WHERE eid='$uid' AND pwd='$pwd'");

					if( $row = mysql_fetch_array($result) ) {
						$_SESSION['stduid2']=$row['eid'];
						$_SESSION['stdpwd2']=$row['pwd'];
						header('location:dashboard.php');
					}

					else {
						echo '<script type="text/javascript">alert("Invalid Username or Password!");</script>';
					}
				}
			?>
		</center>
	</body>
</html>