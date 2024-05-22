
<?php
	date_default_timezone_set("Asia/Kolkata");
	$acceptedtime=strtotime('09:00:00');//now time is 2038
	$startingtime=strtotime('08:30:00');
	$now = strtotime("now");
	if($now>=$startingtime && $now<=$acceptedtime)
	{
?>
<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Booking</title>
  <link rel="stylesheet" type="text/css" href="p-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
  (function(window, location) {
  history.replaceState(null, document.title, location.pathname+"#!/stealingyourhistory");
  history.pushState(null, document.title, location.pathname);

  window.addEventListener("popstate", function() {
    if(location.hash === "#!/stealingyourhistory") {
          history.replaceState(null, document.title, location.pathname);
          setTimeout(function(){
            location.replace("http://localhost/DoctorPatientManagementSystemModified1/Web_Page-master/d-home.php");
          },0);
    }
  }, false);
}(window, location));
  </script>
</head>
<body>
  <h1 style="color:black;">Hello, <?php echo $_SESSION['name']; ?></h1>
	<form action="pbconn.php" method="post"><center>
		<h2>Book your Appointment!</h2>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
		<label>Select your slot!!</label><br><br><br>
		<select name="time" style="padding:1vw 10vw;" required>
    	<option value="m1" name="m1">9:00 AM - 9:30 AM</option>
    	<option value="m2" name="m2">10:00 AM - 10:30 AM</option>
    	<option value="m3" name="m3">11:00 AM - 11:30 AM</option>
    	<option value="m4" name="m4">12:00 AM - 12:30 AM</option>
    	<option value="a1" name="a1">1:30 AM - 2:00 AM</option>
    	<option value="a2" name="a2">2:30 AM - 3:00 AM</option>
    	<option value="a3" name="a3">3:30 AM - 4:00 AM</option>
    	<option value="a4" name="a4">4:30 AM - 5:00 AM</option>
  		</select>
  <br><br>
		<center><button style="margin-top: 50px;" type="submit" name="submit">Book Now</button></center>
     </form>
     <div style="margin-top:8vw;padding:1vw;"><a style="color:white;background:green;padding:1vw 12vw;" href="p-logout.php">Logout</a></div>
</body>
</html>
<?php
}else{
     header("Location: p-index.php");
     exit();
}
 ?>
 <?php
}else{
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Booking</title>
	<link rel="stylesheet" type="text/css" href="p-style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 style="color:black;">Hello, <?php echo $_SESSION['name']; ?></h1>
	<form action="" method="post"><center>
		<h2>Sorry you cannot book an appointment right now!!Come at 8:30-9AM</h2>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		<label>Visit the site from 8:30 AM - 9:00 AM to book your slot</label><br><br><br>
		<select name="time" style="padding:1vw 10vw;" disabled>
    	<option value="m1" name="m1">9:00 AM - 9:30 AM</option>
    	<option value="m2" name="m2">10:00 AM - 10:30 AM</option>
    	<option value="m3" name="m3">11:00 AM - 11:30 AM</option>
    	<option value="m4" name="m4">12:00 AM - 12:30 AM</option>
    	<option value="a1" name="a1">1:30 AM - 2:00 AM</option>
    	<option value="a2" name="a2">2:30 AM - 3:00 AM</option>
    	<option value="a3" name="a3">3:30 AM - 4:00 AM</option>
    	<option value="a4" name="a4">4:30 AM - 5:00 AM</option>
  		</select>
  <br><br>
		<center><button style="margin-top: 50px;" type="submit" name="submit" disabled>Book Now</button></center>
     </form>
		 <div style="margin-top:8vw;padding:1vw;"><a style="color:white;background:green;padding:1vw 12vw;" href="p-logout.php">Logout</a></div>
</body>
</html>
<?php
}else{
     header("Location: p-index.php");
     exit();
}
 ?>
<?php }
 ?>
