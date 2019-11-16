<!-- <style type="text/css">
    
.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}
.card_header_background {
    background-color: #34495e;
    color: white;
}
.card-body {
    padding: 15px;
    border: 2px solid #34495e;
}
.card-body div {
    margin-bottom: 3%;
}
i.fas.fa-chart-line {
    font-size: 26px;
    margin-bottom: 17px;
}
i.fas.fa-cog.sett {
    font-size: 24px;
   
}
i.fa.fa-sitemap {
    font-size: 25px;
    margin-bottom: 17px;
}
i.fas.fa-rupee-sign {
    font-size: 25px;
    margin-bottom: 17px;
}
h3.title1 {
    font-size: 16px;
}
i.fas.fa-university {
    font-size: 27px;
    margin-bottom: 10px;
}
#dashboard i {
    font-size: 25px;
    color: #34495e;
}
p.reg {
    line-height: 18px;
    margin-bottom: 14px;
    word-spacing: 3px;
}
i.far.fa-hand-point-right {
    font-size: 23px;
    color: #34495e;
}
</style> -->
<style type="text/css">
    .outer-w3-agile.add {
    padding: 1em 1em;
    -webkit-box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.25);
    -moz-box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.25);
    box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.25);
    background: #fff;
}
    /*.card {
    border-radius: 0;
    border: none;
    margin-bottom: 20px;
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1), -1px 0 2px rgba(0, 0, 0, 0.05);
}*/
 marquee {
    background: #1599db;
    padding: 10px 10px;
    color: white;
    font-size: 19px;
}
@-webkit-keyframes marquee {
  0% {text-indent: 100%;}
  100% {text-indent: -100%;}
}
/*html, body {
  height: 100%;
  font-family:"Open Sans", sans-serif;
}

body {
  display:flex;
  justify-content: center;
  align-items: center;
}
*/
/*.card_header_background {
    background-color: #34495e;
    color: white;
}*/
.card {
  box-shadow: 0px 0px 16px -8px rgba(0,0,0,1);
  border-radius:5px;
  width: 600px;
  display: flex;
  height: 280px;
  
}
.card_header_background {
    background-color: #1599db;
    color: white;
}


</style>
<div class="row">
                       
                           <div class="col-md-12">
                                <marquee class="li" direction=”right”>★ Welcome to Finext News ★</marquee>
                        </div>
<div class="outer-w3-agile col-xl add
">


<div class="stat-grid p-3 d-flex align-items-center justify-content-between ">
                            <!-- <div class="s-l">
                                <h5>Active Status</h5>
                                <p class="paragraph-agileits-w3layouts text-white"><?php if($user_data->active_status==0){echo "Inactive";}else{ echo "active";}?></p>
                            </div> -->
                            <div class="s-r">
                                <h6><?php
                                  $now =$user_data->creation_date ;
                                  
                                    $start_date = strtotime($now);
                                    //print_r($start_date);
                                   $end_date = strtotime("+3 day", $start_date);
                              // print_r($end_date);
                                   ;?><small><p>please do the payment before 3days <?php echo date('Y-m-d H:i:s', $end_date)?> otherwise your not able to become a member of our company";</small>
                            </p>
                                    <!-- <i class="far fa-edit"></i> -->
                                </h6>
                            </div>
                        </div>
                        <input  type="hidden" id="nowdate" value="<?php echo $user_data->date_of_join ;?>">
                        <input  type="hidden" id="end_date" value="<?php echo $end_date;?>">
                       <span id="countdown" class="timer" style="color: red"></span>

                  </br>
              </div>
          </div> </br>
         
          <div class="row">
                        <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
        <a href="<?php echo base_url();?>give_help">
        <h4 class="card-title">Get Help Links</h4></a>
    </div>
    <div class="card-body">
        <!-- <div class="card-header d-flex align-items-center card_header_background"> -->
      
        
    
