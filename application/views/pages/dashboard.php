<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else {

?>

<?php if($this->session->userdata('type') == 'User') { ?>  
 <?php $user_id =$this->session->userdata('user_id') ;
  $userDet=$this->User_model->show_user($user_id);
  $userPage=$this->User_model->show_page($user_id);
  $userEnvelope=$this->User_model->show_envelope($user_id);
  $img = base_url()."assets/images/lab/".$userDet['user_name'];
  $userStatus = $userDet['u_status'];
//   echo $userStatus;
  ?>
  <?php if($userStatus == 1) { ?>

    <div class="row mb-2 p-2" style=" font-size:20px; border-radius:10px; box-shadow:2px 2px 20px #0B44B1">
        <div class="col-xl-1">
            <img alt="Logo" src="<?php echo $img;?>"  class="img-fluid rounded bg-white shadow rounded" style="border:3px solid #999" width="150px;">
        </div>
        <div class="col-xl-11">
            <?php if($this->session->userdata('type') == 'User') { ?>
            <div class="row userNote">
                <!--<div class="col-xl-1 userNote">-->
                <!--    <span data-toggle="modal" data-target=".bd-example-modal-lg"><i>NOTE :</i></span>-->
                <!--</div>-->
                <div class="col-xl-11 userNote" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer">
                    <marquee> <b class="text-info"><?php echo $userDet['note']; ?></b></marquee>
                </div>
            </div>
             <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content p-3">
                                 <div class="modal-header">
                                        <h5 class="modal-title"><b class="bg-secondary px-2 text-white shadow" style="border:5px solid #999;" id="exampleModalLabel">IMPORTANT NOTE</b> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                <p><b class="text-info" ><?php echo $userDet['note']; ?></b></p>
                            </div>
                          </div>
                        </div>
                <? } ?>
        </div>
    </div>
 <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-2 pb-3">
              <div class="card-body">
                <h4 class="card-title float-left"><span class=" p-2 shadow rounded bg-info text-white text-center font-weight-bold" style="text-shadow:2px 2px 10px #000">USER ASSETS</span></h4>
                <a href="<?php echo base_url(); ?>urReports/<?php echo $user_id;?>" class="btn btn-danger float-right font-weight-bold shadow">Urgent Reports</a>
              </div>
                    <div class="row col-xl-12">
                        <div class="col-xl-5 d-flex rounded mx-auto shadow" style="border:5px solid #666">
                        <div class="col-xl">
                          <h6>Total Pages</h6>
                            <?php $totalP = 0;
                          if($userPage != NULL){ foreach($userPage as $user) { ?> 
                         <?php $totalP +=$user['pages']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalP; ?></span> </h5>
                        </div>
                        <div class="col-xl">
                          <h6>Used Pages</h6>
                            <?php $usedP = 0;
                          if($userPage != NULL){ foreach($userPage as $user) { ?> 
                         <?php $usedP +=$user['page_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedP; ?></span> </h5>
                        </div>
                        <div class="col-xl">
                          <h6>Pages in Stock</h6> 
                        <h5><span class="badge badge-success"><?php echo $totalP - $usedP ?></span></h5>
                        </div>
                      </div>
                        <div class="col-xl-5 d-flex rounded mx-auto shadow"  style="border:5px solid #666">
                        <div class="col-xl">
                          <h6>Total Envelopes</h6> 
                          <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalE; ?></span> </h5>
                        </div>
                        <div class="col-xl">
                          <h6>Used Envelopes</h6> 
                          <?php $usedE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedE; ?></span> </h5>
                        </div>
                        <div class="col-xl">
                          <h6>Envelopes in Stock</h6> 
                        <h5><span class="badge badge-success"><?php echo $totalE - $usedE ?></span></h5>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body" style="padding-bottom: 0 !important">
                <h4 class="card-title float-left"><span class=" p-2 shadow rounded bg-secondary text-white text-center font-weight-bold" style="text-shadow:2px 2px 10px #000">ASSIGNED FILES</span></h4>
                <h4 class="float-right"><a href="<?php echo base_url(); ?>oldUserBills/<?echo $user_id;?>" target="_blank" style="text-shadow:1px 1px 1px #000">Access Old Reports <i class="fa fa-external-link" aria-hidden="true"></i></a></h4>
              </div>
        <div class="m-2 p-2">
            <div>
               <input type="text" id="tabsearch" placeholder="Search for filename / Date">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
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
                        <?php  if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
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
                                <td><a class="btn btn-warning" target="_blank" href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>">
                                    <i class="fa fa-eye"></i>
                                </a></td>
                                </td>
                                <td>
                                <?php echo $user['time']; ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary" target="_blank" href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>" download>
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
                        <?php }} }?>
                    </tbody>
                </table>
                </div>
            </div>
             </div>
            </div>
  </div>
    <? } else { ?>
                <!--<h2 class="text-danger ml-5 pl-5" style="text-shadow: 2px 2px #666;"><br/><br/><br/><br/><br/>Your code has been locked... <br/><br/>Please contact admin</h2>-->
                <div class="d-flex justify-content-center">
                    <img src="<?php echo base_url(); ?>assets/images/geo.png" class="img-fluid ldimg" alt="login denied"/><br/>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <h1 class=" text-white shadow py-2 px-3 border bg-danger rounded-pill">ACCESS DENIED!</h1>    
                </div>
                <div class="d-flex justify-content-center">
                    <h2>Your Account Has Been Locked, Please Contact Admin</h2>
                </div>
                    
            <? } ?>

 <?php }?> 
<?php if($this->session->userdata('type') == 'HCUser') { 
    $user_id =$this->session->userdata('user_id') ;
    $userDet=$this->User_model->show_user($user_id);
    $userStatus = $userDet['u_status'];
?>  

<?php if($userStatus == 1) { ?>
<div class="container-fluid">


    <?php 
        // $user_id =$this->session->userdata('user_id') ;
        // $userDet=$this->User_model->show_user($user_id);
        $billLink = $userDet['billLog'];
    ?>	
    
        <div class="w-100">
            <div class="breadcrumb-holder">
                <iframe src="<?php echo $userDet['billLog']; ?>?widget=true&amp;headers=false" style="border:0;height:600px;width:100%;"></iframe>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <? } else { ?>
                <!--<h2 class="text-danger ml-5 pl-5" style="text-shadow: 2px 2px #666;"><br/><br/><br/><br/><br/>Your code has been locked... <br/><br/>Please contact admin</h2>-->
                <div class="d-flex justify-content-center">
                    <img src="<?php echo base_url(); ?>assets/images/geo.png" class="img-fluid ldimg" alt="login denied"/><br/>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <h1 class=" text-white shadow py-2 px-3 border bg-danger rounded-pill">ACCESS DENIED!</h1>    
                </div>
                <div class="d-flex justify-content-center">
                    <h2>Your Account Has Been Locked, Please Contact Admin</h2>
                </div>
                    
            <? } ?>
<?php }?>
<?php if($this->session->userdata('type') == 'Admin') { ?>   
  <?php $userTotal=$this->User_model->show_user();
  $pageTotal=$this->User_model->show_page();
  $envelopeTotal=$this->User_model->show_envelope(); 
  ?>
<div class="container">    
<div class="col-lg-12" style="margin-top:100px;">
     <a href="<?php echo base_url();?>user">
                  <div class="card-body bg-dark shadow text-white mx-auto" style="max-width:60% !important; border-radius:10px;">
                      <div class="row mx-auto">
                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2"><h3><b class="p-2 rounded">Total Users</b></h3></div>
                        <?php $uTotal = 0;
                          if($userTotal != NULL){ foreach($userTotal as $user) { ?> 
                         <?php $uTotal +=1; ?>
                       
                          <?php }}?>  
                        <div class="col-md-6 col-lg-6 col-sm-6"><h3><span class="badge badge-warning py-2 text-white px-4 shadow mt-2 float-right"><?php echo $uTotal ?></span></h3></div>
                      </div>
                  </div>
                </a>
            <div class="card text-center shadow" style="margin-top:3.5rem;">
               
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    
                      <div class="row">
                        <div class="col-sm">
                          <h6><span class="bg-secondary px-2 py-1 text-white font-weight-bold rounded shadow">Total Pages</span></h6>
                            <?php $totalP = 0;
                          if($pageTotal != NULL){ foreach($pageTotal as $user) { ?> 
                         <?php $totalP +=$user['pages']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalP; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6><span class="bg-secondary px-2 py-1 text-white font-weight-bold rounded shadow">Used Pages</span></h6>
                            <?php $usedP = 0;
                          if($pageTotal != NULL){ foreach($pageTotal as $user) { ?> 
                         <?php $usedP +=$user['page_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedP; ?></span> </h5>
                        </div>



                        <div class="col-sm">
                          <h6><span class="bg-secondary px-2 py-1 text-white font-weight-bold rounded shadow">Pages in Stock</span></h6> 
                          <i class="fa fa-history float-right" data-toggle="modal" data-target="#exampleModal1" aria-hidden="true"></i>
                        <h5><span class="badge badge-success"><?php echo $totalP - $usedP ?></span></h5>
                        </div>
                        
                      </div>
                   
                </li>
                
                <li class="list-group-item">
                   
                    <div class="row">
                        <div class="col-sm">
                          <h6><span class="bg-secondary px-2 py-1 text-white font-weight-bold rounded shadow">Total Envelopes</span></h6> 
                          <?php $totalE = 0;
                          if($envelopeTotal != NULL){ foreach($envelopeTotal as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalE; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6><span class="bg-secondary px-2 py-1 text-white font-weight-bold rounded shadow">Used Envelopes</span></h6> 
                          <?php $usedE = 0;
                          if($envelopeTotal != NULL){ foreach($envelopeTotal as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedE; ?></span> </h5>
                        </div>


                        
                        <div class="col-sm">
                          <h6><span class="bg-secondary px-2 py-1 text-white font-weight-bold rounded shadow">Envelopes in Stock</span></h6> 
                          <i class="fa fa-history float-right" data-toggle="modal" data-target="#exampleModal11" aria-hidden="true"></i>
                        <h5><span class="badge badge-success"><?php echo $totalE - $usedE ?></span></h5>
                        </div>
                      </div>
                </li>
                
              </ul>
            
            </div>
            <!--modal page-->
                              <div class="modal bd-example-modal-xl fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog modal-xl" style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Page Assign History </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <?php $all_given_page=$this->User_model->all_given_page(); ?>
                                      <div class="row">
                                          <table class="table table-bordered display">
                                              <tr><th>User</th><th>Given Page</th><th>Time</th><th>By</th></tr>
                                      <?php if($all_given_page != NULL){ foreach($all_given_page as $agp) { ?> 
                                            <tr>
                                                <td>
                                                    <?php $users=$this->User_model->show_user($agp['user_id']);?>
                                                    <a href="<?php echo base_url(); ?>userDetails/<?php echo $users['user_id'];?>" class="btn btn-sm btn-primary">
                                                            <?php echo $users['user_email'] ?>
                                                            <i class="fa fa-eye"></i>
                                                            </a>        
                                                </td>
                                                <td><?php echo $agp['pages']; ?></td>
                                                <td><?php echo $agp['time']; ?></td>
                                                <td><?php echo $agp['delete_by']; ?></td>
                                            </tr>
                                          <?php }}?>
                                          </table>
                                       </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                 <!--modal envelope-->
                              <div class="modal fade bd-example-modal-xl" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel11" aria-hidden="true">
                                  <div class="modal-dialog modal-xl"  style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Envelope Assign History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <?php $all_given_envelope=$this->User_model->all_given_envelope(); ?>
                                      <div class="row">
                                          <table class="table table-bordered display">
                                              <tr><th>User</th><th>Given Envelope</th><th>Time</th><th>By</th></tr>
                                      <?php if($all_given_envelope != NULL){ foreach($all_given_envelope as $age) { ?> 
                                            <tr>
                                                <td>
                                                    <?php $users=$this->User_model->show_user($age['user_id']);?>
                                                    <a href="<?php echo base_url(); ?>userDetails/<?php echo $users['user_id'];?>" class="btn btn-sm btn-primary">
                                                            <?php echo $users['user_email'] ?>
                                                            <i class="fa fa-eye"></i>
                                                            </a>     
                                                </td>
                                                <td><?php echo $age['envelopes']; ?></td>
                                                <td><?php echo $age['time']; ?></td>
                                                <td><?php echo $age['manager']; ?></td>
                                            </tr>
                                          <?php }}?>
                                          </table>
                                       </div> 
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
        </div>
        <div class="row mt-4">
          <div class="col-xl-12">
            <div class="breadcrumb-holder align-middle">
              <div class="SyncUploadHistory">
                  <a href="<?php echo base_url();?>syncUploadHistory" target="_blank">
                  <span class="float-left p-2 mb-3 rounded text-white bg-success" style="cursor:pointer; border:5px solid #cfcaca; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Sync Files Upload History</b></span></a>
              </div>
              <div class="SyncUploadHistory">
                  <a href="<?php echo base_url();?>syncDeleteHistory" target="_blank">
                  <span class="float-left p-2 ml-5 mb-3 rounded text-white bg-primary" style="cursor:pointer; border:5px solid #cfcaca; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Sync Files Delete History</b></span></a>
              </div>
             <div class="SyncUploadHistory">
                 <a href="<?php echo base_url();?>urgentUploadHistory" target="_blank">
                  <span class="float-left p-2 ml-5 mb-3 rounded text-white bg-warning" style="cursor:pointer; border:5px solid #cfcaca; background:#63cfcf; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Urgent Reports Upload History</b></span></a>
              </div>
            <div class="SyncUploadHistory">
                <a href="<?php echo base_url();?>urgentDeleteHistory" target="_blank">
                  <span class="float-left p-2 ml-5 mb-3 rounded text-white bg-danger" style="cursor:pointer; border:5px solid #cfcaca; background:#63cfcf; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Urgent Reports Delete History</b></span></a>
              </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
<!-- END container-fluid -->
  <?php } ?> 

<?php if($this->session->userdata('type') == 'Manager') { ?>   
  <?php $userTotal=$this->User_model->show_user();
  $pageTotal=$this->User_model->show_page();
  $envelopeTotal=$this->User_model->show_envelope(); ?>
<div class="container">
<div class="col-lg-12">
            <div class="card  text-center">
                <a href="<?php echo base_url();?>userM">
                  <div class="card-body">
                      <div class="row justify-content-md-center">
                        <div class="col-md-6 col-lg-6 col-sm-6 mt-2"><h5><b class="border shadow border-warning p-2 rounded">Total Users</b></h5></div>
                        <?php $uTotal = 0;
                          if($userTotal != NULL){ foreach($userTotal as $user) { ?> 
                         <?php $uTotal +=1; ?>
                       
                          <?php }}?>  
                         <div class="col-md-6 col-lg-6 col-sm-6"><h4><span class="badge badge-warning py-2 px-4 shadow"><?php echo $uTotal ?></span></h4></div>
                      </div>
                  </div>
                </a>
              
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    
                      <div class="row">
                        <div class="col-sm">
                          <h6>Total Pages</h6>
                            <?php $totalP = 0;
                          if($pageTotal != NULL){ foreach($pageTotal as $user) { ?> 
                         <?php $totalP +=$user['pages']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalP; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6>Used Pages</h6>
                            <?php $usedP = 0;
                          if($pageTotal != NULL){ foreach($pageTotal as $user) { ?> 
                         <?php $usedP +=$user['page_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedP; ?></span> </h5>
                        </div>



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
                          if($envelopeTotal != NULL){ foreach($envelopeTotal as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalE; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6>Used Envelopes</h6> 
                          <?php $usedE = 0;
                          if($envelopeTotal != NULL){ foreach($envelopeTotal as $user) { ?> 
                         <?php $usedE +=$user['envelope_used']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-warning"><?php echo $usedE; ?></span> </h5>
                        </div>


                        
                        <div class="col-sm">
                          <h6>Envelopes in Stock</h6> 
                        <h5><span class="badge badge-success"><?php echo $totalE - $usedE ?></span></h5>
                        </div>
                      </div>
                </li>
                
              </ul>
            
            </div>
        </div>
                <div class="row mt-4">
        <div class="col-xl-12">
            <div class="breadcrumb-holder align-middle">
              <div class="SyncUploadHistory">
                  <a href="<?php echo base_url();?>/syncUploadHistory" target="_blank">
                  <span class="float-left p-2 mb-3 rounded text-white bg-success" style="cursor:pointer; border:5px solid #cfcaca; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Sync Files Upload History</b></span></a>
              </div>
              <div class="SyncUploadHistory">
                  <a href="<?php echo base_url();?>/syncDeleteHistory" target="_blank">
                  <span class="float-left p-2 ml-5 mb-3 rounded text-white bg-primary" style="cursor:pointer; border:5px solid #cfcaca; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Sync Files Delete History</b></span></a>
              </div>
             <div class="SyncUploadHistory">
                 <a href="<?php echo base_url();?>/urgentUploadHistory" target="_blank">
                  <span class="float-left p-2 ml-5 mb-3 rounded text-white bg-warning" style="cursor:pointer; border:5px solid #cfcaca; background:#63cfcf; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Urgent Reports Upload History</b></span></a>
              </div>
            <div class="SyncUploadHistory">
                <a href="<?php echo base_url();?>/urgentDeleteHistory" target="_blank">
                  <span class="float-left p-2 ml-5 mb-3 rounded text-white bg-danger" style="cursor:pointer; border:5px solid #cfcaca; background:#63cfcf; font-size:15px;"><i class="fa fa-history" aria-hidden="true"> </i> <b>Urgent Reports Delete History</b></span></a>
              </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<!-- END container-fluid -->
  <?php } ?> 
   <!--modal sync uplaod-->
                              <div class="modal bd-example-modal-xl fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-info">
                                        <h5 class="modal-title" id="exampleModalLabel1">Sync Files Upload History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <input type="text" id="tabsearch" placeholder="Search Box" class="shadow border-info mb-2 rounded p-1" style="width:255px !important">
                                          </div>
                                            <table  id="myTable" class="table table-bordered display w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Assigned File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th style="width:20% !important">Matched User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $ShowPage=$this->User_model->assigned_Files();
                                                    if($ShowPage != NULL){ foreach($ShowPage as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td style="width:380px !important"><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['manager']; ?></td>
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
                                            </table>
                                       </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                <!--modal sync delete-->
                             <div class="modal bd-example-modal-xl fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                  <div class="modal-dialog" style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-primary">
                                        <h5 class="modal-title" id="exampleModalLabel2">Sync Files Delete History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <input type="text" id="tabsearch" placeholder="Search Box" class="shadow border-info mb-2 rounded p-1" style="width:255px !important">
                                          </div>
                                            <table id="show_doctors" class="table table-bordered display">
                                                <thead>
                                                    <tr>
                                                        <th>Deleted File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th style="width:20% !important"> User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                   <?php
                                                    $sync_delete=$this->User_model->sync_delete();
                                                    if($sync_delete != NULL){ foreach($sync_delete as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?><?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td style="width:380px !important"><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['delete_by']; ?></td>
                                                        <td style="width:330px !important">
                                                             <?php $users=$this->User_model->show_user($ph['user_id']); echo $users['user_email'];?>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>
                                            </table>
                                       </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                <!--modal urgent upload-->
                              <div class="modal bd-example-modal-xl fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                  <div class="modal-dialog" style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="exampleModalLabel3">Urgent Reports Upload History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <input type="text" id="tabsearch" placeholder="Search Box" class="shadow border-info mb-2 rounded p-1" style="width:255px !important">
                                          </div>
                                            <table id="myTable2" class="table table-bordered display">
                                                <thead>
                                                    <tr>
                                                        <th>Assigned File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th style="width:20% !important"> User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $urgentUpload=$this->User_model->urgent_upload();
                                                    if($urgentUpload != NULL){ foreach($urgentUpload as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td style="width:380px !important"><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['manager']; ?></td>
                                                        <td style="width:330px !important">
                                                             <?php $users=$this->User_model->show_user($ph['user_id']); echo $users['user_email'];?>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>
                                            </table>
                                       </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                <!--modal urgent delete-->
                              <div class="modal bd-example-modal-xl fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                  <div class="modal-dialog" style="max-width:1840px !important" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel4">Urgent Reports Delete History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <input type="text" id="tabsearch" placeholder="Search Box" class="shadow border-info mb-2 rounded p-1" style="width:255px !important">
                                          </div>
                                            <table id="Show_doctors" class="table table-bordered display">
                                                <thead>
                                                    <tr>
                                                        <th>Deleted File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th style="width:20% !important">User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $urgentDelete=$this->User_model->urgent_delete();
                                                    if($urgentDelete != NULL){ foreach($urgentDelete as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?><?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td style="width:380px !important"><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['delete_by']; ?></td>
                                                        <td style="width:330px !important">
                                                             <?php $users=$this->User_model->show_user($ph['user_id']); echo $users['user_email'];?>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>  
                                            </table>
                                       </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
<?php } ?>