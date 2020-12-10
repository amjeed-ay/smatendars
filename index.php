<?php
require_once "includes/config.php";

ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Smavators inc">
  <meta name="author" content="ay amjeed">
  <meta name="keyword" content="Smavators e-attendance">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Login </title>
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img4-body">

<!-- login script to be here -->
<?php

$err = "";
if (isset($_POST['loginBtn'])) {
	$userName = $_POST['username'];
	$password = $_POST['password'];

	if ($userName == '' || $password == '') {
		$err = "Please enter your username and password";
	}else{
$sql = "SELECT * FROM user WHERE username = '$userName' AND password = PASSWORD('$password') AND (acctype='superadmin' OR acctype='user' OR acctype='admin') ";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();

if($row['active']){
$_SESSION['loggedin'] = 80;
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['access'] = $row['access'];
$_SESSION['acctype'] = $row['acctype'];
$_SESSION['right'] = $row['center_id'];
$_SESSION['logged'] = $row['username'];
$_SESSION['state'] = $row['state_id'];
$_SESSION['lga'] = $row['lga_id'];
$_SESSION['ward'] = $row['ward_id'];


if($row['acctype']=='superadmin' || $row['acctype']=='admin'){
$redirectx = "admin/index.php";
}
if($row['acctype']=='user'){ $redirectx = "facilitator/index.php"; }
header ("location:$redirectx");
}
else{
    $err = "The user account has expired";
}

    echo $_SESSION['access'];
} else {
  $err = "wrong username or password";
}

}
	
	
}
$conn->close();
?>


<!-- login script to be here -->
  <div class="container">

    <form  class="login-form" method="POST" action="index.php">
      <div class="login-wrap" >
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="error" style="text-align: center; color: red; padding:10px;"><?php echo $err; ?></div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Email" name="username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="loginBtn">Login</button>
        

        
      </div>
      
    </form>
    <div class="text-center" style="padding-top: 28%;">
    <h4>Powered by</h4>
    <img src="logo.png" alt="logo"style="position: relative; top: -35px;"/>
    </div>
  </div>


</body>

</html>
