<style type="text/css">
.outer-w3-agile.compose {
    padding: 36px;
}
button.btn.btn-primary.compose {
    margin-left: 460px;
    margin-top: 29px;
}
@media screen 
  and (min-device-width: 360px) 
  and (max-device-width: 1600px) 
  and (-webkit-min-device-pixel-ratio: 1) { 
    button.btn.btn-primary.compose {
    /*margin-left: 460px;*/
    margin-top: 29px;
}
}

</style>
<div class="outer-w3-agile compose col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Compose Mail</h4>
                            <form action="<?php echo base_url();?>admin_compose" method="post">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">To</label>
                                    <div class="col-sm-10">
                <?php if($this->session->userdata('login_type')=='member'){?>
                    <input type="hidden" name="to-mail-id" value="1">
                                        <input type="text" class="form-control" name="to_email" id="inputEmail3" placeholder="to-mail"   value="FINEXT_ADMIN" readonly>
                                    <?php  } else{ ?>
<input list="browsers" name="to-mail-id" class="form-control" placeholder="Search User ID, User Name, Mobile Number or Email..." required="" value="<?php if(isset($_GET['replay_id']) && $_GET['replay_id']!=''){$user_name= $this->db->get_where('users', array('id'=>$_GET['replay_id']))->row_array();
        echo $user_name['refer_id'].' / '.$user_name['name'].' / '.$user_name['mobile']. ' / '.$user_name['email'];}
           ?>">
  <datalist id="browsers">
    <?php $data=$this->User_details_model->get_members();
    foreach($data as $user){?>
    <option value="<?php echo $user['refer_id'].' / '.$user['name'].' / '.$user['mobile']. ' / '.$user['email']?>" <?php if(isset($_GET['replay_id']) && ($_GET['replay_id']==$user['id'])){echo 'selected';}?>  ></option>
    <?php } ?>
  </datalist>
<?php } ?>
                                    </div>
                                </div></br>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Subject</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="subject"class="form-control" placeholder="Subject" required="">
                                    </div>
                                </div></br>
                              <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea name="text" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <button type="submit" name="submit" class="btn btn-primary compose">Sent Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>







