<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>
    <?php 
    if (isset($_GET['id'])) {
       $view_id = $_GET['id'];
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'");
  }
    
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
           <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">List of Route</div>
        <?php 
          if (isset($_SESSION['deleted'])) {
            echo "<div class='alert alert-success' id='success-div'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true' > Successfully deleted </span>
          </div>";
           unset($_SESSION['deleted']);
          }
         ?>

          <!-- Table -->
          <table class="table">
            <tr>
               <th>No of bus</th>
               <th>Full seat</th>
               <th>Empty seat</th>
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                   <td><?= $res['bus_no']?></td>
                   <td><?= $res['full_seat']?></td>
                   <td><?= $res['empty_seat']?></td>
                </tr>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>

<div class="panel-footer" style="text-align: center;">© Adhunik Yatayat Bewasthapan</div>
</body>
</html>