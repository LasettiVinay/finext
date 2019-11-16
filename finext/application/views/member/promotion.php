<div class="outer-w3-agile mt-3">
                   <?php  echo $user_Name['active_status']; if($user_Name['active_status']==0 ){echo "You are Not able to refer to any body."; } else{ ?>
                  <input  type="text" value="<?php echo base_url()."home/registration/".$user_Name['refer_id']; ?>" id="myInput">
                  <button onclick="myFunction()">Copy text</button>
                  <?php } ?>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  //lert("Copied the text: " + copyText.value);
}
</script>
                </div>
