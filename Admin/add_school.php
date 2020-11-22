
<?php

include ('include/header.php');

?>

<?php 
 if($acctype=="superadmin") { 
  ?>
<?php


if(isset($action)){

  mysql_query("DELETE FROM centre WHERE center_id='$bug'");
  
  }

if(isset($_POST["addBtn"])){

  $name     = $_POST["name_l"];
  $state   = $_POST["state_l"];
  $lga    = $_POST['lga_l'];
  $ward    = $_POST['ward_l'];
  
 
					
  $query = mysql_query("INSERT INTO centre(center_id,center_name,GPS_location,state_id,LGA_id,Ward_id,date) 
          VALUES('', UCASE('$name'), '', '$state','$lga','$ward',NOW())") or die("already exist");
  if($query)
          
  header("LOCATION: add_school.php");
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Manage</a></li>
              <li><i class="fa fa-th-list"></i>Center</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
 
       
        
        <div class="row">
          <div class="col-lg-8">
            <section class="panel">
              <header class="panel-heading">
                Add Center
              </header>
              <div class="panel-body" >
              <div><?php echo $errors;?></di>
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">School name <span class="required">*</span></label>
                      <div class="col-lg-8" >
                        <input class=" form-control" id="fullname" name="name_l" type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Location<span class="required">*</span></label>
                      
                      <!-- subcategory -->

                                      <div class="col-lg-2" style="padding-top: 20px;">
                      <select name="state_l" class="form-control" id="state_list">
                                  <option value="">Select State</option>
                                    <?php
                                    $resultx = mysql_query("SELECT * FROM state");
                                  while($rowx = mysql_fetch_array($resultx)) {
                                  ?>
                                    <option value="<?php echo $rowx["state_id"];?>"><?php echo $rowx["state_name"];?></option>
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
            <header class="panel-heading" style="padding-top: 10px;">
            
<form metaction="" method="post" hod="get">     
                          <div class="form-group">
                                   <!-- subcategory -->

                                   <div class="col-lg-2">
                      <select name="state_v" class="btn btn-default" id="state_view">
                                  <option value="">Filter State</option>
                                    <?php
                                    $resultxx = mysql_query("SELECT * FROM state");
                                  while($rowxx = mysql_fetch_array($resultxx)) {
                                  ?>
                                    <option value="<?php echo $rowxx["state_id"];?>"><?php echo $rowxx["state_name"];?></option>
                                  <?php
                                  }
                                  ?>
                                  </select>
                               
                                    <select name="lga_v" class="btn btn-default" id="lga_view">
                                    <option value="">Filter Lga</option>
                                    </select>
                                  
                                    <select name="ward_v" class="btn btn-default" id="ward_view">
                                    <option value="">Filter Ward</option>
                                    </select>
                                  
                                 
                        
                       
                        <input class="btn btn-success" type="submit" name="viewBtn" value="View"/>
                                </div>
                                </div>
                
  </form> 

              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> School Name</th>
                    <th><i class="icon_pin_alt"></i> State</th>
                    <th><i class="icon_pin_alt"></i> LGA</th>
                    <th><i class="icon_pin_alt"></i> Ward</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

                  <?php
$sql4 = "SELECT * FROM `centre` WHERE center_name !='' " ;
if(isset($_POST['viewBtn'])){
  $state_v = $_POST['state_v'];
  $lga_v = $_POST['lga_v'];
  $ward_v = $_POST['ward_v'];
   
 
  if(!empty($state_v)){
 
   $sql4.= " AND state_id = '$state_v' ";
  }
 
  if(!empty($lga_v)){
 
   $sql4.= " AND lga_id = '$lga_v' ";
  }
  if(!empty($ward_v)){
 
   $sql4.= " AND ward_id = '$ward_v' ";
  }
   
 }
 
$res4 = mysql_query($sql4) ;
while($stinfo = mysql_fetch_array($res4)){
  $name_sch = $stinfo['center_name'];
  $id_sch = $stinfo['center_id'];
  $state_sch = $stinfo['state_id'];
  $date_sch = $stinfo['date'];
  $lga_sch = $stinfo['LGA_id'];
  $ward_sch = $stinfo['Ward_id'];
  ?>
                  <tr>
                    <td><?php echo $name_sch; ?></td>
                    

                    <td>
                    <?php $center_arr = getMany('state',$state_sch,'state_id');
                     if(is_array($center_arr)){
                     $c_name = $center_arr['state_name'];
                    echo $c_name; }?>
                    </td>
                    
                    
                    <td>
                    <?php $lga_arr = getMany('lga',$lga_sch,'lga_id');
                     if(is_array($lga_arr)){
                     $l_name = $lga_arr['lga_name'];
                    echo $l_name; }?>
                    </td>

                    <td>
                    <?php $ward_arr = getMany('ward',$ward_sch,'ward_id');
                     if(is_array($ward_arr)){
                     $w_name = $ward_arr['ward_name'];
                    echo $w_name; }?>
                    </td>
                    <td>
                      <div class="btn-group">
                      <a href="add_school.php?action=delete&bug=<? echo $id_sch ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      
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