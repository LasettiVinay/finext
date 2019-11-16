
    


<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <style type="text/css">
          table#example {
    overflow-x: auto;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    width: 54px;
}
      </style>
      <h4 class="tittle-w3-agileits mb-4">Autopull Give Help </h4>
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                        <th scope="col">S.No</th>
                           <th scope="col">User ID</th>
                           <th scope="col">Mobile No</th>
                           <th scope="col">Amount</th>
                           <th scope="col">Bank Name</th> 
                           <th scope="col">Account Holder Name</th> 
                           <th scope="col">Account No</th>
                           <th scope="col">IFSC</th>
                           <th scope="col">Google Pay</th>
                            <th scope="col">Paytm</th>
                            <th scope="col">Phone Pay</th>
                           
                           <th scope="col">Upload File</th>
                           <th scope="col">Fund Received</th>


            </tr>
        </thead>
       <tbody>
                           <?php $count=1;
                           foreach($autopull_benificial as $giveDonamtion){

                            $parent=substr($giveDonamtion['parent_id'], 0,4);
                              if($parent=='FX18'){
                              $officical=$this->db->get_where('official_users', array('refer_id'=>$giveDonamtion['parent_id']))->row();
                              $refer_id=$officical->refer_id;
                              $user_name=$officical->name;
                              $user_email=$officical->email;
                              $user_mobile=$officical->mobile;
                              $bank_name=$officical->bank_name;
                              $account_holder_name=$officical->account_holder_name;
                              $account_no=$officical->account_no;
                              $ifsc=$officical->ifsc;
                              $tez=$officical->tez;
                              $paytm=$officical->paytm;
                              $pay_phone_no=$officical->pay_phone_no;
                              $amount=$giveDonamtion['amount'];
                            }else{ 
                                $user=$this->db->get_where('users', array('refer_id'=>$giveDonamtion['parent_id']))->row();
                            $refer_id=$user->refer_id;
                            $user_name=$user->name;
                            $user_email=$user->email;
                             $user_mobile=$user->mobile;
                             $bankdeatil= $this->Benifit_Model->bankdetail($giveDonamtion['parent_id']);
                              foreach($bankdeatil as $bdeatil){
                              $bank_name=$bdeatil->bank_name;
                              $account_holder_name=$bdeatil->account_holder;
                              $account_no=$bdeatil->account_no;
                              $ifsc=$bdeatil->ifsc;
                              $tez=$bdeatil->tez;
                              $paytm=$bdeatil->paytm;
                              $pay_phone_no=$bdeatil->pay_phone_no;
                              $amount=$giveDonamtion['amount'];
                            } 
                          }

                          ?>
                           <tr>
                                    <td scope="row"><?php echo $count++;?></td>
                                    <td><?php echo str_replace("FX18","FX19",$refer_id);;?></td>
                                    <td><?php echo $user_mobile;?></td>
                                    <td><?php echo $giveDonamtion['amount'];?></td>
                                    <td><?php echo $bank_name;?></td>
                                    <td><?php echo $account_holder_name;?></td>
                                    <td><?php echo  $account_no;?></td>
                                    <td><?php  echo $ifsc;?></td>
                                    <td><?php echo $tez;?></td>
                                    <td><?php echo $paytm;?></td>
                                    <td><?php echo $pay_phone_no;?></td>
                                    
                                    <td><?php if (!file_exists('uploads/autopull_give_help/'. $giveDonamtion['id'].'.jpg')){?><form method="post" action="<?=base_url('autopull_give_help');?>"  enctype="multipart/form-data"><input type="file" name="slip" required="" accept=".jpg,.jpeg" /><input type="hidden" name="slip_id" value="<?=$giveDonamtion['id'];?>">
                                      <input type="hidden" name="name" value="<?=$user_name;?>">
                                      <input type="hidden" name="email" value="<?=$user_email;?>">
                                      <input type="hidden" name="pay_name" value="<?=$data->name;?>">
                                      <input type="hidden" name="pay_id" value="<?=$data->refer_id;?>">
                                      <input type="submit" value="Submit"/></form><?php }else{?>
<a type="button" data-toggle="modal" data-target="#myModal<?=$count?>"><img src="<?=base_url(('uploads/autopull_give_help/'. $giveDonamtion['id'].'.jpg'));?>" height="50" width="50"/></a>

<!-- Modal -->
<div id="myModal<?=$count?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img src="<?=base_url(('uploads/autopull_give_help/'. $giveDonamtion['id'].'.jpg'));?>" class="img-thumnile" height="450">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                    <?php }?>

                                  </td>
                                    <td><?php if($giveDonamtion['row_status']==1){?>  <a class="btn btn-style_1 my-2 my-sm-0" href="#">Confirm</a> <?php } elseif($giveDonamtion['row_status']==2){ ?><a class="btn btn-style my-2 my-sm-0"  href="#">Confirm</a><?php } ?>
                                       </td>
                                  </tr>
                                     <?php } ?>

</tbody>
        <tfoot>
            <tr>
                          <th scope="col">S.No</th>
                          <th scope="col">User ID</th>
                          <th scope="col">Mobile No</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Bank Name</th> 
                          <th scope="col">Account Holder Name</th> 
                          <th scope="col">Account No</th>
                          <th scope="col">IFSC</th>
                          <th scope="col">Google Pay</th>
                            <th scope="col">Paytm</th>
                            <th scope="col">Phone Pay</th>
                          
                          <th scope="col">Upload File</th>
                          <th scope="col">Fund Received</th>
               
            </tr>
        </tfoot>
    </table>


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

    


    

