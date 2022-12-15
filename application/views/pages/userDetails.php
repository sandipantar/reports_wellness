<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<style>
    @media print {
        * {-webkit-print-color-adjust:exact;}
        .table td {
        background-color: transparent !important;
        }
        .bill-header { width: 100%;}
        .bill-header .row1 { width: 5%; }
        .bill-header .row2 { width: 60%; }
        .bill-header .row3 { width: 25%; }
        .line-border-top { border-top-style: solid; border-top-width: thin;}
       
    }
</style>
<div class="container-fluid">


    <?php 
        $user_id = $this->uri->segment(2);
        $userDet=$this->User_model->show_user($user_id);
        $userPage=$this->User_model->show_page($user_id);
        $userEnvelope=$this->User_model->show_envelope($user_id);
        // $bills=$this->Bill_model->old_bills($bill_id); 
        // $p_details = $this->Patient_model->show_patients($bills['patient_id']);
        // $t_detail =  $this->Test_model->show_bill_tests($bills['bill_id']);
        
    ?>	
    
        <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left"><?php echo $userDet['user_name'];?></h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo $userDet['user_email']; ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
            <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
              <form  method="post" action="user/add_envelope"  enctype="multipart/form-data">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item mx-auto"><b>
                        Upload Your file 
                        <input type="file" name="file_name"/>
                        <input type="hidden" name="user_id" value="<?php echo $user_id ; ?>">
                                    
                        <button type="submit" class="btn btn-success btn-sm ">Add</button>
                        to update your Pages and envelopes 
                    </b></li>
                </ol>
              </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-10">
                          <h4 class="card-title">User Assets</h4>
                          <p class="card-text">Assets Details of <?php echo $userDet['user_name'];?> </p>
                      </div>
                      <div class="col-2">
                      <!-- Button trigger modal -->
                          <button type="button" class=" float-end btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               History
                          </button>
                      </div>
                  </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login History of <?php echo $userDet['user_name'];?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"></span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <?php $user_id = $this->uri->segment(2);
                      // $u= $userLogin['user_id'];
                      $userLogin=$this->Page_model->show_lastlogin($user_id);
                      ?>
                      <?php if($userLogin != NULL){ foreach($userLogin as $user) { ?> 
                        <li> <?php echo $user['last_login']; ?></li>
                       
                          <?php }}?>  
                      </div>
                      <!-- <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      <!-- </div>  --> 
                    </div>
                  </div>
                </div>
              </div>
              
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    
                      <div class="row">
                        <div class="col-sm">
                          <h6>Total Pages</h6>
                            <?php $totalP = 0;
                          if($userPage != NULL){ foreach($userPage as $user) { ?> 
                         <?php $totalP +=$user['pages']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalP; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6>Used Pages</h6>
                            <?php $usedP = 0;
                          if($userPage != NULL){ foreach($userPage as $user) { ?> 
                         <?php $usedP +=$user['page_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedP; ?></span> </h5>
                        </div>

<!-- 
                        <div class="col-sm">
                          <h6>Used Pages</h6> 
                        <h5><span class="badge badge-warning">200</span></h5>
                        </div> -->

                        <div class="col-sm">
                          <h6>Pages in Stock</h6> 
                        <h5><span class="badge badge-success"><?php echo $totalP - $usedP ?></span></h5>
                        </div>
                      </div>
                   
                </li>
                
                <li class="list-group-item">
                   
                    <div class="row">
                        <div class="col-sm">
                          <h6>Total Envelopes</h6> 
                          <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalE; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6>Used Envelopes</h6> 
                          <?php $usedE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedE; ?></span> </h5>
                        </div>


                        <!-- <div class="col-sm">
                          <h6>Used Envelopes</h6> 
                        <h5><span class="badge badge-warning">100</span></h5>
                        </div> -->
                        <div class="col-sm">
                          <h6>Envelopes in Stock</h6> 
                        <h5><span class="badge badge-success"><?php echo $totalE - $usedE ?></span></h5>
                        </div>
                      </div>
                </li>
                
              </ul>
              <div class="card-body">
                <a href="<?php echo base_url();?>user" class="card-link">All User</a>
                <a href="<?php echo base_url();?>dashboard" class="card-link">Dashboard</a>
              </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Assigned Files</h4>
                <p class="card-text">All files of <?php echo $userDet['user_name'];?> </p>
              </div>
              <ul class="list-group list-group-flush">
            <?php  if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
              <?php if($user['file_name'] != NULL){ ?>
                <li class="list-group-item">
                <h6 class="cause-title float-start">
                    <a  href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>" >
                    <?php echo $user['file_name']; ?> <i class="fa fa-download"></i>
                    </a>
                    <button  onclick="del_envelope(<?php echo $user['envelope_id']; ?>,<?php echo $user['user_id']; ?>);"><i class="fa fa-trash"></i></button>

                </h6>
                <p class=""><?php echo $user['time']; ?></p>
                </li>
                <?php }}}?>
                
              </ul>
            </div>
  </div>
    </div>
                                            

<?php } ?>