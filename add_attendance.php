<?php  

	session_start();
	include('db_connect.php');
	$flag = 0;$err = "";$msg = "";
	if (isset($_POST['submit'])) {
		$session = $_POST['session'];
		$department = $_POST['department'];
		$sql="SELECT id from student where session='$session' and dept_name='$department'";
		$res=mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)>0){
			$flag = 1;
		}
		else{
			$err="Session doesn't exist";
			$flag=0;
		}
		
	}

	if (isset($_POST['submit2'])) {
		
		$nos = $_POST['nos'];
		for ($i=0; $i < $nos ; $i++) { 

			$id=$_SESSION['id'][$i];
			$marks=$_POST[$i];
			
			
			$sql = "INSERT into attendance(student_id,marks) values('$id','$marks')";
			$res = mysqli_query($conn,$sql);
			if ($res) {
				$msg="Information inserted successfully";
			}
			else{
				$err="Difficulty in Insertion";
			}
		}
		$flag=0;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Attendance Marks</title>
	<style>
		body{background: #5F5F5F;margin-top: 50px;margin-left: 20%;color:white}
		a{font-size: 20px;color: white;text-decoration: none;padding-right: 5px;}
		a:hover{color: #AAAAAA;}

	</style>
</head>
	<body>
		<a href="add_student.php">Add Student Information</a> 
		<a href="add_ct_marks.php">Add CT/Attendance/Presentation Marks</a> 
		<a href="add_attendance.php">Add Attendance Marks</a> 
		<a href="display.php">Display</a> <br>

		<?php  

			if ($flag==0) {

				echo "<p style='margin-top: 50px;color:red;font-size: 30px;'>".$err."</p>";
				echo "<p style='margin-top: 50px;color:#27B127;font-size: 30px;'>".$msg."</p>";
				echo "<p style='margin-top: 50px'>Select Session, Department & Enter Number of Student</p>";
				echo '<form action="" method="post">';

				echo '<p>Session<br><select name="session">
						<option value="2013-14">2013-14</option>
						<option selected="selected" value="2014-15">2014-15</option>
						<option value="2015-16">2015-16</option>
						<option value="2016-17">2016-17</option>
					</select></p>';	

				echo '<p>Department<br><select name="department">
						<option selected="selected" value="CSE">CSE</option>
						<option value="EEE">EEE</option>
						<option value="ICE">ICE</option>
						<option value="ETE">ETE</option>
					</select></p>';

				echo'<input type="submit" name="submit" value="Submit"></form>';
			}
		?>


		<?php  

			if ($flag==1) {

				echo "<p style='margin-top: 50px'>Enter Attendance Marks of Each Student</p>";
				echo '<form action="" method="post"><table>';
				echo '<tr><th>ID</th><th>Marks</th></tr>';
				$counter=0;$nos=0;$id=[];
				while($row=mysqli_fetch_assoc($res)){
					echo '<tr><td>'.$row['id'].'</td>';
					$id[$counter]=$row['id'];
					echo '<td>
						      <input type="text" name='.$counter.' placeholder="Enter Marks">
						  </td></tr>';
					$counter++;
					$nos++;
				}

				echo'<input type="hidden" name="nos" value='.$nos.'>';
				echo '<tr><td colspan="1"><input type="submit" name="submit2" value="Submit"></td></tr>';
				echo '</table></form>';
				$_SESSION['id']=$id;
			}

		?>
	</body>
</html>

