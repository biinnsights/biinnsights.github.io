<?php
include('dbconnect.php');
if(isset($_POST['submit']))
{ 
$customername = $_POST['customername'];
$phnumber = $_POST['phnumber'];
$email = $_POST['email'];
$password = $_POST['password'];
if($customername !=''||$email !='')
{
$sql = "insert into signup(customername, phnumber, email, password) values ('$customername', '$phnumber', '$email', '$password')";
if (mysqli_query($con, $sql)) {
      echo "record inserted successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
}
}
mysqli_close($con); 
?>
<html lang="en">
<head>
  <title>Sign up</title>
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
                    
                        <h3 class="panel-title" style="font-size: 30px;margin-left: 15px;margin-top: 20px;">Create account</h3>
                
                    <div class="panel-body">
                        <form role="form" action="signup.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                  <block>Your name<block>
                                    <input class="form-control" name="customername" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                  <block>Mobile number<block>
                                    <input class="form-control" name="phnumber" type="text" autofocus="">
                                </div>
                                 <div class="form-group">
                                  <block>Email<block>
                                    <input class="form-control" name="email" type="email" autofocus="">
                                </div>
                                 <div class="form-group">
                                  <block>Password<block>
                                    <input class="form-control" name="password" type="password" placeholder="At least 6 characters"autofocus="">
                                    <i class="fa fa-info">Passwords must be at least 6 characters</i>
                                </div>
                                <div>
                                  <p>We will send you a text to verify your phone.<br>Message and Data rates may apply.</p>
                                </div>
                                <button type="submit" name="submit" class="btn btn-sm btn-warning" style="width: 100%;">Continue</button>
                                <div style="margin-top:20px;">
                                Already have an account?<a href="login.php" style="color: black;">
                                Sign in</a>
                              </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

</div>
</div>
</body>
</html>
