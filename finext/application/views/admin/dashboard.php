<?php
/*$insert_id='530';
$user_refer[]=array('id'=>$insert_id);
for($i=0;$i<count($user_refer);$i++){
$user_refer=$this->db->select('id,introducer_id,refer_id,place_id,row_status,position')->where('place_id',$user_refer[$i]['id'])->get('users')->result_array();*/
/*for($j=0;$j<count($user_refer);$j++){
  echo "<pre>";
$a[]=$user_refer;  

}*/
//$a[]=$user_refer;

//echo $this->db->last_query();
/*echo "<pre>";
print_r($user_refer);
}*/
//print_r($user_refer);die;
/*echo "<pre>";
print_r($a);die;*/
?>
<style type="text/css">
  body {
  text-align: center;
  background: #00ecb9;
  font-family: sans-serif;
  font-weight: 100;
}

/*h1 {
  color: #396;
  font-weight: 100;
  font-size: 40px;
  margin: 40px 0px 20px;
}*/

#clockdiv {
  font-family: sans-serif;
  color: #fff;
  display: inline-block;
  font-weight: 100;
  text-align: center;
  font-size: 30px;
}

#clockdiv > div {
  padding: 10px;
  border-radius: 3px;
  /*background: #00bf96;*/
  display: inline-block;
}

#clockdiv div > span {
  padding: 15px;
  border-radius: 3px;
  background: #ec2b0a;
  display: inline-block;
}

.smalltext {
  padding-top: 5px;
  font-size: 16px;
  color: #1599db;
}

