<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>

<?php if($this->session->userdata('type') == 'User') { ?>  
 <?php $user_id =$this->session->userdata('user_id') ;
  $userDet=$this->User_model->show_user($user_id);
  $userPage=$this->User_model->show_page($user_id);
  $userEnvelope=$this->User_model->show_envelope($user_id);
  ?>
<div class="container"> 
   <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left"><?php echo $userDet['user_name'];?></h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo $userDet['user_email']; ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
 </div>

 <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Assets </h4>
                <p class="card-text">Assets Details of <?php echo $userDet['user_name'];?> </p>
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
        <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Login History</h4>
                <p class="card-text">Login history of <?php echo $userDet['user_name'];?> </p>
              </div>
              <ul class="list-group list-group-flush">
            <?php  if($userEnvelope != NULL ){ foreach($userEnvelope as $user) { ?> 
              <?php if($user['file_name'] != NULL){ ?>
                <li class="list-group-item">
                <span class="cause-title-wrap">
                <h4 class="cause-title text-center"><?php echo $user['file_name']; ?></h4>
                </span>
                <a  href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>"
                class="btn btn-block btn-style-2 btn-primary"> <i class="fa fa-download"></i><span class="ml-2">Download</span></a>

                 
                </li>
                <?php }}}?>
                
              </ul>
            </div>
  </div>
    

 <?php }?> 
<?php if($this->session->userdata('type') == 'Admin') { ?>   
<div class="container">                
<div class="container">
    <a href="<?php echo base_url();?>user">
  <div class="row justify-content-md-center">
    <div class="col-6 px-4">
               Total Users
    </div>
    <div class="col-6 px-4">
                7000
    </div>
</div>
</a>
    <div class="row">
    <div class="col-6 px-4">
      <span> Total Given Pages</span>
      <span> 500</span>
    </div>
    <div class="col-6 px-4">
      <span> Total Given Envelopes</span>
      <span> 500</span>
    </div>
  </div>
  <div class="row">
    <div class="col-6 px-4">
      <span> Total Used Pages</span>
      <span> 300</span>
    </div>
    <div class="col-6 px-4">
      <span> Total Used Envelopes</span>
      <span> 200</span>
    </div>
  </div>
 </div>
<!-- END container-fluid -->
  <?php } ?> 
<?php } ?>