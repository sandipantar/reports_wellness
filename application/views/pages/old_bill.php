<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Old Bills</h1>
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
                <table id="old_bill" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <!-- <th>Lab Code</th> -->
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>	
                    <?php $bills=$this->Bill_model->old_bills(); ?>									
                    <tbody>
                        <?php if($bills != NULL) { foreach($bills as $bbb) { ?>
                            <tr>
                                <td><?php echo date("d M, Y",strtotime($bbb['bill_date'])); ?></td>
                                <td><?php echo $bbb['patient_name']; ?></td>
                                <td><?php echo $bbb['doctor_name']; ?></td>
                                <!-- <td><?php echo $bbb['lab_code']; ?></td> -->
                                <td><?php echo $bbb['total_amount']; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>final_bill/<?php echo $bbb['bill_id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo base_url(); ?>edit_bill/<?php echo $bbb['bill_id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" onclick="del_bill(<?php echo $bbb['bill_id']; ?>);"><i class="fa fa-trash"></i></button>
                                </td>
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