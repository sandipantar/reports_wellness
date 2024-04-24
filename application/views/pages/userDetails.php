<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<style>
    @media print {
        * {-webkit-print-color-adjust:exact;}
        .table td {
        background-color: transparent !important;
        }
        .bill-header { width: 100%;}
        .bill-header .row1 { width: 5%; }
        .bill-header .row2 { width: 60%; }
        .bill-header .row3 { width: 25%; }
        .line-border-top { border-top-style: solid; border-top-width: thin;}
    }
    .my-custom-scrollbar {
        position: relative;
        height: 300px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
</style>
<div class="container-fluid">


    <?php 
        $user_id = $this->uri->segment(2);
        $manager =$this->session->userdata('user_email');
        $userDet=$this->User_model->show_user($user_id);
        $userPage=$this->User_model->show_page($user_id);
        // $userSearchEnvelope=$this->User_model->search_filename_envelope($userDet['user_email']);
        $userEnvelope=$this->User_model->show_envelope($user_id); 
        $img = base_url()."assets/images/lab/".$userDet['user_name'];
    
        
    ?>	
    
        <div class="w-100">
            <div class="breadcrumb-holder">
                <img alt="Logo" src="<?php echo $img;?>"  class="img-fluid" width="150px;">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item mt-3"><b style="font-size:22px; border:5px solid #c3bebe;" class="bg-secondary rounded shadow text-white py-2 px-3"><?php echo $userDet['user_email']; ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
   
    <!-- end row -->
    <!--        <div class="row">-->
    <!--    <div class="col-xl-12">-->
    <!--        <div class="breadcrumb-holder">-->
    <!--          <form  method="post" action="user/add_envelope"  enctype="multipart/form-data">-->
    <!--            <b>-->
    <!--                    Upload Your file -->
    <!--                    <input type="file" style="width:663px" name="file_name" required/>-->
    <!--                    <input type="hidden" name="user_id" value="<?php echo $user_id ; ?>">-->
    <!--                    <?php if($this->session->userdata('type') == 'Manager') { ?>-->
    <!--                    <input type="hidden" name="manager" value="<?php echo $manager ; ?>">  -->
    <!--                    <?php } ?> -->
    <!--                    <?php if($this->session->userdata('type') == 'Admin') { ?>-->
    <!--                    <input type="hidden" name="manager" value="<?php echo $manager ; ?>">  -->
    <!--                    <?php } ?>        -->
    <!--                    <button type="submit" class="btn btn-success btn-sm ">ADD</button>-->
    <!--                     TO ASSIGN AGENT`S REPORT-->
    <!--                </b>-->
    <!--          </form>-->
    <!--            <div class="clearfix"></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-10">
                          <h4 class="card-title">USER ASSETS</h4>
                      </div>
                      <div class="col-2">
                      <!-- Button trigger modal -->
                          <button type="button" class=" float-end btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               History
                          </button>
                      </div>
                  </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login History </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"></span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <?php $user_id = $this->uri->segment(2);
                      
                      // $u= $userLogin['user_id'];
                      $userLogin=$this->Page_model->show_lastlogin($user_id);
                      ?>
                      <?php if($userLogin != NULL){ foreach($userLogin as $user) { ?> 
                        <li> <?php echo $user['last_login']; ?></li>
                       
                          <?php }}?>  
                      </div>
                     
                    </div>
                  </div>
                </div>
                <!--modal-->
              </div>
              <div class="row col-xl-12">
                      <div class="col-xl-6 d-flex rounded" style="border:5px solid #666">
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
                          <i class="fa fa-history float-right" data-toggle="modal" data-target="#exampleModal1" aria-hidden="true"></i>
                        <h5><span class="badge badge-success"><?php echo $totalP - $usedP ?></span></h5>
                        </div>
                      </div>
                    <div class="col-xl-6 d-flex rounded" style="border:5px solid #666">
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
                          <i class="fa fa-history float-right" data-toggle="modal" data-target="#exampleModal11" aria-hidden="true"></i>
                        <h5><span class="badge badge-success"><?php echo $totalE - $usedE ?></span></h5>
                        </div>
                      </div>
                </div>
              <!--modal-->
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
                                      <?php $user_id = $this->uri->segment(2);
                                      $ShowPage=$this->User_model->show_page($user_id);
                                      ?>
                                      <h4 class="text-center bg-secondary rounded"><spanc class=" p-2 rounded font-weight-bold text-white" style=""></span><?php echo $userDet['user_email']; ?> </h4>
                                      <div class="row">
                                      <?php if($ShowPage != NULL){ foreach($ShowPage as $ph) { ?> 
                                            <div class="col-md-2 border"><?php echo $ph['time']; ?></div>
                                            <div class="col-md-1 border"><span class="text-success">Given Pages: </span><?php echo $ph['pages']; ?></div>
                                            <div class="col-md-1 border"><span class="text-info">Used Pages: </span> <?php echo $ph['page_used']; ?></div>
                                            <div class="col-md-6 border"><span class="text-warning">File Name: </span> <?php echo $ph['file_name']; ?></div>
                                            <div class="col-md-2 border"><span class="text-danger">Deleted By: </span> <?php echo $ph['delete_by']; ?></div>
                                          <?php }}?>
                                       </div>
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
                 <!--modal-->
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
                                      <?php $user_id = $this->uri->segment(2);
                                      // $u= $userLogin['user_id'];
                                      $userLogin=$this->User_model->show_envelope($user_id);
                                      ?>
                                      <h4 class="text-center bg-secondary rounded"><spanc class=" p-2 rounded font-weight-bold text-white" style=""></span><?php echo $userDet['user_email']; ?> </h4>
                                      <div class="row">
                                      <?php if($userLogin != NULL){ foreach($userLogin as $user) { ?>
                                            <div class="col-md-6 border"><?php echo $user['time']; ?></div>
                                            <div class="col-md-3 border"><span class="text-success">Given Env: </span><?php echo $user['envelopes']; ?></div>
                                            <div class="col-md-3 border"><span class="text-info">Used Env: </span> <?php echo $user['envelope_used']; ?></div>
                                          <?php }}?>  
                                      </div>  
                                      </div>
                                     
                                    </div>
                                  </div>
                                </div>
                              <!--modal-->
              <div class="card-body">
              <?php if($this->session->userdata('type') == 'Manager') { ?>
                <a href="<?php echo base_url();?>userM" class="card-link">All User</a>
                <?php }else{?>
                <a href="<?php echo base_url();?>user" class="card-link">All User</a>
                <?php }?>
                <a href="<?php echo base_url();?>dashboard" class="card-link">Dashboard</a>
              </div>
              <div>
                 
                 
                <!-- <table id="myTable" class="table table-bordered table-striped mb-0">-->
                <!--    <thead style="position: sticky;top: 0; background:#fff; border:1px solid #f3f3f3">-->
                <!--        <tr>-->
                <!--            <th>#</th>-->
                <!--            <th>File</th>-->
                <!--            <th>By</th>-->
                <!--            <th>Date</th>-->
                <!--            <th class=" text-center" style="width:10% !important">Action</th>-->

                <!--        </tr>-->
                <!--    </thead>-->
            
                <!--<tbody>-->
                <!--        <?php  if($userSearchEnvelope != NULL ){$i=1; foreach($userSearchEnvelope as $use) { ?> -->
                <!--        <?php if($use['file_name'] != NULL){ ?>-->
                <!--            <tr>-->
                <!--                <td><? echo $i ?></td>-->
                <!--                <td>-->
                <!--                <h6 class=" float-start">-->
                <!--                    <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $use['file_name']; ?>" >-->
                <!--                    <?php echo $use['file_name']; ?> <i class="fa fa-download"></i>-->
                <!--                    </a></h6>-->
                <!--                </td>-->

                               
                                 

                <!--                <td>-->
                <!--                <?php echo $use['time']; ?>-->
                <!--                </td>-->
                <!--            </tr>-->
                <!--        <?php }$i++;} }?>-->
                <!--    </tbody>-->
                <!--</table>-->
                 
                 
              </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
              <div class="card-body" style="padding-bottom: 0 !important">
                <h4 class="card-title">ASSIGNED FILES</h4>
              </div>
              <div class="col-lg-12">
                  <input type="text" id="tabsearch" placeholder="Search for filename / Date">
              </div>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="myTable" class="table table-bordered table-striped mb-0">
                    <thead style="position: sticky;top: 0; background:#fff; border:1px solid #f3f3f3">
                        <tr>
                            <th>File</th>
                            <th>By</th>
                            <th>Date</th>
                            <th class=" text-center" style="width:10% !important">Action</th>

                        </tr>
                    </thead>
            
                <tbody>
                        <?php  if($userEnvelope != NULL ){$i=1; foreach($userEnvelope as $user) { ?> 
                        <?php if($user['file_name'] != NULL){ ?>
                            <tr>
                                <td>
                                <h6 class=" float-start">
                                    <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $user['file_name']; ?>">
                                    <?php echo $user['file_name']; ?> <i class="fa fa-download"></i>
                                    </a></h6>
                                </td>

                                <td>
                                <?php echo $user['manager']; ?>
                                </td>
                               
                                 

                                <td>
                                <?php echo $user['time']; ?>
                                </td>

                              

                                <td class=" text-center">
                                    <a href="https://wa.me/send?phone=<?php echo $userDet['user_wa']; ?>&text=https://reports.wellnessslg.com/wellness_file/<?php echo $user['file_name']; ?>" target="_blank">
                                        <img wid src="/assets/images/waIcon.png" width="25px" alt="wa Icon"/>
                                    </a><span class="mx-1">|</span>
                                    <button class="bg-danger rounded text-white" onclick="del_envelope(<?php echo $user['envelope_id']; ?>,<?php echo $user['user_id']; ?>);"><i class="fa fa-trash"></i></button>
                               </td>
                            </tr>
                        <?php }$i++;}}?>
                    </tbody>
                </table>
              </div>
              </div>
            </div>
  </div>
    </div>
                                            

<?php } ?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>