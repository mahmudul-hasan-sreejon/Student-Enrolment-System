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
		<br><br><br>
		<center>
			<input type="button" style="height:40px;width:200px" value="Go to Home" onclick="window.location ='dashboard.php'">
			<h3>Search by Admission Number</h3>

			<table border="10" height="100" cellspacing="10" cellpadding="10" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
				<form method="GET" action="edit_adm_prof_pro.php">
					<tr>
						<td><b>ADMISSION NO.</b></td>
						<td><input type="text" name="admno" style="width:150px;height:20px" required autofocus></td>
						<td><input type="submit" name="edit" value="Search" style="height:30px;width:90px"></td>
					</tr>
				</form>
			</table>

			<h3>Search by Student Name</h3>
			<table border="10" height="100" cellspacing="10" cellpadding="10" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
				<form method="GET" action="edit_adm_prof.php">
					<tr>
						<td><b>STUDENT NAME</b></td>
						<td><input type="text" name="name" style="width:180px;height:20px" required></td>
						<td><input type="submit" name="editbyname" value="Search" style="height:30px;width:90px"></td>
					</tr>
				</form>
			</table>

			<br>
			<?php
				if( isset($_GET['editbyname']) ) {
					$name = mysql_real_escape_string($_GET['name']);
					$sql = mysql_query("SELECT * FROM stud_adm WHERE name LIKE '%$name%'");

					echo "<b>".mysql_num_rows($sql)."</b> result(s) found";
					echo "<center>";
					echo "<table border='20' height='100' width='900' cellspacing='3' cellpadding='3' bordercolor='#21DBD9'>
					<tr>
					<th>Photo</th>
					<th>Admission No.</th>
					<th>Name</th>
					<th>More Details</th></tr>";

					while( $row = mysql_fetch_assoc($sql) ) {
						echo "<tr bgcolor='#E5F4F4'>";
						$admno = $row['adm_no'];
						echo "<td width='3%'>"."<center><img width='120' height='120' src=images/student/".$row['img'].">";
						echo "<td width='3%'>"."<center>".$row['adm_no']."</td>";
						echo "<td width='3%'>"."<center>".$row['name']."</td>";
						echo "<td width='3%'>";
						echo "<center><a href='edit_adm_prof_pro.php?admno=$admno&edit=Search'>Edit Details</a>";
						echo "</td>";
						echo "</tr>";
					}

					echo "</table></center>";
				}
			?>
		</center>
	</body>
</html>