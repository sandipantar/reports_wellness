<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    $manager =$this->session->userdata('user_email');
    // $user_id =$this->session->userdata('user_id') ;
    $user_id = $this->uri->segment(2);
    
    $img = base_url()."assets/images/lab/".$userDet['user_name'];
    $userStatus = $userDet['u_status'];
    
        $uDate=date('Y-m-d');
        $fDate=date('Y-m-d');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['udate'])){
                $uDate= $_POST['udate'];
                $fDate= $_POST['fdate'];
            }
            
?>

<div class="container-fluid">

    <div class="row mt-5 py-2 d-flex justify-content-center">
            <form method="POST" action="">
                            &emsp; <b>FROM</b> &emsp;
                            <input type="date" name="fdate" value="<?php echo $fDate; ?>"/>
                            &emsp; <b>TO</b> &emsp;
                            <input type="date" name="udate" value="<?php echo $uDate; ?>"/>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </form>
        </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder pb-3">
                <h1 class="main-title bg-secondary py-2 rounded shadow text-center text-white"><b><?echo $manager;?> Old Bills of </b>
                    <span class="badge badge-dark shadow">FROM : <span class="badge badge-pill badge-success"><?php $date=date_create($fDate); echo date_format($date,"d-M-Y"); ?></span> TO : <span class="badge badge-pill badge-success"><?php $date=date_create($uDate); echo date_format($date,"d-M-Y"); ?></span></span>
                </h1>
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
                 <table id="myTable" class="table table-bordered table-striped mb-0">
                    <thead style="position: sticky;top: 0; background:#fff; border:1px solid #f3f3f3">
                        <tr>
                            <!--<th class="text-center"><h5><span class="badge badge-warning text-white">File Name</span></h5></th>-->
                            <!--<th class="text-center"><h5><span class="badge badge-warning text-white">View</span></h5></th>-->
                            <!--<th class="text-center"><h5><span class="badge badge-warning text-white">Uploaded Date</span></h5></th>-->
                            <!--<th class="text-center"><h5><span class="badge badge-warning text-white">Download</span></h5></th>-->
                            <!--<th class="text-center"><h5><span class="badge badge-warning text-white">Action</span></h5></th>-->
                            <th class="bg-warning text-center">File Name</th>
                            <th class="bg-warning text-center">View</th>
                            <th class="bg-warning text-center">Uploaded Date</th>
                            <th class="bg-warning text-center">Download</th>
                            <th class="bg-warning text-center">Action</th>
                        </tr>
                    </thead>
            
                <tbody>
                        <?php $userEnvelope=$this->User_model->show_old_envelope($user_id,$fDate,$uDate);
                        if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
              <?php if($user['file_name'] != NULL){ ?>
                            <tr>
                                <td>
                                <h6 class="">
                                    <?php 
                                        $fullFilename = $user['file_name'];
                                        // Split by underscores
                                        $parts = explode('_', $fullFilename);
                                        
                                        // Keep only first 3 parts
                                        $displayName = implode('_', array_slice($parts, 0, 3));
                                        
                                        echo $displayName;
                                        ?> 
                                    <? if($user['UrgentReports']==1){ ?>
                                    <span class="badge badge-danger ml-1">Urgent</span>
                                    <?}else{}?>
                                 <!--<?php echo $user['file_name']; ?> <i class="fa fa-download"></i>-->
                                </h6>
                                <td><a class="btn btn-warning" target="_blank" href="<?=base_url()?>wellness_file_old/<?php echo $user['file_name']; ?>">
                                    <i class="fa fa-eye"></i>
                                </a></td>
                                </td>
                                <td>
                                <?php echo $user['time']; ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary" target="_blank" href="<?=base_url()?>wellness_file_old/<?php echo $user['file_name']; ?>" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                                <td class=" text-center">
                                    <a href="https://web.whatsapp.com" target="_blank">
                                        <img wid src="/assets/images/waIcon.png" width="25px" alt="wa Icon"/>
                                    </a><span>|</span>
                                    <a href="mailto:https://www.gmail.com" target="_blank">
                                         <img wid src="/assets/images/gmail-512.webp" width="25px" alt="gmail Icon"/>
                                    </a>
                                    
                               </td>
                            </tr>
                        <?php }}}?>
                    </tbody>
                </table>
                </div>
               
            </div> 
    </div>
    </div>
</div>
</div>

<?php } ?>
