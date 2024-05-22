<?php
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
	$dbname="sample";

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
		else if($query_run)
		{

		}
  	else{
			echo "<script>alert('Data not updated');</script>";
  	}
		/*$stmt = $conn->prepare("insert into slots(m1, m2, m3, m4, a1, a2, a3, a4) values(?, ?, ?, ?, ?, ?, ?, ?) where user_name='Patel'");
		$stmt->bind_param("ssssssss", $m1, $m2, $m3, $m4, $a1, $a2, $a3, $a4);
		$execval = $stmt->execute();
		echo $execval;
		echo "Entered successfully...";
		$stmt->close();*/
		$conn->close();
	}
?>
