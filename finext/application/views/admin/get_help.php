
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
" rel="stylesheet"> -->


   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
      <style type="text/css">
          table#example {
    overflow-x: auto;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    width: 54px;
}
      </style>
    <div class="container">
      <h4 class="tittle-w3-agileits mb-4">Get Help By</h4>
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <?php if($this->session->userdata('login_type')=='admin'){?>
                <th>Benificial ID</th>
                <th>Benificial Name</th>
                <th>Benificial Phn</th>
                 <?php }?>
                <th>User ID</th>
                <th>Name</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Date of Join</th>
                <th>Amount</th>
                <th>Slip</th>
                <th>Fund Received</th>
                


            </tr>
        </thead>
        <tbody>
                         <?php
                         $count=1;
                         //print_r($benifit);die;
                         foreach($benifit as $user_deatil){ ?>

                               <tr>
                                   <th scope="row"><?php echo $count++;?></th>
                                   <?php if($this->session->userdata('login_type')=='admin'){
                                       $introducer_user=$this->db->get_where('users', array('id'=>$user_deatil->a_introducer_id))->row();
                                       ?>

                               <td><?php echo $introducer_user->refer_id;?></td>
                               <td><?php echo $introducer_user->name;?></td>
                               <td><?php echo $introducer_user->mobile;?></td>
                               <?php }?>
                                   <td><?php echo $user_deatil->refer_id;?></td>
                                   <td><?php echo $user_deatil->name;?></td>
                                   <td><?php echo $user_deatil->city;?></td>
                                   <td><?php echo $user_deatil->mobile;?></td>
                                   <td><?php echo $user_deatil->created_at;?></td>
                                   <td><?php echo $user_deatil->amount;?></td>
                                   <td><?php if (file_exists('uploads/give_help/'. $user_deatil->a_id.'.jpg')){?>
<a type="button" data-toggle="modal" data-target="#myModal<?=$count?>"><img src="<?=base_url(('uploads/give_help/'. $user_deatil->a_id.'.jpg'));?>" height="50" width="50"/></a>

<!-- Modal -->
<div id="myModal<?=$count?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img src="<?=base_url(('uploads/give_help/'. $user_deatil->a_id.'.jpg'));?>" class="img-thumnile" height="450">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                    <?php }else{echo "File Not Uploaded..!";}?></td>
                                   <td><?php if($user_deatil->row_status==1){?>  <a class="btn btn-style_1 my-2 my-sm-0" href="#">Confirm</a> <?php } else if($user_deatil->row_status==2){ ?><a class="btn btn-style my-2 my-sm-0"  href="<?php echo base_url();?>admin/admin/confirm_payment?id=<?php echo $user_deatil->a_id?>">Confirm</a><?php } ?>
                                       </td>
                               </tr>
                          <?php } ?>


                           </tbody>
        <tfoot>
            <tr>
                <th>S.No</th>
                <?php if($this->session->userdata('login_type')=='admin'){?>
                <th>Benificial ID</th>
                 <?php }?>
                <th>User ID</th>
                <th>Name</th>
                <th>Place</th>
                <th>Phone</th>
                <th>Date of Join</th>
                <th>Amount</th>
                <th>Slip</th>
                <th>Fund Received</th>
               
            </tr>
        </tfoot>
    </table>

</div>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
    $('#example1').DataTable({
        "scrollX": true,
    });
   
} );
</script>

 <style type="text/css">
     .btn-style {
    background: #f75757; 
    color: #fff !important;
    border-color: #e04646;
}
.btn-style_1{
    background: #3b7a40c2; 
    color: #fff !important;
    border-color: #3b7a40c2;
}
 </style>

    

