
<?php

include ('include/header.php');

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
          <div class="col-lg-12">
            <section class="panel" style="width: 60%;">
              <header class="panel-heading">
                View Student List to Record Attendance
              </header>
              <div class="panel-body" >
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Center : </label>
                      <div class="btn-group" style="margin-left: 15px;">
                        <select name="state" class="btn btn-default dropdown-toggle">
                            <option value="none">All State</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Gombe">Gombe</option>
                        </select>
                      </div>

                      <div class="btn-group" style="margin-left: 15px;">
                        <select name="lga" class="btn btn-default">
                            <option value="none">Select LGA</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Gombe">Kirfi</option>
                        </select>
                      </div>

                      <div class="btn-group" style="margin-left: 15px;">
                        <select name="ward" class="btn btn-default">
                            <option value="none">Select Ward</option>
                            <option value="Bauchi">Makama</option>
                            <option value="Gombe">Jahun</option>
                        </select>
                      </div>

                      <div class="btn-group" style="margin-left: 15px;">
                        <select name="ward" class="btn btn-default">
                            <option value="none">Select School</option>
                            <option value="Bauchi">Makama Nursery and Primary</option>
                            <option value="Gombe">Jahun</option>
                        </select>
                      </div>


                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" type="" name="addBtn" value="view"/>
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="row" style="width: 50%;">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
<table>
<form metaction="" method="get" hod="get" >     
                <tr>
                        <td>Students Attendance</td>
      
                        <td>
                        
                          <input type="date" name="date" class="form-control" />
                          
                        </td>
        
                        <td>
                        
                        <select name="time" class="btn btn-default dropdown-toggle">
                            <option value="">Today</option>
                            <option value="Bauchi">Weeky</option>
                            <option value="Gombe">Monthly</option>
                        </select>
                        </td>
                        <td>
                        <div class="btn-group" style="margin-left: 15px;">
                        <select name="leve" class="btn btn-default dropdown-toggle">

                        <option value="">Select level</option>
                        <option <?php if($leve == '1'){ echo 'selected';}?> value="1">Class 1</option>
                        <option <?php if($leve == '2'){ echo 'selected';}?> value="2">Class 2</option>
                        <option <?php if($leve == '3'){ echo 'selected';}?> value="3">Class 3</option>
                        <option <?php if($leve == '4'){ echo 'selected';}?> value="4">Class 4</option>
                        <option <?php if($leve == '5'){ echo 'selected';}?> value="5">Class 5</option>
                        <option <?php if($leve == '6'){ echo 'selected';}?> value="6">Class 6</option>
                        </select>
                      </div>
                        </td>
                        <td>Status:</td>
                        <td>
                        <select name="status" class="btn btn-default dropdown-toggle">
                            <option value="">All</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                        </td>
                        <td style="padding-right: 50px;"></td>
                        <td><input class="btn btn-success" type="submit" name="viewBtn" /></td>
                        
                </tr> 
  </form>
</table>       
              </header>
    
              <table class="table table-striped table-advance table-hover" >
                <tbody>
                  <tr>
                    
                    <th><i class="icon_profile"></i> Full Name</th>
                    <th><i class="icon_profile"></i> Gender</th>
                    <th><i class="icon_profile"></i> Level</th>
                    <th><i class="icon_calendar"></i> Date</th>
                    <th><i class="icon_pin_alt"></i> Status</th>
            
                  </tr>

                  <?
  

  
$sql5 = "SELECT * FROM `attendance` WHERE date !='' " ;


 if(isset($_GET['vieBtn'])){
  
      $stat = $_GET['status'];
      $datea = $_GET['date'];
      $leve = $_GET['leve'];

  

      
  if($datef = strtotime($_GET['date'])) {
    $today = date('Y-m-d', $datef);
    
}


  if($stat != ''){
  $sql5.= " AND status = '$stat'";
  
  }
  
  if(isset($_GET['date'])){
    
    $sql5.= " AND date BETWEEN '$today 00:00:00' AND '$today 23:59:59';";
    
    }
  
  
  }else{
    $dat = date('Y-m-d');
      $sql5.= " AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59';";
  }
$res5 = mysql_query($sql5) ;
while($stinfo = mysql_fetch_array($res5)){
  $status = $stinfo['status'];
  $date_att = $stinfo['date'];
  $st_id =  $stinfo["student_id"];
  ?>
                    <tr>
                    <?php
                    
                      

                      if(1>9){
                        $sql55 = "SELECT * FROM student WHERE student_id = $st_id AND level = $leve";
  echo 'adafafaffa';
                      }else{
                        $sql55 = "SELECT * FROM student WHERE student_id = $st_id ";
                      
                      }
                    
                    $res55 = mysql_query($sql55) ;
                    while($userin = mysql_fetch_array($res55)){
                    $student_name = $userin['student_name'];
                    $student_gender = $userin['gender'];
                    $student_level = $userin['level'];
                    

                    ?>
                    <td><?php echo $student_name; ?></td>
                    <td><?php echo $student_gender; ?></td>
                    <td><?php echo $student_level; ?></td>
                    <td><?php echo $date_att; ?></td>
                    <td><?php echo $status; ?></td>
                
                  </tr>

<?php
}
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
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
</body>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script
</html>
