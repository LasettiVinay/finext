<?php
$this->session->set_userdata('last_page',current_url());
?>
<style>.profile-user-img {
    margin: 0 auto;
    width: 100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}
.img-circle {
    border-radius: 50%;
}
.outer-w3-agile.profile {
    padding: 2em 1em;
    -webkit-box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.25);
    -moz-box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.25);
    box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.25);
    background: #fff;
}
.btn-default {
    background-color: #f4f4f4;
    color: #444;
    border-color: #ddd;
}</style>
<section class="forms-section">

            <div class="container-fluid">
                <div class="row">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl-4 profile">
                        <ul class="list-group mb-3">
                      <li>
                        
                      <div id="targetLayer text-center">
                      
                      <img  class="profile-user-img img-responsive img-circle" src="<?=$this->crud_model->get_image_url($user_id);?>" id="myImg"></div>
                      <?php
  $user_info=$this->User_details_model->get_user_by_id($user_id);
   ?>
             <h3 class="profile-username "><?php echo $user_info->name;?></h3>
            <p style="color: <?php if($user_info->row_status==2){echo "red";}elseif($user_info->row_status==1){echo "green";}else{echo "black";}?>"> <i class="fa fa-circle"></i></p>
                      </li>
                       <hr class="mb-4">
                       <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Name :</small>
                                    </div>
                                    <span class="text-muted"><?php echo $user_info->name;?></span>
                                </li>
                                   
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Email Id : </small>
                                    </div>
                                    <span class="text-muted"><?php echo $user_info->email;?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        
                                        <small class="text-muted">Mobile No. :</small>
                                    </div>
                                    <span class="text-muted"><?php echo $user_info->mobile?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div>
                                  

 
 <form method="post" action="<?=base_url('profile_update?user_id=').$this->crud_model->generate_encryption_key($user_id)?>" align="center" enctype="multipart/form-data">  
 <small class="text-muted">Upload Image File: </small>
 <div id="uploaded_image">  
           </div>  
                <input type="file" name="image_file" id="image_file" required/>  
 <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
</form>
</div>
                                </li>
                                 </ul>
                    <?php if($this->session->userdata('login_type')=='admin'){?>
                      <ul class="list-group mb-3">
                      <li>
             <center>Show Dsahboard Message</center>
                      </li>
                       <hr class="mb-4">
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div>
                                  

 
 <form method="post" action="<?=base_url('message_update?user_id=').$this->crud_model->generate_encryption_key($user_id)?>" align="center" enctype="multipart/form-data">  
 <small class="">Message: </small>
 <br/>
                <textarea name="message" rows="5" required><?=$this->db->get_where('settings', array('setting_type' => 'message'))->row()->description?></textarea> 
 <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info btn-sm" />  
</form>
</div>
                                </li>
                                 </ul>
                       <?php }?>
                    </div>
                    <!--// Stats -->
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl-7 ml-xl-3 mt-xl-0 mt-3 profile">
                        <h4 class="tittle-w3-agileits mb-4">Update Profile</h4>
                        <form action="<?=base_url().'profile?user_id='.$this->crud_model->generate_encryption_key($user_id);?>" method="post" class="needs-validation" novalidate="">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Name :</label>
                                        <input type="text" class="form-control" id="firstName" name="name" placeholder=""  value="<?php echo $user_info->name;?>" required="" <?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                       <div class="col-md-12 mb-3">
                                        <label for="firstName">PAN No :</label>
                                        <input type="text" class="form-control" name="pan_no" id="firstName" placeholder="" value="<?=$user_info->pan_number;?>" required="" <?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <div class="invalid-feedback">
                                            Valid Pan No is required.
                                        </div>
                                    </div>
                                      
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Email :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="email"  value="<?php echo $user_info->email;?>" required="" <?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Mobile :</label>
                                        <input type="text" class="form-control" id="phone" placeholder=""name="mobile"  value="<?php echo $user_info->mobile;?>" required="" maxlength="10" minlength="10" <?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Address :</label>
                                        <textarea class="form-control"  name="address" <?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <?php if($user_info->address==''){}else{ echo $user_info->address; }?>
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">City :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($user_info->city==''){}else{ echo $user_info->city; }?>" required="" name="city"<?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <div class="invalid-feedback">
                                            Valid first City is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">State :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($user_info->state==''){}else{ echo $user_info->state; }?>" required="" name="state" <?php if($user_info->row_status==1 && $this->session->userdata('login_type')=='member'){echo "readonly";} ?>>
                                        <div class="invalid-feedback">
                                            Valid first State is required.
                                        </div>
                                    </div>
                                   <div class="col-md-12 mb-3">
                                        <label for="firstName">Country :</label>
                                        <input type="text" class="form-control" id="firstName" readonly value="INDIA" name="country" required="">
                                        <div class="invalid-feedback">
                                            Valid first Country is required.
                                        </div>
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <div class="col-md-8 col-xs-6 col-md-offset-5">
                                <button class="btn edit_profile" type="submit" name="submit">Update</button>
                                </div>
                            </form>
                      </div>
                    <!--// Pie-chart -->
                </div>
            </div>
</section>
