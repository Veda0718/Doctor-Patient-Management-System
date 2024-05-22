<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet" type="text/css" href="p-style.css">
</head>
<body>
<header>
      <div class="container">
        <div class="header-left">
          <a href="index.html"><img
            class="logo"
            src="images/hospital-logo-clinic-health-care-physician-business.jpg"/></a>
        </div>
        <span class="fa fa-bars menu-icon"></span>
        <div class="header-right">
          <a href="d-index.php">Doctor</a>
          <a href="p-index.php" class="login">Patient</a>
        </div>
      </div>
    </header>
     <form action="p-login.php" method="post">
	<center><img src="images/patient.png" style="width:200px;height:150px;"></center><br>
     	<h2>Welcome!!</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="p-signup.php" class="ca">New Patient??Create an account!!</a>
     </form>
</body>
</html>