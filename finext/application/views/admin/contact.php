
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

    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
          
            <!--// top-bar -->

         
            <section class="tables-section">
        
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Autopull Members</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                                                <th scope="col">Name</th>
                                 <th scope="col">Email</th>
                                   <th scope="col">Mobile No.</th> 
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                          <?php  
                          $count=1;
                          //print_r($contact_user);die;
                          foreach($contact_user as $user_deatil){
                                              
                           ?>
                           
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $user_deatil['name'];?></td>
                                    <td><?php echo $user_deatil['email'];?></td>
                                    <td><?php echo $user_deatil['mobile'];?></td>
                                    <td><?php echo$user_deatil['subject'];?></td>
                                    <td><?php echo $user_deatil['message'];?></td>
                                   <!--  <td><?php //echo $user_deatil->amount;?></td> -->
                                     
                                </tr>
                           <?php }?>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

