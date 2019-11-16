



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
      <h4 class="tittle-w3-agileits mb-4">Level Summary</h4>
            <table id="example3" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.NO</th>
               <th scope="col">Level</th>
                                    <th scope="col"> Member Count</th> 
                                    <th scope="">Number of Active Member</th>
                                    <th scope="">Number of Inactive Member</th>
                                     <th scope="">Free Space</th>
                


            </tr>
        </thead>
       <tbody>
                        
                  <?php $level_summery=$this->db->where('introducer_id',$this->session->userdata('login_user_id'))->get('users')->result_array();
                  $num=3; $count=1;$summery=1;
                  if($this->session->userdata('login_type')=='admin'){
                    $a_id[]=10;
                  }elseif($this->session->userdata('login_type')=='member'){
                  $a_id[]=$this->session->userdata('login_user_id');
                  }
                  $c=1;
                  for($i=0; $i<10; $i++){
                    $a=0;$in=0;$c=1;$a=1;

                            $summery=$summery*$num;
                for($i1=0;$i1<count($a_id);$i1++){
                $inactive_count=0;  $active_count=0;
                  $level_details=$this->db->where('introducer_id',$a_id[$i1])->get('users');
                  $level_data=$level_details->result_array();
                  foreach ($level_data as $row) {
                    if($row['row_status']==1){
                       $active_count=$active_count+1;  
                      }else if($row['row_status']!=1){
                        
                       $inactive_count=$inactive_count+1;

                      }  
                      $a_id[$i1]=$row['id'];
                  }
                }
                ?>
                <tr>
                    <th><?php echo $i+1; ?></th>
                  <td>Level <?php echo $i+1; ?></td>
                  <td><?php echo $summery; ?></td>
                  <td><?=$active_count;?></td>
                  <td><?=$inactive_count; ?></td>
                  <td><?=abs(abs($summery)-abs($active_count-$inactive_count));?></td>
                </tr>
                        <?php }?>
                                
                            </tbody>
        <tfoot>
            <tr>
                <th>S.NO</th>
            <th scope="col">Level</th>
                                    <th scope="col"> Member Count</th> 
                                    <th scope="">Number of Active Member</th>
                                    <th scope="">Number of Inactive Member</th>
                                     <th scope="">Free Space</th> 
               
            </tr>
        </tfoot>
    </table>


<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
    $('#example3').DataTable({
        "scrollX": true,
    });
} );
</script>

 
    




    



    


    



 



 