
<?php

include ('include/header.php');

?>
<?php 
 if($acctype=="superadmin") { 
  ?>
<?php



if(isset($action)){

  mysql_query("DELETE FROM state WHERE state_id='$bug'");
  
  }

if(isset($_POST["addBtn"])){

  $name     = $_POST["name"];
  $location  = $_POST["location"];
  $date    = $_POST['date'];
  $state = $_POST['state_l'];
  $lga = $_POST['lga_l'];
  
 
  if($location=="state"){
    $queryl = mysql_query("INSERT INTO state(state_id,state_name,date) VALUES('', UCASE('$name'), NOW())");
  }
  if($location=="lga"){
    if(!empty($state)){
    $queryl = mysql_query("INSERT INTO lga(lga_id,lga_name,state_id,date) VALUES('', UCASE('$name'),'$state', NOW())");
    }else{
      $erro = 'please select state !';
    }
  }
  if($location=="ward"){
    if(!empty($state) && !empty($lga)){
    $queryl = mysql_query("INSERT INTO ward(ward_id,ward_name,lga_id,state_id,date) VALUES('', UCASE('$name'),'$lga','$state', NOW())");
  }else{
    $erro = 'please select state and LGA !';
  }
  }
  			
  if($queryl) $erro = 'Location added successfull !';     
  header("LOCATION: add_location.php");
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Manage</a></li>
              <li><i class="fa fa-th-list"></i>Location</li>
            </ol>
          </div>
        </div>
        <!-- page start-->
 
       
        
        <div class="row">
          <div class="col-lg-7">
            <section class="panel">
              <header class="panel-heading">
                Add Location
              </header>
              <div class="panel-body" >
              <div style="padding: 10px; text-align: center; color:red;"><?php echo $erro;?></div>
                <div class="form">
                  <form class="form-validate form-horizontal " id="myform" action="#"  method="post">
                   

                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Location type <span class="required">*</span></label>


                      <div class="col-lg-3">
                        <select id="location" name="location" class="form-control dropdown-toggle">
                            <option value="">Select Location Type</option>
                            <option value="state">State</option>
                            <option value="lga">Lga</option>
                            <option value="ward">Ward</option>
                        </select>
                      </div>

                      <div class="col-lg-2">
                      <select name="state_l" class="form-control" id="state_list">
                                  <option value="">Select it State</option>
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

                                  <div class="col-lg-3">
                                    <select name="lga_l" class="form-control" id="lga_list">
                                    <option value="">Select it lga</option>
                                    </select>
                                  </div>

                      

                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Name<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input class=" form-control" id="fullname" name="name" type="text" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-5">
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
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              
<table>

<form metaction="" method="post" hod="get"> 
              <tr>
                        <td>Location</td>
      
                        <td>

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
                                </div>
                        </td>
                        <td>

                                  <div class="col-lg-2">
                                    <select name="lga_v" class="btn btn-default" id="lga_view">
                                    <option value="">Filter Lga</option>
                                    </select>
                                  </div>
                        </td>
                        <td style="padding-right: 50px;"></td>
                        <td><input class="btn btn-success" type="submit" name="viewBtns" value="View"/></td>
                </tr> 
</form>
</table>       
             
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  

                  <?


if(isset($_POST['viewBtns'])){
  $state_v = $_POST['state_v'];
  $lga_v = $_POST['lga_v'];

  if(!empty($state_v) && empty($lga_v)){
    $sql4 = "SELECT * FROM `lga` WHERE `state_id` = '$state_v' ORDER BY  `lga_name` ASC LIMIT 0 , 30" ;
?>
                  <tr>
                    <th><i class="icon_pin_alt"></i> LGA Name</th>
                    <th><i class="icon_pin_alt"></i> Wards</th>
                    <th><i class="icon_pin_alt"></i> Centers</th>
                    <th><i class="icon_pin_alt"></i> Students</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>


<?php


  }
  elseif(!empty($lga_v)){
    $sql4 = "SELECT * FROM `ward` WHERE `lga_id` = '$lga_v' ORDER BY  `ward_name` ASC LIMIT 0 , 30" ;
 
  
?>

                  <tr>
                    <th><i class="icon_pin_alt"></i>Ward Name</th>
                    <th><i class="icon_pin_alt"></i> Centers</th>
                    <th><i class="icon_pin_alt"></i> Students</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>

<?php
  }

  

}

else{
?>

                  <tr>
                    <th><i class="icon_pin_alt"></i> State Name</th>
                    <th><i class="icon_pin_alt"></i> LGAs</th>
                    <th><i class="icon_pin_alt"></i> Wards</th>
                    <th><i class="icon_pin_alt"></i> Centers</th>
                    <th><i class="icon_pin_alt"></i> Students</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>


<?php
$sql4 = "SELECT * FROM `state` ORDER BY `state_name` ASC LIMIT 0 , 30" ;



}

$res4 = mysql_query($sql4) ;
while($stinfo = mysql_fetch_array($res4)){
$sti = $stinfo['state_id'];
  
  ?>
              <?php if(!empty($state_v) && empty($lga_v)){ 
                $lgaii = $stinfo['lga_id'];
              ?>
                <tr>
                    <td><?php echo $stinfo['lga_name']; ?></td>
                    <td><?php // counter_ward
                    $rwl = mysql_query("select count(ward_id) FROM ward WHERE lga_id = '$lgaii'");
                    $rwl = mysql_fetch_array($rwl);
                    $totwl = $rwl[0];
                    echo $totwl;
                    // counter-end ?></td>

                    <td><?php // counter_centers
                    $rescl = mysql_query("select count(center_id) FROM centre WHERE lga_id = '$lgaii'");
                    $rowcl = mysql_fetch_array($rescl);
                    $totalcl = $rowcl[0];
                    echo $totalcl;
                    // counter-end ?></td>

                    <td><?php // counter_students
                    $ressl = mysql_query("select count(student_id) FROM student WHERE lga_id = '$lgaii'");
                    $rowsl = mysql_fetch_array($ressl);
                    $totalsl = $rowsl[0];
                    echo $totalsl;
                    // counter-end ?></td>
                    <td>
                    <div class="btn-group">
                      <a href="add_location.php?action=delete&state_name=<? echo $stinfo['lga_name'] ?>&date=<? echo $myrand; ?>&bug=<? echo $date_sch ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php } 
              
              elseif(!empty($lga_v)){ ?>

                <tr>
                    <td><?php echo $stinfo['ward_name']; ?></td>

                    <td><?php 
                    $w_id = $stinfo['ward_id'];
                    $resw = mysql_query("select count(center_id) FROM centre WHERE ward_id = '$w_id'");
                    $roww = mysql_fetch_array($resw);
                    $totalw = $roww[0];
                    echo $totalw; ?></td>

                    <td><?php 
                    $resws = mysql_query("select count(student_id) FROM student WHERE ward_id = '$w_id'");
                    $rowws = mysql_fetch_array($resws);
                    $totalws = $rowws[0];
                    echo $totalws; ?></td>

                    <td>
                    <div class="btn-group">
                      <a href="add_location.php?action=delete&state_name=<? echo $stinfo['ward_name']; ?>&date=<? echo $myrand; ?>&bug=<? echo $date_sch ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>

              <?php } 
                
                else{

                
                ?>
                    <tr>
                    <td><?php echo $stinfo['state_name']; ?></td>
                    <td><?php
                    // counter_lga
                    $resu = mysql_query("select count(lga_id) FROM lga WHERE state_id = '$sti'");
                    $rowu = mysql_fetch_array($resu);
                    $total = $rowu[0];
                    echo $total;
                    // counter-end
                     ?></td>

                    <td><?php // counter_ward
                    $rw = mysql_query("select count(ward_id) FROM ward WHERE state_id = '$sti'");
                    $rw = mysql_fetch_array($rw);
                    $totw = $rw[0];
                    echo $totw;
                    // counter-end ?></td>

                    <td><?php // counter_centers
                    $resc = mysql_query("select count(center_id) FROM centre WHERE state_id = '$sti'");
                    $rowc = mysql_fetch_array($resc);
                    $totalc = $rowc[0];
                    echo $totalc;
                    // counter-end ?></td>

                    <td><?php // counter_students
                    $ress = mysql_query("select count(student_id) FROM student WHERE state_id = '$sti'");
                    $rows = mysql_fetch_array($ress);
                    $totals = $rows[0];
                    echo $totals;
                    // counter-end ?></td>

                    <td>
                    <div class="btn-group">
                      <a href="add_location.php?action=delete&bug=<? echo $sti ?>" class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php }  ?>
                      

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
(function() {
   'use strict';
   /* jshint browser: true */

   var d=document;
   var mf=d.getElementById('myform');
   var se=d.getElementById('state_list');
   var sse=d.getElementById('lga_list');
   var lo=d.getElementById('location')
   var temp;

   mf.reset();
   se.className='hide';
   sse.className='hide';
   lo.onchange=function() {
if(this.value==='lga') {
   se.className=se.className.replace('hide','form-control');
 } 
 else if(this.value==='ward') {

  se.className=se.className.replace('hide','form-control');
  sse.className=sse.className.replace('hide','form-control');
 }
else {
   temp=this.value;
   se.className='hide';
   sse.className='hide';
   mf.reset();
   lo.value=temp;
  }
 };
}());

</script>
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
</script>

</body>

</html>
<?php
 } else{

  @header ("Refresh: 2; URL=".'login.php');
  echo "You are being redirected to your original page request<br>";
  echo '(If your browser doesn’t support this, <a href="../index.php">click here</a>)';
 }

?>