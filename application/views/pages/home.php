<body class="adminbody" style="background: url(<?php echo base_url(); ?>assets/images/wellness_bg.jpg) no-repeat; background-size:cover">
<div id="main">
<div class="container" style="padding-top:120px">
    <div class="container-fluid" style="back">
        
        <div class="row h-100 float-right d-flex flex-row-reverse" style="">
            <div class="col-xs-0 col-sm-12 col-md-12 col-lg-12 d-flex flex-row-reverse">
                <img src="<?php echo base_url(); ?>assets/images/wellness_logo.png" class="img-fluid" width="500px" >
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" ><br/>
                <form class="form-horizontal form-label-left" method="post" action="login">
                    <!--<h2 class="text-center">Wellness Login</h2>-->
                    <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="col-md-4 col-sm-4 col-xs-6 text-right">User ID:</label>
                        <input type="text" name="email" class="form-control col-md-8 col-sm-8 col-xs-6" required="required">
                    </div>

                    <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="col-md-4 col-sm-4 col-xs-6 text-right">Password:</label>
                        <input type="password" name="password" id="password" class="form-control col-md-8 col-sm-8 col-xs-6" required="required">
                        <span class="password-toggle-icon"><i class="fa fa-eye"></i></span>
                    </div>

                    <div class="row form-group col-md-6 col-sm-6 col-xs-6" style="margin-left:150px">
                        <button class="btn btn-sm btn-block btn-success">Login</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    <!-- END container-fluid -->
</div>
</div>
<!-- END main -->

<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jQuery.print.js"></script>
<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/pikeadmin.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wellness.js"></script>

</body>

</html>