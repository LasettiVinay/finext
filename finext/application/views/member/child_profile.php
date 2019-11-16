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
<?php print_r($userdata); ?>
            <div class="container-fluid">
                <div class="row">
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl-4 profile">
                      <ul class="list-group mb-3">
                      <li>
                        
                      <div id="targetLayer text-center">
                      <?php if($userdata->profile_image==''){ ?>
                      <img  class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/images/blank_man.jpg" alt="User profile picture" id="myImg"></div>
                      <?php } else {?> <div id="uploaded_image" class="profile-user-img img-responsive"> <img  class="profile-user-img img-responsive " src="<?php echo base_url();?>upload/<?php echo $userdata->profile_image?>" alt="User profile picture" id="myImg"></div> <?php } ?> 
             <h3 class="profile-username "><?php echo $data->name;?></h3>
            <p style="color: <?php if($userdata->active_status==0){echo "red";} else if($userdata->active_status==1){echo "green";}else{echo "block";}?>"> <i class="fa fa-circle"></i></p>
                      </li>
                       <hr class="mb-4">
                       <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Name :</small>
                                    </div>
                                    <span class="text-muted"><?php echo $userdata->name;?></span>
                                </li>
                                   
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                       
                                        <small class="text-muted">Email Id : </small>
                                    </div>
                                    <span class="text-muted"><?php echo $userdata->email;?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        
                                        <small class="text-muted">Mobile No. :</small>
                                    </div>
                                    <span class="text-muted"><?php echo $userdata->mobile?></span>
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
                    <!--// Stats -->
                    <!-- Pie-chart -->
                    <div class="outer-w3-agile col-xl-7 ml-xl-3 mt-xl-0 mt-3 profile">
                        <h4 class="tittle-w3-agileits mb-4">Update Profile</h4>
                        <form action="<?php echo base_url()?>member/member/child_edit_profile" method="post" class="needs-validation" novalidate="">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Name :</label>
                                        <input type="text" class="form-control" id="firstName" name="name" placeholder=""  value="<?php echo $userdata->name;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                       <div class="col-md-12 mb-3">
                                        <label for="firstName">Pan No :</label>
                                        <input type="text" class="form-control" name="pan_no" id="firstName" placeholder="" value="<?php if($userdata->pan_no==''){}else{ echo $userdata->pan_no; }?>" required="">
                                        <div class="invalid-feedback">
                                            Valid Pan No is required.
                                        </div>
                                    </div>
                                      
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Email :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="email"  value="<?php echo $userdata->email;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid Email is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Mobile :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="mobile"  value="<?php echo $userdata->mobile;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid Mobile is required.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Nomini :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="nomini"  value="<?php echo $userdata->nomini;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid nomini is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Relation:</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""name="relation"  value="<?php echo $userdata->relation;?>" required="">
                                        <div class="invalid-feedback">
                                            Valid Relation is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">Address :</label>
                                        <textarea class="form-control"  name="address">
                                        <?php if($userdata->address==''){}else{ echo $userdata->address; }?>
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Valid Address is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">City :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($userdata->city==''){}else{ echo $userdata->city; }?>" required="" name="city">
                                        <div class="invalid-feedback">
                                            Valid City is required.
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <label for="firstName">State :</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="<?php if($userdata->state==''){}else{ echo $userdata->state; }?>" required="" name="state">
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
