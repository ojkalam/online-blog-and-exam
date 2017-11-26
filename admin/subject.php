<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Add Subject</a>
        </li>
      </ol>
       <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $added = $ad->addSubject($_POST);
            if ($added) {
              echo "<span class='success' style='text-align:center;margin:10px;'>Subject Added successfully</span>";
            }
        }
    ?>
    <form class="form-inline" action="" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-5" for="email">Subject Name:</label>
        <div class="col-sm-5">
          <input type="text" name="subname" class="form-control" id="email" placeholder="Enter Subject Name">
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-6 col-sm-4">
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add sucject</button>
        </div>
      </div>
    </form>
    <hr>

    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Subjects</div>
        <div class="card-body">
          <?php 
            //delete subject
              if (isset($_GET['delsub'])){
                  $delid = $_GET['delsub'] ;
                  $delete = $ad->daleteSubject($delid);
                  if ($delete) {
                    echo "<span class='success'>Subject successfully deleted  !</span>";
                  }
              }
          ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Subject Name</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                    $i=0;
                    $getsub= $pc->getSubject();
                    while ($row = $getsub->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['name'];?></td>
                  
                  <td><a href="?delsub=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
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