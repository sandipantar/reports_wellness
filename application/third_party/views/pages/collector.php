<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Collector</h1>
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
            <div class="card-head m-2">
                <?php if($this->session->userdata('type') == 'Admin') { ?>
                <button class="btn btn-sm btn-success" onclick="add_collector();">Add Collector</button>
                <?php } ?>
            </div>                
            <div class="card-body">
                <div class="table-responsive">
                <table id="show_doctors" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <?php if($this->session->userdata('type') == 'Admin') { ?>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>	
                    <?php $doctors=$this->Collector_model->show_collectors(); ?>									
                    <tbody>
                        <?php if($doctors != NULL) { foreach($doctors as $doc) { ?>
                            <tr>
                                <td><?php echo $doc['sample_collected_name']; ?></td>
                                <td><?php echo $doc['sample_address']; ?></td>
                                <td><?php echo $doc['sample_contact']; ?></td>
                                <?php if($this->session->userdata('type') == 'Admin') { ?>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="edit_collector(<?php echo $doc['sample_collected_id']; ?>);"><i class="fa fa-edit"></i></button>
                                    <!-- <button class="btn btn-sm btn-danger" onclick="del_collector(<?php echo $doc['sample_collected_id']; ?>);"><i class="fa fa-trash"></i></button> -->
                                </td>
                                <?php } ?>
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