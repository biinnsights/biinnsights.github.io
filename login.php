<?php
session_start();
error_reporting(0);
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="shopping-cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:30px;margin-left: 35%;">
<div class="col-md-4">
<div class="login-panel panel panel-default">
                    
                        <h3 class="panel-title" style="font-size: 30px;margin-left: 15px;margin-top: 20px;">Login</h3>
                
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                  <block>Enter phone or email<block>
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                  <block>Password<block>
                                    <input class="form-control" placeholder="Password" name="password" type="password" autofocus="">
                                </div>
                                <button type="submit" class="btn btn-sm btn-warning" name="login" style="width: 100%;">Continue</button>
                                <a href="#demo" data-toggle="collapse" style="color: black;display: block; padding: 7px;">Need help?</a>
                                <div id="demo" class="collapse">
                                <a href="#forgotpas" style="color:black;padding: 7px;">forgot Password</a><br>
                                <a href="#otherissues" style="color:black;padding: 7px;">Other issues with sign in</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

</div>
</div>
<hr>
<a href="signup.php" class="btn btn-sm btn-default" style="width: 26%;margin-left: 37%;color: gray;">Create your BII account</a>
</body>
</html>

