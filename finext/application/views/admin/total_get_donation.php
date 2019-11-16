
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          
            <!--// top-bar -->

         
            <section class="tables-section">
        
             
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Get Donation Help </h4>
                    <div class="table-responsive">
                        <table class="table" border>
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">User ID</th>
                                 
                                    <th scope="col">Date of Join</th>
                                      <th scope="col">Amount</th>
                                 
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                          <?php $count=1;
//                           echo "<pre>";
//                           print_r($benifit);
                          foreach($benifit as $user_deatil){ ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $user_deatil->refer_id;?></td>
                                    
                                    <td><?php echo $user_deatil->created_at;?></td>
                                    <td><?php echo $user_deatil->amount;?></td>
                                    
                                </tr>
                           <?php } ?>
                              <tr>
                              <td colspan="3"><h3 style="float: right">Total</h3></td>

                              <td><?php if(empty($total_amount->amount)){ } else {echo $total_amount->amount;}?></td>
                              </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

