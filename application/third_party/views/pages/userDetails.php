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
         $manager =$this->session->userdata('user_email') ;
        $userDet=$this->User_model->show_user($user_id);
        $userPage=$this->User_model->show_page($user_id);
        $userEnvelope=$this->User_model->show_envelope($user_id); 
    $img = base_url()."assets/images/lab/".$userDet['user_name'];
    
        
    ?>	
    
        <div class="w-100">
            <div class="breadcrumb-holder">
                <img alt="Logo" src="<?php echo $img;?>"  class="img-fluid" width="150px;">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo $userDet['user_email']; ?></b></li>
                </ol>
                <div class="clearfix"></div>
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
                        <?php if($this->session->userdata('type') == 'Manager') { ?>
                        <input type="hidden" name="manager" value="<?php echo $manager ; ?>">  
                        <?php } ?> 
                        <?php if($this->session->userdata('type') == 'Admin') { ?>
                        <input type="hidden" name="manager" value="<?php echo $manager ; ?>">  
                        <?php } ?>        
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
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-10">
                          <h4 class="card-title">User Assets</h4>
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
                        <h5 class="modal-title" id="exampleModalLabel">Login History </h5>
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
                     
                    </div>
                  </div>
                </div>
                <!--modal-->
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

                        <div class="col-sm">
                          <h6>Pages in Stock</h6> 
                          <i class="fa fa-history float-right" data-toggle="modal" data-target="#exampleModal1" aria-hidden="true"></i>
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

                        <div class="col-sm">
                          <h6>Envelopes in Stock</h6> 
                          <i class="fa fa-history float-right" data-toggle="modal" data-target="#exampleModal11" aria-hidden="true"></i>
                        <h5><span class="badge badge-success"><?php echo $totalE - $usedE ?></span></h5>
                        </div>
                      </div>
                </li>
                
              </ul>
              <!--modal-->
                              <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Page Assign History </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true"></span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <?php $user_id = $this->uri->segment(2);
                                      // $u= $userLogin['user_id'];
                                      $userLogin=$this->User_model->show_page($user_id);
                                      ?>
                                      <div class="row">
                                      <?php if($userLogin != NULL){ foreach($userLogin as $user) { ?> 
                                            <div class="col-md-6 border"><?php echo $user['time']; ?></div>
                                            <div class="col-md-3 border">Given Pages: <?php echo $user['pages']; ?></div>
                                            <div class="col-md-3 border">Used Pages: <?php echo $user['page_used']; ?></div>
                                          <?php }}?>
                                       </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                 <!--modal-->
                              <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel11" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Envelope Assign History </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true"></span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <?php $user_id = $this->uri->segment(2);
                                      // $u= $userLogin['user_id'];
                                      $userLogin=$this->User_model->show_envelope($user_id);
                                      ?>
                                      <div class="row">
                                      <?php if($userLogin != NULL){ foreach($userLogin as $user) { ?>
                                            <div class="col-md-6 border"><?php echo $user['time']; ?></div>
                                            <div class="col-md-3 border">Given Pages: <?php echo $user['envelopes']; ?></div>
                                            <div class="col-md-3 border">Used Pages: <?php echo $user['envelope_used']; ?></div>
                                          <?php }}?>  
                                      </div>  
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
              <div class="card-body">
              <?php if($this->session->userdata('type') == 'Manager') { ?>
                <a href="<?php echo base_url();?>userM" class="card-link">All User</a>
                <?php }else{?>
                <a href="<?php echo base_url();?>user" class="card-link">All User</a>
                <?php }?>
                <a href="<?php echo base_url();?>dashboard" class="card-link">Dashboard</a>
              </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Assigned Files</h4>
               
              </div>
              <!-- <ul class="list-group list-group-flush"> -->

              <table id="dtOrderExample" class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>By</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
            
                <tbody>
                        <?php  if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
              <?php if($user['file_name'] != NULL){ ?>
                            <tr>
                                <td>
                                <h6 class="cause-title float-start">
                    <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>" >
                    <?php echo $user['file_name']; ?> <i class="fa fa-download"></i>
                    </a></h6>
                                </td>

                                <td>
                                <?php echo $user['manager']; ?>
                                </td>
                               
                                 

                                <td>
                                <?php echo $user['time']; ?>
                                </td>

                              

                                <td>
                                <button  onclick="del_envelope(<?php echo $user['envelope_id']; ?>,<?php echo $user['user_id']; ?>);"><i class="fa fa-trash"></i></button>
                               </td>
                            </tr>
                        <?php }} }?>
                    </tbody>
                </table>
              
               
              

                
              <!-- </ul> -->
            </div>
  </div>
    </div>
                                            

<?php } ?>