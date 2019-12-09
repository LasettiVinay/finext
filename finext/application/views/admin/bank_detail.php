<style type="text/css">
    .col-sm-10.member_sig {
    /* margin-right: 45px; */
    text-align: center;
    text-indent: 228px;
    margin-top: 18px;
}
button.bank {
    background: #1599db;
    border: none;
    padding: 14px 58px;
    color: white;
    border-radius: 10px;
}
@media only screen and (max-width: 600px) {
.col-sm-10.member_sig {
     margin: 1;
    text-indent: 0px;
    text-align: center;
}
.outer-w3-agile {
    padding: 2em 1em;
    }
}
</style>
<div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Bank Details</h4>
                            <form action="<?php echo base_url();?>admin/admin/bank_detail" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Name :</label>
                                    <div class="col-sm-8">
                                          <input type="text" class="form-control" name="bank_name" id="inputEmail3" placeholder="Bank Name" required="" value="<?php if(!empty($bank_list)){ echo $bank_list->bank_name;} ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label"> Holder Name :</label>
                                    <div class="col-sm-8">
                                         <input type="text" class="form-control" id="inputPassword3" name="account_holder_name" placeholder="Account Holder Name" required="" value="<?php if(!empty($bank_list)){echo $bank_list->account_holder; } ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Account No :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputPassword3" name="account_no" placeholder="Account No" required="" value="<?php if(!empty($bank_list)){ echo $bank_list->account_no;} ?>">
                                    </div>
                                </div>
                              
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">IFSC Code:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputPassword3" name="ifsc" placeholder="IFSC" required="" value="<?php if(!empty($bank_list)){ echo $bank_list->ifsc;} ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Phone Pay:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control phone"   name="payno" id="phone" placeholder="Phone Pay"  value="<?php if(!empty($bank_list)){ echo $bank_list->pay_phone_no;} ?>" maxlength="10" minlength="10" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Gpay/Tez:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control phone"  name="tez" id="phone" placeholder="Tez"  value="<?php if(!empty($bank_list)){ echo $bank_list->tez;} ?>" maxlength="10" minlength="10" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Paytm:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control phone"  name="paytm" id="phone" placeholder="Paytm"  value="<?php if(!empty($bank_list)){ echo $bank_list->paytm;} ?>" maxlength="10" minlength="10" >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">BTC:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"  name="btc" id="btc" placeholder="BTC"  value="<?php if(!empty($bank_list)){ echo $bank_list->btc;} ?>">
                                    </div>
                                </div>
                                 
                               
                                <div class="form-group row">
                                    
                                    <div class="col-sm-10 member_sig">
                                        <button type="submit" class="bank">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>