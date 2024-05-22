<?php

$host="127.0.0.1";
$port=3308;
$socket="";
$user="root";
$password="";
$dbname="doctorpatient";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Connection Failed! ' . mysqli_connect_error());
