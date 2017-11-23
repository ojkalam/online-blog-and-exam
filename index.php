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
            // $per_page = 10;
            // if (isset($_GET['page'])) {
            //   $page= $_GET['page'];
            // }else{
            //   $page = 1;
            // }
            // $start_from = ($page-1)*$per_page;
          
           ?>

           <div class="tab-content">
               <div class="tab-pane fade in active" id="section1">
                   <div class="qs_list">
                 <ul class="list-group">
                  <?php
                      $allpost = $pc->getAllPost();
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
             </div>
             <div class="obls_page">
               <ul class="pagination">


                <!--Pagination start-->
      <?php 
        // $total_row = $allpost->num_rows;
        // $total_pages = ceil($total_row/$per_page);
      ?>
      <?php 
      // echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";

      // for ($i=1; $i <$total_pages ; $i++) { 
      //   echo "<a href='index.php?page=".$i."'>".$i."</a>";
      // }
      // echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>";

       ?>
      <!--pagination ends-->



                <li><a href="#">&lt;&lt; prev</a></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">next &gt;&gt;</a></li>
              </ul>
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
                                  <option selected="selected">Select Subject</option>
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
