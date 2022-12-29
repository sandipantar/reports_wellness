<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>

<?php if($this->session->userdata('type') == 'User') { ?>  
 <?php $user_id =$this->session->userdata('user_id') ;
  $userDet=$this->User_model->show_user($user_id);
  $userPage=$this->User_model->show_page($user_id);
  $userEnvelope=$this->User_model->show_envelope($user_id);
  $img = base_url()."assets/images/lab/".$userDet['user_name'];
  ?>

   <div class="w-100">
            <div class="breadcrumb-holder">
            <img alt="Logo" src="<?php echo $img;?>"  class="img-fluid" width="150px;">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo $userDet['user_email']; ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
    </div>

 <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title">User Assets </h4>
              </div>
              
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    
                      <div class="row">
                        <div class="col-sm">
                          <h6>Total Pages</h6>
                            <?php $totalP = 0;
                          if($userPage != NULL){ foreach($userPage as $user) { ?> 
                         <?php $totalP +=$user['pages']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalP; ?></span> </h5>
                        </div>

                        <div class="col-sm">
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
                   
                </li>
                
                <li class="list-group-item">
                   
                    <div class="row">
                        <div class="col-sm">
                          <h6>Total Envelopes</h6> 
                          <?php $totalE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
                         <?php $totalE +=$user['envelopes']; ?>
                       
                          <?php }}?>  
                        <h5>  <span class="badge badge-primary"><?php echo $totalE; ?></span> </h5>
                        </div>

                        <div class="col-sm">
                          <h6>Used Envelopes</h6> 
                          <?php $usedE = 0;
                          if($userEnvelope != NULL){ foreach($userEnvelope as $user) { ?> 
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
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Assigned Files</h4>
              </div>
              <table id="dtOrderExample" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th style="max-width: 1000px">File</th>
                            <th>Date</th>
                        </tr>
                    </thead>
            
                <tbody>
                        <?php  if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
              <?php if($user['file_name'] != NULL){ ?>
                            <tr>
                                <td>
                                <h6 class="cause-title float-start">
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
    

 <?php }?> 

<?php if($this->session->userdata('type') == 'Admin') { ?>   
  <?php $userTotal=$this->User_model->show_user();
  $pageTotal=$this->User_model->show_page();
  $envelopeTotal=$this->User_model->show_envelope(); ?>
<div class="container">                
<div class="container">
<div class="col-lg-12">
            <div class="card">
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
            <div class="card">
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