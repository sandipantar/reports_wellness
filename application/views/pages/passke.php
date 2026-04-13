<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<body class="adminbody" style="background: url(<?php echo base_url(); ?>assets/images/passkey.png) no-repeat;">
<div class="container mt-5">
                <form class="form-horizontal form-label-left pt-5" method="post" action="pages/passke">
                    
                        <input type="text" name="userId" hidden value="<?php echo $user_id =$this->session->userdata('user_id'); ?>">
                   <div class="row mt-md-5 pt-md-5">
                      <div class="col-md-7">
                            
                        </div>
                       <div class="col-md-5 py-3 bg-light" style="border-radius:10px; box-shadow:0 2px 10px #000; margin-bottom:10px;">
                           <h2 class="text-center mb-4">Passkey Authentication</h2>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon12"><i class="fa fa-key" aria-hidden="true"></i></span>
                                  </div>
                                  <input type="password" name="passkey" placeholder="Enter Your Passkey" class="form-control" autofocus required="required" aria-label="Password" aria-describedby="basic-addon12">
                            </div>
                            <button class="btn btn-md btn-block btn-primary font-weight-bold">Submit</button>
                        </div>
                        
                    </div>
                </form>  
    </div>

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
<?php } ?>