<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Showing Teachers info</a>
        </li>
      </ol>
    
  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Teachers</div>
        <div class="card-body">
          <?php 
            //delete student
              if (isset($_GET['deltc'])){
                  $delid = $_GET['deltc'] ;
                  $delete = $ad->daleteTeacher($delid);
                  if ($delete) {
                    echo "<span class='success'>Teacher deleted successfully !</span>";
                  }
              }
          ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Degree</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                    $i=0;
                    $gettch = $ad->getTotalTeacherRows();
                    while ($row = $gettch->fetch_assoc()) {
                      $i++;
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo$row['name'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['password'];?></td>
                  <td><?php echo $row['degree'];?></td>
                  <td><?php echo $row['phone'];?></td>
                  
                  <td> <a href="editteacher.php?tcid=<?php echo $row['id'];?>" class="btn btn-sm btn-info">Edit</a>  <a href="?deltc=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
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