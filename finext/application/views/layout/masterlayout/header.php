    <!--Theme Color Start-->
   <!--  <div class="Switcher">
         <i class="fa fa-cog fa-spin "></i>
        <h5 style="margin-bottom: 5px">Change Color</h5>
        <ul id="colors" data-dir="assets/css/themes/">
            <li class="theme-3"><span>y</span></li>
            <li class="theme-4"><span>y</span></li>
            <li class="theme-6"><span>p</span></li>
            <li class="theme-9"><span>p</span></li>
            <li class="theme-13"><span>p</span></li>
            <li class="theme-14"><span>p</span></li>
        </ul>
    </div> -->
    <!--Preloader start-->
    <div class="preloader">
        <div class="spinner">
          <div class="cube1"></div>
          <div class="cube2"></div>
        </div>
    </div>
    <!--Preloader end-->
    <div class="site"><!--for boxed Layout start-->

    <!--Scroll to top start-->
    <div class="scroll-to-top">
        <a href="#"><i class="fa fa-caret-up"></i></a>
    </div><!--Scroll to top end-->
        <!--Support Bar Start-->
    <div class="support-bar">
        <div class="container">
            <div class="row">
            <div class="col-md-12 support-wrapper">
                <div class="row">
                <div class="col-md-6">
                    <div class="support-info">
                        <a href="#"><p><i class="fa fa-comment"></i> Get Support</p></a>
                        <p><i class="fa fa-calendar"></i> Days Online:1720 </p>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="support-info right">
                        <p><i class="fa fa-phone"></i> (880)123456789</p>
                      <p>  <a href="#"><p><i class="fa fa-envelope"></i>info@finext.co.in</p></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div><!--Support Bar End-->
<!--mobile logo -->
    <div class="mobile-logo">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here"></a>
    </div>
    <!--main menu start-->
    <nav class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/finext.png" alt="Logo Image Will Be Here"></a>
                    </div>
                </div>
                <div class="col-md-8 text-right">
                    <nav>
                        <ul id="menu-bar">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>home/aboutUs">About Us</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>
                        <?php if($this->session->userdata('login_user_id')!=''){?>
                        <li><a href="<?php echo base_url(); ?>home/login_page"><?=$this->session->userdata('name')?></a></li>
                        <?php }else{?>
                        <li><a href="<?php echo base_url(); ?>home/login_page">Login</a></li>
                        <li><a href="<?php echo base_url(); ?>home/registration">Register</a></li>
                    <?php }?>
                        <!-- <li><a href="#">Account <i class="fa fa-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul> 
                        </li>-->
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </nav><!--main menu end-->
       <!--header section start-->
	