<!-- </div> -->
     <a href="<?php echo base_url();?>give_help"> <p class="card-text">Accept</p></a>
      <p class="card-text">Auto Pool Get Help Links</p>
      
    </div>
  </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
        <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Give Help Links</h4></a></div>
    <div class="card-body">
      
     <a href="<?php echo base_url();?>give_help"> <p class="card-text">Accept</p></a>
      <p class="card-text">Auto Pool Give Help Links</p>
      
    </div>
  </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
                                <div class="card-header d-flex align-items-center card_header_background">
                                    <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Profile</h4></a>
                                </div>
    
    <div class="card-body">
      
      <a href="<?php echo base_url();?>give_help"><p class="card-text">Accept</p></a>
      <!-- <p class="card-text">Auto Pool Give Help Links</p> -->
      
    </div>
  </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
        <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Give Help</h4></a>
    </div>
    <div class="card-body">
      
      <a href="<?php echo base_url();?>give_help"> <p class="card-text">Accept</p></a>
      <!-- <p class="card-text">Auto Pool Give Help Links</p> -->
      
    </div>
  </div>
                            </div>
                        </div>
                    </br>
                        <div class="row">
                        <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
        <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Get Help</h4></a></div>
    <div class="card-body">
      
     <a href="<?php echo base_url();?>give_help"> <p class="card-text">Accept</p></a>
      <!-- <p class="card-text">Auto Pool Get Help Links</p> -->
      
    </div>
  </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
         <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Direct Referale</h4></a></div>
    <div class="card-body">
     
      <a href="<?php echo base_url();?>give_help"><p class="card-text">Accept</p></a>
      <!-- <p class="card-text">Auto Pool Give Help Links</p> -->
      
    </div>
  </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
        <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Autopool Give Help</h4></a></div>
    <div class="card-body">
      
      <a href="<?php echo base_url();?>give_help"><p class="card-text">Accept</p></a>
      <!-- <p class="card-text">Auto Pool Give Help Links</p> -->
      
    </div>
  </div>
                            </div>
                            <div class="col-md-3 col-xs-12 ">
                              <div class="card" style="width:250px;height: 200px;">
    <div class="card-header d-flex align-items-center card_header_background">
        <a href="<?php echo base_url();?>give_help"><h4 class="card-title">Autopool Get Help</h4></a>
    </div>
    <div class="card-body">
      
      <p class="card-text">Accept</p>
      <!-- <p class="card-text">Auto Pool Give Help Links</p> -->
      
    </div>
  </div>
                            </div>
                            
                        </div>

                          
                            
                    
         <!--            <script>
                    var countDownDate = <?=$end_date;?>;
                    var now = <?=$start_date;?>;
                   // alert(countDownDate);
                    var initialTime = countDownDate - now;
                    //alert(initialTime);
                   // var initialTime = 194801;//Place here the total of seconds you receive on your PHP code. ie: var initialTime = <? //echo $remaining; ?>;

                    var seconds = initialTime;
                    function timer() {
                        var days        = Math.floor(seconds/24/60/60);
                        var hoursLeft   = Math.floor((seconds) - (days*86400));
                        var hours       = Math.floor(hoursLeft/3600);
                        var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                        var minutes     = Math.floor(minutesLeft/60);
                        var remainingSeconds = seconds % 60;
                        if (remainingSeconds < 10) {
                            remainingSeconds = "0" + remainingSeconds; 
                        }
                        alert(seconds);
                        document.getElementById('countdown').innerHTML = days + "Day " + hours + "Hours " + minutes + "minutes " + remainingSeconds+ "Seconds";
                        if (seconds == 0) {
                            clearInterval(countdownTimer);
                            document.getElementById('countdown').innerHTML = "Completed";
                        } else {
                            seconds--;
                        }
                    }
                    var countdownTimer = setInterval('timer()', 1000);

   

</script> -->
<!-- <script>
// Set the date we're counting down to
var countDownDate = <?=$end_date;?>;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = <?=$start_date;?>;
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    //alert(distance);
  // Output the result in an element with id="demo"
  document.getElementById("countdownTimer").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdownTimer").innerHTML = "EXPIRED";
  }
}, 1000);

</script> -->
<div class="cowntdown">
  <span class="days"></span>
  <span class="hours"></span>
  <span class="minutes"></span>
  <span class="seconds"></span>
</div>
<script>
var numberOfDays = 3;
var today = new Date();
var start = getNextStartDate(today);
var end = getNextEndDate(today);
alert(start);
var timer = setInterval(function() {
  var differenceTime, dd, hh, mm, ss, str;
  var now = new Date();
  if (now >= end) {
    start = getNextStartDate(now);
    end = getNextEndDate(now);
  } else {
    differenceTime = end - now;

    dd = parseInt(differenceTime / (1000 * 60 * 60 * 24));
    hh = parseInt(differenceTime / (60 * 60 * 1000)) % 24;
    mm = parseInt(differenceTime / (1000 * 60)) % 60;
    ss = parseInt(differenceTime / 1000) % 60;

    document.querySelector('.days').innerHTML = format(dd);
    document.querySelector('.hours').innerHTML = format(hh);
    document.querySelector('.minutes').innerHTML = format(mm);
    document.querySelector('.seconds').innerHTML = format(ss);
  }
}, 1000);

function getNextEndDate(fromDate) {
  return new Date(fromDate.getFullYear(), fromDate.getMonth(), fromDate.getDate() + numberOfDays);
}

function getNextStartDate(currentDate) {
  var currentDay = currentDate.getDate();
  var index = Math.ceil(currentDay / 3);
  var nextStartDay = 1 + numberOfDays * index
  return new Date(currentDate.getFullYear(), currentDate.getMonth(), nextStartDay);
}

function format(num) {
  return (9 < num) ? num : "0" + num;
};
</script>

