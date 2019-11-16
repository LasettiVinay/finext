




<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
" rel="stylesheet"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
          table#example {
    overflow-x: auto;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    width: 54px;
}
      </style>
      <h4 class="tittle-w3-agileits mb-4"><?=ucwords($page_title);?></h4>
            <table id="example3" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th scope="col">S.No</th>
                                    <tr>
                                    <th scope="col">S.No</th>
                                
                                    <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                 <th scope="col">Place</th>
                                   <th scope="col">Phone</th> 
                                    <th scope="col">Date of Join</th>
                                      <!-- <th scope="col">Amount</th> -->
                                 
                                 <th scope="col">Fund Received</th> 
                                    
                                </tr>
                


            </tr>
        </thead>
       <tbody>
                          <?php  
                          $count=1;
                          //print_r($benifit);die;
                          foreach($autopull_users as $user_deatil){
                           
                              $parent=substr($user_deatil['user_id'], 0,4);
                              if($parent=='FX19'){ $user=$this->db->get_where('users', array('refer_id'=>$user_deatil['user_id']))->row();                         
                           ?>
                           
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $user->refer_id;?></td>
                                    <td><?php echo $user->name;?></td>
                                    <td><?php echo $user->city;?></td>
                                    <td><?php echo $user->mobile;?></td>
                                    <td><?php echo $user->created_at;?></td>
                                   <!--  <td><?php //echo $user_deatil->amount;?></td> -->
                                     <td><?php if($user_deatil['payment_status']==1){?>  <a class="btn btn-style_1 my-2 my-sm-0" href="#">Confirm</a></td> <?php } else if($user_deatil['payment_status']==0){ ?><a class="btn btn-style my-2 my-sm-0"  href="<?php echo base_url();?>admin/admin/auto_confirm_payment?id=<?php echo $user_deatil['id']?>">Confirm</a><?php } ?>
                                        </td>
                                </tr>
                           <?php } }?>
                              
                                
                            </tbody>
        <tfoot>
            <tr>
                <tr>
                   <th scope="col">S.No</th>
                                
                    <th scope="col">User ID</th>
                  <th scope="col">Name</th>
                    <th scope="col">Place</th>
                     <th scope="col">Phone</th> 
                   <th scope="col">Date of Join</th>
                               <th scope="col">Fund Received</th> 
                                    
                  </tr>
               
            </tr>
        </tfoot>
    </table>


<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
    $('#example3').DataTable();
} );
</script>

