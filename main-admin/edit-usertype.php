<?php include '../partials/header.php' ?>

   <?php 
  //session_start();
  
 if(isset($_GET['id'])){
    $edit_id=$_GET['id'];
    
    $old_result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT user_type FROM users WHERE id = $edit_id"));
   // var_dump($old_result);exit;
    //$_SESSION['edited']='true';


 if (isset($_POST['submit'])) {
    $user_type = $_POST['user_type'];
    $query = "UPDATE `users` SET `user_type`='$user_type' WHERE id= $edit_id";
    // echo $query;exit;
    if(mysqli_query($conn,$query)){
      $success = 'true';
    }else{
      $error = 'true';
    }
  }
 }
  ?>


   <body>
   <?php include '../partials/nav.php' ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
            <div class="well">
            <h2>Edit usertype</h2>
              <form method="POST" name="myForm" action="edit-usertype.php?id=<?=$edit_id?>" >
           
            <div class="form-group">
            <label for="comment">Edit Usertype</label>
         
            <textarea class="form-control" rows="2" id="edit-usertype" name="user_type"><?=isset($_POST['submit'])?$_POST['user_type']:$old_result['user_type']?></textarea>
          </div>
         
            <div class="alert alert-danger" id="error-div" style="display: none;">
              <span class="glyphicon glyphicon-exclamation-sign" id="error" aria-hidden= 'true' ></span>
            </div>
            <div class="form-group">
              <button class="btn btn-sucess pull-right" style="margin-right: 10px" type="submit" name="submit">Update</button>
            <br></div>
            <?php 
              if (isset($success)) {
                echo "<div class='alert alert-success' id='success-div'>
                    <span class='glyphicon glyphicon-exclamation-sign' id='error' aria-hidden= 'true' >  edited Successfully</span>
                    </div>";
              }

             ?>
          </form>
            </div>
        </div>
    </div>
</div>

<div class="panel-footer" style="text-align: center;">© Kathfoord International</div>
</body>
</html>