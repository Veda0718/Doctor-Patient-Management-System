<!DOCTYPE html>
<html>
<head>
	<title>New Patient</title>
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
     <form action="p-signup-check.php" method="post" style="margin-top: 800px;">
	    <center><img src="images/patient.png" style="width:200px;height:150px;"></center><br>
     	<h2>New Patient</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

	<label>Age</label>
          <?php if (isset($_GET['age'])) { ?>
               <input type="number" 
                      name="age" 
                      placeholder="Age"
                      value="<?php echo $_GET['age']; ?>"><br>
          <?php }else{ ?>
               <input type="number" 
                      name="age" 
                      placeholder="Age"><br>
          <?php }?>
	<label>Gender</label>
          <?php if (isset($_GET['gender'])) { ?>
               <input type="text" 
                      name="gender" 
                      placeholder="Gender"
                      value="<?php echo $_GET['gender']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="gender" 
                      placeholder="Gender"><br>
          <?php }?>
          
	<label>Date of Birth</label>
          <?php if (isset($_GET['dob'])) { ?>
               <input type="date" 
                      name="dob" 
                      placeholder="Date of Birth"
                      value="<?php echo $_GET['dob']; ?>"><br>
          <?php }else{ ?>
               <input type="date" 
                      name="dob" 
                      placeholder="Date of Birth"><br>
          <?php }?>
	<label>Mail-ID</label>
          <?php if (isset($_GET['mail'])) { ?>
               <input type="text" 
                      name="mail" 
                      placeholder="E-mail"
                      value="<?php echo $_GET['mail']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="mail" 
                      placeholder="E-mail"><br>
          <?php }?>
	<label>Address</label>
          <?php if (isset($_GET['address'])) { ?>
               <input type="text" 
                      name="address" 
                      placeholder="Address"
                      value="<?php echo $_GET['address']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="address" 
                      placeholder="Address"><br>
          <?php }?>
          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirm Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="p-index.php" class="ca">Already have an account??</a>
     </form>
</body>
</html>