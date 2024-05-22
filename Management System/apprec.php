<?php
session_start();
include "d-db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <?php
 $connection=mysqli_connect("127.0.0.1:3308","root","");
 $db=mysqli_select_db($connection,'doctorpatient');
 $val="";
 if(isset($_POST['search']))
 {
   $val=isset($_POST['text']) ? $_POST['text'] : '';
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Appointment details</title>
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
  <style>
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
    table
    {
      border-collapse: collapse;
      width:95%;
      color:100%;
      border: 1px solid black;
      font-family: monospace;
      font-size: 1.2vw;
      text-align: left;
      margin-left: 2vw;
      margin-top:8vw;
    }
    th
    {
      padding:13px;
      background-color: #588c7e;
      color:white;
    }
    td
    {
      padding:18px;
    }
    tr:nth-child(even){background-color: green;}
  </style>
</head>
<body>
  <center><h1 style="
    width:100%;
    position: fixed;
    text-align: center;
    font-size:3vw;top:0;background: rgba(46, 49, 49, 0.3);padding-top:0.1em;padding-bottom:0.1em;">Hello, <?php echo $_SESSION['name']; ?></h1></center>
<form method="post">
<div style="float:right;">
  <input  style="margin-top:8vw;border-radius: 4px;margin-bottom: 2vw;padding:1vw;padding-right:3vw;" type="text" name="text" class="search" placeholder="Search By Name">
  <input  style="margin-top:8vw;padding:1vw;border-radius: 10px;background-color:black;color:white;margin-bottom: 2vw;" type="submit" name="search" class="search" value="Search">
</div>
</form>
  <table>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Date Of Birth</th>
      <th>MailId</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Username</th>
    </tr>
    <?php
    $conn=mysqli_connect("127.0.0.1:3308","root","","doctorpatient");
    if($conn->connect_error)
    {
      die("Connection failed:".$conn->connect_error);
    }
    if($val=='')
    {
        $sql="SELECT name,age,dob,mail,gender,address,user_name from patients";
    }
    else {
        $sql="SELECT name,age,dob,mail,gender,address,user_name from patients where name rlike '^.*$val.*$'";
    }
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc())
      {
        echo "<tr><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['dob']."</td><td>".$row['mail']."</td><td>".$row['gender']."</td><td>".$row['address']."</td><td>".$row['user_name']."</td></tr>";
      }
      echo "</table>";
    }
    else {
      echo "0-result";
    }
    $conn->close();
     ?>
  </table>
</body>
</html>
<?php
}else{
     header("Location: p-index.php");
     exit();
}
 ?>
