<?php
include_once "header.php";

//get user id 
 $user_id = Session::get("userid");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $posted = $pc->createPost($_POST, $_FILES, $user_id);
    }
?>
    <section class="qeustion_list clearfix">
      <div class="container obls_border obls_margin">
        <div class="row obls_padding">
          <div class="col-md-8">
            <?php 
                if (isset($posted)) {
                  echo $posted;
                }
            ?>
            <ul class="nav nav-pills">
               <li class="active"><a href="#section1" data-toggle="tab">Recent Posts</a></li>
               <li><a href="#section2" data-toggle="tab">Write Post</a></li>
           </ul>

           <?php
            $per_page = 5;
            if (isset($_GET['page'])) {
              $page= $_GET['page'];
            }else{
              $page = 1;
            }
            $start_from = ($page-1)*$per_page;
          
           ?>

           <div class="tab-content">
               <div class="tab-pane fade in active" id="section1">
                   <div class="qs_list">
               <!-- subject wise post view -->
                   <?php
                      if (isset($_GET['subid'])) {
                        $subid= $_GET['subid'];
                    ?>
                       <ul class="list-group">
                    <?php
                      //get sucject name
                         $subrows = $pc->getSubjectById($subid);
                         $result = $subrows->fetch_assoc();
                         $subname = $result['name'];
                    //get subject wise posts
                        $subpost = $pc->subjectWisePost($subid);
                        if ($subpost) {
                          $countSub = $subpost->num_rows;
                          echo "<h4 style='text-align:center;color:green'>$countSub Posts found on subject <strong>$subname</strong></h4>";
                          while ($row = $subpost->fetch_assoc()) {
                    ?>
                              <li class="list-group-item">
                                <a href="singlepost.php?pid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                                <span class="badge">10 answers</span><br><span class="postedby">posted by <?php echo $row['username'];?> on <?php echo $fm->formatdate($row['pdate']);?> | subject: <a href="#"><?php echo $row['name'];?></a></span>
                              </li>

                    <?php     
                          }
                        }else{
                            echo "<span class='error' style='font-size:20px;text-align:center'>No post found !</span>";
                        }
                    ?>
                 </ul>

                <?php
                    }else{
                 ?>
                 <ul class="list-group">
                  <?php
                      $allpost = $pc->getAllPost($start_from, $per_page);
                      if (count($allpost)>0) {
                        while ($row = $allpost->fetch_assoc()) {
                  ?>
                            <li class="list-group-item">
                              <a href="singlepost.php?pid=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                              <span class="badge">10 answers</span><br><span class="postedby">posted by <?php echo $row['username'];?> on <?php echo $fm->formatdate($row['pdate']);?> | subject: <a href="#"><?php echo $row['name'];?></a></span>
                            </li>

                  <?php     
                        }
                      }else{
                          echo $allpost;
                      }
                      
                  ?>
                    
                   
               </ul>
            <?php } ?>
              
             </div>
             <div class="obls_page">
            <?php
              if (!isset($_GET['subid'])) {
                
            ?>
               <ul class="pagination">
                <!--Pagination start-->
               <?php 

                  $postrows = $pc->getTotalPostRows();
                  $total_row = $postrows->num_rows;
                  $total_pages = ceil($total_row/$per_page);
                ?>
                <?php 
                echo "<li><a href='index.php?page=1'>&lt;&lt; First Page</a></li>";

                for ($i=2; $i <$total_pages ; $i++) { 

                    echo "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
                  
                }
                 
               echo "<li><a href='index.php?page=$total_pages'>Last page &gt;&gt;</a></li>";

               ?>
            <!--pagination ends-->  
               </ul>
            <?php } ?>
         </div>
         </div>
               <div class="tab-pane fade" id="section2">
                   <form action="" method="post" role="form" enctype="multipart/form-data">
                <!-- <div class="arrow"></div> -->
                   <div class="panel panel-default">
                     <div class="panel-heading"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post your Questions/Opinions/Thought</div>
                      <div class="panel-body qs-panel">
                           <input type="text" style="margin-bottom:15px;" class="form-control" name="title" placeholder="post title...">
                           <textarea name="description" id="writepost" class="form-control"  placeholder="Descripion..."></textarea>
                      </div>
                      <div class="panel-footer qs-panel-footer">
                        <div class="row post-panel">
                          <div class="col-md-8">
                            <div class="form-group col-md-5">
                                <select name="subject" class="form-control pull-left input-sm">
                                  <option value="0">Select Subject</option>
                                  <?php
                                    $subs = $pc->getSubject();
                                    if (isset($subs)) {
                                      while ($row = $subs->fetch_assoc()) {
                                  ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
                                  <?php
                                      }
                                    }
                                  ?>
                                </select>  
                                
                            </div>
                               <div class="col-md-7">
                                  <div class="input-group">
                                      <label class="input-group-btn">
                                        <span class="btn btn-default btn-sm">
                                          <input type="file" name="image" class="">
                                         </span>
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-3 col-md-offset-1">   
                              <input type="submit" name="submit" value="Post" class="form-control btn btn-primary btn-sm input-sm">                               
                          </div>
                      </div>
                    </div>
                  </div>
               </form>
              </div>
           </div>
              
          </div>
          <?php
          // sidebar
          include_once "sidebar.php";
          ?>
        </div>
      </div>
    </section>
<!-- End main content -->

<?php
include_once "footer.php";
?>
