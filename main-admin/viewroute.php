<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>

   <?php 
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM route");
    
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
              <th>ID</th>
              <th>Name</th>
               <th>No of bus</th>
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?= $res['id']?></td>
                  <td><?= $res['route']?></td>
                  <td><?= $res['no_of_bus']?></td>
                  <td><a href="../main-admin/viewbus.php?id=<?=$res['id']?>" >view</a></td>
                  
                
                
                </tr>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>

<div class="panel-footer" style="text-align: center;">© Manage Transport</div>

</body>
</html><?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>

   <?php 
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM route");
    
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
              <th>ID</th>
              <th>Name</th>
               <th>No of bus</th>
            
             

            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?= $res['id']?></td>
                  <td><?= $res['route']?></td>
                  <td><?= $res['no_of_bus']?></td>
                  <td><a href="../main-admin/viewroute.php?id=<?=$res['id']?>" >view</a></td>
                   <td><a href="../main-admin/viewbus.php?id=<?=$res['id']?>" >view bus list</a></td>

                  
                
                
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