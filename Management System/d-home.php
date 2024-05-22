<?php
$connection=mysqli_connect("127.0.0.1:3308","root","");
$db=mysqli_select_db($connection,'doctorpatient');
if(isset($_POST['update']))
{
  $usrnme=$_POST['uname'];
  $name=$_POST['name'];
  $query="UPDATE `DOCTOR` SET name='$_POST[name]',age='$_POST[age]',gender='$_POST[gender]',dob='$_POST[dob]',mail='$_POST[mailid]',address='$_POST[addr]' where user_name='$usrnme' ";
  //echo $query;
  $query_run=mysqli_query($connection,$query);
  if($query_run)
  {

  }
  else{
    echo '<script type="text/javascript">alert("Data Not Updated");</script>';
  }
}
?>
<?php
session_start();
include "d-db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>HMS</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link rel="stylesheet" href="css/loginnavigationbar.css">
     <style media="screen">
       body{
         background-image: url('images/doctorspage.webp');
         background-size: 100% 100%;
         background-attachment: fixed;
         background-repeat: no-repeat;
       }
       ::-webkit-scrollbar {
     width: 0px;
     background: transparent; /* make scrollbar transparent */
 }
     </style>
   </head>
   <body>
     <?php
     include "d-db_conn.php";
      $query = "select * from doctor where user_name=?";
      if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s",$_SESSION['user_name']);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_assoc(); // fetch data
        $stmt->close();
      }
     ?>
     <script>
 var num=0;
 function switch1()
 {
   if(num==0)
   {
       document.getElementById('name').removeAttribute('readonly');
       document.getElementById('age').removeAttribute('readonly');
       document.getElementById('dob').removeAttribute('readonly');
       document.getElementById('mailid').removeAttribute('readonly');
       document.getElementById('gender').removeAttribute('readonly');
       document.getElementById('addr').removeAttribute('readonly');
       num=1;
   }
   else {
     document.getElementById('name').readOnly=true;
     document.getElementById('age').readOnly=true;
     document.getElementById('dob').readOnly=true;
     document.getElementById('mailid').readOnly=true;
     document.getElementById('gender').readOnly=true;
     document.getElementById('addr').value;readOnly=true;
     num=0;
   }
 }
 function viewdetails() {
   document.getElementsByClassName('viewdetails')[0].style.visibility='visible';
 }
 function closedoctorsignupForm()
 {
   document.getElementsByClassName('viewdetails')[0].style.visibility='hidden';
 }
 </script>
     <center><h1 style="
       width:100%;
       position: fixed;
       text-align: center;
       font-size:3vw;top:0;background: rgba(46, 49, 49, 0.3);padding-top:0.1em;padding-bottom:0.1em;">Hello, <?php echo $user['name']; ?></h1></center>

       <?php
          $name=$user['name'];
        ?>
       <div class="viewdetails" style="background-color: rgba(192,192,192,0.3);margin-left:30vw;margin-bottom:5vw;margin-top: 5vw;border-radius:10px;position:absolute;border:1px solid black;visibility:hidden;box-shadow: 5px 10px #404040;">
         <div class="photo" style="padding:30px;">
           <center><img src="images/doctor.svg" style="width:11vw;height:11vw;" onclick="closedoctorsignupForm()"></center><br>
           <center><p><b>Welcome to the organisation</b></p></center>
         </div>
         <div class="form" style="padding-left:4vw;padding-right:4vw;margin-right:2vw;padding-top:2vw;padding-bottom:2vw;">
           <form action="" method="POST">
           <label for="name" style="font-size:20px;"><b>Name:</b></label>
           <input type="text" id="name" style="padding:7px;border-radius:5px;border-color:white;float:right;" value="<?php echo $name; ?>" placeholder="Enter your name:" name="name" required readonly><br>

           <div style="margin-top:20px;">
           <label for="age" style="font-size:20px;"><b>Age:</b></label>
           <input type="number" style="padding:7px;border-radius:5px;border-color:white;float:right;" placeholder="Enter your age:" name="age" value="<?php echo $user['age']; ?>" id="age" required readonly><br>
         </div>

         <div style="margin-top:20px;">
           <label for="dob" style="font-size:20px;"><b>Date-Of-Birth:</b></label>
           <input type="date" style="padding:7px;border-radius:5px;border-color:white;float:right;" placeholder="Enter Date-Of-Birth" name="dob" value="<?php echo $user['dob']; ?>" id="dob" required readonly><br>
         </div>

         <div style="margin-top:20px;">
           <label for="mailid" style="font-size:20px;"><b>Mail-Id:</b></label>
           <input type="email" style="padding:7px;border-radius:5px;border-color:white;float:right;" placeholder="Enter MailId" name="mailid" id="mailid" value="<?php echo $user['mail']; ?>" required readonly><br>
         </div>

         <div style="margin-top:20px;">
           <label for="gender" style="font-size:20px;"><b>Gender:</b></label>
           <input type="text" style="padding:7px;border-radius:5px;border-color:white;float:right;" value="<?php echo $user['gender']; ?>" placeholder="Gender: (M) or (F)" name="gender" id="gender" required readonly><br>
         </div>

         <div style="margin-top:20px;">
           <label for="addr" style="font-size:20px;"><b>Address:</b></label>
           <textarea name="addr" id="addr" rows="5" cols="30" style="float:right;" maxlength="150" placeholder="Maximum 150 words:-" readonly><?php echo $user['address']; ?></textarea>
         </div>

         <div style="margin-top:110px;">
           <label for="uname" style="font-size:20px;"><b>Username:</b></label>
           <input type="text" style="padding:7px;border-radius:5px;border-color:white;float:right;" placeholder="Enter Username" name="uname" id="uname" value="<?php echo $user['user_name']; ?>" required readonly><br>
         </div>

           <div style="margin-top:28px;">
           <label for="psw" style="font-size:20px;"><b>Password:</b></label>
           <input type="text" style="padding:7px;border-radius:5px;border-color:white;float:right;" placeholder="Enter Password" name="psw" id="psw" value="<?php echo $user['password']; ?>" required readonly><br>
         </div>

         <div style="margin-top:28px;">
         <label for="cpsw" style="font-size:20px;"><b>Confirm-Password:</b></label>
         <input type="text" style="padding:7px;border-radius:5px;border-color:white;float:right;" placeholder="Confirm Password" name="cpsw" id="cpsw" value="<?php echo $user['password']; ?>" required readonly><br>
       </div>

           <center><input type="submit" value="Submit" name="update" id="update" style="width:100%;font-weight:bold;padding:8px;margin-top:8px;background-color:#009900;"><br></center><br>
         </form>
           <center><button name="edit" id="edit" onclick="switch1()" style="width:100%;font-weight:bold;padding:8px;margin-top:8px;background-color:#009900;">Edit</button><br></center><br>

         </div>
       </div>

     <div class="navigation">
       <ul>
         <li>
             <a href="#" onclick="viewdetails()">
               <span class="icon"><img src="images/details.png" width="28em" height="25em"/></span>
               <span class="title">Personal details</span>
             </a>
         </li>
         <li>
             <a href="appshed.php" onclick="">
               <span class="icon"><img src="images/appointment details.png" width="35em" height="28em"/></span>
               <span class="title">Appointments Scheduled</span>
             </a>
         </li>
         <li>
             <a href="apprec.php" onclick="">
               <span class="icon"><img src="images/records.png" width="35em" height="28em"/></span>
               <span class="title">All Patient Records</span>
             </a>
         </li>
         <li>
             <a href="schedule.php" onclick="">
               <span class="icon"><img src="images/slots.png" width="32em" height="32em"/></span>
               <span class="title">Day Slots</span>
             </a>
         </li>
         <li>
             <a href="d-receipt.php" onclick="">
               <span class="icon"><img src="images/receipt.png" width="32em" height="32em"/></span>
               <span class="title">Receipt</span>
             </a>
         </li>
         <li>
             <a href="d-logout.php">
               <span class="icon"><img src="images/arrow.png" width="32em" height="32em"/></span>
               <span class="title">Log Out</span>
             </a>
         </li>
       </ul>
     </div>
     <footer style="bottom:0;
       width:100%;
       position: fixed;
       background: #333;
       padding: 10px 0px;
       text-align: center;
       color: #fff;">
       "Thanks you for your service to our society"
     </footer>
   </body>
 </html>


<?php
}else{
     header("Location: d-index.php");
     exit();
}
 ?>
