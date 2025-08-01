<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    $manager =$this->session->userdata('user_email');
    
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
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
                <h1 class="main-title bg-secondary py-2 rounded shadow text-center text-white"><b>All Files with Users</b>
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
                    <?php $id=0; $NonSyncFile=$this->User_model->show_uploads_to_user($fDate,$uDate);  ?>					
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
