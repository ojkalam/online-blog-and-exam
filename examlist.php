<?php
include_once "header.php";

?>

<section id="examlist">
    <div class="container obls_margin obls_border">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Exams</span>
            </div>
            <?php 
              if(!Session::get("checkusertype")){
            ?>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="createexam.php" class="btn btn-primary">Create new Exam</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row" id="postdetails">
            <div class="col-md-12" style="padding:20px;">
              <?php 
            //delete exam 
              // if (isset($_GET['delex'])){
              //     $delid = $_GET['delex'] ;
              //     $delete = $ex->daleteExam($delid);
              //       if ($delete) {
              //         echo "<p class='success'>Exam successfully deleted  !</p>";
              //       }else{
              //            echo "<p class='error'>Not deleted  !</p>";
              //       }
              //   }
            ?>
                <table class="table table-hover exlisttable" style="background:#fff">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th><i class="fa fa-arrows-v" aria-hidden="true"></i> Date Created</th>
                        <th>Exam title</th>
                        <th>Subject</th>
                        <th>Total Questions</th>
                        <th>Created by</th>
                        <th><i class="fa fa-bars" aria-hidden="true"></i> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=0;
                    $getex= $ex->getAllExam();
                    if ($getex) {
                      
                    while ($row = $getex->fetch_assoc()) {
                      $i++;
                      $gettotal = $ex->getQuestionByExam($row['id']);
                      
                ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $fm->formatDate($row['edate']);?></td>
                        <td><strong><a href="#"><?php echo $row['name'];?></a></strong></td>
                        <td><?php echo $row['subject'];?></td>
                        <td><?php echo $gettotal; ?></td>
                        <td><?php echo $row['author'];?></td>
                        <td>
                            <div class="left_pad">
                              <?php 
                                if(Session::get("checkusertype")){
                              ?>

                              <a href="starttest.php?exid=<?php echo $row['id'];?>" class="btn btn-danger">Start Test</a>
                              
                              <?php
                                }else{
                              ?>
                              
                              <!-- <a href="?delex=<?php //echo $row['id'];?>" class="btn btn-danger">Delete</a> -->
                              <a href="questionlist.php?viewex=<?php echo $row['id'];?>" class="btn btn-info">View</a>
                              <?php } ?>
                            </div>
                        </td>
                      </tr>
                    <?php
                      }
                    }else{
                      echo '<tr><td class="error" colspan="5">nothing found !</td></tr>';
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