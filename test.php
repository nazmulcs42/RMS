<!-- <?php 

	if (isset($_POST['submit'])) {
		echo $_POST['a'];
		echo "string";
	}

?>

<html>
	<body>

			<?php  
				$test=8;
				echo '<form action="" method="post"><input type="hidden" name="a" value="$test >
						<input type="submit" name="submit" value="Submit"></form>';
			
			?>
	</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style>
		body{background: #5F5F5F;margin-top: 150px;margin-left: 35%;}
		a{font-size: 25px;color: green;text-decoration: none;}


	</style>
</head>
<body>
	<a href="add_student.php">Add Student Information</a> <br>
	<a href="add_ct_marks.php">Add CT/Attendance/Presentation Marks</a> <br>
	<a href="add_attendance.php">Add Attendance Marks</a> <br>
	<a href="display.php">Display</a> <br>
</body>
</html>