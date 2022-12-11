<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>
<div class="container">

     <?php 
        // $doctors = $this->Doctor_model->show_doctor();
        // $tests = $this->Test_model->show_tests();
        // $last_test = $this->Bill_model->last_bill();
        // $labs=$this->Lab_model->show_lab();
        // if($last_test == NULL) {
        //     $reg = 000001;            
        //     $reg = sprintf('%06d', $reg);
        // } else {
        //     $reg = $last_test['registration'] + 1;
        //     $reg = sprintf('%06d', $reg);
        // }
        // $this->load->view('all_modals'); 
     ?>

    <!--<div class="row">-->
    <!--    <div class="col-xl-12">-->
    <!--        <div class="breadcrumb-holder">-->
    <!--            <h1 class="main-title float-left">Generate Bill</h1>-->
    <!--            <ol class="breadcrumb float-right">-->
    <!--                <li class="breadcrumb-item"><b><?php echo date("d M, Y"); ?></b></li>-->
    <!--            </ol>-->
    <!--            <div class="clearfix"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- end row -->


    
<div class="container">
    <a href="<?php echo base_url();?>user">
  <div class="row justify-content-md-center">
    <div class="col-6 px-4">
               Total Users
    </div>
    <div class="col-6 px-4">
                7000
    </div>
</div>
</a>
    <div class="row">
    <div class="col-6 px-4">
      <span> Total Given Pages</span>
      <span> 500</span>
    </div>
    <div class="col-6 px-4">
      <span> Total Given Envelopes</span>
      <span> 500</span>
    </div>
  </div>
  <div class="row">
    <div class="col-6 px-4">
      <span> Total Used Pages</span>
      <span> 300</span>
    </div>
    <div class="col-6 px-4">
      <span> Total Used Envelopes</span>
      <span> 200</span>
    </div>
  </div>
 </div>
<!-- END container-fluid -->
<?php } ?>