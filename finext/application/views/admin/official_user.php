
   




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
      <h4 class="tittle-w3-agileits mb-4">Official User</h4>
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th scope="col">S.No</th>
                  <th scope="col">Introducer Id </th>
                 <th scope="col">User Name</th> 
                  <th scope="col">Name</th>
                   <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date of Join</th>
                     <th scope="col">profile</th>

            </tr>
        </thead>
        <tbody>
                            <?php $count=1;
                            foreach($User as $oficial_user){
                                $introducer_display_id = $oficial_user['Introducer_id'];
                                $oficial_user_display_id = $oficial_user['refer_id'];
                                $introducer=$this->db
                                            ->get_where('official_users', array('refer_id'=>$oficial_user['Introducer_id']))
                                            ->row();

                                if ($introducer->display_id)
                                {
                                    $introducer_display_id = $introducer->display_id;
                                }
                                if ($oficial_user['display_id'])
                                {
                                    $oficial_user_display_id = $oficial_user['display_id'];
                                }
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $count++ ?></th>
                                    <td><?php echo str_replace("FX18","FX19",$introducer_display_id); ?></td>
                                    <td><?php echo str_replace("FX18","FX19",$oficial_user_display_id); ?></td>
                                    <td><?php echo $oficial_user['name']; ?></td>
                                    <td><?php echo $oficial_user['email']; ?></td>
                                    <td><?php echo $oficial_user['mobile']; ?></td>
                                    <td><?php echo $oficial_user['date_of_join']; ?></td>
                                     <td><a href="<?php echo base_url();?>official_profile?id=<?php echo $oficial_user['id']?>" class="btn btn-success">Edit Profile </a></td>
                                   
                                   
                                </tr>
                                <?php }?>
                                
                            </tbody>
        <tfoot>
            <tr>
                 <th scope="col">S.No</th>
                             
                  <th scope="col">Introducer Id </th>
                                
                 <th scope="col">User Name</th> 
                  <th scope="col">Name</th>
                   <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date of Join</th>
                    <th scope="col">profile</th>

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

 
    




    



    
