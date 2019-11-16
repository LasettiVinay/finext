



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
      <h4 class="tittle-w3-agileits mb-4">Member of Autopull</h4>
            <table id="example3" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th scope="col">S.No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date of Join</th>
                                    <th> User Status</th>
                                     <th>Action</th>
                


            </tr>
        </thead>
       <tbody>
                            <?php $count=1;
                            //print_r($member_lists);
                            foreach($member_lists as $members){ 
    $query=$this->db->query("SELECT * FROM `users` where `introducer_id`='".$members['id']."' ");
    $res=$this->db->where('user_id',$members['refer_id'])->get('autopool_details');
    $check_auto=$res->num_rows();
     $auto_count=$query->num_rows();
      $result=$query->row_array();
     if($auto_count>=3  && $check_auto==0){
                               // print_r($this->Tree_View_Model->get_total_amount($members['introducer_id']))
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $count++ ?></th>
                                    <td><?php echo $members['refer_id']; ?></td>
                                    <td><?php echo $members['name']; ?></td>
                                    <td><?php echo $members['email']; ?></td>
                                    <td><?php echo $members['mobile']; ?></td>
                                    <td><?php echo $members['created_at'];?></td>
                                   
                                    <td><?php if($members['row_status']==2){echo "Inactive"; }else if($members['row_status']==1){echo "Active"; }else if($members['row_status']=3){echo "Register";} else{echo "Deletd"; } ?></td>

                                    <td><a href="<?php echo base_url();?>admin/admin/autopull/<?php echo $members['id']?>" class="sucess" style="display:<?php if($this->session->userdata('login_type')=='admin'){ echo "block"; }else{echo "none"; }?>">Auto Pull</a></td>
                                   
                                </tr>
                                <?php }}?>
                                
                            </tbody>
        <tfoot>
            <tr>
                <th scope="col">S.No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date of Join</th>
                                    <th> User Status</th>
                                     <th>Action</th>
               
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

 
    




    



    


    

