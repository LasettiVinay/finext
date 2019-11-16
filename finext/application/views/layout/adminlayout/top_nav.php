  <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!-- Search-from -->
                    <!-- <form action="#" method="post" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    <!--// Search-from -->
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-envelope"></i>
                                <!-- <span class="badge">4</span> -->
                            </a>
                            <div class="dropdown-menu top-grid-scroll drop-1 drop">
                                <h3 class="sub-title-w3-agileits">User Messages</h3>
                                <hr/>
                                <?php 
                                $mail_details=$this->Compose_model->get_emial_by_tomail($this->session->userdata('login_user_id'));
                                foreach ($mail_details as $row) {
                                ?>
                                <!-- <a href="#" class="dropdown-item mt-3"> -->
                                    <div class="notif-content-wthree">
                                        <a href="<?php echo base_url(); ?>admin_inbox_mail?id=<?=$row['id'];?>">
                                        <p class="paragraph-agileits-w3layouts py-2">
                                            <span class="text-diff" style="font-size: 16px;color: blue;"><?=$row['subject']?></span><br/><?=$row['text']?></p>
                                        <h6><?=date('M d,Y h:i A',strtotime($row['date']));?></h6>
                                    </a>
                                    </div>
                                <!-- </a> -->
                                <hr/>
                            <?php }?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>admin_inbox">View all Messages</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-spinner"></i>
                            </a>
                            <div class="dropdown-menu top-grid-scroll drop-2">
                                <h3 class="sub-title-w3-agileits">Shortcuts</h3>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-chart-pie mr-3"></i>Sed feugiat</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fab fa-connectdevelop mr-3"></i>Aliquam sed</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-tasks mr-3"></i>Lorem ipsum</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fab fa-superpowers mr-3"></i>Cras rutrum</h4>
                                </a>
                            </div>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3 drop">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="<?=$this->crud_model->get_image_url($this->session->userdata('login_user_id'));?>" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?=$data->refer_id;?></h3>
                                        <?=$data->name;?>
                                    </div>
                                </div>
                                <a href="<?=base_url().'profile?user_id='.$this->crud_model->generate_encryption_key($this->session->userdata('login_user_id'));?>" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>My Profile</h4>
                                </a>
                                <a href="<?php echo base_url()?>change_password" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-link mr-3"></i>Change Password</h4>
                                </a>
                                <?php if($this->session->userdata('login_type')=='member'){?>
                                <a href="<?php echo base_url()?>admin_bank_detail" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-link mr-3"></i>Bank Detail</h4>
                                </a>
                                <a href="<?php echo base_url();?>admin_kyc_upload" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-link mr-3"></i>Update KYC</h4>
                                </a>
                            <?php }?>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-envelope mr-3"></i>Messages</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-question-circle mr-3"></i>Faq</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?=base_url('logout');?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>