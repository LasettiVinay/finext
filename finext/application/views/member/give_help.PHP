
    <div class="wrapper">
        <!-- Sidebar Holder -->
       

        <!-- Page Content Holder -->
        <div id="content">

            <section class="tables-section">
        
             
             
                <!-- table7 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Give Help By</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                           <th scope="col">#</th>
                           <th scope="col">User ID</th>
                           <th scope="col">Bank Name</th> 
                           <th scope="col">Account Holder Name</th> 
                           <th scope="col">Account No</th>
                           <th scope="col">IFSC</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php $count=1;
                          foreach($benifit_data as $giveDonamtion){
                              $bankdeatil= $this->Benifit_Model->bankdetail($giveDonamtion['benifitial_id']);?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $giveDonamtion['user_name'];?></td>
                                    <?php foreach($bankdeatil as $bdeatil){?>
                                    <td><?php echo $bdeatil['bank_name'];?></td>
                                    <td><?php echo $bdeatil['account_holder'];?></td>
                                    <td><?php echo $bdeatil['account_no'];?></td>
                                    
                                     <td><?php echo $bdeatil['ifsc'];?></td>
                                     <?php } ?>
                                    <td><?php echo $giveDonamtion['amount'];?></td>
                                    
                                </tr>
                           <?php } ?>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

