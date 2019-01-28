<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>
    <?php 
    if (isset($_GET['id'])) {
       $view_id = $_GET['id'];
   // to retrieve data from table
    $result= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id' AND status=0"));
    $result1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM route WHERE id ='$view_id'"));
   
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
          <div class="panel-heading">List of Buses :<?echo $result1['route'];?></div>
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
               <th>Bus No</th>
                <th>Total seat</th>
               <th>Occupied seat</th>
               <th>Empty seat</th>
                <th>Seat Percentage Occupied</th>
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                   <td><?= $res['bus_no']?></td>
                   <td><?= $res['tot_seat']?></td>
                   <td><?= $res['full_seat']?></td>
                   <td><?= $res['empty_seat']?></td>
                   <td><? echo ($res['full_seat']/$res['tot_seat'])*100; ?></td>

                </tr>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>
<div>
  <button type="button" class="btn btn"><a href="start.php?id=<?= $view_id ?>" title="Start"> bus _at_start</a></button>
</div>
<div>
  <button type="button" class="btn btn"><a href=".." title="Start"> bus _at_end</a></button>
</div>
<div>
  <button type="button" class="btn btn"><a href=".." title="Start"> bus _moving</a></button>
</div>
<div class="panel-footer" style="text-align: center;">© Kathfoord International</div>

</body>
</html>