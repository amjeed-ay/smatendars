
<?php

include ('include/header.php');

?>

<script language="javascript" type="text/javascript">
function checkform ()
{
		if(document.changepassword.password.value=="")
		{
		alert("Please Enter Password");
		document.changepassword.password.focus();
		return false;
		}
		if(document.changepassword.password2.value=="")
		{
		alert("Please Retype Password");
		document.changepassword.password2.focus();
		return false;
		}
		if(document.changepassword.password.value != document.changepassword.password2.value)
		{
		alert("Please Confirm Password");
		document.changepassword.password2.focus();
		return false;
		}
}

</script>

<?php if($acctype == "admin" || $acctype == "superadmin") { 
  $err = '';
	if(isset($_POST["submitBtn"])){
		$curr_password = $_POST['curr_pass'] ;
        $duser = $_SESSION['logged'] ;
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $user_id  = $_SESSION['user_id'];
		$sql10 = "SELECT password FROM user WHERE PASSWORD('$curr_password') = password AND user_id = '$user_id' " ;
		$res10 = $conn->query($sql10) ;
		if($res10->num_rows == 1){
			$sql = "UPDATE user SET password  = PASSWORD('$password') WHERE user_id='$user_id'";
      $query = $conn->query($sql);
      if($query) header("LOCATION: index.php?logout=yes");
			exit;
		}
		
		$err = "<span style='color:red' ><b>Please enter the correct current password </b></span>" ;
	}
 ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">My Profile</a></li>
              <li><i class="fa fa-table"></i>Change Password</li>
          
            </ol>
          </div>
        </div>
        <!-- page start-->
 
       
        
        <div class="row">
          <div class="col-lg-5">
            <section class="panel">
              <header class="panel-heading">
                Change Password
              </header>
              <div class="panel-body" >
              <div> <p style="text-align: center; color:red; padding: 10px;"> <?php echo $err; ?></p></dv>
                <div class="form">
                  <form class="form-validate form-horizontal " name="changepassword" id="register_form" method="post" action="">
                  <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Old Password<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input class=" form-control" name="curr_pass"  type="password"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">New Password<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input class=" form-control" name="password"  type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Comfirm Password<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input class=" form-control" name="password2"  type="password" />
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-3">
                        <input class="btn btn-primary" type="submit" name="submitBtn" value="Save" onClick="return checkform()"/>
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="../js/scripts.js"></script>
 



</body>

</html>
<?php
 } else{

  @header ("Refresh: 2; URL=".'../index.php');
  echo "You are being redirected to your original page request<br>";
  echo '(If your browser doesn’t support this, <a href="../index.php">click here</a>)';
 }

?>