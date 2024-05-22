<!DOCTYPE html>
<html>
<head>
	<title> Send Receipt</title>
	<link rel="stylesheet" type="text/css" href="css/receipt.css">
</head>
<body>
	<form action="uploadreceipt.php" method="post" enctype="multipart/form-data"><center>
		<h2>Upload patient's Receipt</h2>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?><br>
		<label>Enter patient's username: </label>
		<input type="text" name="uname"/><br>
		<input type="file" name="uploadfile" />
  <br>
		<button style="margin-top: 50px;" type="submit" name="upload">Upload</button></center>
     </form>
</body>
</html>
