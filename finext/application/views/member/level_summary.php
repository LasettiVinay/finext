
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          
            <!--// top-bar -->
 
         
            <section class="tables-section">
        
             
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Level Summery</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Level</th>
                                    <th scope="col"> Member Count</th> 
                                    <th scope="">Number of Active Member</th>
                                    <th scope="">Number of Inactive Member</th>
                                     <th scope="">Free Space</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                  <?php $level_summery=$this->db->where('introducer_id',$this->session->userdata('user_data')['refer_id'])->get('registration_detail')->result_array();
                  print_r($level_summery);exit;
                  $num=3; $count=1;$summery=1;
                  $s=0;
                  for($i=0; $i<9; $i++){
                    $a=0;$in=0;
                            $summery=$summery*$num;
                            for ($j=$s; $j<$summery ; $j++) {
                               if($level_summery[$j]){
                                if($level_summery[$j]['active_status']==1){
                                  $a++;
                                }elseif($level_summery[$j]['active_status']==0){
                                  $in++;
                                }
                                $s++;
                              }
                            }
                            ?>
                           <tr>
                          <td>Level <?php echo $i+1; ?></td>
                          <td><?php echo $summery; ?></td>
                          <td><?php echo $a; ?></td>
                          <td><?php echo $in; ?></td>
                          <td></td>
                           </tr>
                           
                        <?php }?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

