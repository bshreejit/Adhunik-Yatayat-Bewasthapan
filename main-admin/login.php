<?php 
 require_once($_SERVER['DOCUMENT_ROOT'] . '/visitAdmin/assets/database/dbconfig.php');
 session_start();
 if( isset($_POST['pwd']) and isset($_POST['uname']) and isset($_POST['usertype']) ) {
    $username= $_POST['uname'];
    $password= $_POST['pwd'];
    $usertype= $_POST['usertype'];
    if ($password == ""||$username =="") {
        $message="Field Required";
        echo $message;
    
    }else {


        //echo $email;
        // $sql ="SELECT * FROM user WHERE email='$email' AND password='$password'";
        $sql ="SELECT * FROM user WHERE name='". $username."' AND password='".$password."'";

          //   echo mysqli_num_rows(mysqli_query($conn,$sql));
          // exit();
         if(mysqli_num_rows(mysqli_query($conn,$sql))){

            // $result = mysqli_query($sql);
          //     $res_fetch = mysqli_fetch_assoc($result);
       
            if ($usertype == 'mainadmin') { 
                $result = mysqli_query($conn,$sql);
                $res_fetch = mysqli_fetch_assoc($result);
                 $_SESSION['main-login']=$res_fetch['id'];
                 echo 'mainadmin';
                header("location:../main-admin/maindashboard.php");
            
            
            }elseif ($usertype == 'admin') {
                $result = mysqli_query($conn,$sql);
              $res_fetch = mysqli_fetch_assoc($result);
                 $_SESSION['general']=$res_fetch['id'];
                //$_SESSION['admin-login']=$sql['id']; // session for general user
                //$all_data_user=mysqli_fetch_assoc(mysqli_query($conn,$sql));
                 //$_SESSION['user-login-name']=$all_data_user['name']
                 header("location:index.php");
                 echo 'general';

            }
            else{
                $result = mysqli_query($conn,$sql);
              $res_fetch = mysqli_fetch_assoc($result);
                 $_SESSION['general']=$res_fetch['id'];
                //$_SESSION['admin-login']=$sql['id']; // session for general user
                //$all_data_user=mysqli_fetch_assoc(mysqli_query($conn,$sql));
                 //$_SESSION['user-login-name']=$all_data_user['name']
                 header("location:index.php");
                 echo 'general';

            }
         }
     }

           
         // else{
         //    $error = 'Invalid login informations';
         //      echo $error;
         //    }  
      }
 ?>
 
  <html>
<head>
    <title></title>
    <style type="text/css">
        table{
            margin-top: 150px;
            border: 1px solid;
            background-color: #eee;

        }
         td{
            border:0px;
            padding: 10px;
         }
         th{
            border-bottom: 1px solid;
            background-color: #ddd;
         }
</style>
</head>
<body>
    <form  method="post"> <?//action="welcome.php"?>

        <table align="center">
            <tr>
                <th colspan="2"><h2 align="centre">login</h2></th>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="pwd"></td>
            </tr>
            
            <tr><td>Select Usertype:
                <p class="radio radio-inline new">
                    <input type="radio" name="usertype" value="mainadmin">
                    Main admin</p><p class="radio radio-inline" >
                    <input type="radio" name="usertype" value="admin" checked="true">
                    company admin</p>
                    <input type="radio" name="usertype" value="general" checked="true">
                    general user</p>
            </td></tr>
            <!-- <tr>
            
                    <label class="radio radio-inline new">
                    <input type="radio" name="usertype" value="mainadmin">
                    Main admin</label><label class="radio radio-inline" >
                    <input type="radio" name="usertype" value="admin" checked="true">
                    college admin</label>
                </tr> -->
            <tr>
                <td align="right" colspan="2"><input type="submit" name="login" value="login"></td>
            </tr>
        </table> 
    </form>
</body>