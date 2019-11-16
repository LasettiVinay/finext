
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          
            <!--// top-bar -->

         
            <section class="tables-section">
        
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">All Members</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date of Join</th>
                                    <th scope="col">Heading</th>
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count=1;
                            //print_r($member_lists);
                            foreach($member_lists as $members){
                               
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $count++ ?></th>
                                    <td><?php echo $members['user_name']; ?></td>
                                    <td><?php echo $members['name']; ?></td>
                                    <td><?php echo $members['email']; ?></td>
                                    <td><?php echo $members['mobile']; ?></td>
                                    <td><?php echo $members['date_of_join']; ?></td>
                                   
                                     <td><?php if($members['payment']==""){echo "Inactive";} else{ echo "Active"; }?></td>
                                   <td></td>
                                    <td><a href="#" class="btn btn-success">Detail</a></td>
                                    
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

