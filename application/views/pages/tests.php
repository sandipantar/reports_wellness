<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Tests</h1>
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
                <button class="btn btn-sm btn-success" onclick="add_test();">Add Test</button>
                <?php } ?>
            </div>                  
            <div class="card-body">
                <div class="table-responsive">
                <table id="tests" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <?php if($this->session->userdata('type') == 'Admin') { ?>
                            <th>Price</th>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>	
                    <?php $tests=$this->Test_model->show_tests(); ?>									
                    <tbody>
                        <?php if($tests != NULL) { foreach($tests as $tst) { ?>
                            <tr>
                                <td><?php echo $tst['test_name']; ?></td>
                                <?php if($this->session->userdata('type') == 'Admin') { ?>
                                <td><?php echo $tst['price']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="edit_test(<?php echo $tst['test_id']; ?>);"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="del_test(<?php echo $tst['test_id']; ?>);"><i class="fa fa-trash"></i></button>
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