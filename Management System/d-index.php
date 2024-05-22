<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="d-style.css">
</head>
<body>
<header>
      <div class="container">
        <div class="header-left">
          <a href="index.html"><img
            class="logo"
            src="images/hospital-logo-clinic-health-care-physician-business.jpg"
          /></a>
        </div>
        <span class="fa fa-bars menu-icon"></span>
        <div class="header-right">
          <a href="d-index.php">Doctor</a>
          <a href="p-index.php" class="login">Patient</a>
        </div>
      </div>
    </header>
     <form action="d-login.php" method="post">
     	<center><img src="images/doctor.png" style="width:250px;height:150px;"></center><br>
	<h2>Welcome back Doctor!!</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>