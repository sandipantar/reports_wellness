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
</style>
<div class="container-fluid">


    <?php 
        $user_id = $this->uri->segment(2);
        $userDet=$this->User_model->show_user($user_id);
        // $bills=$this->Bill_model->old_bills($bill_id); 
        // $p_details = $this->Patient_model->show_patients($bills['patient_id']);
        // $t_detail =  $this->Test_model->show_bill_tests($bills['bill_id']);
        
    ?>	
    
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
    <!-- end row -->
            <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item mx-auto"><b>
                        Upload Your file 
                        <input type="file"/>
                        to update your Pages and envelopes 
                    </b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Assets</h4>
                <p class="card-text">Assets Details of <?php echo $userDet['user_name'];?> </p>
              </div>
              
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    
                      <div class="row">
                        <div class="col-sm">
                          <h6>Total Pages</h6> 
                        <h5><span class="badge badge-primary">500</span></h5>
                        </div>
                        <div class="col-sm">
                          <h6>Used Pages</h6> 
                        <h5><span class="badge badge-warning">200</span></h5>
                        </div>
                        <div class="col-sm">
                          <h6>Pages in Stock</h6> 
                        <h5><span class="badge badge-success">300</span></h5>
                        </div>
                      </div>
                   
                </li>
                
                <li class="list-group-item">
                   
                    <div class="row">
                        <div class="col-sm">
                          <h6>Total Envelopes</h6> 
                        <h5><span class="badge badge-primary">500</span></h5>
                        </div>
                        <div class="col-sm">
                          <h6>Used Envelopes</h6> 
                        <h5><span class="badge badge-warning">100</span></h5>
                        </div>
                        <div class="col-sm">
                          <h6>Envelopes in Stock</h6> 
                        <h5><span class="badge badge-success">400</span></h5>
                        </div>
                      </div>
                </li>
                
              </ul>
              <div class="card-body">
                <a href="<?php echo base_url();?>user" class="card-link">All User</a>
                <a href="<?php echo base_url();?>dashboard" class="card-link">Dashboard</a>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Login History</h4>
                <p class="card-text">Login history of <?php echo $userDet['user_name'];?> </p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h6 class="float-left">#1</h6> 
                    <h6 class="float-right">2022-11-28 03:11:18</h5>
                </li>
                
              </ul>
            </div>
        </div>
    </div>
                                            

<?php } ?>