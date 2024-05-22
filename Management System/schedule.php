<?php
session_start();
include "d-db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<?php
	date_default_timezone_set("Asia/Kolkata");
	$acceptedtime=strtotime('08:27:00');//now time is 2038
	$now = strtotime("now");
	if($now<=$acceptedtime)
	{
?>
<?php
$connection=mysqli_connect("127.0.0.1:3308","root","");
$db=mysqli_select_db($connection,'doctorpatient');
if(isset($_POST['submit']))
{
	$m1 = $_POST['m1'];
	$m2 = $_POST['m2'];
	$m3 = $_POST['m3'];
	$m4 = $_POST['m4'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$a4= $_POST['a4'];
	$host="127.0.0.1";
	$port=3308;
	$socket="";
	$user="root";
	$password="";
	$dbname="doctorpatient";

	// Database connection
	$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Connection Failed! ' . mysqli_connect_error());

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else{
		$query="INSERT INTO SLOTS (date,time,m1,m2,m3,m4,a1,a2,a3,a4,user_name) values(current_date(),current_time(),'$_POST[m1]','$_POST[m2]','$_POST[m3]','$_POST[m4]','$_POST[a1]','$_POST[a2]','$_POST[a3]','$_POST[a4]','Patel')";
		$query_run=mysqli_query($conn,$query);
		if(!$query_run)
  	{
			$query="UPDATE SLOTS SET date=current_date(),time=current_time(),m1='$_POST[m1]',m2='$_POST[m2]',m3='$_POST[m3]',m4='$_POST[m4]',a1='$_POST[a1]',a2='$_POST[a2]',a3='$_POST[a3]',a4='$_POST[a4]' where `date`=CURDATE()";
			$query_run=mysqli_query($conn,$query);
  	}
  	else{

  	}
		/*$stmt = $conn->prepare("insert into slots(m1, m2, m3, m4, a1, a2, a3, a4) values(?, ?, ?, ?, ?, ?, ?, ?) where user_name='Patel'");
		$stmt->bind_param("ssssssss", $m1, $m2, $m3, $m4, $a1, $a2, $a3, $a4);
		$execval = $stmt->execute();
		echo $execval;
		echo "Entered successfully...";
		$stmt->close();*/
		$conn->close();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schedule</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <style>
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
  </style>
</head>
<body>
	<?php
	$host="127.0.0.1";
	$port=3308;
	$socket="";
	$user="root";
	$password="";
	$dbname="doctorpatient";

	// Database connection
	$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Connection Failed! ' . mysqli_connect_error());
	$query = "select * from slots where user_name='Patel' and date=current_date();";
		if ($query && $stmt = $conn->prepare($query)) {
			//$stmt->bind_param("s",'Patel');
			$stmt->execute();
			$result = $stmt->get_result(); // get the mysqli result
			$user = $result->fetch_assoc(); // fetch data
			$stmt->close();
		}
	?>
     <form action="" method="post">
	<h2>Schedule your day!</h2>
     	<label></label>
      <?php
			$host="127.0.0.1";
			$port=3308;
			$socket="";
			$usere="root";
			$password="";
			$dbname="doctorpatient";

			$conn = new mysqli($host, $usere, $password, $dbname, $port, $socket)
	or die ('Connection Failed! ' . mysqli_connect_error());
      $sql = "SELECT * FROM slots WHERE date='CURDATE()'";
      $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
while($row = mysqli_fetch_assoc($result)) {
    echo $row['date'];
}
      echo "You Can Schedule only for today: ";
			echo date("Y-m-d");
      ?>
      <div style="float:left;">
      <h3>Morning Slots</h3>
     	<label>9:00 AM - 9:30 AM</label>
     	<input type="text" style="width:15vw" value="<?php echo isset($user['m1']) ? $user['m1'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m1" required><br>
      <label>10:00 AM - 10:30 AM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['m2']) ? $user['m2'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m2" required><br>
      <label>11:00 AM - 11:30 AM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['m3']) ? $user['m3'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m3" required><br>
      <label>12:00 PM - 12:30 PM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['m4']) ? $user['m4'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m4" required></div><br>
      <div style="float:right;">
        <h3>Evening Slots</h3>
      <label>1:30 PM - 2:00 PM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['a1']) ? $user['a1'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a1" required><br>
      <label>2:30 PM - 3:00 PM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['a2']) ? $user['a2'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a2" required><br>
      <label>3:30 PM - 4:00 PM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['a3']) ? $user['a3'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a3" required><br>
      <label>4:30 PM - 5:00 PM</label>
      <input type="text" style="width:15vw" value="<?php echo isset($user['a4']) ? $user['a4'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a4" required></div><br>

     	<center><button name="submit" type="submit">Submit</button></center>
     </form>
</body>
</html>
<?php }
else {
	?>
	<html>
	<head>
		<title>Schedule</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <style>
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
    </style>
	</head>
	<body>
		<?php
		$host="127.0.0.1";
		$port=3308;
		$socket="";
		$user="root";
		$password="";
		$dbname="doctorpatient";

		// Database connection
		$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Connection Failed! ' . mysqli_connect_error());
		$query = "select * from slots where user_name='Patel' and date=current_date();";
			if ($stmt = $conn->prepare($query)) {
				//$stmt->bind_param("s",'Patel');
				$stmt->execute();
				$result = $stmt->get_result(); // get the mysqli result
				$user = $result->fetch_assoc(); // fetch data
				$stmt->close();
			}
		?>
	     <form action="" method="post">
		<h2>Sorry your schedule is fixed,come tommorrow fix it by 8:30AM</h2>
	     	<label></label>
	      <?php
				$host="127.0.0.1";
				$port=3308;
				$socket="";
				$usere="root";
				$password="";
				$dbname="doctorpatient";

				$conn = new mysqli($host, $usere, $password, $dbname, $port, $socket)
		or die ('Connection Failed! ' . mysqli_connect_error());
	      $sql = "SELECT * FROM slots WHERE date='CURRENT_DATE()'";
	      $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
	while($row = mysqli_fetch_assoc($result)) {
	    echo $row['date'];
	}
	      ?>
	      <div style="float:left;">
	      <h3>Morning Slots</h3>
	     	<label>9:00 AM - 9:30 AM</label>
	     	<input type="text" style="width:15vw" value="<?php echo isset($user['m1']) ? $user['m1'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m1" readonly><br>
	      <label>10:00 AM - 10:30 AM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['m2']) ? $user['m2'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m2" readonly><br>
	      <label>11:00 AM - 11:30 AM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['m3']) ? $user['m3'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m3" readonly><br>
	      <label>12:00 PM - 12:30 PM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['m4']) ? $user['m4'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="m4" readonly></div><br>
	      <div style="float:right;">
	        <h3>Evening Slots</h3>
	      <label>1:30 PM - 2:00 PM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['a1']) ? $user['a1'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a1" readonly><br>
	      <label>2:30 PM - 3:00 PM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['a2']) ? $user['a2'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a2" readonly><br>
	      <label>3:30 PM - 4:00 PM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['a3']) ? $user['a3'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a3" readonly><br>
	      <label>4:30 PM - 5:00 PM</label>
	      <input type="text" style="width:15vw" value="<?php echo isset($user['a4']) ? $user['a4'] : 'Empty';?>" placeholder="Empty or Full (Case Sensitive)" value="Empty" name="a4" readonly></div><br>

	     	<center><button name="submit" type="submit">Submit</button></center>
	     </form>
	</body>
	</html>
<?php } ?>
<?php
}else{
     header("Location: d-index.php");
     exit();
}
 ?>
