<?php include '../partials/header.php' ?>
 <?php 
    if (isset($_GET['id'])) {
       $view_id = $_GET['id'];
   // to retrieve data from table
     $res= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM route WHERE id ='$view_id'"));
     $res1= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'"));
     $bus_id=$res1['id'];

  }
         $scount=0;
             $resul= mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'AND status=0 ");

              while ($resu = mysqli_fetch_assoc($resul)) {
                $scount++;
                  }




         $ecount=0;
             $resul= mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'AND status=1 ");

              while ($resu = mysqli_fetch_assoc($resul)) {
                $ecount++;
                  }
              


         $fcount=0;
             $resul= mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'AND full=1 ");

              while ($resu = mysqli_fetch_assoc($resul)) {
                $fcount++;
                  }
                  

         $emcount=0;
             $resul= mysqli_query($conn, "SELECT * FROM bus WHERE route_id ='$view_id'AND (full_seat/tot_seat)<=0.3");

              while ($resu = mysqli_fetch_assoc($resul)) {
                $emcount++;
                  }
                  ?>
           
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
  <div class="panel-heading" align="center">  <h4 align="center">Route Info</h4></div>
   <div class="panel-body" align="center">
       
    <div class="box box-info" align="center">
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1; font-size: 30px;"><strong><?= $res['route']?></strong></h4></span>
              <span><p style="font-size: 20px;"><?= $res['route']?></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
            <ul class="list-group" style="font-size: 120%;"  >
                          <li class="list-group-item"><strong> total no of bus :</strong><?= $res['no_of_bus']?></li>
                          <li class="list-group-item list-group-item-success"></li>
                           <li class="list-group-item"><strong>total bus full :</strong>  <?= $fcount?></li>
                          <li class="list-group-item list-group-item-info"></li>
                          <li class="list-group-item"><strong>total bus empty : </strong> <?= $emcount?> </li>
                          <li class="list-group-item list-group-item-warning"></li>

                          <li class="list-group-item"><strong>total bus at start : </strong> <?= $scount?></li>
                          <li class="list-group-item list-group-item-sucessr"></li>
                          <li class="list-group-item"><strong>total bus at end : </strong> <?= $ecount?></li>
                          <li class="list-group-item list-group-item-danger"></li>
                          <?php $per=(int)(($fcount/ $res['no_of_bus'])*100); ?>
                          <li class="list-group-item"><strong>percentage full : </strong> <?= $per?>%</li>
                          <li class="list-group-item list-group-item-danger"></li>
                          </ul>
                          <form method="POST">
                          <div class="form-group">
            
           
            </form>
                  
                    



            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       <div class="modal-footer">
          <a href="list-route.php" button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</a>
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
