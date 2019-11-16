<?php
$this->session->set_userdata('last_page',current_url());
?>
<?php
// Merchant key here as provided by Payu
/*$MERCHANT_KEY = "rjQUPktU";*/
$MERCHANT_KEY = "FHSPqbJp";
// Merchant Salt as provided by Payu
/*$SALT = "e5iIg1jwi8";*/
$SALT = "ZLho7LpsiT";
// End point - change to https://secure.payu.in for LIVE mode
/*$PAYU_BASE_URL = "https://test.payu.in";*/
$PAYU_BASE_URL = "https://sandboxsecure.payu.in";
$action = '';

$posted = array();
//Generate random transaction id
/*$txnid = random_string('numeric', 5);*/

  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

if(!empty($_POST)) {
    $posted['firstname'] = $_POST['firstname'];
    $posted['email'] = $_POST['lastname'];
    $posted['email'] = $_POST['email'];
    $posted['phone'] = $_POST['phone'];
    $posted['amount'] = $_POST['amount'];
    $posted['key'] = $MERCHANT_KEY;
    $posted['txnid'] = $txnid;
    $posted['productinfo'] = 'This is a Test Product';
    $posted['surl'] = base_url("payment/success");
    $posted['furl'] = base_url("payment/error");
    $posted['curl'] = base_url("payment/cancel");
    $posted['service_provider'] = 'payu_paisa';
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
        empty($posted['key'])
        || empty($posted['txnid'])
        || empty($posted['amount'])
        || empty($posted['firstname'])
        || empty($posted['email'])
        || empty($posted['phone'])
        || empty($posted['productinfo'])
        || empty($posted['surl'])
        || empty($posted['furl'])
        || empty($posted['service_provider'])
    ) {
    //redirect('payumoney/');
    $formError=1;
    }
  else{
    
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
    foreach($hashVarsSeq as $hash_var){
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }

    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $posted['hash'] = $hash;
    $action = $PAYU_BASE_URL . '/_payment';
  }
}
elseif(!empty($posted['hash'])){
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
<section class="person-details">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php if(!empty($formError)) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <?php
				if($this->session->flashdata('msg_error')){
					echo "<div class='alert alert-danger' role='alert'>".$this->session->flashdata('msg_error')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				}
				elseif($this->session->flashdata('msg_success')){
					echo "<div class='alert alert-success' role='alert'>".$this->session->flashdata('msg_success')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				}
			?>
				<div class="col-md-12 col-xs-12">
					<h3>Booking Details</h3>
					<?php 
						$row=$checkout_data;
						$hostels=$this->Vendor_Hostels_Model->get_hostels_by_id($row['hostel_id']);
						$hostel_price=$this->Hostel_price_model->get_price_by_id($row['hostel_price_id']);
						$hostel_share=$this->Hostel_price_model->get_share_by_id($hostel_price['share_id']);
					?>
					<div class="row">
						<div class="col-md-6 col-xs-12">
						<h4><?=ucwords($hostels->hostelname);?></h4>
						<img src="<?=base_url();?>uploads/<?=$hostels->timage;?>" class="img-responsive person-image">
						</div>
						<div class="col-md-6 col-xs-12">
						<h4>Sharing: <?=$hostel_share['sharing'];?></h4>
						<h4><?php if($hostels->hosteltype==1){echo 'Monthly';}elseif($hostels['hosteltype']==2){echo 'Annual';}?>: <?=$hostel_price['amount'].'/- RS.'?></h4>
						<h4>Number Of Beds:<?=$row['number_of_beds']?></h4>
						<h4>Created Date:<?=$row['created_time']?></h4>
						</div>
					</div>
				</div>
			<!-- <form action="<?=base_url('PayUMoney_form');?>" method="post" > -->
 <form method="post" class="form-horizontal" action="<?php echo $action; ?>" name="payuForm">
 	<input type="hidden" name="key" value="<?php echo (!isset($posted['key'])) ? '' : $posted['key'] ?>" />
        <input type="hidden" id="hash" name="hash" value="<?php echo (!isset($posted['hash'])) ? '' : $posted['hash'] ?>"/>
        <input type="hidden" name="txnid" value="<?php echo (!isset($posted['txnid'])) ? '' : $posted['txnid'] ?>" />

        <input type="hidden" name="productinfo" id="productinfo" value="<?php echo (!isset($posted['productinfo'])) ? '' : $posted['productinfo'] ?>">
        <input type="hidden" name="surl" value="<?php echo (!isset($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />
        <input type="hidden" name="curl" value="<?php echo (!isset($posted['curl'])) ? '' : $posted['curl'] ?>" size="64" />
        <input type="hidden" id="furl" name="furl" value="<?php echo (!isset($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />
        <input type="hidden" name="service_provider" value="<?php echo (!isset($posted['service_provider'])) ? '' : $posted['service_provider'] ?>" size="64" />
				<div class="col-md-12 col-xs-12">
					<h3>Person details</h3>
					<div class="personinfo">
						<div class="col-md-6 col-xs-12 person_name">
							<div class="form-group">
								<label>First Name :</label>
								<input type="text" class="form-control"  placeholder="Enter name"  id="usr" name="firstname" value="<?php echo $data->first_name;?>" required>
							</div>
						</div>
						
						<div class="col-md-6 col-xs-12 person_name">
							<div class="form-group">
								<label>Last Name :</label>
								<input type="text" class="form-control"  placeholder="Enter name"  id="usr" name="lastname" value="<?php echo $data->last_name;?>" required>
							</div>
						</div>
						<div class="col-md-6 col-xs-12 person_name">
							<div class="form-group">
								<label>Email :</label>
								<input type="text" class="form-control"  placeholder="Enter email"  id="usr" name="email" value="<?php echo $data->email;?>" required>
							</div>
						</div>
						<div class="col-md-6 col-xs-12 person_name">
							<div class="form-group ">
								<label>Mobile :</label>
								<input type="number" class="form-control"  placeholder="Enter Mobile Number"  id="usr" name="phone" value="<?php echo $data->mobile;?>" required>
							</div>
							<div class="col-md-6 col-xs-12">
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xs-12">
					<div class="person-coupon">
						<h3>Apply Your <span>Coupon Code and enjoy a discount on your booking</span></h3>
					</div>
					<div class="form-group form-inline">
						<label>Coupon Code</label>
						<input type="text" class="form-control coupon"  placeholder="Enter Your code"  id="usr" name="coupon" >
						<button type="button" name="apply" class="apply-code">Apply</button>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12">
				<div class="order-price">
					<?php 
					$discount_amount=100;
					?>
					<h5>Order Summary</h5>
					<hr class="summary">
					<h6>Sub total : <span>Rs.<?php if($hostels->hosteltype==1){echo '';}elseif($hostels['hosteltype']==2){echo 'Annual';}?> <?=$hostel_price['amount']?></span></h6>
					<h6>Discount : <span>Rs.<?=$discount_amount;?></span></h6>
					<hr class="summary">
					<h6>Total : <span>Rs.<?=$total_amount=$hostel_price['amount']-$discount_amount?></span></h6>
					
					<input type="hidden" class="form-control"  placeholder="Enter name"  id="usr" name="amount" value="<?=$total_amount;?>">
					
					<button type="submit" name="submit" id="pay-button" class="btn">Continue to pay</button>
				</div>
			</div>
			</form>
		</div>
	</div>

</div>
</section>
</body>
</html>