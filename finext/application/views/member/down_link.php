
<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <div class="wrapper">
        <!-- Sidebar Holder -->
       
<div class="container">
<div class=" admin_reg">
  <div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12 pmj-sublocation">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <form class="cmxform" id="registerform3" method="post" action="<?=base_url('sub_location')?>">
                     <div class="col-md-4">
                        <div class="form-group ">
                            <label for="email">Location:</label>
                            <select class="form-control admin_source1" name="location" required autofocus >
                                  <option value="">Select Location</option> 
                                 <?php foreach ($location_all as $details){?>
                                   <option value="<?=$details['id']; ?>"   <?php if (!empty($_POST['all_location_id'])){echo "selected";
                               } ?>> <?php echo $details['location']?> 
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label for="text">Sub Location:</label>
                            <input type="text" class="form-control" name="sub_location" placeholder="Sub Location" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <button type="submit" name="submit" class="fst_submit">submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 pmj-datatable4">
                    <div class="card">
                        <div class="header">
                            
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <!-- <i class="material-icons">more_vert</i> -->
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Location</th>
                                            <th>Sub Location</th>
                                            <!-- <th>Edit</th>
                                            <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>ID</th>
                                            <th>Location</th>
                                            <th>Sub Location</th>
                                            <!-- <th>Edit</th>
                                            <th>Delete</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php $i=1;foreach ($sub_location_all as $location_list){ ?>
                                        <tr>
                 <td><?=$i;?></td>
                 <!-- <td><?php //echo $location_list['location']; ?></td> -->
                 <td><?=$this->Location_model->get_location_name($location_list['location']);?></td>
                 <td><?php echo $location_list['sub_location']; ?></td>                
                 <!-- <td><a href="<?php echo base_url();?>sub_location_edit_page/<?php echo $location_list['id'] ?>">EDIT</a></td>
                 <td><a href="<?php echo base_url();?>sub_location_delete/<?php echo $location_list['id'] ?>">DELETE</a></td> -->
                                        </tr>
                                        
                                       <?php $i++;}?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">user ID</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Activaet Date</th>
                                    <th scope="col">Status</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count=1;
                            //print_r($member_lists);
                            foreach($member_lists as $members){
                               // print_r($this->Tree_View_Model->get_total_amount($members['introducer_id']))
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $count++ ?></th>
                                     <td><?php echo $members['name']; ?></td>
                                    <td><?php echo $members['user_name']; ?></td>
                                    <td><?php echo $members['date_of_join']; ?></td>
                                   <td><?php echo $members['activedate']; ?></td>
                                    <td><?php if($members['active_status']==0){echo "Inactive"; }else if($members['active_status']==1){echo "Active"; }else{echo "Block";} ?></td>
                                   	
                                    <td><a href="<?php echo base_url();?>member/member/child_profile?id=<?php echo $members['id']?>" class="btn btn-success">Edit Profile </a></td>
                                    <td><a href="<?php echo base_url();?>member/member/child/<?php echo $members['introducer_id']?>" class="btn btn-success">View Refer Person </a></td>
                                   
                                </tr>
                                <?php }?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--// table7 -->

            </section>

<script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
   <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>




   <script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
   <script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery-datatable.js"></script>