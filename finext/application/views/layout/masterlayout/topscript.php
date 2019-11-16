   
   <!--Bootstrap v3 script load here-->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
 
  <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

         <!--Owl carousel script load-->
		<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
       
        <!--Slick Nav Js File Load-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
       <!--Wow Js File Load-->
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
         <!--Main js file load-->
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
         <script type="text/javascript">
  $(document).ready(function() {
  
    $("#username").on("blur", function(e) {
    var refer_id =$('#username').val();
      $('#msg').hide();
        if ($('#username').val() == null || $('#username').val() == "") {
        $('#msg').show();
        $("#msg").html("Username is required field.").css("color", "red");
      } else {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>/home/get_username_availability",
          data:{refer_id:refer_id},
        success: function(msg) {
          
            $('#msg').show();
            $("#msg").html(msg);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $('#msg').show();
            $("#msg").html(textStatus + " " + errorThrown);
          }
        });
      }
    });
  });


//place Id is avaliable or not
 $(document).ready(function() {
    $("#place").on("blur", function(e) {
    var place_id =$('#place').val();
      $('#msg').hide();
        if ($('#place').val() == null || $('#place').val() == "") {
        $('#placemsg').show();
        $("#placemsg").html("Place Id is required field.").css("color", "red");
      } else {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>/home/get_place_availability",
          data:{place_id:place_id},
        success: function(placemsg) {
            $('#placemsg').show();
            $("#placemsg").html(placemsg);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $('#placemsg').show();
            $("#placemsg").html(textStatus + " " + errorThrown);
          }
        });
      }
    });
  });


  
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
</script>
 <script type="text/javascript">
 $(document).ready(function() {
   $(".position").on("click", function(e) {
     var place_id =$('#place').val();
   var position =$("input[name='position']:checked").val();
if(place_id!=''){
     $('#pmsg').hide();
       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>/home/check_free_position",
         data:{position:position, place_id: place_id},
       success: function(pmsg) {
           $('#pmsg').show();
           $("#pmsg").html(pmsg);
         }
       });
}else{
          $('#pmsg').show();
           $("#pmsg").html('<span style="color:red;">Please Enter Place ID First</span>');
}
   });
 });
  </script>
    <script>
   $(document).ready(function () {         
            setTimeout(function() {
                $('.alert_message_div').slideUp("slow");
            }, 20000);
}); </script>