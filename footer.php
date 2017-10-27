
    <footer class="footer_area clearfix">
      <div class="container">
        <div class="text-center">
          <strong>Copyright © Western Laboratory School 2017<strong>
        </div>
      </div>
    </footer>
    <!-- end footer area -->
      
       <!-- JavaScript Watch -->  
         <script>
    // OUR FUNCTION WHICH IS EXECUTED ON LOAD OF THE PAGE.
            function digitized() {
                var dt = new Date();    // DATE() CONSTRUCTOR FOR CURRENT SYSTEM DATE AND TIME.
                var hrs = dt.getHours();
                      hours = hrs % 12;
                      hours = hours ? hours : 12; // the hour '0' should be '12'

                var min = dt.getMinutes();
                var sec = dt.getSeconds();

                min = Ticking(min);
                sec = Ticking(sec);

                document.getElementById('dc').innerHTML = hours + ":" + min;
                document.getElementById('dc_second').innerHTML = sec;

                if (hrs > 12) { 
                    document.getElementById('dc_hour').innerHTML = 'PM'; 
                }
                else { 
                    document.getElementById('dc_hour').innerHTML = 'AM'; 
                }

                // CALL THE FUNCTION EVERY 1 SECOND (RECURSION).
                var time
                time = setInterval('digitized()', 1000);
            }

            function Ticking(ticVal) {
                if (ticVal < 10) {
                    ticVal = "0" + ticVal;
                }
                return ticVal;
            }
        </script>
        <!-- Custom JQuery -->
    <script type="text/javascript">

    </script>

</body>
<?php
ob_end_flush();
?>
</html>