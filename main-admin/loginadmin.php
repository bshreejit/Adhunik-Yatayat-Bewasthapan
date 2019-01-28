<!DOCTYPE html>
<html>   
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            Login
        </div>
        <div class="loginForm">
            <form method="post" id="login_form" onsubmit="return validate();" action="login.php">
                <input id="email" type="text" placeholder="Enter Email" name="txtEmail" value="<?= isset($username)?$username:""?>">
                <input id="password" type="password" placeholder="Enter Password" name="txtPassword" value="<?= isset($password)?$password:""?>">
                <label>Select Usertype:</label>
                    <label class="radio radio-inline new">
                    <input type="radio" name="usertype" value="Admin">
                    Admin</label><label class="radio radio-inline" >
                    <input type="radio" name="usertype" value="General" checked="true">
                    General</label>
                    <br>
                    <input type="submit" name="Login" name="btnSubmit" value="Login">
                    <div class="alert alert-danger" id="error-div">
                        <span class="glyphicon glyphicon-exclamation-sign" id="error" aria-hidden= 'true'></span>
                    </div>
                   <!-- <input type="submit" name="register" name="btnSubmit" value="Register">
                    <div class="alert alert-danger" id="error-div">
                    </div> -->
                    <center><a href="forgot_password.php">forgot password</a></center>
                    <br>
                    <p><strong>do not have account?</strong><a href="register.php">register</a></p>
                    <center><a href="forgot_password.php">forgot password</a></center>

                    <?php 
                    if (isset($error)) {
                        echo "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true'> ".$error."</span>
                    </div>";
                }
                ?>
            </form>
        </div>
    </div>
</body>
<style>
    .new{
       margin-top: -3px; 
    }
    .container{
        width: 400px;
        background-color: #ccc;
        margin: auto;
        border: 3px solid;
        margin-top: 100px;
    }
    .header{
        background-color: #999;
        height: 30px;
        margin: 0px;
        text-align: center;
        color: #fff;
        font-size: 20px;
    }
    input[type=text], input[type=password] {
        width: 350px;
        padding:12px 20px;
        margin:10px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-left: 0px;
        font-size: 15px;
    }
    input[type=submit]{
        background-color: #4CAF50;
        color: white;
        padding:10px 20px;
        margin: 10px 0;
        border: none;
        cursor: pointer;
        width: 350px;
        margin-left: 0px;
    }
    input[type=button]{
        background-color: #4CAFff;
        color: white;
        padding:10px 20px;
        margin:10px 0;
        border: none;
        cursor: pointer;
        width: 350px;
        margin-left: 0px;
    }
</style>
</html>