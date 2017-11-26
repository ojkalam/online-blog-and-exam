<div class="col-md-4">
    <div class="row" style="padding-bottom:10px">
      <div class="col-md-12">
      <table class="tabBlock">
            <tr><td class="clock" id="dc"></td>  <!-- THE DIGITAL CLOCK. -->
                <td style="padding-right:15px">
                    
                </td>
                <td style="font-size:20px;padding-left:10px;"><?php echo date('d M Y');?></td>
            </tr>
    </table>
    </div>
   </div>
    <div class="row" style="padding-bottom:10px">
        <form class="navbar-form navbar-left" role="search" action="" method="GET">
          <div class="form-group">
            <input style="width:310px;" type="text" name="search" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></button>
        </form> 
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
           <br><h3 class="panel-title">Class (IX) & (X) Subjects</h3>
        </div>
        <div class="list-group subject_link">
          <?php

              $subs = $pc->getSubject();
              if (isset($subs)) {

              //get user toal posts only
              $userposts = $pc->userTotalPost();
              //count all posts
              $allpost = $pc->getTotalPostRows();
              $allpost = $allpost->num_rows;
          ?>
                <?php
                 if (Session::get("checkusertype")) {  
                ?>
                <a style='color:#c0392b' href="index.php?usid=<?php echo Session::get("userid");?>" class="list-group-item">Only My Posts (<?php echo "<span style='color:#8e44ad'>".$userposts;?> posts</span>)</a>
                <?php } ?>
                <a href="index.php" class="list-group-item">All Posts (<?php echo "<span style='color:#8e44ad'>".$allpost;?> posts</span>)</a>
          <?php
                while ($row = $subs->fetch_assoc()) {
                  //count subject wise posts
                  $indSubpost = $pc->subjectWisePost($row['id']);
                  if ($indSubpost) {
                    $countIndSubPost = $indSubpost->num_rows;
                  }else{
                    $countIndSubPost = 0;
                  }
                  
          ?>
              <a href="index.php?subid=<?php echo $row['id'];?>" class="list-group-item"><?php echo $row['name'];?> (<?php echo "<span style='color:#8e44ad'>".$countIndSubPost;?> posts</span>)</a>
            <?php
                }
              }else{
                echo "No subject found";
              }
          ?>
           
       </div>
    </div>

</div>