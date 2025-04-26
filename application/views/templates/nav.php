 <?php $user_id =$this->session->userdata('user_id') ;
  $userDet=$this->User_model->show_user($user_id);
 ?>
  
<body class="widescreen adminbody-void">
<div id="main" class="forced enlarged">
<script src="index.js"></script>
    <!-- top bar navigation -->
    <div class="headerbar">
        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="<?php echo base_url(); ?>dashboard" class="logo ml-3">
                <img alt="Logo" src="<?php echo base_url(); ?>assets/images/wellness_logo.png" class="bg-white rounded shadow"/> 
            </a>
        </div>

        <nav class="navbar-custom">
                <div class="row ml-3 ">
                <div class="col-xl-8 ">
                    <h4 class="mt-2 p-1 text-white ml-5 m-none"><i><?php echo date(' l\, F jS\, Y - h:i:s a'); ?></i></h4>
                </div>
                    
                <div class="col-xl-4 float-left">
                    <ul class="list-inline float-right mb-0 d-flex justify-content-center">
                        <li class="list-inline-item dropdown notif text-white m-none">
                        <b style="font-size:30px"><?php echo $userDet['user_email']; ?></b>
                        </li>
                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-sign-out rounded-circle p-1 shadow" style="border:5px solid #acb0df" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><small>Hi, <?php echo $this->session->userdata('user_email'); ?></small> </h5>
                                </div>
        
                                <!-- item-->
                                <a href="<?php echo base_url();?>logout" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
    </div>
    <!-- end row -->
            
        </nav>
    </div>
    <!-- End Navigation -->

    <div class="left main-sidebar">
        <div class="sidebar-inner leftscroll">
            <div id="sidebar-menu">

                <ul>
                    <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'dashboard') echo 'class="active"'; ?> href="<?php echo base_url(); ?>dashboard"><i class="fa fa-fw fa-dashboard"></i><span> Dashboard </span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('type') == 'Admin') { ?> 
                    <!--<li class="submenu">-->
                    <!--   <a <?php if($this->uri->segment(1) == 'doctors') echo 'class="active"'; ?> href="<?php echo base_url(); ?>doctors"><i class="fa fa-fw fa-user-md"></i><span> Doctors </span> </a>-->
                    <!--</li>-->

                                       
                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'labs') echo 'class="active"'; ?> href="<?php echo base_url(); ?>labs"><i class="fa fa-fw fa-medkit"></i><span> Referral Center Name </span> </a>-->
                    <!--</li>-->

                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'old_bill') echo 'class="active"'; ?> href="<?php echo base_url(); ?>old_bill"><i class="fa fa-fw fa-file-pdf-o"></i><span> Old bills </span> </a>-->
                    <!--</li>-->

                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'old_patient') echo 'class="active"'; ?> href="<?php echo base_url(); ?>old_patient"><i class="fa fa-fw fa-user-o"></i><span> Old patients </span> </a>-->
                    <!--</li>-->

                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'collector') echo 'class="active"'; ?> href="<?php echo base_url(); ?>collector"><i class="fa fa-fw fa-user-o"></i><span> Collector </span> </a>-->
                    <!--</li>-->

                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'agent') echo 'class="active"'; ?> href="<?php echo base_url(); ?>agent"><i class="fa fa-fw fa-user-o"></i><span> Agent </span> </a>-->
                    <!--</li>-->
                    
                    <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'user') echo 'class="active"'; ?> href="<?php echo base_url(); ?>user"><i class="fa fa-fw fa-user-o"></i><span> Users </span> </a>
                    </li>
                    <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'tests') echo 'class="active"'; ?> href="<?php echo base_url(); ?>charCount"><i class="fa fa-fw fa-file-word-o"></i><span> Character Count </span> </a>
                    </li>
                     <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'dump') echo 'class="active"'; ?> href="<?php echo base_url(); ?>dump"><i class="fa fa-fw fa-dropbox"></i><span> Reports Dump Area </span> </a>
                    </li>
                    
                    <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'masterSearch') echo 'class="active"'; ?> href="<?php echo base_url(); ?>masterSearch"><i class="fa fa-fw fa-search-plus"></i><span> Master File Search </span> </a>
                    </li>
                    <?php } ?>
                    <?php $user_id =$this->session->userdata('user_id'); if($this->session->userdata('type') == 'User') { ?> 
                        <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'passke') echo 'class="active"'; ?> href="<?php echo base_url(); ?>passke"><i class="fa fa-fw fa-money"></i><span>Payouts </span> </a>
                    </li>
                    <?php } ?>
                    <?php if($this->session->userdata('type') == 'Manager') { ?>

                        <li class="submenu">
                            <a <?php if($this->uri->segment(1) == 'userM') echo 'class="active"'; ?> href="<?php echo base_url(); ?>userM"><i class="fa fa-fw fa-user-o"></i><span>All Users</span> </a>
                        </li>
                         <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'dump') echo 'class="active"'; ?> href="<?php echo base_url(); ?>dump"><i class="fa fa-fw fa-dropbox"></i><span> Reports Dump Area </span> </a>
                    </li>
                    <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'masterSearch') echo 'class="active"'; ?> href="<?php echo base_url(); ?>masterSearch"><i class="fa fa-fw fa-search-plus"></i><span> Master File Search </span> </a>
                    </li>
                        <?php } ?>
                    
                </ul>

                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>


    <div class="content-page">
        <!-- Start content -->
        <div class="content">