 <?php include '../partials/header.php' ?>
<body>
 <?php 
    if (isset($_GET['id'])) {
       $view_id = $_GET['id'];
      $res= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM  WHERE id ='$view_id'"));
    $query = "UPDATE `bus` SET `status`='2' WHERE id='$view_id'";
    // echo $query;exit;
    if(mysqli_query($conn,$query)){
      $success = 'true';
      header("location:../busstart.php?id=<?= $view_id?>");
    } else{
        $error = 'true';
    }
    }
   ?> 