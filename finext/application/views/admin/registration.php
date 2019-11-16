 <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

<section class="forms-section outer-w3-agile mt-3">
			<div class="container">
			    <div class="row">
			        <div class="col-md-6 col-md-offset-3 text-center">
			            <h1>Register Official Person</h1>
			             
			        </div>
			    </div>
			</div>
		</section><!--Header section end-->

<!--login section start-->
<div class="login-section section-padding login-bg outer-w3-agile mt-3">
	<div class="container">
		<div class="row">
			 <div class="col-md-6 col-md-offset-3">
      <div class="main-login main-center">
       
          <?php echo "<label class='d anger'>".validation_errors()."</label>"; ?>
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/admin/registration">
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Introducer Id</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
               
   <input type="text" class="form-control" name="introducer_id" id="name" readonly value="1980"  placeholder="Enter your Name"/>
    

                  
                </div>
              </div>
            </div>
<!--              <div class="form-group"> -->
<!--               <label for="name" class="cols-sm-2 control-label">Place the User</label> -->
<!--               <div class="cols-sm-10"> -->
<!--                 <div class="input-group"> -->
<!--                 <input name="position" id="input-type-tutor" value="L" type="radio" />Left  -->
<!--                 <input name="position" id="input-type-tutor" value="M" type="radio" />Middle -->
<!--                 <input name="position" id="input-type-tutor" value="R" type="radio" />Right -->
<!--                 </div> -->
<!--               </div> -->
<!--             </div> -->
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control"  name="name" id="name"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>
 <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your Phone</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="phone" id="name"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                </div>
              </div>
            </div>
<div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Gender</label>
              <div class="cols-sm-10">
                <div class="input-group">
                 
                  <input type="radio"  name="gender" id="email"  value="male"/>Male
                  <input type="radio"  name="gender" id="email"  value="female"/>Female
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                <?php  $user_Id = "FX".date("y").rand(154564, 564646);
        ?>
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" value="<?php echo $user_Id;?>" readonly/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                </div>
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" class="submit-btn btn btn-lg btn-block login-button">Register</button>
            </div>
          </form>
        </div>   
       </div>
		</div>
	</div>
</div>