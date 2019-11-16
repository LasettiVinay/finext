


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
      <h4 class="tittle-w3-agileits mb-4">Block Users</h4>
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th scope="col">S.No</th>
                             
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                 <th scope="col">Phone</th> 
                  <th scope="col">Date of Join</th>
                   <th scope="col">Action</th>
                


            </tr>
        </thead>
       <tbody>
                          <?php  
                          $count=1;
                          //print_r($benifit);die;
                          foreach($blocak_user as $user_deatil){ //print_r($user_deatil) ?>
                            <?php //$introducer_user=$this->db->get_where('users', array('id'=>$user_deatil->introducer_id))->row(); ?>
                                <tr>
                                    <td scope="row"><?php echo $count++;?></td>
                                    <td><?php echo $user_deatil['refer_id'];?></td>
                                    <td><?php echo $user_deatil['name'];?></td>
                                    <td><?php echo $user_deatil['mobile'];?></td>
                                    <td><?php echo $user_deatil['created_at'];?></td>
                                  
                                   <td><a href="<?php echo base_url();?>activate_User?id=<?php echo $user_deatil['id'] ?>">Activate Member</a></td>
                                        </td>
                                </tr>
                           <?php } ?>
                              
                                
                            </tbody>
        <tfoot>
            <tr>
                <th scope="col">S.No</th>
                             
                  <th scope="col">User ID</th>
                  <th scope="col">User Name</th>
                 <th scope="col">Phone</th> 
                  <th scope="col">Date of Join</th>
                   <th scope="col">Action</th>
               
            </tr>
        </tfoot>
    </table>


<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#example2').DataTable({
        "scrollX": true,
    });
} );
</script>

 
    




    



    
