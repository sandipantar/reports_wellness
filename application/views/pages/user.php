<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">All Users</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo date("d M, Y"); ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

				
    <div class="row">				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
        <div class="card mb-3">                
            <div class="card-head m-2">
                <button class="btn btn-sm btn-success" onclick="add_user();">Add User</button>
            </div>     
            
             
            
            <div class="wrapper">
 
</div>
            
            <div class="card-body">
                <div class="table-responsive">
                <table id="show_doctors" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            
                            <th class="fixed-header">User ID</th>
                            <th>Type</th>
                            <!--<th>Total Pages</th>-->
                            <th>Stock Pages</th>
                            <!--<th>Total Envelopes</th>-->
                            <th>Stock Envelopes</th>
                            <th class="text-center">Action</th>

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
                                <td><?php 
                                echo $totalP - $usedP;
                                $result = $totalP - $usedP;
                                    echo ($result > 10) ? "" : " (Low Stock)";
                                ?></td>

                                <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                          
                          <?php $usedE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?> 
                                <!--<td><?php echo $totalE;?></td>-->
                                <td><?php
                                echo $totalE - $usedE; 
                                $resulte = $totalE - $usedE;
                                    echo ($resulte > 10) ? "" : " (Low Stock)";
                                ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success" onclick="assign_page(<?php echo $usr['user_id']; ?>);"><i class="fa fa-file-text"></i></button>
                                    <button class="btn btn-sm btn-warning mx-3" onclick="assign_envs(<?php echo $usr['user_id']; ?>);"><i class="fa fa-envelope"></i></button>
                                    <button class="btn btn-sm btn-primary mx-3" onclick="edit_user(<?php echo $usr['user_id']; ?>);"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="del_user(<?php echo $usr['user_id']; ?>);"><i class="fa fa-trash"></i></button>
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

<?php } ?>
