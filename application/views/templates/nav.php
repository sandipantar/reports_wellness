

  
<body class="adminbody">
<div id="main">

    <!-- top bar navigation -->
    <div class="headerbar">
        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="<?php echo base_url(); ?>dashboard" class="logo">
                <img alt="Logo" src="<?php echo base_url(); ?>assets/images/logo.jpg" /> <span>Wellness</span>
            </a>
        </div>

        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>assets/images/avatars/admin.png" alt="Profile image"
                            class="avatar-rounded">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>Hello, <?php echo $this->session->userdata('user_name'); ?></small> </h5>
                        </div>

                        <!-- item-->
                        <a href="<?php echo base_url();?>logout" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i> <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
            </ul>
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

                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'doctors') echo 'class="active"'; ?> href="<?php echo base_url(); ?>doctors"><i class="fa fa-fw fa-user-md"></i><span> Doctors </span> </a>-->
                    <!--</li>-->

                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'tests') echo 'class="active"'; ?> href="<?php echo base_url(); ?>tests"><i class="fa fa-fw fa-stethoscope"></i><span> Tests </span> </a>-->
                    <!--</li>-->
                    <!--<?php if($this->session->userdata('type') == 'Admin') { ?>                    -->
                    <!--<li class="submenu">-->
                    <!--    <a <?php if($this->uri->segment(1) == 'labs') echo 'class="active"'; ?> href="<?php echo base_url(); ?>labs"><i class="fa fa-fw fa-medkit"></i><span> Referral Center Name </span> </a>-->
                    <!--</li>-->

                    <li class="submenu">
                        <a <?php if($this->uri->segment(1) == 'old_bill') echo 'class="active"'; ?> href="<?php echo base_url(); ?>old_bill"><i class="fa fa-fw fa-file-pdf-o"></i><span> Old bills </span> </a>
                    </li>

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
                        <a <?php if($this->uri->segment(1) == 'user') echo 'class="active"'; ?> href="<?php echo base_url(); ?>user"><i class="fa fa-fw fa-user-o"></i><span> User </span> </a>
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