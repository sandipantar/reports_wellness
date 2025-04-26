<body class="adminbody" style="background: url(<?php echo base_url(); ?>assets/images/wellness_bg.jpg) no-repeat; background-size:cover">
<div id="main">
<div class="container" style="padding-top:120px">
    <div class="container-fluid" style="back">
        
        <div class="row h-100 float-right d-flex flex-row-reverse" style="">
            <div class="col-xs-0 col-sm-12 col-md-12 col-lg-12 d-flex flex-row-reverse">
                <img src="<?php echo base_url(); ?>assets/images/wellness_logo.png" class="img-fluid" width="500px" >
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 p-4" style="box-shadow: 1px 1px 10px #000; border-radius:18px">
            <div class="d-flex justify-content-center h1 mb-3"><i class="fa fa-user rounded-circle border px-3 py-2 text-white shadow" aria-hidden="true"></i></div>
                <form class="form-horizontal" method="post" action="login">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                      </div>
                      <input type="text" name="email" placeholder="User ID" class="form-control col-md-12 shadow" autofocus required="required" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon12"><i class="fa fa-lock" aria-hidden="true"></i></span>
                      </div>
                      <input type="password" name="password" placeholder="Password" id="password" class="form-control col-md-12 shadow" required="required" aria-label="Password" aria-describedby="basic-addon12">
                    </div>
                        <span class="password-toggle-icon"><i class="fa fa-eye"></i></span>
                        <button class="btn btn-sm btn-block btn-primary shadow font-weight-bold">Login</button>
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