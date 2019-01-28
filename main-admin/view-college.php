<?php include '../partials/header.php' ?>
<?php 
  //session_start();
  
 if(isset($_GET['id'])){
    $college_id=$_GET['id'];
   


      ?>
      <?php

    if (isset($_POST['submit'])) {
    $query = "UPDATE `college` SET `status`='1' WHERE id='$college_id'";
     //echo $query;
    //exit;
    if(mysqli_query($conn,$query)){
      $success = 'true';
      echo $sucess;
      header("location:../main-admin/list-college.php");
    } else{
        $error = 'true';
    }
    }
 
 }

  ?>


   <body>
   <?php include '../partials/nav.php' ?>
   <?
   $info=mysqli_query($conn,"SELECT * FROM information WHERE college_id = '$college_id'");
    $program=mysqli_query($conn,"SELECT * FROM programs WHERE college_id = '$college_id'");
   
    
      $resu= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM college WHERE id ='$college_id'"));
      ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
            <div class="well">
            <h2>view college </h2>
            <?
   $info=mysqli_query($conn,"SELECT * FROM information WHERE college_id = '$college_id'");
    $program=mysqli_query($conn,"SELECT * FROM programs WHERE college_id = '$college_id'");
   
    
      $resu= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM college WHERE id ='$college_id'"));
      ?>

             

         <div class="form-group">
            <label for="comment"><?= $resu['name']?></label>
             <form> -->

              
           <?php //while ($res2= mysqli_fetch_assoc($program)) { ?>
           
          <!--  <div class="form-group">
            <label for="comment"><?= $res2?></label>
            
            <input type="text" class="form-control" rows="4" id="information" value="<?= $res?>" name="description">
            <br>-->


           <?php 
        // } ?>

           <?php   if(!$resu['status']){ ?>
               <input class="btn btn-lg btn-success" type="submit" name="submit" value="Approve">
                <button type="button" class="btn btn-lg btn-danger" type="decline" name="decline"><a onclick="return confirm('Are you sure to decline this user?');" href="../partials/delete.php?id=<?= $res['id']?>&table=users" title="Delete">Decline</a></button>
            </div>
            <?php }  ?>

          </form>
            </div>
        </div>
    </div>
</div>
<div class="panel-footer" style="text-align: center;">© Kathford International</div>
</body>

</html> 