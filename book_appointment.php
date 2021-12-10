<?php
session_start();
require("checklogin.php");
require_once("connection.php");
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
 <!-- bootstrap css -->
 <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">

</head>
<?php 
include("connection.php"); 
?>

<body class="main-layout inner_page">
 <!-- header -->
 <header class="header-area">
      <div class="container">
         <div class="row d_flex">
            <div class="col-sm-3 logo_sm">
               <div class="logo">
                  <a href="index.php"></a>
               </div>
            </div>
            <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-9">
               <div class="navbar-area">
                  <nav class="site-navbar">
                     <ul>
					 <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="staff.php" class="logo_midle">Staff</a></li>
                        <li><a class="active" href="book_appointment.php">Schedule a meeting</a></li>
                        <li><a href="interactions.php">Share your story</a></li>
                        
						<li><a href="logout.php"> logout </a></li>
                     </ul>
                     <button class="nav-toggler">
                        <span></span>
                     </button>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header -->
	
<div class = "area">
	<center><p>
		<br><br>You can book an appointment to meet any of the therapists at powerhouse.<br>
		When you schedule your appointment, it may take some time to get approved
	</p>
	</center>
	<form  class="form-container form-row needs-validation" method="post">
	<div class="sucontainer" >
		<h3>Schedule your appointment here</h3>
		<label><b>Name:</b></label>
		<input type="text" placeholder="Enter Full name" name="pname" required><br>
		
		<label><b>Gender</b></label>
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other<br><br>

        <label><b>Date of Birth:</b></label>
		<input type="date" name="dob"  required><br><br>
		<div id="dobstatus"> </div>
	
		
		<label style="font-size:20px" ><b>Doctor:</b></label>
		<select id="doctor-list" name="Doctor" onChange="getDate(this.value);" >
		<option value="">Select Doctor</option>
		<option value="Colin Abrams">Colin Abrams</option>
		<option value="Sarah Appiah">Sarah Appiah</option>
		
		</select><br>
		
		
		<label><b>Date:</b></label>
		<input type="date" name="dov" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required title = "You can only choose a date within one week from today"><br><br>
		<div id="datestatus"> </div>
		
        <label><b>Mode:</b></label>
		<select name="mode" >
		<option value="">Select</option>
		<option value="In-person">In-person</option>
        <option value="Online">Online</option>
		</select><br>

        <label><b>Choose a time:</b></label>
        <input type="time" name="time" min="08:00" max="18:00" required title = "Select time between 8:00 Am and 18:00 PM">

		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>
	</div>	
</div>
	
	
   
	<?php
	if(isset($_POST['submit']))
	{
			$name=$_POST['pname'];
			$gender=$_POST['gender'];
			$dob = $_POST['dob'];
			$dname=$_POST['Doctor'];
			$result= "SELECT `did` FROM `doctor` where `name` = '$dname'";
			$result1 = $con->query($result);
			while($rs1=$result1->fetch_assoc())
			{
			
			$did = $rs1;
			
			}
			$did = $con->query($result);
			//$did=$result["did"];
			$dov=$_POST['dov'];
			$mode = $_POST['mode'];
			$time = $_POST['time'];
			$status="Booking Sucessful.Wait for the update";
			$timestamp=date('Y-m-d H:i:s');
			$sql = "INSERT INTO `book` (`pname`,`Gender`, `DOB`,`DOV`,`mode`, `time`, `Timestamp`,`Status`) VALUES ('$name','$gender','$dob','$dov','$mode', '$time','$timestamp','$status') ";
			if(!empty($_POST['pname'])&&!empty($_POST['gender'])&&!empty($_POST['dob'])&&!empty($_POST['mode'])&&!empty($_POST['time'])&&!empty($_POST['Doctor']) && !empty($_POST['dov']))
			{
				$checkday = strtotime($dov);
				$compareday = date("l", $checkday);
				$count=0;
				
				$query ="SELECT * FROM doctor_availability WHERE did = '" .$did. "' ";
				$results = $con->query($query);
				while($rs=$results->fetch_assoc()){
					if($rs["day"]==$compareday)
					{
						$count++;
						break;
					}
				}
				if($count==0){
					echo "<h2>Select another date as Doctor Unavailable on ".$compareday."</h2>";
				}
				else{
					if (mysqli_query($con, $sql)){
							echo "<h2>Booking successful!! Redirecting to home page....</h2>";
							header( "Refresh:2; url=staff.php");

					}else{
						echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				}
			}
			else{
				echo "<h4>Enter data properly!!!!</h4>";
			}
	}
	?>
	</form>
    <script>

	function getDoctorday(val) {
		$.ajax({
		type: "POST",
		url: "doctor_day.php",
		data:'did='+val,
		success: function(data){
			$("#doctor-list").html(data);
		}
		});
	}

	function getDay(val) {
		var didval = $did;
		//var didval=document.getElementById("doctor-list").value;
		$.ajax({
		type: "POST",
		url: "getDay.php",
		data:'date='+val+'&didval='+didval,
		success: function(data){
			$("#datestatus").html(data);
		}
		});
	}

   </script>
</body>
</html>