<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("connection.php");
include("book_appointment.php");
	$query = "SELECT DISTINCT `did` FROM `doctor_availability` WHERE 1";
	//$query ="SELECT distinct did FROM doctor_availability WHERE did =".$_POST["did"]" ";
	$results = $con->query($query);
?>
	<option value="">Select Doctor</option>
<?php
	while($rs=$results->fetch_assoc()) {
		$query1="SELECT name FROM `doctor` WHERE did=".$rs["did"];
		$result1=$con->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["did"]; ?>"><?php echo "Dr. ".$rs1["name"]; ?></option>
<?php
		}
}
?>
</body>
</html>