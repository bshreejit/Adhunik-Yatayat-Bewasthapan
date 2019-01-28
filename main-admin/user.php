<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>

   <?php 
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT id,name,address,email,user_type FROM user");
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
           <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">List of users</div>
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
              <th>username</th>
              <th>address</th>
               <th>email</th>
                <th>user_type</th>
                 <th>Bus_ID</th>
              
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?= $res['id']?></td>
                  <td><?= $res['name']?></td>
                  <td><?= $res['address']?></td>
                  <td><?= $res['email']?></td>
                  <td><?= $res['user_type']?></td>
                  
                  <td><a href="../main-admin/edit-usertype.php?id=<?=$res['id']?>" title="Edit usertype"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure to delete this item?');" href="../partials/delete.php?id=<?=$res['id']?>&table=user" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>| <a href="../main-admin/pops.php?id=<?=$res['id']?>" >view</a>
                </tr>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>

<div class="panel-footer" style="text-align: center;">© Visit Nepal</div>

</body>
</html>