<section class="content"> 
  
<div class="card">
    <table class="table table-bordered">
  <thead> 
    <tr>
      
      <th>Mail Report</th>
    </tr>
  </thead> 

  <tbody>
    <?php foreach($mail_details as $mail) { ?>
     
    <tr>
         <td><?php echo $mail['subject']; ?>
          <a href="<?php echo base_url();?>member/member/sentbox_mail/<?php echo $mail['id'] ?>"><span style="color:blue;">Mail<span></a></td>
       </td>

    </tr>
  <?php  } ?>
</tbody> 

</table>
</div>

</section>

