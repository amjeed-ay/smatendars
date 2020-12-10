<?php
include ('include/header.php');
if($acctype=="admin" || $acctype=="superadmin") {  
?>


<!--/.row-->
<div id="load_update"></div>
        


        <!-- Today status end -->
        




        <br><br>

     
        
        
      </section>
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
</script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load_update').load('update.php').fadeIn("slow");
}, 1000); // refresh every 1000 milliseconds
</script>
</body>

</html>
<?php
 } else{
  header("location:../index.php");
 }

?>