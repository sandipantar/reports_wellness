<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">All Labs</h1>
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
                <button class="btn btn-sm btn-warning" onclick="add_lab();">Add Lab</button>
            </div>                  
            <div class="card-body">
                <div class="table-responsive">
                <table id="tests" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Lab Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>	
                    <?php $labs=$this->Lab_model->show_lab(); ?>									
                    <tbody>
                        <?php if($labs != NULL) { foreach($labs as $lb) { ?>
                            <tr>
                                <td><?php echo $lb['lab_name']; ?></td>
                                <td>
                                <button class="btn btn-sm btn-primary" onclick="edit_lab(<?php echo $lb['lab_id']; ?>);"><i class="fa fa-edit"></i></button>
                                    <!-- <button class="btn btn-sm btn-danger" onclick="del_lab(<?php echo $lb['lab_id']; ?>);"><i class="fa fa-trash"></i></button> -->
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