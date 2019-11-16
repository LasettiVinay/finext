
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">

            <section class="tables-section">
        
             
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Give Help By</h4>
                    <div class="table-responsive">
                        <table class="table">
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
                           <th>Upload File</th>
                                 <th>Fund Received</th>  
                                </tr>
                            </thead>
                            <tbody>
                          <?php $count=1;
                          foreach($benifit_data as $giveDonamtion){
                            //print_r($giveDonamtion);die;
                              //$bdeatil= $this->Benifit_Model->bdetail($giveDonamtion['introducer_id']); 
                              $bdeatil=$this->db->get_where('account_detail', array('user_id'=>$giveDonamtion['introducer_id']))->row_array();               ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $giveDonamtion['refer_id'];?></td>
                                    <td><?php echo $giveDonamtion['mobile'];?></td>
                                    <td><?php echo $giveDonamtion['amount'];?></td>
                                    
                                    <td><?php echo $bdeatil['bank_name'];?></td>
                                    <td><?php echo $bdeatil['account_holder'];?></td>
                                    <td><?php echo $bdeatil['account_no'];?></td>
                                    <td><?php echo $bdeatil['ifsc'];?></td>
                                    <td><?php echo $bdeatil['tez'];?></td>
                                    <td><?php echo $bdeatil['paytm'];?></td>
                                    <td><?php echo $bdeatil['pay_phone_no'];?></td>
                                    
                                    <td><?php if (!file_exists('uploads/give_help/'. $giveDonamtion['id'].'.jpg')){?><form method="post" action="<?=base_url('give_helps');?>"  enctype="multipart/form-data">
                                      <input type="hidden" name="name" value="<?=$giveDonamtion['name'];?>">
                                      <input type="hidden" name="email" value="<?=$giveDonamtion['email'];?>">
                                      <input type="hidden" name="pay_name" value="<?=$data->name;?>">
                                      <input type="hidden" name="pay_id" value="<?=$data->refer_id;?>">
                                      <input type="file" name="slip" required="" accept=".jpg,.jpeg" /><input type="hidden" name="slip_id" value="<?=$giveDonamtion['id'];?>"><input type="submit" value="Submit"/></form><?php }else{?>
<a type="button" data-toggle="modal" data-target="#myModal<?=$count?>"><img src="<?=base_url(('uploads/give_help/'. $giveDonamtion['id'].'.jpg'));?>" height="50" width="50"/></a>

<!-- Modal -->
<div id="myModal<?=$count?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img src="<?=base_url(('uploads/give_help/'. $giveDonamtion['id'].'.jpg'));?>" class="img-thumnile" height="450">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                    <?php }?>

                                  </td>
                                   <td><?php if($giveDonamtion['row_status']==1){?>  <a class="btn btn-style_1 my-2 my-sm-0" href="#">Confirm</a> <?php } else if($giveDonamtion['row_status']==2){ ?><a class="btn btn-style my-2 my-sm-0"  href="#">Confirm</a><?php } ?>
                                       </td>
                                       
                                    
                                </tr>
                           <?php } ?>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

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