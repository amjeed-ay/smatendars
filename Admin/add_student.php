
<?php
include ('include/header.php');
if($acctype=="admin" || $acctype=="superadmin") {
$err = '';

if(isset($_POST["addBtn"])){
  $fname     = $_POST["fname"];
  $lname     = $_POST["lname"];
  $level   = $_POST['level'];
  $center    = $_POST['center_l'];
  $state_l    = $_POST['state_l'];
  $lga_l    = $_POST['lga_l'];
  $ward_l    = $_POST['ward_l'];
  $gender_l    = $_POST['gender_l'];
  

  if(!empty($fname) && !empty($lname) && !empty($center) && !empty($state_l) && !empty($lga_l) && !empty($ward_l) && !empty($gender_l)){
  			
  $queryu = $conn->query("INSERT INTO student(student_id,fname,lname,gender,level,center_id,state_id,lga_id,ward_id,date) 
						VALUES('',UCASE('$fname'),UCASE('$lname'),'$gender_l','$level','$center','$state_l','$lga_l','$ward_l',NOW())") or die("already exist");
		if($queryu)
		header("LOCATION:".$current);
  }else{
  $err = 'All field (*) are required !';
}
}
 
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Manage</a></li>
              <li><i class="fa fa-table"></i>Students</li>
          
            </ol>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-8">
            <section class="panel">
              <header class="panel-heading">
                Add Students
              </header>
              <div class="panel-body" >
                <div> <p style="text-align: center; color:red; padding: 10px;"> <?php echo $err; ?></p></dv>
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name<span class="required">*</span></label>
                      <div class="col-lg-4" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="fname" type="text" required placeholder="Firstname" />
                      </div>
                      <div class="col-lg-4" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="lname" type="text" required placeholder="Lastname" />
                      </div>
                      
                      <div class="col-lg-2" style="padding-top: 20px;">
                        <select name="gender_l" class="btn btn-default dropdown-toggle">
                            <option value="none">Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Location<span class="required">*</span></label>
                      
                      <!-- subcategory -->

                                      <div class="col-lg-2" style="padding-top: 20px;">
                      <select name="state_l" class="form-control" id="state_list">
                                  <option value="">Select State</option>
                                    <?php
                                    $resultx = $conn->query("SELECT * FROM state");
                                  while($rowx = mysqli_fetch_array($resultx)) {
                                  ?>
                                    <option value="<?php echo $rowx["state_id"];?>"><?php echo $rowx["state_name"];?></option>
                                  <?php
                                  }
                                  ?>
                                  </select>
                                </div>

                                  <div class="col-lg-2" style="padding-top: 20px;">
                                    <select name="lga_l" class="form-control" id="lga_list">
                                    <option value="">Select lga</option>
                                    </select>
                                  </div>

                                  <div class="col-lg-2" style="padding-top: 20px;">
                                    <select name="ward_l" class="form-control" id="ward_list">
                                    </select>
                                  </div>
                                  </div>
                          <div class="form-group ">
                          <label for="username" class="control-label col-lg-2">Center<span class="required">*</span></label>
                                  <div class="col-lg-2" style="padding-top: 20px;">
                                    <select name="center_l" class="form-control" id="center_list">
                                    </select>
                                  </div>


                      <!-- subcatergory end -->
        
                        <div class="col-lg-2" style="padding-top: 20px;">
                        <select name="level" class="btn btn-default dropdown-toggle">
                        <option value="">Select level</option>
                        <option <?php if(isset($levels) && $levels == '1'){ echo 'selected';}?> value="1">Class 1</option>
                        <option <?php if(isset($levels) && $levels == '2'){ echo 'selected';}?> value="2">Class 2</option>
                        <option <?php if(isset($levels) && $levels == '3'){ echo 'selected';}?> value="3">Class 3</option>
                        <option <?php if(isset($levels) && $levels == '4'){ echo 'selected';}?> value="4">Class 4</option>
                        <option <?php if(isset($levels) && $levels == '5'){ echo 'selected';}?> value="5">Class 5</option>
                        <option <?php if(isset($levels) && $levels == '6'){ echo 'selected';}?> value="6">Class 6</option>
                        </select>
                      </div>
                    </div>
                   

                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-2">
                        <input class="btn btn-primary" type="submit" name="addBtn" value="add"/>
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <section class="panel">
              <header class="panel" style="padding: 10px;">

<form metaction="" method="post" hod="get">     
                  
                        <div class="form-group ">

                                   <div class="col-lg-6">
                      <select name="state_v" class="btn btn-default" id="state_view">
                                  <option value="">Filter by State</option>
                                    <?php
                                    $resultxx = $conn->query("SELECT * FROM state");
                                  while($rowxx = mysqli_fetch_array($resultxx)) {
                                  ?>
                                    <option value="<?php echo $rowxx["state_id"];?>"><?php echo $rowxx["state_name"];?></option>
                                  <?php
                                  }
                                  ?>
                                  </select>
                              
                                    <select name="lga_v" class="btn btn-default" id="lga_view">
                                    <option value="">Filter by Lga</option>
                                    </select>
                                  
                                    <select name="ward_v" class="btn btn-default" id="ward_view">
                                    <option value="">Filter by Ward</option>
                                    </select>
                                  </div>
                                 
                    
                                  <div class="col-lg-4">
                                    <select name="center_v" class="btn btn-default" id="center_view">
                                    <option value="">Select Center   </option>
                                    </select>
                                  
                        
                              <input class="btn btn-success" type="submit" name="viewBtn" value="View"/>
                                </div>
                                </div>
                
  </form> 
       
              </header>
    
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_calendar"></i> Date Added</th>
                    <th><i class="icon_pin_alt"></i> Center</th>
                    <th><i class=""></i> Level</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

<?php
 $sql4 = "SELECT * FROM `student` WHERE `date` !='' " ;

if(isset($_POST['viewBtn'])){
 $state_v = $_POST['state_v'];
 $lga_v = $_POST['lga_v'];
 $ward_v = $_POST['ward_v'];
 $center_v = $_POST['center_v']; 

 if(!empty($state_v)){
  $sql4.= " AND state_id = '$state_v' ";
 }

 if(!empty($lga_v)){
  $sql4.= " AND lga_id = '$lga_v' ";
 }

 if(!empty($ward_v)){
  $sql4.= " AND ward_id = '$ward_v' ";
 }
  
 if(!empty($center_v)){
  $sql4.= " AND center_id = '$center_v' ";
 }
  
}

$res4 = $conn->query($sql4) ;
while($usrnfo = mysqli_fetch_array($res4)){
  $name_u = $usrnfo["lname"].' '.$usrnfo["fname"];
  $date_u = $usrnfo['date'];
  $id_us = $usrnfo['student_id'];
  $level_u = $usrnfo['level'];
  $center_uid = $usrnfo['center_id'];
  
  ?>
                    <tr>
                    <td><?php echo $name_u; ?></td>
                    <td><?php echo $date_u; ?></td>
                    <td><?php echo getRecord('centre','center_id',$center_uid,'center_name',$conn);?></td>
                    <td><?php echo $level_u; ?></td>
                    <td>
                      <div class="btn-group">
                      <a href="add_student.php?action=tled&blet=student&dis=student_id&bug=<?php echo $id_us ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>

<?php
}
?>
                  
                </tbody>
              </table>
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