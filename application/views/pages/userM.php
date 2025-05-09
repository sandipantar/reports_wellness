<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left font-weight-bold mb-2">Users</h1>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

				
    <div class="row">				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
        <div class="card mb-3">
            <div class="row  mt-4 ml-3"> 
            <div class="col-xl-6">
                <div class="">
                    <a  class="btn btn-sm btn-warning" style="box-shadow:2px 0 5px #666" href="<?php echo base_url();?>aulh" target="_blank">
                        <i class="fa fa-info-circle rounded p-1" style="font-size:25px" aria-hidden="true"></i>
                         &nbsp;&nbsp;&nbsp;<span class="font-weight-bold h5">User Login History</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class=" float-right pr-5">
                    <a  class="btn btn-sm btn-info" style="box-shadow:2px 0 5px #666" href="<?php echo base_url();?>uagh" target="_blank">
                        <i class="fa fa-info-circle rounded p-1" style="font-size:25px" aria-hidden="true"></i>
                         &nbsp;&nbsp;&nbsp;<span class="font-weight-bold h5">User Assets Given History</span>
                    </a>
                </div>
            </div>
        </div>    
            <div class="card-body">
                <div class="table-responsive">
                <table id="show_doctors" class="table table-striped table-bordered display table-sm">
                    <thead>
                        <tr>
                            
                            <th>User ID</th>
                            <th>Type</th>
                            <th>Stock Pages</th>
                            <th>Stock Envelopes</th>
                           

                        </tr>
                    </thead>	
                    <?php $users=$this->User_model->show_user(); ?>									
                    <tbody>
                        <?php if($users != NULL) { foreach($users as $usr) { ?>
                            <tr>
                                
                                <td>
                                    <a href="<?php echo base_url(); ?>userDetails/<?php echo $usr['user_id']; ?>" class="btn btn-sm btn-primary">
                                    <?php echo $usr['user_email']; ?>
                                    <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php if($usr['user_type'] == "Admin"){ ?>
                                        <span class="badge badge-success"><?php echo $usr['user_type']; ?></span>
                                    <?php } ?>

                                    <?php if($usr['user_type'] == "Manager"){ ?>
                                        <span class="badge badge-secondary"><?php echo $usr['user_type']; ?></span>
                                    <?php } ?>

                                    <?php if($usr['user_type'] == "User"){ ?>                               
                                        <span class="badge badge-info"><?php echo $usr['user_type']; ?></span>
                                    <?php } ?>
                                    <?php if($usr['user_type'] == "HCUser"){ ?>                               
                                        <span class="badge badge-primary">User (Limited Access)</span>
                                    <?php } ?>
                                </td>
                                <?php $p = $usr['user_id']; 
                               $userPage=$this->User_model->show_page($p);
                               $userEnvelope=$this->User_model->show_envelope($p);
                                ?>
                                 <?php $totalP = 0;
                                    if($userPage != NULL){ foreach($userPage as $user) { ?> 
                                    <?php $totalP +=$user['pages']; ?>
                                    <?php }}?> 
                                    
                                    <?php $usedP = 0;
                                      if($userPage != NULL){ foreach($userPage as $user) { ?> 
                                     <?php $usedP +=$user['page_used']; ?>
                                   
                                      <?php }}?>  
                                <!--<td><?php echo $totalP;?></td>-->
                                <td><?php if($usr['user_type'] == "HCUser"){ ?>                               
                                        <span class="badge badge-danger">User (Limited Access) - N/A</span>
                                    <?php } else { ?>
                                    <?php 
                                    echo $totalP - $usedP;
                                    $result = $totalP - $usedP;
                                        echo ($result > 30) ? "" : " (Low Stock)";
                                    }?></td>

                                <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                          
                          <?php $usedE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?> 
                                <!--<td><?php echo $totalE;?></td>-->
                                <td><?php if($usr['user_type'] == "HCUser"){ ?>                               
                                        <span class="badge badge-danger">User (Limited Access) - N/A</span>
                                    <?php } else { ?>
                                <?php
                                echo $totalE - $usedE; 
                                $resulte = $totalE - $usedE;
                                    echo ($resulte > 15) ? "" : " (Low Stock)";
                                }?></td>
                               
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                </div>
                
            </div>														
        </div><!-- end card-->					
    </div>
    </div>
</div>

<?php } ?>
