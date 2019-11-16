  <style type="text/css">
      img.admin_img {
    width: 147px;
}
#dashboard i {
    font-size: 25px;
    color: #34495e;
}
i.fas.fa-chart-line {
    font-size: 26px;
}
i.fa.fa-sitemap {
    font-size: 25px;
}
img.admin_img1 {
    width: 147px;
}
span.user_name {
    /* margin-right: 18px; */
    margin-left: 12px;
}
.img-circle {
    border-radius: 50%;
}
  </style>
  <?php $session = $this->session->userdata('user_data'); 
  $data=$this->User_details_model->get_user_by_id($this->session->userdata('user_data')['user_id']);
?>
   <nav id="sidebar">
    <div class="sidebar-header">
        <h1>
            <a href="<?=base_url('member_dashboard')?>"><img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here" class="admin_img"></a>
        </h1>
        <span><img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here" class="admin_img" style="width: 62px;"></span>
    </div>
    <!-- <div class="profile-bg"> </div> -->
        
 <div class="sidebar-header">
        <h1>
            <a href="<?=base_url('profile')?>"><img src="<?php echo base_url(); ?>upload/<?php echo $data->profile_image; ?>" alt="Logo Image Will Be Here" class="admin_img1 img-circle"></a>
        </h1>
        <span class="img_user"><img src="<?php echo base_url(); ?>assets/images/images.png" alt="Logo Image Will Be Here" class="admin_img1 " style="width: 62px;"></span>

    </div>
    <span class="user_name"> User ID: <?php echo $data->refer_id;?><br>Name: <?php echo $data->name; ?></span>
    <ul class="list-unstyled components">
        <li>
            <a href="<?php echo base_url();?>member_dashboard">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
         <li>
                    <a href="<?php echo base_url(); ?>home/registration" target="blank">
                         <i class="fas fa-user"></i>
                        New Register
                    </a>
                </li>
    <li>
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-cog"></i>
            Setting
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
                <a href="<?php echo base_url()?>profile">View Profile</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>change_password">Change Password</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>bank_detail">Bank Detail</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>kyc_upload">Update KYC</a>
            </li>
        </ul>
    </li>
    
    <li>
        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false">
           <i class="fa fa-sitemap"></i>
            Genealogy
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu2">
            <li>
                <a href="<?php echo base_url()?>tree_view">Tree View</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>direct_referals">Direct Referale</a>
            </li>
            <li>
                <a href="forms.html">Down Line Statements</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>level_summary">Level Summary</a>
            </li>
            
        </ul>
    </li>
    <li>
        <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false">
          <i class="fas fa-hands"></i>
            Donation Summary
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu3">
          <li>
                <a href="<?php echo base_url();?>give_help">Give Help Details</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>get_help">Get Help Details</a>
            </li>
            <li>
                <a href="total_get_donation">Total Get Donation Summary</a>
            </li>
        </ul>
    </li>
    
    <li>
        <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false">
            
            Autopool Donation Details
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu4">
            <li>
                <a href="<?php echo base_url()?>member/member/autopull_give_help">Give Help Details</a>
            </li>
             <li>
                <a href="<?php echo base_url()?>member/member/autopull_get_help">Get Help Details</a>
            </li>
            <li>
                <a href="<?php echo base_url()?>member/member/autopull_give_help">Total Get Donation summary</a>
            </li>
            
            
        </ul>
    </li>
    <li>
        <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false">
            
            Support
            <i class="fas fa-angle-down fa-pull-right"></i>
        </a>
        <ul class="collapse list-unstyled" id="homeSubmenu5">
            
           <li>
                <a href="<?php echo base_url();?>compose">Compose</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>inbox">Inbox</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>sentbox">Sent Box</a>
            </li>
            <li>
                <a href="tables.html">Terms and Conditions</a>
            </li>
        </ul> 
    </li>
    <li><a href="<?php echo base_url();?>promotion">My Pramotional Tool</a></li>
    <li><a href="<?php echo base_url();?>member/member/logout">Logout</a></li>
</ul> 
</nav>
  
