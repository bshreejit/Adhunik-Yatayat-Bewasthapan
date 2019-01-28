<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>

   <?php 
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM user");
    
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
           <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">List of User</div>
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
               <th>Bus ID</th>
                <th>Name</th>
                  <th>Email</th>
              
            
             

            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?= $res['id']?></td>
                  <td><?= $res['bus_id']?></td>
                  <td><?= $res['name']?></td>
                  <td><?= $res['email']?></td>
                  

                  
                
                
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
  

<div class="panel-footer" style="text-align: center;">© Adhunik Yatayat Bewasthapan</div>

</body>
</html>