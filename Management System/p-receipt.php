<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Receipt</title>
	<link rel="stylesheet" type="text/css" href="css/receipt.css">
</head>
<body>
	<form style="margin-top: 300px;"><center>
		<h2>Your Receipt</h2>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>Username:</label>
          <?php echo $_SESSION['user_name']; ?><br>
          <?php
          $db = mysqli_connect("127.0.0.1:3308", "root", "", "doctorpatient");
          $query = "SELECT * FROM patients where user_name='$_SESSION[user_name]'";
    	  $display = mysqli_query($db,$query);
    	  while($result=mysqli_fetch_array($display)){
          ?><br>
          <label>Receipt Uploaded On:</label>
          <?php echo $result['uploaddate'];?><br><br>
          <a href="<?php echo $result['receipt']; ?>"><img src= "<?php echo $result['receipt']; ?>" height="500px" width="900px"></a>
          <br>
     <?php } ?>
     </form>
</body>
</html>
<?php
}else{
     header("Location: p-index.php");
     exit();
}
 ?>
