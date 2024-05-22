<?php
session_start();
include "d-db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Appointment details</title>
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
      font-size:1.2vw;
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
  </style>
</head>
<body>
  <center><h1 style="
    width:100%;
    position: fixed;
    text-align: center;
    font-size:3vw;top:0;background: rgba(46, 49, 49, 0.3);padding-top:0.1em;padding-bottom:0.1em;">Hello, <?php echo $_SESSION['name']; ?></h1></center>
  <table>
    <tr>
      <th>Date</th>
      <th>9-00 to 9-30</th>
      <th>10-00 to 10-30</th>
      <th>11-00 to 11-30</th>
      <th>12-00 to 12-30</th>
      <th>1-30 to 2-00</th>
      <th>2-30 to 3-00</th>
      <th>3-30 to 4-00</th>
      <th>4-30 to 5-00</th>
    </tr>
    <?php
    $conn=mysqli_connect("127.0.0.1:3308","root","","doctorpatient");
    if($conn->connect_error)
    {
      die("Connection failed:".$conn->connect_error);
    }
    $sql="SELECT date,m1,m2,m3,m4,a1,a2,a3,a4 from slots";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc())
      {
        echo "<tr><td>".$row['date']."</td><td>".$row['m1']."</td><td>".$row['m2']."</td><td>".$row['m3']."</td><td>".$row['m4']."</td><td>".$row['a1']."</td><td>".$row['a2']."</td><td>".$row['a3']."</td><td>".$row['a4']."</td></tr>";
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
