<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    $manager =$this->session->userdata('user_email');
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder pb-3">
                <h1 class="main-title bg-secondary py-2 rounded shadow text-center text-white"><b>All Files with Users</b></h1>
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
                 <!--<div class="col-lg-12">-->
                 <!--     <input type="text" id="tabsearch" placeholder="Search Box" class="shadow w-25 rounded p-1 my-2">-->
                 <!-- </div>-->
                <table id="show_doctors" class="table  table-bordered display">
                    <thead>
                        <tr>
                            <th>Files</th>
                            <th>Date</th>
                            <th>By</th>
                            <th>Matched User</th>

                        </tr>
                    </thead>	
                    <?php $id=0; $NonSyncFile=$this->User_model->show_uploads_to_user();  ?>					
                    <tbody>
                        <?php if($NonSyncFile != NULL) { foreach($NonSyncFile as $nsf) { ?>
                        <tr> 
                           <td>
                               <h6 class=" float-start">
                                    <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $nsf['file_name']; ?>" >
                                    <?php echo $nsf['file_name']; ?> <i class="fa fa-download"></i>
                                    </a></h6>
                           </td>
                           <td><? echo $nsf['time']; ?></td>
                           <td><? echo $nsf['manager']; ?></td>
                           <td> 
                                
                                        <?php
                                            $users=$this->User_model->show_user();
                                            if($users != NULL) { foreach($users as $usr) {
                                            $fileName = $nsf['file_name'];
                                            $userEmail   = $usr['user_email'];
                                            if (strpos($fileName, $userEmail) !== false) {?>
                                            <a href="<?php echo base_url(); ?>userDetails/<?php echo $usr['user_id'];?>#<?php echo $nsf['file_name']; ?>" class="btn btn-sm btn-primary">
                                                <? echo $usr['user_email']; }}}?>
                                                <i class="fa fa-eye"></i>
                                            </a>
                           </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                </div>
               
            </div> 
    </div>
    </div>
</div>
</div>

<?php }} ?>
