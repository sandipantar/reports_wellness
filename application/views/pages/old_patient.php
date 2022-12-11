<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Patient history</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo date("d M, Y"); ?></b></li>
                </ol>
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
                <table id="old_patient" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone</th>
                        </tr>
                    </thead>										
                    <tbody>
                        <?php $patients=$this->Patient_model->show_patients(); ?>
                        <?php if($patients != NULL) { foreach($patients as $psnt) { ?>
                            <tr>
                                <td><?php echo $psnt['patient_name']; ?></td>
                                <td>
                                    <?php 
                                    if($psnt['year']===NULL && $psnt['month']===NULL && $psnt['day']===NULL){     
                                    } elseif($psnt['year']===NULL){                                                        
                                        echo $psnt['month'].' Month(s) '.$psnt['day']. ' Day(s) <br>'; 
                                    } elseif($psnt['month']===NULL && $psnt['day']===NULL) { 
                                        echo $psnt['year'].' Year(s) <br>';
                                    } else {
                                        echo $psnt['year'].' Year(s) '.$psnt['month'].' Month(s) '.$psnt['day']. ' Day(s) <br>';
                                    }   
                                    ?>
                                    <!-- <?php echo $psnt['year'].' Y'.$psnt['month'].' M'. $psnt['day'].'D'; ?> -->
                                </td>
                                <td><?php echo $psnt['patient_sex']; ?></td>
                                <td><?php echo $psnt['patient_phone']; ?></td>
                                <!-- <td>
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </td> -->
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                </div>
                
            </div>														
        </div><!-- end card-->					
    </div>
    </div>

</div>
<?php } ?>