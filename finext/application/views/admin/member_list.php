<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
" rel="stylesheet"> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script><!--  -->
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
      <h4 class="tittle-w3-agileits mb-4"><?=$page_title;?></h4>
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>User Id</th>
                <th>Name</th>
                <th>City</th>
                <th>Date of Join</th>
                <th>Activaet Date</th>
                <th>User Status</th>
                <th>Action</th>
                <th>View Refer</th>
                


            </tr>
        </thead>
        <tbody>
                            <?php $count=1;
                            foreach($member_lists as $members){
                            $autopull_list=$this->db->get('autopool_details')->result_array();

                               // print_r($this->Tree_View_Model->get_total_amount($members['introducer_id']))
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $count++ ?></td>
                                    <td><?php echo $members['refer_id']; ?></td>
                                    <td><?php echo $members['name']; ?></td>
                                    <td><?php echo $members['city']; ?></td>
                                    <!-- <td><?php //echo $members['email']; ?></td> -->
                                    
                                    <td><?php echo $members['created_at'];?></td>
                                   <td><?php echo $members['activedate']; ?></td>
                                    <td><?php if($members['row_status']==2){echo "Inactive"; }else if($members['row_status']==1){echo "Active"; }else if($members['row_status']==3){echo "Register";} else{echo "Deletd"; } ?></td>

                                    
                                   
                                        <?php if($this->session->userdata('login_type')=='admin'){ ?>
                                             <td><a href="<?=base_url().'profile?user_id='.$this->crud_model->generate_encryption_key($members['id']);?>"><butuon type="submit" class="member-edit">Edit Profile </butuon></a>

                                        <a href="<?=base_url().'delete_user?user_id='.$members['id']?>"><butuon type="submit" class="member-edit">Delete User</butuon></a>
                                         <a href="<?=base_url().'set_password?id='.$members['id'];?>" > <butuon type="submit" class="member-edit">Set Password</butuon></a></td>
                                    <?php } else{ ?><td></td><?php } ?>
                                    
                                    <td><a href="<?=base_url().'admin_child?id='.$members['id'];?>" > <butuon type="submit" class="member-edit">View Refer Person</butuon></a></td>
                                   
                                   
                                   <!--  <td><a href="<?php echo base_url();?>admin/admin/autopull/<?php echo $members['id']?>" class="sucess" style="display:<?php //if($this->session->userdata('login_type')=='admin'){ echo "block"; }else{echo "none"; }?>">Auto Pull</a></td> -->
                                   
                                </tr>
                                <?php }?>
                                
                            </tbody>
        <tfoot>
            <tr>
                <th>S.No</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Date of Join</th>
                <th>Activaet Date</th>
                <th>User Status</th>
                <th>Action</th>
                <th>View Refer</th>
               
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
