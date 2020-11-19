<?php
require_once "includes/config.php";

ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
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
<?
$err = "";
if (isset($_POST['loginBtn'])) {
	$userName = mysql_real_escape_string(trim($_POST['username']));
	$password = mysql_real_escape_string(trim($_POST['password']) );

	if ($userName == '' || $password == '') {
		$err = "Please enter your username and password";
	}
	
	else {
    if(!isset($redirect)){

      
    }
		$str = "SELECT * 
		        FROM user 
				WHERE username = '$userName' AND password = PASSWORD('$password') AND (acctype='superadmin' OR acctype='user') ";
		$result = mysql_query($str) or die(mysql_error());

		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_assoc($result) or die(mysql_error());
			if($row['active']){
				$_SESSION['loggedin'] = 80;
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['access'] = $row['access'];
				$_SESSION['acctype'] = $row['acctype'];
				$_SESSION['right'] = $row['center_id'];
        $_SESSION['logged'] = $row['username'];
        
        if($row['acctype']=='superadmin'){
          $redirectx = "admin/index.php";
            }
            if($row['acctype']=='user'){
              $redirectx = "facilitator/index.php";
                }
				include_once("includes/functions.php") ;
				doLog("login", "user $row[username] logs in as $row[acctype] ",  $row['user_id'], $_SERVER['REMOTE_ADDR']  ) ;
        
        if($row['acctype']=='superadmin'){
          $redirectx = "admin/index.php";
            }
            if($row['acctype']=='user'){
              $redirectx = "facilitator/index.php";
                }
				header ("Refresh: 2; URL=".$redirectx);
				echo "You are being redirected to your original page request<br>";
				echo "(If your browser doesn’t support this, <a href=\"".$redirectx."\">click here</a>)";
				exit;
			}
			else{
				$err = "The user account has expired";
			}

		
		} else {
			$err = "Wrong username or password";
		}		
			
	}
}

?>


















<!-- login script to be here -->
  <div class="container">

    <form class="login-form" method="POST" action="index.php">
      <div class="login-wrap">
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
    <div class="text-center" style="padding-top: 250px;">
    <h4>Powered by</h4>
    <img src="logo.png" alt="logo"style="position: relative; top: -20px;"/>
    </div>
  </div>


</body>

</html>
