<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Users</h1>
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
                          
            <div class="card-body">
                <div class="table-responsive">
                <table id="show_doctors" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>User Email</th>
                            <th>Total Pages</th>
                            <th>Total Envelopes</th>
                           

                        </tr>
                    </thead>	
                    <?php $users=$this->User_model->show_user(); ?>									
                    <tbody>
                        <?php if($users != NULL) { foreach($users as $usr) { ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url(); ?>userDetails/<?php echo $usr['user_id']; ?>" class="btn btn-sm btn-primary">
                                        <?php echo $usr['user_name']; ?>
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td><?php echo $usr['user_email']; ?></td>
                                <?php $p = $usr['user_id']; 
                               $userPage=$this->User_model->show_page($p);
                               $userEnvelope=$this->User_model->show_envelope($p);
                                ?>
                                 <?php $totalP = 0;
                          if($userPage != NULL){ foreach($userPage as $user) { ?> 
                         <?php $totalP +=$user['pages']; ?>
                          <?php }}?> 

                                <td><?php echo $totalP; ?></td>

                                <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  

                                <td><?php echo $totalE; ?></td>
                               
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
