
<?php

include ('include/header.php');
$dat = date('Y-m-d');
if($datef = strtotime($_POST['date'])) {
  $today = date('Y-m-d', $datef);
}
?>

<?php 
if($acctype=="admin" || $acctype=="superadmin") { 


  if(isset($_POST['BtnView'])){

$state_l = $_POST['state_l'];

$center_l = $_POST["center_l"];


  }

  ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Attendance</a></li>
              <li><i class="fa fa-table"></i>View Attendance</li>
          
            </ol>
          </div>
        </div>
        <!-- page start-->
 
       
        
        <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
               Select Center to View Attendance
              </header>
              <div class="panel-body" >
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                  <div class="form-group ">
                      <label for="username" class="control-label col-lg-2" style="padding-top: 20px;">Select Center Location<span class="required">*</span></label>
                      
                      <!-- subcategory -->

                                      <div class="col-lg-3" style="padding-top: 20px;">
                      <select name="state_l" class="form-control" id="state_list">
                                  <option value="">Select State</option>
                                    <?php
                                    $resultx = mysql_query("SELECT * FROM state");
                                  while($rowx = mysql_fetch_array($resultx)) {
                                  ?>
                                    <option <?php if (isset($state_l) && $state_l == $rowx["state_id"]) echo "selected" ;?> value="<?php echo $rowx["state_id"];?>"><?php echo $rowx["state_name"];?></option>
                                  <?php
                                  }
                                  ?>
                                  </select>
                                </div>

                                  <div class="col-lg-3" style="padding-top: 20px;">
                                    <select name="lga_l" class="form-control" id="lga_list">
                                    <option value="">Select lga</option>
                                    </select>
                                  </div>

                                  <div class="col-lg-3" style="padding-top: 20px;">
                                    <select name="ward_l" class="form-control" id="ward_list">
                                    </select>
                                  </div>
                                  </div>
                          <div class="form-group ">
                          <label for="username" class="control-label col-lg-3" style="padding-top: 20px;">Center<span class="required"></span></label>
                                  <div class="col-lg-2" style="padding-top: 20px;">
                                    <select name="center_l" class="form-control" id="center_list">
                                    </select>
                                  </div>


                      <!-- subcatergory end -->
                      
                      
                        <div class="col-lg-2" style="padding-top: 20px;">
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
                    <div class="form-group" >
                      <div class="col-lg-offset-2 col-lg-2">
                        <input class="btn btn-primary" type="submit" name="BtnView" value="view"/>
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
<table>
<form metaction="" method="post" hod="get">     
                <tr>
                       
      
                        <td>
                        
                          <input type="date" name="date"  class="form-control" />
                          
                        </td>
        
                        <td style="padding-right: 20px;"></td>
                       
                        <td>
                        <select name="status" class="btn btn-default dropdown-toggle">
                            <option value="">Filter Status</option>
                            <option <?php if($stat == 'present'){ echo 'selected';}?> value="present">Present</option>
                            <option <?php if($stat == 'absent'){ echo 'selected';}?> value="absent">Absent</option>
                        </select>
                        </td>
                        <td style="padding-right: 20px;"></td>
                        <td><input class="btn btn-success" type="submit" name="viewBtn" value="View"/></td>
                        
                </tr> 
  </form>
</table>       
              </header>
    
              <table class="table table-striped table-advance table-hover" >
                <tbody>
                  <tr>
                    
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_profile"></i> Gender</th>
                    <th><i class="icon_calendar"></i> Date</th>
                    <th><i class="icon_pin_alt"></i> Status</th>
            
                  </tr>

  <?
  
$query_att = "SELECT * FROM attendance WHERE status!='' " ;
if(!empty($center_l)){
  $query_att.= " AND center_id = '$center_l'";
  }
if(isset($_POST['viewBtn'])){
  $statd = $_POST['status'];
  $datea = $_POST['date'];
  
  if(!empty($statd)){
  $query_att.= " AND status = '$statd'";
  }
  
  if(!empty($datea)){
    $query_att.= " AND date BETWEEN '$today 00:00:00' AND '$today 23:59:59';";
    }else{
      $query_att.= " AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59';";
  }
  }else{
      $query_att.= " AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59';";
  }
  
$res5 = mysql_query($query_att) ;
while($stinfo = mysql_fetch_array($res5)){
  $name_att = $stinfo["lname"].' '.$stinfo["fname"];
  $gender_att = $stinfo["gender"];
  $stu_id = $stinfo["student_id"];
  $status = $stinfo['status'];
  ?>
                    <tr>
                    <td><?php echo $name_att; ?></td>
                    <td><?php echo $gender_att; ?></td>
                    <td><?php echo $dat; ?></td>
                    <td><?php echo $status; ?></td>
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
</body>
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
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script
</html>

<?php
 } else{

  @header ("Refresh: 2; URL=".'../index.php');
  echo "You are being redirected to your original page request<br>";
  echo '(If your browser doesn’t support this, <a href="../index.php">click here</a>)';
 }

?>