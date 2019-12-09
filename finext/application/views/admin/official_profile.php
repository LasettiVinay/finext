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
                     
                      <img  class="profile-user-img img-responsive img-circle" src="<?php if($official_profile->profile_image!=""){echo base_url()."uploads/official_user/".$official_profile->profile_image; } else{echo base_url();?>assets/images/blank_man.jpg<?php } ?>" alt="User profile picture" id="myImg"></div>
                      
             <h3 class="profile-username "><?php echo $official_profile->name;?></h3>
            <p style="color:green "> <i class="fa fa-circle"></i></p>
                      </li>
                       <hr class="mb-4">
                       <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Name :</small>
                                    </div>
                                    <span class="text-muted"><?php echo $official_profile->name;?></span>
                                </li>
                                   
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Email Id : </small>
                                    </div>
                                    <span class="text-muted"><?php echo $official_profile->email;?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        
                                        <small class="text-muted">Mobile No. :</small>
                                    </div>
                                    <span class="text-muted"><?php echo $official_profile->mobile?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div>
                                  

 
 <form method="post" id="upload_officeal_form" align="center" enctype="multipart/form-data">  
 <small class="text-muted">Upload Image File: </small>
<!--  <div id="uploaded_image">  
           </div>   -->
           <input type="hidden" name="id" value="<?php echo $official_profile->id; ?>">
                <input type="file" name="image_file" id="image_file" />  
 <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
</form>
</div>
                                </li>
                                 </ul>
                       
                    </div>
                    <!--// Stats -->
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl-7 ml-xl-3 mt-xl-0 mt-3 profile">
                        <h4 class="tittle-w3-agileits mb-4">Update Profile</h4>
                        <form action="<?php echo base_url()?>edit_official_profile" method="post" class="needs-validation" novalidate="">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Name :</label>
                                        <input type="text" class="form-control" id="firstName" name="name" placeholder=""  value="<?php echo $official_profile->name;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Display ID :</label>
                                        <input type="text" class="form-control" id="firstName" name="display_id" placeholder="Display ID"  value="<?php echo $official_profile->display_id;?>" required="" maxlength="10" minlength="10">
                                        <div class="invalid-feedback">
                                            Valid display_id is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Pan No :</label>
                                        <input type="text" class="form-control" name="pan_no" id="firstName" placeholder="" value="<?php if($official_profile->pan_no==''){}else{ echo $official_profile->pan_no; }?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                      
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Email :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="email"  value="<?php echo $official_profile->email;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Mobile :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="mobile"  value="<?php echo $official_profile->mobile;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Address :</label>
                                        <textarea class="form-control"  name="address"><?php if($official_profile->address==''){}else{ echo $official_profile->address; }?></textarea>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">City :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($official_profile->city==''){}else{ echo $official_profile->city; }?>" required="" name="city">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">State :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($official_profile->state==''){}else{ echo $official_profile->state; }?>" required="" name="state">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                   <div class="col-md-12 mb-3">
                                        <label for="firstName">Country :</label>
                                        <input type="text" class="form-control" id="firstName" readonly value="INDIA" name="country" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Google Pay :</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->tez; }?>" name="tez" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Paytm :</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->paytm; }?>" name="paytm" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Phone Pay :</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->pay_phone_no; }?>" name="pay_phone_no" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Bank Name :</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->bank_name; }?>" name="bank_name" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Account Holder Name :</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->account_holder_name==''){}else{ echo $official_profile->account_holder_name; }?>" name="account_holder_name" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Account No :</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->account_no; }?>" name="account_no" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">IFSC:</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->ifsc; }?>" name="ifsc" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">BTC:</label>
                                        <input type="text" class="form-control" id="firstName"  value="<?php if($official_profile->state==''){}else{ echo $official_profile->btc; }?>" name="btc" required="">
                                        <div class="invalid-feedback">
                                            Valid BTC is required.
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
