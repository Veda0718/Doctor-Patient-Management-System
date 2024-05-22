<?php
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	$uname=$_POST['uname'];
    $files = $_FILES["uploadfile"];
    $filename = $files['name'];
    $fileerror= $files['error'];
    $filetmp = $files['tmp_name'];
    $fileext=explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','webp','gif','pdf');
    $db = mysqli_connect("127.0.0.1:3308", "root", "", "doctorpatient");

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $uname = validate($_POST['uname']);
    if (empty($uname)) {
      header("Location: d-index.php?error=User Name is required");
      exit();
    }else if(empty($files)){
        header("Location: d-index.php?error=Upload Receipt");
      exit();
    }else{
    $sql = "SELECT * FROM patients WHERE user_name='$uname'";
    $result = mysqli_query($db, $sql);
      if ($result) {
        while($row = mysqli_fetch_array($result)) {
          if(in_array($filecheck,$fileextstored)){
            $destinationfile='receipt/'.$filename;
            move_uploaded_file($filetmp, $destinationfile);
            $query1="UPDATE patients SET receipt='$destinationfile',uploaddate=current_date() where user_name='$uname'";//INSERT INTO patients (receipt) VALUES ('$destinationfile')
            $ins=mysqli_query($db,$query1);
            echo $ins;
            if($ins)
            {
              header("Location: d-receipt.php?success=Receipt is uploaded");
              exit();
            }
            else
            {
              header("Location: d-receipt.php?error=Receipt is not uploaded");
              exit();
            }
          }
        }
      }else{
        header("Location: d-receipt.php?error=Incorrect User name");
            exit();
      }
    }
  }