/*.blink::after {
  content: ":";
  color: red;
  background-color: white;
}*/
p#demo{
  font-size: 23px;
}
</style>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 <!-- <div class="welcome"> <marquee direction = "left">Welcome to <b>Finext</b>.</marquee></div> -->
 
 <?php if($this->session->userdata('login_type')=='member'){ ?>

<?php  $autopull_users=$this->db->get_where('autopool_details', array('user_id'=>$this->session->userdata['refer_id']))->row_array();


if($autopull_users['user_id']==$this->session->userdata['refer_id'] && $autopull_users['row_status']==1){
  echo ' <div class="finext_con"> <h3>Congratulations! You are a Active AutoPool Member</h3></div>';
}else if($autopull_users['user_id']==$this->session->userdata['refer_id'] && $autopull_users['row_status']==2){
  echo ' <div class="finext_con"> <h3>Congratulations! You are a AutoPool Member</h3></div>';
}
$user=$this->db->get_where('users', array('id'=>$this->session->userdata('login_user_id')))->row();
?>


 <div class="welcome"> <marquee direction = "left" onmouseover="this.stop();" onmouseout="this.start();"><?=$this->db->get_where('settings', array('setting_type' => 'message'))->row()->description?> .</marquee></div>

 <?php if($user->autpull_status==0 || ($autopull_users!='' && $autopull_users['payment_conferm']<3)){?>
<div id="demo">
<div id="clockdiv">
  <div>
    <span id="days"></span>
    <!-- <span class="">:</span> -->
    <div class="smalltext">Days</div>
  </div>
  <div>
    <span id="hours"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span id="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span id="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>
</div>
<?php if($user->row_status==2){ ?>
  <div class="info"> <h6 class="adref"><span class="note">Note : </span> Kindly Upgrade to Start Earnings!</h6>
</div>
<?php }else if ($user->row_status==0){?>
  <div class="info"> <h6 class="adref"><span class="note">Note : </span> You are Blocked!!!, Become Active and Start Earnings!</h6>
</div>
<?php }else{ ?>
<div class="info"> <h6 class="adref"><span class="note">Note : </span> Refere 3 Direct Members within 45Days other wise The user get Blocked.</h6>

</div>
 <?php } } ?>



<div class="row">
  <div class="col-md-6">
<div class="card">
  <div class="card-header">Our Plans for Users</div>
  <div class="card-body">
<ul>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
  </ul>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="card">
  <div class="card-header">Our Plans for Users</div>
  <div class="card-body"><ul>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
  </ul></div>
</div>
</div>
</div>
<?php }?> 
 <?php if($this->session->userdata('login_type')=='admin'){ 
 
           
 ?>
 <section>
  
         <div class="row dah">
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="fas fa-users use" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text user">Users</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->db->get_where('users', ["role_id" => 2 , "row_status !=" => 0] )->num_rows();?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fas fa-users use" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text profile">Autol Users</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->db->count_all('autopool_details');?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box  bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-inr rup" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text gethelp">Autopool Paid Users</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->db->order_by('id','DESC')->get_where('autopool_details', array('payment_status'=>1))->num_rows();?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box  bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-sitemap sit"></i>
                        </div>
                        <div class="content">
                            <div class="text genealogy">Autopool Unpaid Users</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?=$this->db->order_by('id','DESC')->get_where('autopool_details', array('payment_status'=>0))->num_rows();?></div>
                        </div>
                    </div>
                    
                </div>
         </div>
          <!-- <div class="row">
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="fas fa-users use"></i>
                        </div>
                        <div class="content">
                            <div class="text auto">Auto Poll Tree</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                           <img class="donate1" src="<?php echo base_url();?>assets/images/donat.svg">
                        </div>
                        <div class="content">

                            <div class="text ">Donation Summery</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-headphones supprt" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text support">Support</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-inr rup" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="text">Given Help Details</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
         </div> -->
     </section>
     <hr/>
     <section>
       <div class="row">
         <div class="col-md-6">
          <h4>Today Registered Users</h4><hr/>
           <table class="table table-hover">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <?php
$r_u=$this->db->get_where('users', ["role_id" => 2 , "created_at >= " => date('Y-m-d 00:00:00'), "created_at <= " => date('Y-m-d 23:59:59')] )->result_array();
      if($r_u){
    ?>
    <tbody>
      <?php
      
      foreach ($r_u as $row) {
      ?>
      <tr>
        <td><?=$row['refer_id'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['email'];?></td>
      </tr>
    <?php }
    ?>
    </tbody>
    <?php

  }else{
      ?>
      <tbody>
      <tr><td colspan="3">No Data Available</td></tr>
    </tbody >
      <?php
    }?>
    
  </table>
         </div>
         <div class="col-md-6">
          <h4>Today Autopool Users</h4><hr/>
           <table class="table table-hover">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $r_u=$this->db->get_where('autopool_details', ["created_at >= " => date('Y-m-d 00:00:00'), "created_at <= " => date('Y-m-d 23:59:59')] )->result_array();
      if($r_u){
      foreach ($r_u as $user) {
        $row=$this->db->get_where('users',array('refer_id'=>$user['user_id']))->row_array();
      ?>
      <tr>
        <td><?=$row['refer_id'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['email'];?></td>
      </tr>
    <?php }}else{
      ?>
      <tr><td colspan="3">No Data Available</td></tr>
      <?php
    }?>
    </tbody>
  </table>
         </div>
       </div>
     </section>              
  <?php }?>    
  <?php if($this->session->userdata('login_type')=='member'){?>
                   <?php $this->session->userdata('login_user_id');
         $user=$this->db->get_where('users', array('id'=>$this->session->userdata('login_user_id')))->row();
         if($user->row_status!=0){
         $introducer_count=$this->db->where('introducer_id',$this->session->userdata('login_user_id'))->get('users')->num_rows();
         // $autopull_users=$this->db->get_where('autopool_details', array('user_id'=>$this->session->userdata('login_user_id')))->row();
         // $autopull_date=$autopull_users->created_at;
         // $a_endDate=strtotime("+3 day", $autopull_date);
         // $a_days3_date= date("M d, Y h:i:s", $a_endDate);
         //print_r($user);die;
         $date=strtotime($user->created_at);
         //echo  $start_date=date("M d, Y h:i:s", $date);
      $enddate3=strtotime("+3 day", $date);
      $days3_date= date("M d, Y h:i:s", $enddate3);
      $enddate45=strtotime("+45 day", $date);
      $days45_date= date("M d, Y h:i:s", $enddate45);

      $autopull_date=strtotime($autopull_users['created_at']);
         //echo  $start_date=date("M d, Y h:i:s", $date);
      $autopull_enddate3=strtotime("+3 day", $autopull_date);
      $autopull_days3_date= date("M d, Y h:i:s", $autopull_enddate3);
      /*$enddate45=strtotime("+45 day", $date);
      $days45_date= date("M d, Y h:i:s", $enddate45);*/
         ?>  
<script>
  <?php 
  if($user->payment_conferm<4){
    ?>
// Set the date we're counting down to
var countDownDate1 = new Date("<?=$days3_date?>").getTime();

// Update the count down every 1 second
var x1 = setInterval(function() {

  // Get today's date and time
  var now1 = new Date().getTime();
var id='<?php $this->session->userdata('login_user_id'); ?>';
  // Find the distance between now and the count down date
  var distance1 = countDownDate1 - now1;

  // Time calculations for days, hours, minutes and seconds
  var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  /*document.getElementById("demo").innerHTML =days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";*/
  $('#days').html(days1);
  $('#hours').html(hours1);
  $('#minutes').html(minutes1);
  $('#seconds').html(seconds1);

  // If the count down is finished, write some text 
  if (distance1 < 0) {
    clearInterval(x1);
   update_user_status('You are not done your payment on time So we are going to deactivate your account.');
    //document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
<?php }else if($user->payment_conferm==4){
//if($introducer_count<=3){
  if($user->autpull_status==0){
  ?>
// Set the date we're counting down to
var countDownDate2 = new Date("<?=$days45_date?>").getTime();

// Update the count down every 1 second
var x2 = setInterval(function() {

  // Get today's date and time
  var now2 = new Date().getTime();

  // Find the distance between now and the count down date
  var distance2 = countDownDate2 - now2;

  // Time calculations for days, hours, minutes and seconds
  var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
  var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  /*document.getElementById("demo").innerHTML = days + "<span>d </span>" + hours + "h "
  + minutes + "m " + seconds + "s ";*/
  $('#days').html(days2);
  $('#hours').html(hours2);
  $('#minutes').html(minutes2);
  $('#seconds').html(seconds2);

  // If the count down is finished, write some text 
   if (distance2 < 0) {
     clearInterval(x2);
     update_user_status('You have not referred 3 Members on time so we are deactivating your account.');
  //   //document.getElementById("demo").innerHTML = "EXPIRED";
   }
}, 1000);
<?php } 

}?>
<?php 
if($autopull_users!=''){
if($autopull_users['payment_conferm']<3){
    ?>
alert('<?=$autopull_days3_date?>');
// Set the date we're counting down to
var countDownDate3 = new Date("<?=$autopull_days3_date?>").getTime();
// Update the count down every 1 second
var x3 = setInterval(function() {

  // Get today's date and time
  var now3 = new Date().getTime();
var id='<?php $this->session->userdata('login_user_id'); ?>';
  // Find the distance between now and the count down date
  var distance3 = countDownDate3 - now3;

  // Time calculations for days, hours, minutes and seconds
  var days3 = Math.floor(distance3 / (1000 * 60 * 60 * 24));
  var hours3 = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes3 = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds3 = Math.floor((distance3 % (1000 * 60)) / 1000);
/*alert(days3);
alert(hours3);
alert(minutes3);
alert(seconds3);*/
  // Display the result in the element with id="demo"
  /*document.getElementById("demo").innerHTML =days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";*/
    $('#days').html(days3);
    $('#hours').html(hours3);
    $('#minutes').html(minutes3);
    $('#seconds').html(seconds3);

  // If the count down is finished, write some text 
  if (distance3 < 0) {
    clearInterval(x3);
   update_user_status('You are not done your Autopull Payment on time So we are going to deactivate your account. ');
    //document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
<?php }}?>
function update_user_status(val){
  $.ajax({
        type: "GET",
        url: "<?=base_url();?>update_user_status",
       success: function(dataResult){
        alert(val);
          window.location.href='<?=base_url('logout'); ?>'
      document.getElementById("demo").innerHTML = "";      
      }
      });
}

</script>
<?php }
/*
else{
  $this->session->set_flashdata('error_msg', 'Sorry U can not do login');
  redirect(base_url('logout'));
}
*/
  else
  {
      log_message('debug', '--- Blocked user entered here!!');$date=strtotime($user->created_at);

      $enddate3=strtotime("+3 day", $date);
      $days3_date= date("M d, Y h:i:s", $enddate3);
      $enddate45=strtotime("+45 day", $date);
      $days45_date= date("M d, Y h:i:s", $enddate45);

      $autopull_date=strtotime($autopull_users['created_at']);
      $autopull_enddate3=strtotime("+3 day", $autopull_date);
      $autopull_days3_date= date("M d, Y h:i:s", $autopull_enddate3);
      ?>
      <script>
        <?php
        if($user->payment_conferm<4){
        ?>
          // Set the date we're counting down to
          var countDownDate1 = new Date("<?=$days3_date?>").getTime();

          // Update the count down every 1 second
          var x1 = setInterval(function() {
              // Get today's date and time
              var now1 = new Date().getTime();
              var id='<?php $this->session->userdata('login_user_id'); ?>';

                // Find the distance between now and the count down date
                var distance1 = countDownDate1 - now1;

                // Time calculations for days, hours, minutes and seconds
                var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
                var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
                var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                /*document.getElementById("demo").innerHTML =days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";*/
                $('#days').html(days1);
                $('#hours').html(hours1);
                $('#minutes').html(minutes1);
                $('#seconds').html(seconds1);

          }, 1000);
          alert('You are Blocked because you are not done your payment!\nBecome active to start earnings!');
        <?php
        }
        else if($user->payment_conferm==4)
        {
          if($user->autpull_status==0){
          ?>
          // Set the date we're counting down to
          var countDownDate2 = new Date("<?=$days45_date?>").getTime();

          // Update the count down every 1 second
          var x2 = setInterval(function() {
            // Get today's date and time
            var now2 = new Date().getTime();
            // Find the distance between now and the count down date
            var distance2 = countDownDate2 - now2;

            // Time calculations for days, hours, minutes and seconds
            var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
            var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
            var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            /*document.getElementById("demo").innerHTML = days + "<span>d </span>" + hours + "h "
            + minutes + "m " + seconds + "s ";*/
            $('#days').html(days2);
            $('#hours').html(hours2);
            $('#minutes').html(minutes2);
            $('#seconds').html(seconds2);
          }, 1000);
          alert('You are blocked because you have not refferred 3 members on time!\nBecome active to start earnings!');
          <?php
          }
        }?>
        <?php
        if($autopull_users!=''){
          if($autopull_users['payment_conferm']<3){
            ?>
            // Set the date we're counting down to
            var countDownDate3 = new Date("<?=$autopull_days3_date?>").getTime();

            // Update the count down every 1 second
            var x3 = setInterval(function() {

              // Get today's date and time
              var now3 = new Date().getTime();

              var id='<?php $this->session->userdata('login_user_id'); ?>';

              // Find the distance between now and the count down date
              var distance3 = countDownDate3 - now3;

              // Time calculations for days, hours, minutes and seconds
              var days3 = Math.floor(distance3 / (1000 * 60 * 60 * 24));
              var hours3 = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes3 = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
              var seconds3 = Math.floor((distance3 % (1000 * 60)) / 1000);

              $('#days').html(days3);
              $('#hours').html(hours3);
              $('#minutes').html(minutes3);
              $('#seconds').html(seconds3);
            }, 1000);
            alert("You are Blocked because you not done autopool payment on time!\nBecome active to start earnings!");
        <?php
        }
      }?>
      </script>
  <?php
  }
}?>