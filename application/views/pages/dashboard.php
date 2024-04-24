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
            <img alt="Logo" src="<?php echo $img;?>"  class="img-fluid rounded bg-white" width="150px;">
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
             <!--modal-->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content p-3">
                        <p class="text-center"><b class="bg-secondary px-2 text-white shadow" style="border:5px solid #999;">IMPORTANT NOTE</b></p>
                        <p><b class="text-info" ><?php echo $userDet['note']; ?></b></p>
                    </div>
                  </div>
                </div>
                <!--modal-->
                <? } ?>
        </div>
    </div>
 <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">USER ASSETS </h4>
              </div>
                    <div class="row col-xl-12">
                        <div class="col-xl-6 d-flex rounded" style="border:5px solid #666">
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
                        <div class="col-sm">
                          <h6>Pages in Stock</h6> 
                        <h5><span class="badge badge-success"><?php echo $totalP - $usedP ?></span></h5>
                        </div>
                      </div>
                        <div class="col-xl-6  d-flex rounded"  style="border:5px solid #666">
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
                <h4 class="card-title">ASSIGNED FILES</h4>
              </div>
              <div class="m-2 p-2">
            <div>
               <input type="text" id="tabsearch" placeholder="Search for filename / Date">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="myTable" class="table table-bordered table-striped mb-0">
                    <thead style="position: sticky;top: 0; background:#fff; border:1px solid #f3f3f3">
                        <tr>
                            <th >File</th>
                            <th>Date</th>
                        </tr>
                    </thead>
            
                <tbody>
                        <?php  if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
              <?php if($user['file_name'] != NULL){ ?>
                            <tr>
                                <td>
                                <h6 class="">
                                <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>" >
                                 <?php echo $user['file_name']; ?> <i class="fa fa-download"></i>
                                </a></h6>
                                </td>
                                <td>
                                <?php echo $user['time']; ?>
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
                <h2 class="text-danger ml-5 pl-5" style="text-shadow: 2px 2px #666;"><br/><br/><br/><br/><br/>Your code has been locked... <br/><br/>Please contact admin</h2>
            <? } ?>

 <?php }?> 

<?php if($this->session->userdata('type') == 'Admin') { ?>   
  <?php $userTotal=$this->User_model->show_user();
  $pageTotal=$this->User_model->show_page();
  $envelopeTotal=$this->User_model->show_envelope(); ?>
<div class="container">                
<div class="container">
<div class="col-lg-12">
            <div class="card text-center">
                <a href="<?php echo base_url();?>user">
                  <div class="card-body">
                      <div class="row justify-content-md-center">
                        <div class="col-md-6 col-lg-6 col-sm-6"><h5>Total Users</h5></div>
                        <?php $uTotal = 0;
                          if($userTotal != NULL){ foreach($userTotal as $user) { ?> 
                         <?php $uTotal +=1; ?>
                       
                          <?php }}?>  
                        <div class="col-md-6 col-lg-6 col-sm-6"><h5><span class="badge badge-warning"><?php echo $uTotal ?></span></h5></div>
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
<!-- END container-fluid -->
  <?php } ?> 

<?php if($this->session->userdata('type') == 'Manager') { ?>   
  <?php $userTotal=$this->User_model->show_user();
  $pageTotal=$this->User_model->show_page();
  $envelopeTotal=$this->User_model->show_envelope(); ?>
<div class="container">                
<div class="container">
<div class="col-lg-12">
            <div class="card  text-center">
                <a href="<?php echo base_url();?>userM">
                  <div class="card-body">
                      <div class="row justify-content-md-center">
                        <div class="col-md-6 col-lg-6 col-sm-6"><h5>Total Users</h5></div>
                        <?php $uTotal = 0;
                          if($userTotal != NULL){ foreach($userTotal as $user) { ?> 
                         <?php $uTotal +=1; ?>
                       
                          <?php }}?>  
                        <div class="col-md-6 col-lg-6 col-sm-6"><h5><span class="badge badge-warning"><?php echo $uTotal ?></span></h5></div>
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
<!-- END container-fluid -->
  <?php } ?> 
<?php } ?>