<?php
session_start();
if(isset($_POST['submit']))
{
    $time=$_POST['time'];
    $c=mysqli_connect("127.0.0.1:3308","root","","doctorpatient");
    $query = "SELECT $time FROM slots limit 1";
    $result = mysqli_query($c,$query);
    if ($result) {
        while($row = mysqli_fetch_array($result)) {
                    $query1="UPDATE slots SET $time='$_SESSION[name]' where $time='Empty'";
                                echo $query1;
                	$ins=mysqli_query($c,$query1);
    				if(mysqli_affected_rows($c)!=0)
    				{
        				header("Location: p-booking.php?success=Your appointment is booked");
             exit();
    				}
                    else
                    {
                        header("Location: p-booking.php?error=Doctor is busy!!");
             exit();
                    }
            }
    }
    else {
        header("Location: p-login.php?error=Doesn't exist!");
             exit();
    }
    mysqli_close($c);
}
?>
