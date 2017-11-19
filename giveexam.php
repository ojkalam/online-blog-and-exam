<?php
include_once "header.php";
?>
<section class="giveexam">
	<div class="container obls_border obls_margin">
		 <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Exam Name</span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="#" class="btn btn-danger">End Test</a>
                </div>
            </div>
        </div>
		<div class="row"> 
			<div class="col-md-8 col-md-offset-2"  id="postdetails">
				<h1 class="text-center">Question 1 of 10</h1>
				<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, ea.?</h2>
				<form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
			    		<div class="radio">
						  <label><input type="radio" name="optradio">Option 1</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="optradio">Option 2</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="optradio">Option 3</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="optradio">Option 2</label>
						</div>
			    		<input class="btn btn-success btn-block" type="submit" value="Next">
			    	</fieldset>
			   </form>
			</div>
		</div>
	</div>
</section>

<?php
include_once "footer.php";
?>
