<style type="text/css">
    button.change {
    background: #1599db;
    border: none;
    color: white;
    font-size: 20px;
    padding: 7px 21px;
    border-radius: 10px;
    /* margin-right: 12px; */
}
.member_sig {
    margin: 1;
    /* margin-right: 14px; */
    text-align: center;
    /*text-indent: 335px;*/
    margin-top: 18px;
}
@media only screen and (max-width: 600px) {
.member_sig {
     margin: 1;
    /* margin-right: 14px; */
    text-align: center;
}
.outer-w3-agile {
    padding: 2em 1em;
    }
}
</style>
<div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Set Password</h4>
                            <form  method="post">
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">New Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" name="newpassword" placeholder="New Password" minlength="6" required="" >
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" name="cpswd" placeholder="Confirm Password" minlength="6" required="">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-8 member_sig">
                                        <button type="submit" class="change">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>