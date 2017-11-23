<div class="col-md-4">
    <div class="row" style="padding-bottom:10px">
      <div class="col-md-12">
      <table class="tabBlock">
            <tr><td class="clock" id="dc"></td>  <!-- THE DIGITAL CLOCK. -->
                <td style="border-right:2px solid #ddd;padding-right:15px">
                    <table cellpadding="0" cellspacing="0" border="0"> 
                        <!-- HOUR IN 'AM' AND 'PM'. -->
                        <tr><td class="clocklg" id="dc_hour"></td></tr>
    
                        <!-- SHOWING SECONDS. -->
                        <tr><td class="clocklg" id="dc_second"></td></tr>
                    </table>
                </td>
                <td style="font-size:20px;padding-left:10px;"><?php echo date('d-M-Y');?></td>
            </tr>
    </table>
    </div>
  </div>
    <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title">Class (IX) & (X) Subjects</h3>
        </div>
        <div class="list-group subject_link">
          <?php
              $subs = $pc->getSubject();
              if (isset($subs)) {
                while ($row = $subs->fetch_assoc()) {
          ?>
                  <a href="#" class="list-group-item"><?php echo $row['name'];?></a>
            <?php
                }
              }else{
                echo "nothing found";
              }
          ?>
           
       </div>
    </div>

</div>