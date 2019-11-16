  <style type="text/css">
    
  </style>

  <?php
  $data=$this->User_details_model->get_user_by_id($this->session->userdata('login_user_id'));
   ?>

 

   <nav id="sidebar">
    <div class="sidebar-header">
        <h1>
            <img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here" class="admin_img">
                <!-- <span class="user_name"><?=$data->refer_id;?><br><?=$data->name;?></span> -->
        </h1>
        <span><img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here" class="admin_img" style="width: 62px;"></span>
    </div>
    
    <!--<div class="profile-bg"></div>-->
    <div class="sidebar-header1">
        <h1>
            <a href="<?=base_url().'profile?user_id='.$this->crud_model->generate_encryption_key($this->session->userdata('login_user_id'));?>" >
                <img src="<?=$this->crud_model->get_image_url($this->session->userdata('login_user_id'));?>" alt="Logo Image Will Be Here" class="admin_img1 img-responsive img-circle" style="border-radius: 50%">
            <span class="user_name1 " id="<?=$data->refer_id;?>"><?=$data->refer_id;?><br><?=$data->name;?></span> </a>
        </h1>
       <!--  <span class="img_user">
            <img src="<?php echo base_url(); ?>assets/images/images.png" alt="Logo Image Will Be Here" class="admin_img1 " style="width: 62px;">
            <span class="user_name"><?=$data->refer_id;?><br><?=$data->name;?></span>
        </span> -->
    </div>

  
<!-- 
    <span class="user_name"> User ID: <?php echo $data->refer_id;?><br>Name: <?php echo $data->name; ?></span> -->

    <ul class="list-unstyled components">
        <li>
            <a href="<?php echo base_url();?>dashboard">
                <i class="fas fa-th-large"></i>
                 <span class="don">Dashboard</span>
            </a>
        </li>
<?php if($this->session->userdata('login_type')=='admin'){?><li>
                    <a href="<?php echo base_url(); ?>official_user" target="blank">
                         <img class="emply" src="<?php echo base_url(); ?>/assets/images/employee.png">
                       <span class="don"> Official User</span>
                    </a>
                </li>
<li>
            <a href="<?php echo base_url(); ?>home/registration" target="blank">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
           <span class="don"> New Registartion</span>
            </a>
        </li>
            <?php }elseif($this->session->userdata('login_type')=='member'){?>
        <li>
            <a href="<?php echo base_url(); ?>home/registration/<?=$this->crud_model->generate_encryption_key($this->session->userdata('refer_id'));?>" target="blank">
            <i class="fas fa-user"></i>
             <span class="don">My Pramotional</span>
            </a>
        </li>
<?php } ?>
         

    
    <li>
        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false">
           <i class="fa fa-sitemap"></i>
            <span class="don"> Genealogy</span>
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
                <a href="<?php echo base_url()?>admin_tree_view">Tree View</a>
            </li>
            <?php if($this->session->userdata('login_type')=='admin'){?>
                <li>
                    <a href="<?php echo base_url(); ?>block_user" >
                         
                      <span class="don"> Block User</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>not-completed" >
                         
                      <span class="don"> not-completed</span>
                    </a>
                </li>
            <?php }?>
                <?php if($this->session->userdata('login_type')=='admin'){?><li>
                    <a href="<?php echo base_url(); ?>inactive_user" >
                         Inactive Users
                    </a>
                </li><?php }?>
            <?php if($this->session->userdata('login_type')=='member'){?>
            <li>
                <a href="<?php echo base_url()?>admin_referals">Direct Referale</a>
            </li>
        <?php }?>
            <li>
                <a href="<?php echo base_url();?>down_lines">Down Line Statements</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>admin_level_summary">Level Summary</a>
            </li>
            
        </ul>
    </li>
    <li>
        <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false">
          <img class="donate" src="<?php echo base_url();?>assets/images/donat.svg">
            <span class="don">Donation Summery</span>
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu3">
            <?php if($this->session->userdata('login_type')=='member'){?>
            <li>
                <a href="<?php echo base_url(); ?>give_helps">Give Helps Details</a>
            </li>
            <?php }?>
            <li>
                <a href="<?php echo base_url();?>admin_get_helps">Get Help Details</a>
            </li>
            <?php if($this->session->userdata('login_type')=='member'){?>
            <li>
                <a href="<?php echo base_url(); ?>admin_total_get_donation">Total Get Donation Summary</a>
            </li>
            <?php }?>
        </ul>
    </li>
    
    <li>
        <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-users"></i>
             <span class="aut">Autopool Donation Summary</span>
            

        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu4">
             <?php if($this->session->userdata('login_type')=='admin'){?>
           
            <li>
                <a href="<?php echo base_url(); ?>autopool_tree">AutoPool Tree</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>autopull_users">AutoPool Users</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>autopull_pay_users">AutoPool Pay Users</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>autopull_unpay_users">AutoPool Unpay Users</a>
            </li>
        <?php } ?>
             <li>
                <a href="<?php echo base_url(); ?>autopull_get_help">Get Help Details</a>
            </li>
            <?php if($this->session->userdata('login_type')=='member'){?>
            <li>
                <a href="<?php echo base_url(); ?>autopull_give_help">Give Help Details</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>autopull_total_get_donation">Total Get Donation summary</a>
            </li>
        <?php } ?>
            
            
            
        </ul>
    </li>
    <li>
        <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-headphones" aria-hidden="true"></i>
            <span class="don"> Support</span>
            
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu5">
            
           
           <li>
                <a href="<?php echo base_url();?>admin_compose">Compose</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>admin_inbox">Inbox</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>admin_sentbox">Sent Box</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>term_and_condition">Terms and Conditions</a>
            </li>
        </ul>
    </li>
    <?php if($this->session->userdata('login_type')=='admin'){?>
                <li>
                    <a href="<?php echo base_url(); ?>db_backup">
                        <i class="fa fa-database" aria-hidden="true"></i>
                       <span class="don"> DB Backup</span>
                    </a>
                </li>
            <?php }?>
    <li><a href="<?php echo base_url();?>admin/admin/logout"> <i class="fa fa-sign-out sign" aria-hidden="true"></i>
     <span class="don">Logout</span></a></li>
</ul> 
</nav>


    
