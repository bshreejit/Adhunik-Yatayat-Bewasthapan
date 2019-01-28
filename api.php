<?php 
 $value=$_POST["noOfSeats"];
 echo $value;
 $flag=$_POST["add"];
 echo $flag;
 $status=$_POST["status"];
?>


 <?php 
   session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/trans/assets/database/dbconfig.php');
     if (!isset($_SESSION['general'])){
      // header(string:"Location:login.php");
      header("location:index.php");
      exit();
     }else{
      $id= $_SESSION['general'];
        header("location:Operator.php");
     } 
  
   // to retrieve data from table
    $sql = "SELECT * FROM user where id='$id'";
      $result= mysqli_query($conn,$sql);
                $res_fetch = mysqli_fetch_assoc($result);
                $bus_id=$res_fetch['bus_id'];
              
    ?>

<?php 
// if(isset($_POST['click']))
// {
//    $id=1;

// // echo $flag=(isset($_GET['lat']))?$_GET['lat']:'';
// // echo "<br>";
// // echo $value=(isset($_GET['long']))?$_GET['long']:'';



// //do whatever you want

// $value=5;
// $flag=1;



 $old_result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bus WHERE id ='$bus_id'"));
  $old_full=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM full WHERE id = '$bus_id'"));
   $old_empty=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM empty WHERE id = '$bus_id'"));
    $old_timerecordf=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM timerecordf WHERE id = '$bus_id'"));
     $old_timerecorde=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM timerecorde WHERE id = '$bus_id'"));

if ($flag) {
	$f=$old_result['full_seat'];
	echo $f;
  $val=$value+$f;
  echo $val;
	# code...
}else{
  $f=$old_result['full_seat'];
	$val=$f-$value;

}
//fullness frequency
$freq=$old_full['freq_full'];
//empty frequency
$efreq=$old_empty['freq_empty'];

 //first update full seat
 $sql = "UPDATE bus SET full_seat=$val WHERE id=$bus_id";
 if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

//extract full seat update and calculate
$new_result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bus WHERE id = $bus_id"));
      
if ($new_result['full_seat']<$new_result['tot_seat']) {
	
	$full=0;
	$full_seat=$new_result['full_seat'];
	$empty_seat=$new_result['tot_seat']-$full_seat;
	//check for empty range
	if (($empty_seat/$new_result['tot_seat'])>=0.8) {
		$efreq++;
	}
	# code...
}elseif ($new_result['full_seat']>=$new_result['tot_seat']) {
	$full=1;
	$freq++;
	$full_seat=$new_result['tot_seat'];
    $empty_seat=$new_result['tot_seat']-$full_seat;
}
else{
	$full=1;
	$full_seat=$new_result['tot_seat'];
	$empty_seat=$new_result['tot_seat']-$full_seat;
}

 $sql = "UPDATE bus SET full=$full,empty_seat=$empty_seat,full_seat=$full_seat WHERE id=$bus_id";
 if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$new_res=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bus WHERE id = $bus_id"));
echo "seat";
echo $new_res['empty_seat'];

//update full table
$sqli = "UPDATE full SET freq_full=$freq WHERE bus_id=$bus_id";
if (mysqli_query($conn, $sqli)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


  //update empty table 
$sqli = "UPDATE empty SET freq_empty=$efreq WHERE bus_id=$bus_id";
if (mysqli_query($conn, $sqli)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



?>



