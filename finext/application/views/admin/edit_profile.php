<style>.profile-user-img {
    margin: 0 auto;
    width: 100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}.img-circle {
    border-radius: 50%;
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
                    <div class="outer-w3-agile col-xl-4">
                      <ul class="list-group mb-3">
                      <li>
                      
                      <div id="targetLayer text-center">
                      <?php if($data->profile_image==''){ ?>
                      <img  class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/images/blank_man.jpg" alt="User profile picture" id="myImg"></div>
                      <?php } else {?> <div id="uploaded_image" class="profile-user-img img-responsive"> <img  class="profile-user-img img-responsive " src="<?php echo base_url();?>upload/<?php echo $data->profile_image?>" alt="User profile picture" id="myImg"></div> <?php } ?> 
             <h3 class="profile-username "><?php echo $data->name;?></h3>
                      </li>
                       <hr class="mb-4">
                       <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <small class="text-muted">Name</small>
                                    </div>
                                    <span class="text-muted"><?php echo $data->name;?></span>
                                </li>
                                   
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Email Id </small>
                                    </div>
                                    <span class="text-muted"><?php echo $data->email;?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        
                                        <small class="text-muted">Mobile No. </small>
                                    </div>
                                    <span class="text-muted"><?php echo $data->mobile?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-light">
                                    <div>
                                  

 
 <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
 <small class="text-muted">Upload Image File: </small>
 <div id="uploaded_image">  
           </div>  
                <input type="file" name="image_file" id="image_file" />  
 <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
</form>
</div>
                                </li>
                                 </ul>
                       
                    </div>

                    <div class="outer-w3-agile col-xl-7 ml-xl-3 mt-xl-0 mt-3">
                        <h4 class="tittle-w3-agileits mb-4">Update Profile</h4>
                        <form action="<?php echo base_url();?>edit_profile" method="post" class="needs-validation" novalidate="">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Name</label>
                                        <input type="text" class="form-control" id="firstName" name="name" placeholder="" readonly="readonly" value="<?php echo $data->name;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                       <div class="col-md-12 mb-3">
                                        <label for="firstName">Pan No</label>
                                        <input type="text" class="form-control" name="pan_no" id="firstName" placeholder="" value="<?php if($data->pan_no==''){}else{ echo $data->pan_no; }?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Email</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="email" readonly="readonly" value="<?php echo $data->email;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Mobile</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="mobile" readonly="readonly" value="<?php echo $data->mobile;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Address</label>
                                        <textarea class="form-control"  name="address">
                                        <?php if($data->address==''){}else{ echo $data->address; }?>
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">City</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($data->city==''){}else{ echo $data->city; }?>" required="" name="city">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">State</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($data->state==''){}else{ echo $data->state; }?>" required="" name="state">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                   <div class="col-md-12 mb-3">
                                        <label for="firstName">Country</label>
                                        <input type="text" class="form-control" id="firstName" readonly value="INDIA" name="country" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block error-w3l-btn" type="submit" name="submit">Continue to checkout</button>
                            </form>
                      </div>
                    <!--// Pie-chart -->
                </div>
            </div>
</section>
