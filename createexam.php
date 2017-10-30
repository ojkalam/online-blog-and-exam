<?php
include_once "header.php";

?>

<section id="examlist">
    <div class="container obls_margin obls_border">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Create new Exam</span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="#" class="btn btn-primary">Subjects</a>
                </div>
            </div>
        </div>
        <div class="row" id="postdetails">
            <div class="col-md-6 col-md-offset-3" style="padding:20px;">
              <form action="" method="POST" role="form">
               <div class="form-group">
                   <label class="control-label" for="form-elem-1">Exam Title:</label>
                   <input type="text" id="form-elem-1" class="form-control">
               </div>
               <div class="form-group">
                   <select name="subject" class="form-control pull-left">
                      <option selected="selected">Select Subject</option>
                      <option value="2">Only my friends</option>
                      <option value="3">Only me</option>
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