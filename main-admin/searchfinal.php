<?php

  require_once($_SERVER['DOCUMENT_ROOT'] . '/visitAdmin/assets/database/dbconfig.php');




if(isset($_GET['duration']) && isset($_GET['price']) && isset($_GET['destinations']) )	{
	$duration=$_GET['duration'];
	$price=$_GET['price'];
	$destinations=$_GET['destinations'];
  

   if($duration=='' && $price=='' && $destinations==''){
    $sql = "SELECT name,id FROM package";
    $result= mysqli_query($conn,$sql);
     
       if($result){
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
               $rows[] = $r;
               }
            header('Content-Type: application/json');
               echo json_encode($rows);
            
             
    	   
    	 
    }
}
    

    else{


     $conditions = array();

  

     if ($duration != '') $conditions[] = "duration LIKE '$duration%'";
     if ($destinations != '') $conditions[] = "destinations LIKE '$destinations%'";
     if($price =='')$conditions[] =  "price LIKE '$price%'";
     
// all we need now is to concatenate array elements with " AND " glue
       $sql_cond = join(" AND ", $conditions);
        
         if ($sql_cond != ''){ 
         	$sql = "SELECT name,id FROM package WHERE $sql_cond";
            $result= mysqli_query($conn,$sql);
      
            if($result){
              $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
               $rows[] = $r;
               }
              
               header('Content-Type: application/json');
               echo json_encode($rows);
            
            
             
    }
}
        
    }
}
?>