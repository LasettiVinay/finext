<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
 -webkit-appearance: none;
 margin: 0;
}
.error{
  color:red;
}
</style>
<?php
$introducer_id=$this->crud_model->generate_decryption_key($this->uri->segment(3));
?>
<!-- <section class="breadcrumb-section contact-bg section-padding">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3 text-center">
                  <h1>Register</h1>
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
        <h3 class="reg_finxt">Register Here</h3>
      </div>
       <div class="col-md-6 col-md-offset-3">
      <div class="main-login main-center">
        <img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here" class="register_img">

           <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>home/registration">
            <div class="col-md-12 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <?php
                            if($this->session->flashdata('success_message')!=''){
                            echo '<div class="alert alert-success alert-rounded alert_message_div">'.$this->session->flashdata('success_message').'</div>'; }elseif($this->session->flashdata('error_message')!=''){
                            echo '<div class="alert alert-danger alert-rounded alert_message_div">'.$this->session->flashdata('error_message').'</div>';
                        }?>
                        </div>
                    </div>
                    <?php //echo $introducer_id=$this->uri->segment(3)?>
            <div class="form-group reg_forms">
              <label for="name" class="cols-sm-2 control-label reg_fields">Introducer Id</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

                        <input type="text" class="form-control" name="introducer_id" value="<?php if($introducer_id!='' && $introducer_id!='FINEXT_ADMIN'){echo $introducer_id;}?>"  id="username" <?php if($introducer_id!='' && $introducer_id!='FINEXT_ADMIN'){echo 'readonly';}?> placeholder="Introducer ID" autocomplete="off" />
                    </div>
                    <label class="error danger"><?php echo form_error('introducer_id'); ?></label>
                <div id="msg"></div>
              </div>
            </div>

          <div class="form-group reg_forms">
              <label for="name" class="cols-sm-2 control-label reg_fields">Place Id</label>
              <div class="cols-sm-10">
                <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <?php 
                    if(isset($_GET['place_id'])==FALSE){?>
                        <input type="text" class="form-control" name="place_id" id="place"   placeholder="Place Id"  autocomplete="off"/>
                      <?php }else{?>
                          <input type="text" class="form-control" name="place_id" value="<?php if($_GET['place_id']==0 && $introducer_id!='FINEXT_ADMIN'){echo $introducer_id;} else if($introducer_id=='FINEXT_ADMIN'){echo ""; } else{echo $_GET['place_id']; }  ?>" <?php if($introducer_id!='FINEXT_ADMIN'){echo "readonly"; }?> placeholder="Introducer I" id="place" autocomplete="off"/>
                      <?php }?>
                </div>
                
                    <label class="error danger"><?php echo form_error('place_id'); ?></label>
                    <div id="placemsg"></div>
              </div>
          </div>
             <div class="form-group reg_forms">
                <label for="name" class="cols-sm-2 control-label reg_fields">Place The User</label>
                    <div class="cols-sm-10">
                      <div class="input-group" id="position">
                      <input name="position" id="L" class="position" value="L" type="radio" />Left 
                      <input name="position" id="M" class="position" value="M" type="radio" />Middle
                      <input name="position" id="R" class="position" value="R" type="radio" />Right
                      </div>
                       <div id="pmsg"></div>
                    </div>
              <label class="error danger"> <?php echo form_error('position'); ?></label>
            </div>

            <div class="form-group reg_forms">
                <label for="name" class="cols-sm-2 control-label reg_fields">Your Name</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control"  name="name" id="name"  placeholder="Enter your Name"  autocomplete="off"/>
                      </div>
                    </div>
                <label class="error danger"> <?php echo form_error('name'); ?></label>
            </div>

            <div class="form-group reg_forms">
                <label for="name" class="cols-sm-2 control-label reg_fields">PAN Number</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control"  name="pan_no" id="name"  placeholder=" Pan Nos" minlength="10" maxlength="10"  autocomplete="off"/>
                      </div>
                    </div>
                <label class="error danger"> <?php echo form_error('pan_no'); ?></label>
            </div>


            <div class="form-group reg_forms">
                <label for="name" class="cols-sm-2 control-label reg_fields">Your Phone</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="phone" id="phone"  placeholder="Phone" maxlength="10" minlength="10"  autocomplete="off"/>
                        </div>
                       <label class="error danger"> <?php echo form_error('phone'); ?></label>
                    </div>
            </div>

            <div class="form-group reg_forms">
              <label for="email" class="cols-sm-2 control-label reg_fields">Your Email</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="email" id="email"  placeholder="Email"  autocomplete="off"/>
                    </div>
                  </div>
              <label class="error danger"> <?php echo form_error('email'); ?></label>
            </div>

            <div class="form-group reg_forms">
                <label for="email" class="cols-sm-2 control-label reg_fields">Gender</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                       
                        <input type="radio"  name="gender" id="email"  value="male" class="reg-male" />Male
                        <input type="radio"  name="gender" id="email"  value="female" class="reg-female" />Female
                      </div>
                    </div>
                <label class="error danger"> <?php echo form_error('gender'); ?></label>
            </div>

            <div class="form-group reg_forms">
                  <label for="username" class="cols-sm-2 control-label reg_fields">User Id</label>
                      <div class="cols-sm-10">
                      <?php $userID="FX".date('y').rand(154564, 564646); ?>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" name="username" id="username" value="<?php echo $userID?>" readonly  placeholder="Enter your Username"/>
                        </div>
                      </div>
            </div>

            <div class="form-group reg_forms">
                <label for="password" class="cols-sm-2 control-label reg_fields">Password</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password"   placeholder="Enter your Password"  minlength="6" />
                      </div>
                      <label class="error danger"> <?php echo form_error('password'); ?></label>
                    </div>
            </div>

            <div class="form-group reg_forms">
                <label for="confirm" class="cols-sm-2 control-label reg_fields">Confirm Password</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                      </div>
                      <label class="error danger"> <?php echo form_error('confirm'); ?></label>
                    </div>
            </div>
            <div class="form-group reg_forms">
              <input type="checkbox"><a href="<?php echo base_url()?>term_and_condition">Terms and Conditions</a>
            </div>

            <div class="form-group reg_forms reg-btn">
                <button type="submit" class="submit-btn btn">Register</button>
            </div>

          </form>
        </div>   
       </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>
	
