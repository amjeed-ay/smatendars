
<?php

include ('include/header.php');
$user_center = $_SESSION['right'];
?>

<?php 
 if($acctype=="user") { 
  ?>


<?php
$level = $_POST['level'];

if(isset($_POST['save'])){
  $ucheckbox = $_POST['uncheck'];
	for($iu=0;$iu<count($ucheckbox);$iu++){
  $del_idu = $ucheckbox[$iu]; 
  $ustatus ='absent';
  $userid = $_SESSION['user_id'];


  $student_arr = getMany('student',$del_idu,'student_id');
  if(is_array($student_arr)){
  $fname = $student_arr['fname'];
  $lname = $student_arr['lname'];
  $gender = $student_arr['gender'];
  $fname = $student_arr['fname'];
  $level = $student_arr['level'];
  $center = $student_arr['center_id'];
  $state = $student_arr['state_id'];
  $lga = $student_arr['lga_id'];
  $ward = $student_arr['ward_id'];
  }


	mysql_query("INSERT INTO attendance(student_id,fname,lname,gender,level,center_id,state_id,lga_id,ward_id,user_id,status,date) 
						VALUES('$del_idu','$fname','$lname','$gender','$level','$center','$state','$lga','$ward','$userid','$ustatus',NOW())") or die("already exist");
}
}
?>

<?php

if(isset($_POST['save'])){
  $checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
  $del_id = $checkbox[$i]; 
  $status ='present';
	mysql_query("UPDATE attendance SET status ='$status' WHERE student_id = '$del_id' AND date = NOW()");
	$message = "Attendance saved successfully !";
}
}
?>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Attendance</a></li>
              <li><i class="fa fa-table"></i>Record Attendance</li>
          
            </ol>
          </div>
        </div>
        <!-- page start-->
 
       
        
        
        <div class="row">

        <?php if(isset($message)) {

        ?>
        <header class="" style="padding: 20px; color: green;">
        <center>
        <div><?php echo $message; ?></div>
        </center>
        </header>

        <?php
        }
        ?>



          <div class="col-lg-8">
            <section class="panel">
  <form metaction="" method="post" hod="get">
              <header class="panel-heading" style="padding: 10px;">
<table>
              <tr>
                        
        
                        
                        
                        <td>
                        <div class="col-lg-2" style="margin-left: 15px;">
                        <select name="level" class="btn btn-default dropdown-toggle">

                        <option value="">Select level</option>
                        <option <?php if($level == '1'){ echo 'selected';}?> value="1">Class 1</option>
                        <option <?php if($level == '2'){ echo 'selected';}?> value="2">Class 2</option>
                        <option <?php if($level == '3'){ echo 'selected';}?> value="3">Class 3</option>
                        <option <?php if($level == '4'){ echo 'selected';}?> value="4">Class 4</option>
                        <option <?php if($level == '5'){ echo 'selected';}?> value="5">Class 5</option>
                        <option <?php if($level == '6'){ echo 'selected';}?> value="6">Class 6</option>
                        </select>
                      </div>
                        </td>
                        <td><input class="btn btn-primary" type="submit" name="viewBtn" value="View"/></td>
                        <td style="padding-right: 50px;"></td>

                        <td><input class="btn btn-success" type="submit" name="save" value="Submit"/></td>
                        <td style="padding-right: 20px;"></td>
                        
                </tr> 
</form>
</table>       
              </header>
    
              <table class="table table-striped table-advance table-hover" >
                <tbody>
                  <tr>
                    
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><input type="checkbox" id="checkAl"> Present</th>
                    <th style="display: none ;"><input type="checkbox"  id="checkAl"> Absent</th>
                    <th><i class=""></i> Gender</th>
                    <th><i class=""></i> Level</th>
            
                  </tr>

                  <?
if(isset($_POST['viewBtn']) && $_POST['level'] !==''){
  $level = $_POST['level'];
  $sql4 = "SELECT * FROM `student` WHERE `level` = '$level' AND `center_id` = '$user_center' ORDER BY `fname` ASC LIMIT 0 , 30" ;
} else{
  $sql4 = "SELECT * FROM `student` WHERE `center_id` = '$user_center' ORDER BY `fname` ASC LIMIT 0 , 30" ;
}

$res4 = mysql_query($sql4) ;
while($stinfo = mysql_fetch_array($res4)){
  $name_s = $stinfo["lname"].' '.$stinfo["fname"];
  $gender_s = $stinfo['gender'];
  $date_s = $stinfo['date'];
  $id = $stinfo['student_id'];
  $lell = $stinfo['level'];
  $school_s = $stinfo['center_id'];
  ?>
                    <tr>
                    
                    <td><?php echo $name_s; ?></td>
                    <td><input class="btn btn-default" type="checkbox" id="checkItem" name="check[]" value="<?php echo $stinfo["student_id"]; ?>"></td>
                    <td style="display: none ;"><input checked style="width: 20px" class="checkbox form-control" type="checkbox" id="checkItem" name="uncheck[]" value="<?php echo $stinfo["student_id"]; ?>"></td>
                    <td><?php echo $gender_s; ?></td>
                    <td><?php echo $lell; ?></td>
                
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