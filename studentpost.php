<?php
include_once "header.php";
?>
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
                  <td> <a href="#" class="btn btn-sm btn-info">Edit</a>  <a href="?delpage=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                <?php } ?>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>

 <?php
include_once "footer.php";
?>