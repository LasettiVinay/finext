
<section class="content"> 
<div class="card">
  <ul class="list-group">
  <li class="list-group-item active">Inbox Messages</li>
  <li class="list-group-item"><div class="row">
    <div class="col-sm-3 col-sm-push-3">Subject</div>
    <div class="col-sm-6 col-sm-pull-6">Message</div>
    <div class="col-sm-3 col-sm-pull-3">Date</div>
  </div></li>
  <?php foreach($mail_details as $mail) { ?>
   <a href="<?php echo base_url();?>admin_inbox_mail?id=<?=$mail['id'] ?>"><li class="list-group-item"><div class="row"><div class="col-sm-3 col-sm-push-3" style="background-color:lavender;"><?=$mail['subject']?></div><div class="col-sm-6 col-sm-pull-6" style="background-color:lavenderblush;"><?=$mail['text']?></div><div class="col-sm-3 col-sm-pull-3"><?=date('M d,Y h:i A',strtotime($mail['date']));?></div></div></li></a>
<?php }?>

</ul>
</div>
</section>


