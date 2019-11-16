<!-- <section class="breadcrumb-section contact-bg section-padding">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
                  <h1>Login</h1>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
              </div>
          </div>
      </div>
    </section> --><!--Header section end-->

<!--login section start-->
<div class="login-section section-padding login-bg">
  <div class="container">
  	
    <div class="row">
      <div class="col-md-6 col-md-offset-5">
        <h3 class="reg_finxt">Login Here</h3>
      </div>
       <div class="col-md-6 col-md-offset-3">
         <div class="main-login main-center">
            <img src="<?php echo base_url();?>assets/img/finext.png" alt="Logo Image Will Be Here" class="register_img">
            <div class="errormsg">
                 <?php if(!empty($this->session->flashdata('error_msg'))){?>
        <span class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></span>
      <?php }?>
            </div>
       
          <form class="form-horizontal" method="post" action="<?php echo base_url()?>home/login_action">

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label log-fields">User ID :</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="user_name" id="email"  placeholder="Enter your User Id" autocomplete="off" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label log-fields">Password :</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>

            <div class="form-group log-btn">
              <button type="submit" name="login" class="submit-btn btn">Login</button>
            </div>
            <div class="col-md-10 col-md-offset-4">
              <a href ="<?php echo base_url(); ?>forgot">Forgot Password?</a>
            </div>
          </form>
        </div>
       </div>
    </div>
  </div>
</div>
<!--login section end-->