<?php 
require ('../includes/config.php');
$dat = date('Y-m-d');
// counter students
$resu = mysql_query("select count(student_id) FROM student WHERE center_id != ''");
$rowu = mysql_fetch_array($resu);
$total = $rowu[0];

// counter-end

// counter facilitators
$resf = mysql_query("select count(user_id) FROM user WHERE acctype = 'user'");
$rowf = mysql_fetch_array($resf);
$total_faci = $rowf[0];

// counter-end

// counter centers
$resc = mysql_query("select count(center_id) FROM centre WHERE ward_id != ''");
$rowc = mysql_fetch_array($resc);
$total_c = $rowc[0];

// counter-end


// counter centers

$resc = mysql_query("select count(student_id) FROM attendance WHERE status = 'present' AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59' ");
$rowc = mysql_fetch_array($resc);
$total_present = $rowc[0];
// counter-end

// counter centers

$resc = mysql_query("select count(student_id) FROM attendance WHERE status = 'absent' AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59' ");
$rowc = mysql_fetch_array($resc);
$total_absent = $rowc[0];
// counter-end
?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
     
        <!--overview start-->
        <div class="row">
        
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
        
          <div class="col-lg-2 col-md-2 col-sm-10 col-xs-12">
          <a class="" href="add_student.php"> <div class="info-box blue-bg">
              <i class="fas fa-user-graduate"></i>
              <div class="count"><?php echo $total; ?></div>
              <div class="title">Students</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            
          </div>
          <div class="col-lg-2 col-md-2 col-sm-10 col-xs-12">
          <a class="" href="add_user.php"> <div class="info-box dark-bg">
              <i class="fas fa-chalkboard-teacher"></i>
              <div class="count"><?php echo $total_faci; ?></div>
              <div class="title">Facilitators</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            
          </div>
          <div class="col-lg-2 col-md-2 col-sm-10 col-xs-12">
          <a class="" href="add_user.php"> <div class="info-box brown-bg">
              <i class="fas fa-school"></i>
              <div class="count"><?php echo $total_c; ?></div>
              <div class="title">Centers</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            
          </div>

         
          <!--/.col-->

        </div>
        <div class="row">
        
        <div class="col-lg-12">
         
          <ol class="breadcrumb">
            
            <li><i class="fa fa-laptop"></i>Attendance (Today)</li>
          </ol>
        </div>
      </div>
        <div class="row" style="">
        
          
         

          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <a class="" href="view_att.php"><div class="info-box green-bg">
              <i class="icon_documents_alt"></i>
              <div class="count"><?php echo $total_present; ?></div>
              <div class="title">Present</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          <a class="" href="view_att.php"><div class="info-box red-bg">
              <i class="icon_documents_alt"></i>
              <div class="count"><?php echo $total_absent; ?></div>
              <div class="title">Absent</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>