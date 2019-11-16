 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
 <!-- data table -->
 
      <!-- data table ends -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
<!-- DATA TABLE -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- DATA table end -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!--      <script src="<?php //echo base_url();?>assets/js/jquery-2.2.3.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script>
      
        $(window).load(function () {
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
  
    <script src="<?php echo base_url();?>assets/js/SimpleChart.js"></script>
    <script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display err or and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
}); 
      
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [{
                    X: "6",
                    Y: 300.00
                },
                {
                    X: "7",
                    Y: 101.98
                },
                {
                    X: "8",
                    Y: 140.00
                },
                {
                    X: "9",
                    Y: 340.00
                },
                {
                    X: "10",
                    Y: 470.25
                },
                {
                    X: "11",
                    Y: 180.56
                },
                {
                    X: "12",
                    Y: 680.57
                },
                {
                    X: "13",
                    Y: 740.00
                },
                {
                    X: "14",
                    Y: 800.89
                },
                {
                    X: "15",
                    Y: 420.57
                },
                {
                    X: "16",
                    Y: 980.24
                },
                {
                    X: "17",
                    Y: 1080.00
                },
                {
                    X: "18",
                    Y: 140.24
                },
                {
                    X: "19",
                    Y: 140.58
                },
                {
                    X: "20",
                    Y: 110.54
                },
                {
                    X: "21",
                    Y: 480.00
                },
                {
                    X: "22",
                    Y: 580.00
                },
                {
                    X: "23",
                    Y: 340.89
                },
                {
                    X: "0",
                    Y: 100.26
                },
                {
                    X: "1",
                    Y: 1480.89
                },
                {
                    X: "2",
                    Y: 1380.87
                },
                {
                    X: "3",
                    Y: 1640.00
                },
                {
                    X: "4",
                    Y: 1700.00
                }
            ]
        };
        $(function () {
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });
        $("#b1").hover(function () {
          alert("hello");
    $('#modal1').modal({
        show: true,
        backdrop: false
    })
});
    </script>
   <script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $(".phone").keypress(function (e) {
     //if the letter is not digit then display err or and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
}); 

 $(document).ready(function(){
    
$(".tool, .tip").hover(function() {
    $('.tip').show('slow');
    
    var refer_id=$(this).attr("id");
   //alert(refer_id);
    $.ajax({  
                     url:"<?php echo base_url(); ?>admin/admin/get_detail",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:{refer_id: refer_id}, 
                     dataType: 'json',
                      success:function(data)  
                     {
                      var string="<div><table><tr><td>Introducer Id: </td><td>"+data.introducer_id+"</td></tr><tr><td>Introducer Name: </td><td>"+data.introducer_name+"</td></tr><tr><td>Id: </td><td>"+data.refer_id+"</td></tr><tr><td>Name: </td><td>"+data.name+"</td></tr><tr><td>Join Date: </td><td>"+data.created_at+"</td></tr><tr><td>Activate Date: </td><td>"+data.activedate+"</td></tr></div>"






//                       content = $(".emailcontainer").html();

// content = content.replace("p_refer", data.refer_id);
// content = content.replace("p_name", data.name);
// content = content.replace("p_activatedate/g", data.activedate);


$(".tip").html(string);

                     }  
                });
    return content;
},function() {
        setTimeout(function() {
        if(!($('.emailcontainer:hover').length > 0))
         // var id=$(this).attr("id").val();
       
            $('.emailcontainer').hide('slow');
        }, 300);
    });  
});
  </script>
    <script src="<?php echo base_url();?>assets/js/rumcaJS.js"></script>
    <script src="<?php echo base_url();?>assets/js/example.js"></script>
  
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/pignose.calender.js"></script>
    <script>
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });

            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
        //]]>
    </script>
  
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
   
    <script src="<?php echo base_url();?>assets/js/simplyCountdown.js"></script>
   
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
 
    <script src='<?php echo base_url();?>assets/js/amcharts.js'></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
                country: "Lithuania",
                value: 260
            },
            {
                country: "Ireland",
                value: 201
            },
            {
                country: "Germany",
                value: 65
            },
            {
                country: "Australia",
                value: 39
            },
            {
                country: "UK",
                value: 19
            },
            {
                country: "Latvia",
                value: 10
            }
        ];

        AmCharts.ready(function () {
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            chart.depth3D = 20;
            chart.angle = 30;
            chart.write("chartdiv");
        });
    </script>
   <script>  
 $(document).ready(function(){  
	
      $('#upload_form').on('submit', function(e){  
    
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           { 
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/admin/admin_ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                       $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
 
  <!--   <script src="<?php //echo base_url();?>assets/js/bootstrap.min.js"></script> -->
     <script>  
 $(document).ready(function(){  
    
      $('#upload_form').on('submit', function(e){  
    
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
              var url="<?php echo base_url(); ?>admin/admin/admin_ajax_upload";
               //alert(url);
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/admin/admin_ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                        alert(data);
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 }); 

 $(document).ready(function(){  
    
      $('#upload_officeal_form').on('submit', function(e){  
   
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
              var url="<?php echo base_url(); ?>admin/admin/officia_ajax_upload";
              alert(url);
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin/admin/officia_ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:{refer_id:refer_id},  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                       
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });   
 </script> 
  <script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display err or and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
}); 
    
   $(document).ready(function () {        
            setTimeout(function() {
                $('.alert_message_div').slideUp("slow");
            }, 1000);
}); </script>
<script>
    $(function() {

  $('[data-toggle="modal"]').hover(function() {
    var modalId = $(this).data('target');
    $(modalId).modal('show');

  });

});

 
  </script>
<!--   <script type="text/javascript">
    function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    total: t,
    days: days,
    hours: hours,
    minutes: minutes,
    seconds: seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector(".days");
  var hoursSpan = clock.querySelector(".hours");
  var minutesSpan = clock.querySelector(".minutes");
  var secondsSpan = clock.querySelector(".seconds");

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
    minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
    secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 30 * 24 * 60 * 60 * 1000);
initializeClock("clockdiv", deadline);
  </script> -->