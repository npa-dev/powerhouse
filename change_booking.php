<?php
session_start();
require("checklogin.php");
$user_data = check_login($con);

?>
<html>
<head>
<link rel="stylesheet" href=".css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head>
<?php include "connection.php"; ?>
<style>
table{
    width: 100%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 1px;
	font-size: 25px;
}

th{
border: 1px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 1px solid black;
	background-color: white;
    color: black;
}
</style>

<body style="background-color:white">
	<div class="header">
		
	</div>
	<form method="post">
	<div class="sucontainer">
		
	
		<label style="font-size:20px" >Doctor:</label><br>
		<select name="doctor" id="doctor-list" class="demoInputBox" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Doctor</option>
		<?php
		$sql1="SELECT * FROM doctor";
         $results=$con->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["DID"]; ?>"><?php echo "Dr. ".$rs["Name"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
		
		<label><b>Date:</b></label><br>
		<input type="date" name="dateselected" required><br><br>
		<br>
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
			</form>
<?php
session_start();
if(isset($_POST['submit']))
{
		
		include 'connection.php';
		include ("register.php");
		$usrnm=$_POST["first_name"];
		$did=$_POST['doctor'];
		$dateselected=$_POST['dateselected'];
		$sql1 = "select * from book where DOV='". $_POST['dateselected']."' AND DID= $did order by Timestamp ASC";
		 $results1=$con->query($sql1); 
			
?>			
				<form  method="post">; 
				<table>
				<tr>
				<th>UserName</th>
				<th> Name</th>
				<th>DOV</th>
				<th>Timestamp</th>
				<th>Status</th>
				</tr>
<?php
			while($rs1=$results1->fetch_assoc())
			{
				echo "<tr>";
					echo  '<td><input type="text" name="username[]" id="username" value="'.$rs1["Username"].'" readonly></td>'
					.'<td><input type="text" name="fname[]" id="fname" value="'.$rs1["Fname"].'" readonly></td>'
					.'<td><input type="date" name="dov[]" id="dov" value="'.$rs1["DOV"].'" readonly></td>'
					.'<td><input type="text" name="timestamp[]" id="timestamp" value="'.$rs1["Timestamp"].'" readonly></td>'
					.'<td><input type="text" name="status[]" id="status" value="'.$rs1["Status"].'"></td></tr>' ;
			}
?>		
			</table>	
			<button type="submit" style="position:center" name="submit2" value="Submit">Submit Changes</button></form>		
<?php
}
require_once("connection.php");
			if(isset($_POST['submit2']))
		{
			$usrnm=$_POST["first_name"];
			$nm=$_POST["name"];
			$tmstmp=$_POST["timestamp"];
			$stts=$_POST["status"];
			$dt=$_POST["dov"];
			$n=count($usrnm);
			for($j=0;$j<$n;$j++)
			{	
				$updatequery="UPDATE book SET Status='$stts[$j]' where username='$usrnm[$j]' and timestamp='$tmstmp[$j]'";
				if (mysqli_query($con, $updatequery)) 
				{
							echo "$nm[$j] :Status updated successfully..!!<br>";

				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}
			}
			echo "Redirecting.....";
			header( "Refresh:3; url=change_booking.php");
				
		}
?>
	
</body>
</html>