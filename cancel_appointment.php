<?php
session_start();
require("checklogin.php");
$user_data = check_login($con);
?>
<html>
<head>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php 
include "connection.php"; 
include ("register.php");
$username = $_POST["first_name"];
?>
<body >
	<form method="post">
	<div class="sucontainer">
		<label style="font-size:20px" >Select Appointment to Cancel:</label><br>
		<select name="appointment" id="appointment-list" class="demoInputBox"  style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Appointment</option>
		<?php
		$date= date('Y-m-d');

		$sql1="SELECT * from book where username='".$userdata."'and status not like 'Cancelled by Patient' and DOV >='$date'";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) {
			$sql2="select * from doctor where did=".$rs["DID"];
			$results2=$con->query($sql2);
				while($rs2=$results2->fetch_assoc()) {
			
		?>
		<option value="<?php echo $rs["Timestamp"]; ?>"><?php echo "Patient: ".$rs["pname"]." Date: ".$rs["DOV"]." -Dr.".$rs2["name"]." - Booked on:".$rs["Timestamp"]; ?></option>
		<?php
		}
		
		}
		?>
		</select>
		

			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
	</form>
	<?php
if(isset($_POST['submit']))
{
		$username=$_SESSION['username'];
		$timestamp=$_POST['appointment'];
		$updatequery="update book set Status='Cancelled by Patient' where username='$username' and timestamp= '$timestamp'";
				if (mysqli_query($con, $updatequery)) 
				{
							echo "Appointment Cancelled successfully..!!<br>";
							header( "Refresh:2; url=staff.php");

				} 
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($con);
				}

}
?>
</body>
</html>