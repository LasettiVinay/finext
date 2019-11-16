
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          
            <!--// top-bar -->

         
            <section class="tables-section">
        
             
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3 col-md-12 col-xs-12">
                    <h4 class="tittle-w3-agileits mb-4">Direct Referral Person </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">User ID</th>
                                   <th scope="col">Name</th>
                                    <th scope="col">City</th> 
                                    <th scope="col">Date of Join</th>
                                      <th scope="col">Active Date</th>
                                 
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                           <?php $count=1;
                           echo "<pre>";
                          
                           foreach($direct_refer as $Child){ ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $Child['refer_id']?></td>
                                    <td><?php echo $Child['name'];?></td>
                                    <td><?php echo $Child['city'];?></td>
                                    <td><?php echo $Child['created_at'];?></td>
                                    <td><?php echo $Child['activedate']; ?></td>
                                </tr>
                           <?php } ?>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

