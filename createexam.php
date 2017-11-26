<?php
include_once "header.php";

if (Session::get("checkusertype")) {
    header("Location: examlist.php");
}
?>

<section id="examlist">
    <div class="container obls_margin obls_border">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Create new Exam</span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="examlist.php" class="btn btn-primary">Show Exams</a>
                </div>
            </div>
        </div>
        <div class="row" id="postdetails">
            <div class="col-md-6 col-md-offset-3" style="padding:20px;">
          <?php
          $tch = Session::get("username");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $added = $ex->createExam($_POST, $tch);
                if ($added){
                 header("Location: addquestion.php");
              }else{
                echo "<span class='error'>Field must not be empty.</span>";
              }
           }
    ?>
              <form action="" method="POST" role="form">
               <div class="form-group">
                   <label class="control-label" for="form-elem-1">Exam Title:</label>
                   <input type="text" name="extitle" id="form-elem-1" class="form-control">
               </div>
               <div class="form-group">
                   <select name="subject" class="form-control pull-left">
                     <option value="0">Select Subject</option>
                   <?php 
                    $getsub= $pc->getSubject();
                    while ($row = $getsub->fetch_assoc()) {
                   ?>
                      <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                  <?php } ?>
                   </select> 
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary form-control" style="margin-top:15px">Proceed</button>
               </div>
             </form>    
            </div>
        </div>
    </div>
</section>

<?php
include_once "footer.php";
?>