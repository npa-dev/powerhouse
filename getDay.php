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
	$string = $_POST["date"];
	$timestamp = strtotime($string);
	$compareday = date("l", $timestamp);
	$count=0;
	if($_POST["didval"]=="")
		echo "SELECT DID PROPERLY!!!";
	else
	{
	
	$query ="SELECT * FROM doctor_availability WHERE did = '" . $_POST["didval"] . "' ";
	$results = $con->query($query);
	while($rs=$results->fetch_assoc())
		{
		   if($rs["day"]==$compareday)
		   {
			   $count++;
			   echo "Doctor Available on ".$compareday;
			   break;
		   }
		}
		if($count==0)
			echo "Doctor Unavailable on ".$compareday;
	}
?>
	
</body>
</html>