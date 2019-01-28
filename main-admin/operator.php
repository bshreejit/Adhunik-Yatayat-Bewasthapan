
<?php 
   session_start();
     if (!isset($_SESSION['general-login'])){
      // header(string:"Location:login.php");
      header("location:login.php");
      exit();
     }else{
      $id= $_SESSION['general-login'];
      echo $id;
    //   $result=mysqli_query($conn, "SELECT * FROM user WHERE id ='$id'");
    //  $bus_id=$result['bus_id'];
    // $result1 = mysqli_query($conn, "SELECT * FROM bus WHERE id ='$bus_id'");
    // echo  $result1 ['bus_no'];
   
     } 
     ?>