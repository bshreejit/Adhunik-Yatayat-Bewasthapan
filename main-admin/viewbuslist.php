<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>
    <?php 
    if (isset($_GET['id'])) {
       $view_id = $_GET['id'];
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'");
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
              <th>Bus ID</th>
              <th>User ID</th>
               <th>Bus No</th>
                <th>Total seat</th>
               <th>Occupied seat</th>
               <th>Empty seat</th>
                <th>Seat Percentage Occupied</th>
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?= $res['id']?></td>
                    <td><?= $res['user_id']?></td>
                   <td><?= $res['bus_no']?></td>
                   <td><?= $res['tot_seat']?></td>
                   <td><?= $res['full_seat']?></td>
                   <td><?= $res['empty_seat']?></td>
                   <td><?=(int) (($res['full_seat']/$res['tot_seat'])*100) ?>%</td>

                </tr>
                
          
            <?php
              }        
            ?>
          </table>
        </div>
        
    </div>
</div>


<!-- <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" ></div>
        <div class="home_content">
          <ul class="list-group">
            
            <a href="../main-admin/busstart.php?id=<?=$view_id?>"><li class="list-group-item active">Bus At Bus Stand.</li></a><br>
            <a href="../main-admin/busdestination.php?id=<?=$view_id?>"><li class="list-group-item active">Bus At Destination Stand.</li></a><br>
            <a href="../main-admin/busmoving.php?id=<?=$view_id?>"><li class="list-group-item active">Bus in Route.</li></a><br>
            
          </ul>
        </div>
      </div> -->


  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="../main-admin/busstart.php?id=<?=$view_id?>" role="tab" aria-controls="home">Bus At Bus Start Stop.</a>
          <!-- <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> -->
        </div>
      </div>
    
      <div class="col-12">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="../main-admin/busdestination.php?id=<?=$view_id?>" role="tab" aria-controls="home">Bus At Destination Stand.</a>
          <!-- <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> -->
        </div>
      </div>
      <div class="col-12">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="../main-admin/busmoving.php?id=<?=$view_id?>" role="tab" aria-controls="home">Bus in Running State</a>
          <!-- <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> -->
        </div>
      </div>
    </div>
    
</div>
   
<div class="panel-footer" style="text-align: center;">© Adhunik Yatayat Bewasthapan</div>

</body>
</html>