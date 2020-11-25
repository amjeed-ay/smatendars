<?php

include ('include/header.php');
$user_center = $_SESSION['right'];
?>
<?php 
 if($acctype=="user") { 
  ?>

<?php 


// counter students
$resu = mysql_query("select count(student_id) FROM student WHERE center_id = '$user_center'");
$rowu = mysql_fetch_array($resu);
$total = $rowu[0];


// counter centers
$dat = date('Y-m-d');
$resc = mysql_query("select count(student_id) FROM attendance WHERE center_id = '$user_center' AND status = 'present' AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59' ");
$rowc = mysql_fetch_array($resc);
$total_present = $rowc[0];
// counter-end

// counter centers
$dat = date('Y-m-d');
$resc = mysql_query("select count(student_id) FROM attendance WHERE center_id = '$user_center' AND status = 'absent' AND date BETWEEN '$dat 00:00:00' AND '$dat 23:59:59' ");
$rowc = mysql_fetch_array($resc);
$total_absent = $rowc[0];
// counter-end
?>

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
        
          <div class="col-lg-2 col-sm-6 col-xs-12">
          <a class="" href="add_student.php"> <div class="info-box blue-bg">
              <i class="fas fa-user-graduate"></i>
              <div class="count"><?php echo $total; ?></div>
              <div class="title">Students</div>
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
        
          
         

          <div class="col-lg-2 col-sm-6 col-xs-12">
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

          <div class="col-lg-2  col-sm-6 col-xs-12">
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
        <!--/.row-->


        


        <!-- Today status end -->
        


    


        <br><br>

     
        
        
      </section><br><br>

      <div class="text-right">
        
      </div>
    </section>
    <!--main content end-->
  </section>
   
  <!-- container section start -->

 <!-- javascripts -->
 <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="../js/scripts.js"></script>
 
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
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