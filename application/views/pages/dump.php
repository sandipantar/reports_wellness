<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    $manager =$this->session->userdata('user_email');
    // echo '<pre>';
    //  echo count($_FILES['file_name']['name']);
    // echo '</pre>';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left font-weight-bold">Report Sync</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo date("d M, Y"); ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

	<div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
              <form  method="post" action="user/add_file"  enctype="multipart/form-data">
                <b>
                        <label class="form-label" id="uploadFile"></label>
                        <input type="file" name="file_name[]" accept=".pdf" required multiple style="width:235px !important; border:4px solid #000; padding:4px; border-radius:10px; cursor:pointer !important"/>
                        <!--<input type="hidden" name="user_id[]" value="0"/>-->
                        <?php //if($this->session->userdata('type') == 'Admin') { ?>
                        <input type="hidden" name="manager" value="<?php echo $manager ; ?>"/>  
                        <?php //}
                        ?>        
                            <button name="submit" type="submit" class="btn btn-success btn-sm rounded p-2 font-weight-bold" style="margin-left:556px !important; border:3px solid #000">Sync <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </b>
              </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">				
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
                <div class="card mb-3"> 
                <div class="card-header text-center font-weight-bold">Files not Matched With any User 
                    <span class="float-right p-2 rounded text-white" style="cursor:pointer; border:5px solid #cfcaca; background:#63cfcf; font-size:15px;"  data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-history" aria-hidden="true"> </i> <b>Sync History</b></span>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="show_doctors" class="table  table-bordered display">
                    <thead>
                        <tr>
                            <th>Uploaded File</th>
                            <th>Matched User</th>

                        </tr>
                    </thead>	
                    <?php $id=0; $NonSyncFile=$this->User_model->show_file();  ?>					
                    <tbody>
                        <?php if($NonSyncFile != NULL) { foreach($NonSyncFile as $nsf) { ?>
                        <tr>  
                           <td><? echo $nsf['file_name'] ?> <button class="bg-danger rounded text-white" onclick="del_dump(<?php echo $nsf['envelope_id']; ?>);"><i class="fa fa-trash"></i></button></td>
                           <td>
                                    <div class="d-inline float-left pr-1">
                                        <?php $users=$this->User_model->show_user();
                                            if($users != NULL) { foreach($users as $usr) {
                                            $fileName = $nsf['file_name'];
                                            $userEmail   = $usr['user_email'];
                                            if (strpos($fileName, $userEmail) !== false) {
                                            echo $usr['user_email'];?>
                                    </div>
                                    <div class="d-inline">
                                    <form  method="post" action="user/file_assign"  enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<? echo $usr['user_id']?>"/>
                                        <input type="hidden" name="user_email" value="<? echo $usr['user_email']?>"/>
                                        <input type="hidden" name="file_name" value="<? echo $nsf['file_name']; ?>"/>
                                        <button type="submit" class="btn btn-success btn-sm "><i class="fa fa-user-plus"></i></button>
                                    </form>
                                </div>
                                    <?}}}?>
                           </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                
                <!--modal-->
                              <div class="modal bd-example-modal-xl fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">File Assign History </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="row">
                                            <table id="" class="table table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Assigned File</th>
                                                    <th>Matched User</th>
                        
                                                </tr>
                                            </thead>	
                                            <tbody>
                                                <?php
                                                $ShowPage=$this->User_model->assigned_Files();
                                                if($ShowPage != NULL){ foreach($ShowPage as $ph) {?>
                                                <tr>
                                                    <td style="width:380px !important"><?php echo $ph['time']; ?></td>
                                                    <td><?php echo $ph['file_name']; ?></td>
                                                    <td style="width:330px !important">
                                                         <?php $users=$this->User_model->show_user();
                                                        if($users != NULL) { foreach($users as $usr) {
                                                        $fileName = $ph['file_name'];
                                                        $userEmail   = $usr['user_email'];
                                                        if (strpos($fileName, $userEmail) !== false) {
                                                        echo $usr['user_email']; }}}?>
                                                    </td>
                                                </tr>
                                                <?php }}?>
                                            </tbody>  
                                       </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                </div>
               
            </div> 
    </div>
    </div>
</div>
</div>

<?php } ?>

