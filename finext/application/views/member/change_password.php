<style type="text/css">
    button.change {
    background: #1599db;
    border: none;
    color: white;
    font-size: 20px;
    padding: 7px 21px;
    border-radius: 10px;
     margin-right: -212px; 
}
.member_sig1 {
    margin: 1;
    /* margin-right: 14px; */
    text-align: center;
    /*text-indent: 335px;*/
    margin-top: 18px;
}
.admin_cha{
    padding: 2em 14em;
}
@media only screen and (max-width: 600px) {
.member_sig1 {
     margin: 1;
    /* margin-right: 14px; */
    text-align: center;
}
.outer-w3-agile {
    padding: 2em 1em;
    }
     button.change {
       text-align: center;
       margin-right: -13px; 
    }
}
</style>
<div class="outer-w3-agile col-xl mt-3 mr-xl-3 admin_cha">
                            <h4 class="tittle-w3-agileits mb-4">Change Password</h4>
                            <form action="<?php echo base_url();?>member/member/change_password" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Current Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="oldpassword" id="inputEmail3" placeholder="Current password" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">New Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" name="newpassword" placeholder=" New password" required="">
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" name="cpswd" placeholder="Confirm Password" required="">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-8 member_sig1">
                                        <button type="submit" class="change">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>