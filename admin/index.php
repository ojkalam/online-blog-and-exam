<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <?php
                $getallpost = $pc->getTotalPostRows();
                $allpost = $getallpost->num_rows;
              ?>
              <div class="mr-5"><?php echo $allpost;?> Posts !</div>
            </div>
            <a href="index.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <?php
                $getstd = $ad->getTotalStudentRows();
                $allstd = $getstd->num_rows;
              ?>
              <div class="mr-5"><?php echo $allstd; ?> Students !</div>
            </div>
            <a href="viewstudent.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
               <?php
                $gettch = $ad->getTotalTeacherRows();
                $alltch = $gettch->num_rows;
              ?>
              <div class="mr-5"><?php echo $alltch; ?> Teachers !</div>
            </div>
            <a href="viewteacher.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Posts</div>
        <div class="card-body">
          <?php 
            //delete posts
              if (isset($_GET['delpage'])){
                  $delid = $_GET['delpage'] ;
                  $delete = $ad->daletePost($delid);
                  if ($delete) {
                    echo "<span class='success'>Post deleted successfully !</span>";
                  }
              }
          ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>title</th>
                  <th>Posted by</th>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                    $i=0;
                    $posts = $ad->getAllPost();
                    while ($row = $posts->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $fm->textShorten($row['title'],50);?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $fm->formatDate($row['pdate']);?></td>
                  <td><a href="?delpage=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                <?php } ?>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>