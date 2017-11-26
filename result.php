<?php
include_once "header.php";

?>

<section id="examlist">
    <div class="container obls_margin obls_border">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Results</span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="examlist.php" class="btn btn-primary">Show Exams</a>
                </div>
            </div>
        </div>
        <div class="row" id="postdetails">
            <div class="col-md-12" style="padding:20px;">

                <table class="table table-hover exlisttable" style="background:#fff">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Exam title</th>
                        <th>Score</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=0;
                    $userid = Session::get('userid');
                    $getex= $ex->getResultByUser($userid);
                    if ($getex) { 
                    while ($row = $getex->fetch_assoc()) {
                      $i++;
                      
                   ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><strong><a href="#"><?php echo $row['exname'];?></a></strong></td>
                        <td><?php echo $row['score'];?></td>
                      </tr>
                    <?php
                          }
                       }else{
                        echo "<td colspan=3>Nothing found !</td>";
                      }
                    ?>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include_once "footer.php";
?>