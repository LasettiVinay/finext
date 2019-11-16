
           


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
                                    <th scope="col">S.No</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date of Join</th>
                                    <th> User Status</th>
                                     <th>Action</th>
                                      <th>View Refer</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count=1;
                            //print_r($member_lists);
                            foreach($child_lists as $childs){
                               // print_r($this->Tree_View_Model->get_total_amount($members['introducer_id']))
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $count++ ?></th>
                                    <td><?php echo $childs['refer_id']; ?></td>
                                    <td><?php echo $childs['name']; ?></td>
                                    <td><?php echo $childs['email']; ?></td>
                                    <td><?php echo $childs['mobile']; ?></td>
                                    <td><?php echo $childs['created_at'];?></td>
                                   
                                    <td><?php if($childs['row_status']==2){echo "Inactive"; }else if($childs['row_status']==1){echo "Active"; }else if($childs['row_status']=3){echo "Register";} else{echo "Deletd"; } ?></td>
                                    <td><a href="<?=base_url().'profile?user_id='.$this->crud_model->generate_encryption_key($childs['id']);?>"><butuon type="submit" class="member-edit">Edit Profile </butuon></a></td>
                                    <td><a href="<?=base_url('').'admin_child?id='.$childs['id'];?>" > <butuon type="submit" class="member-edit">View Refer Person</butuon></a></td>
                                    </tr>
                                <?php }?>
                                
                            </tbody>

                        </table>
                         <a href="<?php echo base_url();?>down_lines">Back to All Members</a>
                    </div>
                </div>
                <!--// table7 -->

            </section>






        

