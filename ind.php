<?php
include_once "header.php";

?>
    <section class="qeustion_list clearfix">
      <div class="container obls_border obls_margin">
        <div class="row obls_padding">
          <div class="col-md-8">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#section1" data-toggle="tab">Recent Posts</a></li>
               <li><a href="#section2" data-toggle="tab">Write Post</a></li>
           </ul>
           <div class="tab-content">
               <div class="tab-pane fade in active" id="section1">
                   <div class="qs_list">
                 <ul class="list-group">
                    <li class="list-group-item">
                      <a href="singlepost.php">কিভাবে জাভা ও সি ল্যাঙ্গুয়েজ ব্যবহার করে মোবাইল গেইম ও অ্যাপ তৈরী করা যায় ?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">p osted by Md Abul Kalam on 19 oct '17 | subject: <a href="#">English</a></span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">ইলাষ্ট্রেটর ভেক্টর ভিত্তিক কাজের জন্য সফটঅয়্যার, অন্যদিকে ফটোশপ বিটম্যাপ সফটঅয়্যার। ফটোশপের কোন কাজ থেকে ইলাষ্ট্রেটরের ভেক্টর আর্ট বানাতে চান ?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, vero.</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">কিভাবে জাভা ও সি ল্যাঙ্গুয়েজ ব্যবহার করে মোবাইল গেইম ও অ্যাপ তৈরী করা যায় ?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">কিভাবে জাভা ও সি ল্যাঙ্গুয়েজ ব্যবহার ?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit amet sunt tempora maiores, et consequatur tenetur a facilis quod itaque.?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">ইলাষ্ট্রেটর ভেক্টর ভিত্তিক কাজের জন্য সফটঅয়্যার, অন্যদিকে ফটোশপ বিটম্যাপ সফটঅয়্যার। ফটোশপের কোন কাজ থেকে ইলাষ্ট্রেটরের ভেক্টর আর্ট বানাতে চান ?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">কিভাবে জাভা ও?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   <li class="list-group-item">
                      <a href="#">কিভাবে জাভা ও সি ল্যাঙ্গুয়েজ ব্যবহার করে মোবাইল গেইম ও অ্যাপ তৈরী করা যায় ?</a>
                      <span class="badge">10 answers</span><br><span class="postedby">by Md Abul Kalam on 19 oct '17</span>
                   </li>
                   
               </ul>
             </div>
             <div class="obls_page">
               <ul class="pagination">
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
                                  <option value="2">Only my friends</option>
                                  <option value="3">Only me</option>
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