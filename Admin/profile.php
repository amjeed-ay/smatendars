
<?php

include ('include/header.php');

?>
<script language="JavaScript" type="text/javascript" >

function checkform ()
{
	if(document.update.addBtn.value=="save")
		{
		alert("User Profile Update Successfull");
		document.editdept.department.focus();
		return false;
		} 
	
}
</script>
<?php 
 if($acctype=="superadmin") { 
  ?>
<?php
if (isset($_GET['user_id'])){
$user_id  = $_GET['user_id'];
} else{
    $user_id  = $_SESSION['user_id'];
}
$user_inf = getMany('user',$user_id,'user_id');
if(is_array($user_inf)){
  $c_fname = $user_inf['fname'];
  $c_lname = $user_inf['lname'];
  $c_email = $user_inf['email'];
  $c_phone = $user_inf['phone'];
  $c_level  = $user_inf['level'];
   } 
if(isset($_POST["addBtn"])){
  $fname     = $_POST["fname"];
  $lname     = $_POST["lname"];
  $usernam    = $_POST['email'];
  $email    = $_POST['email'];
  $level   = $_POST['level'];
//   $center    = $_POST['center_l'];
 $phone_l    = $_POST['phone_l'];
//   $state_l    = $_POST['state_l'];
//   $lga_l    = $_POST['lga_l'];
//   $ward_l    = $_POST['ward_l'];
  $act     = '1';
  $type   = 'user';
  

  if(isset($_POST['access'])){
    $privi = 'fullaccess';
  }else{
    $privi = 'limited';
  }
 
  
  $sqlp = "UPDATE `user` SET `fname` ='$fname', `lname` ='$lname', `username` ='$email', `phone` ='$phone_l', `email` ='$email', `level` = '$level' WHERE `user`.`user_id` = '$user_id'";
  $queryp = mysql_query($sqlp);
  
}
 
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="add_user.php">Facilitator</a></li>
              <li><i class="fa fa-table"></i>Edit Facilitator</li>
          
            </ol>
          </div>
        </div>
        <!-- page start-->
 
       
        
        <div class="row">
          <div class="col-lg-7">
            <section class="panel">
              <header class="panel-heading">
                Edit Facilitator
              </header>
              <div class="panel-body" >
              <div> <p style="text-align: center; color:red; padding: 10px;"> <?php echo $err; ?></p></dv>
                <div class="form">
                  <form class="form-validate form-horizontal " name="update" id="register_form" method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name<span class="required">*</span></label>
                      <div class="col-lg-5" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="fname" type="text" value="<? echo $c_fname; ?>" required placeholder="Firstname" />
                      </div>
                      <div class="col-lg-5" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="lname" type="text" value="<? echo $c_lname; ?>" required placeholder="Othername" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Contact<span class="required">*</span></label>
                      <div class="col-lg-4" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="phone_l" type="number" value="<? echo $c_phone; ?>" required placeholder="Phone Number" />
                      </div>
                      <div class="col-lg-6" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="email" type="email" value="<? echo $c_email; ?>" required placeholder="Email" />
                      </div>
                      
                    </div>

                    
                    <div class="form-group " style=" ">
                      <label for="username" class="control-label col-lg-2">Level<span class="required">*</span></label>
                      
                     

                      <!-- subcatergory end -->
                      
                      
                        <div class="col-lg-2" style="padding-top: 20px;">
                        <select name="level" class="btn btn-default dropdown-toggle">
                        <option value="">Select level</option>
                        <option <?php if($c_level == '1'){ echo 'selected';}?> value="1">Class 1</option>
                        <option <?php if($c_level == '2'){ echo 'selected';}?> value="2">Class 2</option>
                        <option <?php if($c_level == '3'){ echo 'selected';}?> value="3">Class 3</option>
                        <option <?php if($c_level == '4'){ echo 'selected';}?> value="4">Class 4</option>
                        <option <?php if($c_level == '5'){ echo 'selected';}?> value="5">Class 5</option>
                        <option <?php if($c_level == '6'){ echo 'selected';}?> value="6">Class 6</option>
                        </select>
                      </div>
                    </div>
                   

                    
                    <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2">Full Access <span class="required">*</span></label>
                      <div class="col-lg-offset-2 col-lg-10">
                        <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="access" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" type="submit" name="addBtn" value="save" onClick="return checkform()"/>
                        
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
 

<script>
$(document).ready(function() {
	$('#state_list').on('change', function() {
			var state_id = this.value;
			$.ajax({
				url: "get_lga.php",
				type: "POST",
				data: {
					state_id: state_id
				},
				cache: false,
				success: function(dataResult){
					$("#lga_list").html(dataResult);
				}
			});
	});
});

$(document).ready(function() {
	$('#lga_list').on('change', function() {
			var lga_id = this.value;
			$.ajax({
				url: "get_ward.php",
				type: "POST",
				data: {
					lga_id: lga_id
				},
				cache: false,
				success: function(dataResult){
					$("#ward_list").html(dataResult);
				}
			});
	});
});

$(document).ready(function() {
	$('#ward_list').on('change', function() {
			var ward_id = this.value;
			$.ajax({
				url: "get_center.php",
				type: "POST",
				data: {
					ward_id: ward_id
				},
				cache: false,
				success: function(dataResult){
					$("#center_list").html(dataResult);
				}
			});
	});
});
</script>

<script>
$(document).ready(function() {
	$('#state_view').on('change', function() {
			var state_id = this.value;
			$.ajax({
				url: "get_lga.php",
				type: "POST",
				data: {
					state_id: state_id
				},
				cache: false,
				success: function(dataResult){
					$("#lga_view").html(dataResult);
				}
			});
	});
});

$(document).ready(function() {
	$('#lga_view').on('change', function() {
			var lga_id = this.value;
			$.ajax({
				url: "get_ward.php",
				type: "POST",
				data: {
					lga_id: lga_id
				},
				cache: false,
				success: function(dataResult){
					$("#ward_view").html(dataResult);
				}
			});
	});
});

$(document).ready(function() {
	$('#ward_view').on('change', function() {
			var ward_id = this.value;
			$.ajax({
				url: "get_center.php",
				type: "POST",
				data: {
					ward_id: ward_id
				},
				cache: false,
				success: function(dataResult){
					$("#center_view").html(dataResult);
				}
			});
	});
});
</script>

</body>

</html>
<?php
 } else{

  @header ("Refresh: 2; URL=".'../index.php');
  echo "You are being redirected to your original page request<br>";
  echo '(If your browser doesn’t support this, <a href="../index.php">click here</a>)';
 }

?>