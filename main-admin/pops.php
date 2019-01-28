<?php include '../partials/header.php' ?>
 <?php 
    if (isset($_GET['id'])) {
       $view_id = $_GET['id'];
      $res= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id ='$view_id'"));
     if (isset($_POST['submit'])) {
    $query = "UPDATE `user` SET `status`='1' WHERE id='$view_id'";
     //echo $query;
    //exit;
    if(mysqli_query($conn,$query)){
      $success = 'true';
      header("location:../main-admin/user.php");
    } else{
        $error = 'true';
    }
    }
  } ?>
  <?php 
         if (isset($_SESSION['deleted'])) {
            echo "<div class='alert alert-success' id='success-div'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true' > users declined sucessfully </span>
          </div>";
           unset($_SESSION['deleted']);
          }
         ?> 
    
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>User Profile  - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
                  input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
  border:2px solid #03b1ce ;}
  .tital{ font-size:16px; font-weight:500;}
   .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}  
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body >
  <div class="container" align="center">
  <div class="row" align="center">        
        
       <div class="col-md-7 " align="center">

<div class="panel panel-default" align="center">
  <div class="panel-heading" align="center">  <h4 align="center">User Profile</h4></div>
   <div class="panel-body" align="center">
       
    <div class="box box-info" align="center">
        
            <div class="box-body" align="center">
                     <div class="col-sm-6"align="center">
                
                     <div  align="center"> <img src="<?= '../image-upload/'.$res['image']?>" class="img-circle" alt="Cinque Terre" width="200" height="200" > 
                
              
                <!--Upload Image Js And Css-->
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1; font-size: 30px;"><strong><?= $res['name']?></strong></h4></span>
              <span><p style="font-size: 20px;"><?= $res['user_type']?></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
            <ul class="list-group" style="font-size: 120%;"  >
                          <li class="list-group-item"><strong>Username :</strong><?= $res['name']?></li>
                          <li class="list-group-item list-group-item-success"></li>
                           <li class="list-group-item"><strong>email :</strong>  <?= $res['email']?></li>
                          <li class="list-group-item list-group-item-info"></li>
                          <li class="list-group-item"><strong>user type : </strong> <?= $res['user_type']?> </li>
                          <li class="list-group-item list-group-item-warning"></li>

                          <li class="list-group-item"><strong>Address : </strong> <?= $res['address']?></li>
                          <li class="list-group-item list-group-item-danger"></li>
                          </ul>
                          <form method="POST">
                          <div class="form-group">
            <!--  <button class="btn btn-sucess pull-centre" style="margin-right: 10px, height:10000px,width:400px" type="submit" name="submit">approve</button>
            </div> -->
            <?php  if(!$res['status']){ ?>
               <input class="btn btn-lg btn-success" type="submit" name="submit" value="Approve">
                <button type="button" class="btn btn-lg btn-danger" type="decline" name="decline"><a onclick="return confirm('Are you sure to decline this user?');" href="../partials/delete.php?id=<?= $res['id']?>&table=users" title="Delete">Decline</a></button>
            </div>
            <?php }?>
            </form>
                  
                    



            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       <div class="modal-footer">
          <a href="approved-user.php" button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</a>
          <script>
            
          </script>
        </div>
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
       
       
       
       
       
       
       
       
       
   </div>
</div>




         
  <script type="text/javascript">
  
  </script>
</body>
</html>
