<html>
<body>
      <div class="container">
      <div class="row">
      <div class="col-md-12 col-xs-12">
<?php  $id=$_GET['id'];
 $mail_details= $this->Compose_model->get_email_by_id($id);?>
 <div class="card">
  <div class="card-body">
<ul>
    <a href="<?=base_url('admin_compose?replay_id=').$mail_details->from_email;?>"><li><span class="pull-right"><i class="fa fa-reply fa-3x" aria-hidden="true"></i></span><br/><br/></li></a>
    
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;From Mail:<b><?php $user_name= $this->db->get_where('users', array('id'=>$mail_details->from_email))->row();
            echo $user_name->name." (".$user_name->refer_id.")";
           ?></b></li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;To Mail:<b><?php echo $this->session->userdata('name')." (".($this->session->userdata('refer_id')).")"; 
             ?></b></li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Subject: <b><?php  echo $mail_details->subject;?></b></li>
    <li><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;Text: <b><?php  echo $mail_details->text;?></b></li>
  </ul>
  </div>
</div>

</div>
</div> 
</div>
</body>
</html>
