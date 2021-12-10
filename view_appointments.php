<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="main.css">
<style>
table{
    width: 85%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 25px;
}

th{
border: 4px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "connection.php"; ?>
<body style="background-image:url(images/cancelback.jpg)">

<center>
	<?php
	$username=$_SESSION['username'];
	$sql1 = "Select * from book where username ='".$username."' order by DOV desc";
			$result1=mysqli_query($con, $sql1);  
			echo "<table>
					<tr>
					<th>Appointment-Date</th>
					<th>Name</th>
					<th>Doctor</th>
					<th>Status</th>
					<th>Booked-On</th>
					</tr>";
			while($row1 = mysqli_fetch_array($result1))
			{
				$sql2="SELECT * from doctor where did=".$row1['DID'];
				$result2= mysqli_query($con,$sql2);
				while($row2= mysqli_fetch_array($result2))
				{
					
					echo "<tr>";
					echo "<td>" . $row1['DOV'] . "</td>";
					echo "<td>" . $row1['pname'] . "</td>";
					echo "<td>" . $row2['name'] . "</td>";
					echo "<td>" . $row1['Status'] . "</td>";
					echo "<td>" . $row1['Timestamp'] . "</td>";
					echo "</tr>";
						
				}
				
			}
	?>
</center>
</body>
</html>