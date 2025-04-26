<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
     $manager =$this->session->userdata('user_email');
     if($this->session->userdata('type') == 'Admin' ) {
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h4 class="text-center rounded p-2 bg-user text-white shadow text-shadow" style="border-radius:10px !important"><b>All Users</b></h4>
                <ol class="breadcrumb float-right">
                    <!--<li class="breadcrumb-item"><b><?php echo date('h:i:s a l\, F jS\, Y '); ?></b></li>-->
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

				
    <div class="row">				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
        <div class="card mb-3">      
        <div class="row  mt-4 ml-3">
            <div class="col-xl-4">
                <button class="btn btn-sm btn-success" style="box-shadow:2px 0 5px #666" onclick="add_user();">
                    <span class="rounded p-1"><i class="fa fa-user-plus" style="font-size:25px" aria-hidden="true"></i></span>
                    </button> &nbsp;&nbsp;&nbsp;<span class="font-weight-bold h5 ">Click here to add user</span>
            </div>  
            <div class="col-xl-4">
                <div class="">
                    <a  class="btn btn-sm btn-warning" style="box-shadow:2px 0 5px #666" href="<?php echo base_url();?>aulh" target="_blank">
                        <i class="fa fa-info-circle rounded p-1" style="font-size:25px" aria-hidden="true"></i>
                         &nbsp;&nbsp;&nbsp;<span class="font-weight-bold h5">User Login History</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4">
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
                    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
                <table id="show_users" class="table  table-bordered display">
                    <thead>
                        <tr>
                            
                            <th class="fixed-header">User ID</th>
                            <th>Type</th>
                            <!--<th>Total Pages</th>-->
                            <th>Stock Pages</th>
                            <!--<th>Total Envelopes</th>-->
                            <th>Stock Envelopes</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Status</th>

                        </tr>
                    </thead>	
                    <?php $users=$this->User_model->show_user(); ?>					
                    <tbody>
                        <?php if($users != NULL) { foreach($users as $usr) { ?>
                            <tr onclick="var s = this.parentNode.querySelector('tr.red'); s && s.classList.remove('red'); this.classList.add('red');">
                            <!--onclick="$(this).css('background', '#20c997')">-->
                                
                                <td>
                                    <a href="<?php echo base_url(); ?>userDetails/<?php echo $usr['user_id'];?>" class="btn btn-sm btn-primary">
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
                                <td>
                                <?php if($usr['user_type'] == "HCUser"){ ?>                               
                                        <span class="badge badge-danger">User (Limited Access) - N/A</span>
                                    <?php } else { ?>
                                    <?php 
                                    echo $totalP - $usedP;
                                    $result = $totalP - $usedP;
                                        echo ($result > 30) ? "" : " (Low Stock)";
                                    }?>
                                
                                </td>

                                <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                          
                          <?php $usedE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?> 
                                <!--<td><?php echo $totalE;?></td>-->
                                <td>
                                <?php if($usr['user_type'] == "HCUser"){ ?>                               
                                        <span class="badge badge-danger">User (Limited Access) - N/A</span>
                                    <?php } else { ?>
                                <?php
                                echo $totalE - $usedE; 
                                $resulte = $totalE - $usedE;
                                    echo ($resulte > 15) ? "" : " (Low Stock)";
                                }?></td>
                                <td class="text-center">
                                    <?php if($usr['user_type'] == "HCUser"){ ?>                               
                                        
                                    <?php } else { ?>
                                    <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Assign Pages to <? echo $usr['user_email']; ?>" onclick="assign_page(<?php echo $usr['user_id'];?>);"><i class="fa fa-file-text"></i></button>
                                    <button class="btn btn-sm btn-warning mx-2" data-toggle="tooltip" data-placement="bottom" title="Assign Envelopes to <? echo $usr['user_email']; ?>" onclick="assign_envs(<?php echo $usr['user_id']; ?>);"><i class="fa fa-envelope"></i></button>
                                    <?}?>
                                    <button class="btn btn-sm btn-primary mr-2" data-toggle="tooltip" data-placement="bottom" title="Edit <? echo $usr['user_email']; ?>" onclick="edit_user(<?php echo $usr['user_id']; ?>);"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete <? echo $usr['user_email']; ?>" onclick="del_user(<?php echo $usr['user_id']; ?>);"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <span class="mx-2">
                                        <?php if($usr['u_status']==0) {?>
                                        <label class="switch" data-toggle="tooltip" data-placement="bottom" title="Access Denied">
                                          <input type="checkbox" onclick="userPermissionOn(<?php echo $usr['user_id']; ?>);">
                                          <span class="slider round"></span>
                                        </label>
                                        <? } ?>
                                        <?php if($usr['u_status']==1) {?>
                                        <label class="switch" data-toggle="tooltip" data-placement="bottom" title="Login Access">
                                          <input type="checkbox" checked onclick="userPermissionOff(<?php echo $usr['user_id']; ?>);">
                                          <span class="slider round"></span>
                                        </label>
                                        <? } ?>
                                    </span>
                                </td>
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

<?php }} ?>
