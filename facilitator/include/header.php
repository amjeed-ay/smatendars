<?php

require_once "../includes/config.php";

require_once "../includes/functions.php";

ob_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Smavators inc">
  <meta name="author" content="ay amjeed">
  <meta name="keyword" content="Smavators e-attendance">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>E-attendance</title>

  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

<?php 
 if($acctype=="user") { 
  ?>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-placement="bottom"><i  class="fa fa-bars" style="font-size:30px"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo"><span class="lite" style="padding-left:40px">Facilitator</span></a>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">0</span>
                        </a>
            
          </li>
          <!-- inbox notificatoin end -->
         
         
          <!-- user login dropdown start-->
          
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="" style="color: white; font-size: 15px;"> 
                            <?php echo $logged; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              
              <li>
              <a href="index.php?logout=yes"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              
            </ul>
          </li>
         
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Manage</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
    
              <li><a class="" href="add_student.php">Students</a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Attendance</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="record_att.php"><span>Record</span></a></li>
              <li><a class="" href="view_att.php"><span>View</span></a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_profile"></i>
                          <span>My Profile</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.php"><span>Edit Profile</span></a></li>
              <li><a class="" href="change_pwd.php"><span>Change Password</span></a></li>
            </ul>
          </li>
          <li class="">
            <a class="" href="index.php?logout=yes">
                          <i class="icon_key_alt"></i>
                          <span>Logout</span>
                      </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
 <?php }?>