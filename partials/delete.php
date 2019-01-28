<?php 
	session_start();
 	require_once($_SERVER['DOCUMENT_ROOT'] . '/minor/assets/database/dbconfig.php');
	$delete_id = $_GET['id'];
	$delete_table = $_GET['table'];
     if($delete_table == 'problems')
     { 
	$query = "DELETE FROM $delete_table WHERE id = $delete_id";
	if(mysqli_query($conn,$query)){
		$_SESSION['deleted']='true';
	};
header("location:../pages/list-problems.php");
}
 else if($delete_table == 'remedies')
     { 
	$query = "DELETE FROM $delete_table WHERE id = $delete_id";
	if(mysqli_query($conn,$query)){
		$_SESSION['deleted']='true';
	};
header("location:../pages/list-remedies.php");
}
 else if($delete_table == 'injuries')
     { 
	$query = "DELETE FROM $delete_table WHERE id = $delete_id";
	if(mysqli_query($conn,$query)){
		$_SESSION['deleted']='true';
	};
header("location:../pages/list-injuries.php");
}
 else if($delete_table == 'health_tips')
     { 
	$query = "DELETE FROM $delete_table WHERE id = $delete_id";
	if(mysqli_query($conn,$query)){
		$_SESSION['deleted']='true';
	};
header("location:../pages/list-heathtips.php");
}
 else if($delete_table == 'first_aid_tips')
     { 
	$query = "DELETE FROM $delete_table WHERE id = $delete_id";
	if(mysqli_query($conn,$query)){
		$_SESSION['deleted']='true';
	};
header("location:../pages/list-firstaidtips.php");
}
 else if($delete_table == 'users'){ 
 	/*find image name*/
     	$query1= "SELECT image from $delete_table WHERE id = $delete_id";
     	$res = mysqli_fetch_assoc(mysqli_query($conn,$query1));
   
	/*delete process*/
	$query = "DELETE FROM $delete_table WHERE id = $delete_id";
	if(mysqli_query($conn,$query)){
		$_SESSION['deleted']='true';
		$target_dir = "../image-upload/";
		$target_file = $target_dir . basename($res['image']);
		unlink($target_file);
	};
header("location:../pages/users.php");
}
?>