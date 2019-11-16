
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          
            <!--// top-bar -->

         
            <section class="tables-section">
        
             
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Get Help By</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User ID</th>
                                   <th scope="col">Name</th>
<!--                                     <th scope="col">Email</th> -->
                                   <th scope="col">Phone</th> 
                                    <th scope="col">Date of Join</th>
                                      <th scope="col">Amount</th>
                                 <th scope="col">Fund Receive</th>
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                          <?php $count=1;
                          foreach($benifit as $user_deatil){ ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $user_deatil->user_name;?></td>
                                    <td><?php echo $user_deatil->name;?></td>
                                    <td><?php echo $user_deatil->mobile;?></td>
                                    <td><?php echo $user_deatil->date_of_join;?></td>
                                    <td><?php echo $user_deatil->amount;?></td>
                                     <td><a id="conferm_payment" href="<?php echo base_url()?>/member/member/conferm_payment/<?php echo $user_deatil->id?>">Conform Button</a></td>
                                    
                                </tr>
                           <?php } ?>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

