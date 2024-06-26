<?php 
session_start(); 
include "p-db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])
	&& isset($_POST['age']) && isset($_POST['gender'])
	&& isset($_POST['dob']) && isset($_POST['mail'])
	&& isset($_POST['address'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$age = validate($_POST['age']);
	$gender = validate($_POST['gender']);
	$dob = validate($_POST['dob']);
	$mail = validate($_POST['mail']);
	$address = validate($_POST['address']);

	$user_data = 'uname='. $uname. '&name='. $name. '&age='. $age. '&gender='. $gender. '&dob='. $dob. '&mail='. $mail. '&address='. $address;


	if (empty($uname)) {
		header("Location: p-signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: p-signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: p-signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: p-signup.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($age)){
        header("Location: p-signup.php?error=Age is required&$user_data");
	    exit();
	}
	else if(empty($gender)){
        header("Location: p-signup.php?error=Gender is required&$user_data");
	    exit();
	}
	else if(empty($dob)){
        header("Location: p-signup.php?error=Date of Birth is required&$user_data");
	    exit();
	}
	else if(empty($mail)){
        header("Location: p-signup.php?error=Mail-ID is required&$user_data");
	    exit();
	}
	else if(empty($address)){
        header("Location: p-signup.php?error=Address is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: p-signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM patients WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: p-signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO patients(user_name, password, name,age,gender,dob,mail,address) VALUES('$uname', '$pass', '$name','$age','$gender','$dob','$mail','$address')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: p-signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: p-signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: p-signup.php");
	exit();
}