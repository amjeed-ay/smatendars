
<?php

include ('include/header.php');
$user_center = $_SESSION['right'];
?>
<?php 
 if($acctype=="user") { 
  ?>
<?php


if(isset($action)){

  mysql_query("DELETE FROM student WHERE student_id='$bug'");
  
  }

if(isset($_POST["addBtn"])){
  $fname     = $_POST["fname"];
  $lname     = $_POST["lname"];
  $level   = $_POST['level'];
  $gender_l    = $_POST['gender_l'];
  

  if(isset($_POST['access'])){
    $privi = 'fullaccess';
  }

  if(!empty($fname) && !empty($lname) && !empty($level) && !empty($gender_l)){
  			
  $queryu = mysql_query("INSERT INTO student(student_id,fname,lname,gender,level,center_id,state_id,lga_id,ward_id,date) 
						VALUES('',UCASE('$fname'),UCASE('$lname'),'$gender_l','$level','$user_center','$u_state','$u_lga','$u_ward',NOW())");
		if($queryu) $err ='Student added successfully';
						
		header("LOCATION: add_student.php");
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
                      <label for="fullname" style="padding-top: 20px;" class="control-label col-lg-2">Name<span class="required">*</span></label>
                      <div class="col-lg-4" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="fname" type="text" required placeholder="Firstname" />
                      </div>
                      <div class="col-lg-4" style="padding-top: 20px;">
                        <input class=" form-control" id="fullname" name="lname" type="text" required placeholder="Othername" />
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
                          <label for="username" class="control-label col-lg-2">Level<span class="required">*</span></label>
                            


                      <!-- subcatergory end -->
                      
                      
                        <div class="col-lg-2">
                        <select name="level" class="btn btn-default dropdown-toggle">
                        <option value="">Select level</option>
                        <option <?php if($levels == '1'){ echo 'selected';}?> value="1">Class 1</option>
                        <option <?php if($levels == '2'){ echo 'selected';}?> value="2">Class 2</option>
                        <option <?php if($levels == '3'){ echo 'selected';}?> value="3">Class 3</option>
                        <option <?php if($levels == '4'){ echo 'selected';}?> value="4">Class 4</option>
                        <option <?php if($levels == '5'){ echo 'selected';}?> value="5">Class 5</option>
                        <option <?php if($levels == '6'){ echo 'selected';}?> value="6">Class 6</option>
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
              <header class="panel-heading" style="padding: 10px;">
<table>
<form metaction="" method="post" hod="get">     
                <tr>
                      
                      <td>
                      <div class="col-lg-2">
                        <select name="level" class="btn btn-default dropdown-toggle">
                        <option value="">Filter by level</option>
                        <option <?php if($levels == '1'){ echo 'selected';}?> value="1">Class 1</option>
                        <option <?php if($levels == '2'){ echo 'selected';}?> value="2">Class 2</option>
                        <option <?php if($levels == '3'){ echo 'selected';}?> value="3">Class 3</option>
                        <option <?php if($levels == '4'){ echo 'selected';}?> value="4">Class 4</option>
                        <option <?php if($levels == '5'){ echo 'selected';}?> value="5">Class 5</option>
                        <option <?php if($levels == '6'){ echo 'selected';}?> value="6">Class 6</option>
                        </select>
                      </div>
                       </td>
                        <td style="padding-right: 50px;"></td>
                        <td><input class="btn btn-success" type="submit" name="viewBtn" value="View"/></td>
                        
                </tr> 
  </form> 
</table>       
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

                  <?

 $sql4 = "SELECT * FROM `student` WHERE `center_id` ='$user_center' " ;

if(isset($_POST['viewBtn'])){
 $levell = $_POST['level'];
 

 if(!empty($levell)){

  $sql4.= " AND level = '$levell' ";
 }

 


  
  
}

$res4 = mysql_query($sql4) ;
while($usrnfo = mysql_fetch_array($res4)){
  $name_u = $usrnfo["lname"].' '.$usrnfo["fname"];
  $date_u = $usrnfo['date'];
  $id_us = $usrnfo['student_id'];
  $level_u = $usrnfo['level'];
  $center_uid = $usrnfo['center_id'];
  
  ?>
                    <tr>
                    <td><?php echo $name_u; ?></td>
                    <td><?php echo $date_u; ?></td>
                    <td><?php

                     $center_arr = getMany('centre',$center_uid,'center_id');
                     if(is_array($center_arr)){
                       echo $center_arr['center_name'];
                        } 
                        
                        
                        ?></td>
                    <td><?php echo $level_u; ?></td>
                    <td>
                      <div class="btn-group">
                      <a href="add_student.php?action=delete&bug=<? echo $id_us ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      
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