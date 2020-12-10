<?php 
require_once ('../includes/config.php');
require_once ('../includes/functions.php');
?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
     
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i>Admin Dashboard</h3>
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
              <div class="count"><?php echo countAll("student","student_id",$conn); ?></div>
              <div class="title">Students</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            
          </div>
          <div class="col-lg-2 col-md-2 col-sm-10 col-xs-12">
          <a class="" href="add_user.php"> <div class="info-box dark-bg">
              <i class="fas fa-chalkboard-teacher"></i>
              <div class="count"><?php echo countAll("user","user_id",$conn); ?></div>
              <div class="title">Facilitators</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            
          </div>
          <div class="col-lg-2 col-md-2 col-sm-10 col-xs-12">
          <a class="" href="add_user.php"> <div class="info-box brown-bg">
              <i class="fas fa-school"></i>
              <div class="count"><?php echo countAll("centre","center_id",$conn); ?></div>
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
              <div class="count"></div>
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
              <div class="count"></div>
              <div class="title">Absent</div>
              <input class="btn btn-default" type="submit" name="addBtn" value="view more"/>
            </div>
            </a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>