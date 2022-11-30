Contact<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $bill_id = $this->uri->segment(2);
    $bills=$this->Bill_model->old_bills($bill_id); 
    $p_details = $this->Patient_model->show_patients($bills['patient_id']);
    $t_detail =  $this->Test_model->show_bill_tests($bills['bill_id']);
    $doctors = $this->Doctor_model->show_doctor();
    $tests = $this->Test_model->show_tests();
    $labs=$this->Lab_model->show_lab();
    $this->load->view('all_modals'); 
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Edit Bill</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo date("d M, Y"); ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card mb-3">                
                <div class="card-body">

                    <div class="container">
                        <div id="printable">
                            <form class="form-horizontal form-label-left" id="main_bill_form" method="post"  action="bill/update_bill">
                                <input type="hidden" name="bill_id" value="<?php echo $bill_id; ?>">
                                <div style="margin:30px 50px 0px">
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="row form-group float-left col-md-3 col-lg-3 col-xs-6">
                                                <label>Referral Center</label>
                                                <select name="lab_image_id" class="form-control">
                                                    <option disabled>Select Referral Center</option>
                                                    <?php if($labs != NULL) { foreach($labs as $lb) { ?>
                                                    <option value="<?php echo $lb['lab_id']; ?>" <?php if($bills['lab_image_id'] == $lb['lab_id']) { echo 'selected'; } ?>>
                                                        <?php echo $lb['lab_name']; ?>
                                                    </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <span class="row float-right col-md-6 col-lg-6 col-xs-12">
                                                <strong>Wellness Center</strong><br>
                                                Siliguri
                                            </span>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                           

                                            <div class="row form-group  col-md-12 col-sm-12 col-xs-12">
                                                <label class="mr-2 text-right mt-2">Sample Collected by</label>
                                                <input id="sample_collected_show" name="sample_collected_name" value="<?php echo $bills['sample_collected_name']; ?>"
                                                    type="text" class="form-control col-md-8 col-sm-8 col-xs-6"
                                                    required="required">
                                                <input id="sample_collected_id" name="sample_collected_id"  value="<?php echo $bills['sample_collected_id']; ?>" 
                                                  type="hidden"  >
                                            </div>
                                            <div class="row form-group pl-2">
                                                <label class="mr-2 mt-2">Address</label>
                                                <input type="text" id="sample_address" name="sample_address" value="<?php echo $bills['sample_address']; ?>"
                                                    class="form-control col-md-6 col-sm-6 col-xs-6"
                                                     required="required">
                                            </div>

                                            <div class="row form-group pl-2">
                                                <label class="mr-2 mt-2">Contact No</label>
                                                <input type="number" id="sample_contact" name="sample_contact" value="<?php echo $bills['sample_contact']; ?>"
                                                    class="form-control col-md-6 col-sm-6 col-xs-6">
                                            </div>
                                        </div>

                                        <div class="row float-right col-md-6 col-lg-6 col-xs-12">
                                           

                                            <div class="row form-group  col-md-12 col-sm-12 col-xs-12">
                                                <label class="mr-2 text-right mt-2">Agent Code</label>
                                                <input id="agent_show" name="agent_code" value="<?php echo $bills['agent_code']; ?>"
                                                    type="text" class="form-control col-md-8 col-sm-8 col-xs-6"
                                                    required="required">
                                                <input id="agent_id" name="agent_id" value="<?php echo $bills['agent_id']; ?>"
                                                  type="hidden"  >
                                            </div>
                                            <div class="row form-group pl-2">
                                                <label class="mr-2 mt-2">Sample Source</label>
                                                <input type="text" id="sample_source" name="sample_source" value="<?php echo $bills['sample_source']; ?>"
                                                    class="form-control col-md-6 col-sm-6 col-xs-6"
                                                     required="required">
                                            </div>

                                            <div class="row form-group pl-2">
                                                <label class="mr-2 mt-2">Test Done At</label>
                                                <input id="lab_show" name="lab_name"  value="<?php echo $bills['lab_name']; ?>"
                                                    type="text" class="form-control col-md-8 col-sm-8 col-xs-6"
                                                    required="required">
                                                <input id="lab_id" name="lab_id" value="<?php echo $bills['lab_id']; ?>"
                                                  type="hidden"  >
                                            </div>
                                        </div>

                                    </div>
                                    <div style="width:100%; height:100%; 
                                        background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url('<?php echo base_url(); ?>assets/images/logosub.jpg') center center no-repeat;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <address>

                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label class="col-md-2 col-sm-2 col-xs-3 text-right">
                                                                    Patient Name
                                                                </label>
                                                                <input id="patient_show" name="patient_name" type="text"
                                                                    class="form-control col-md-8 col-sm-8 col-xs-6"
                                                                    required="required" value="<?php echo $p_details['patient_name']; ?>">
                                                                <input id="patient_id" name="patient_id" type="hidden" value="<?php echo $bills['patient_id']; ?>">
                                                            </div>
                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label class="col-md-2 col-sm-2 col-xs-3 text-right">Age</label>

       
                                                                <input type="text" id="year" name="year" 
                                                                    class="form-control col-md-2 col-sm-2 col-xs-2" placeholder="Year(s)" value="<?php echo $p_details['year']; ?>" 
                                                                    required="required">

                                                                <input type="text" id="month" name="month" 
                                                                class="form-control col-md-2 col-sm-2 col-xs-3" placeholder="Month(s)" value="<?php echo $p_details['month']; ?>" 
                                                                required="required">

                                                                <input type="text" id="day" name="day" 
                                                                class="form-control col-md-2 col-sm-2 col-xs-3" placeholder="Day(s)" value="<?php echo $p_details['day']; ?>" 
                                                                required="required"> <br><br>
                                                   
                                                            </div>
                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label class="col-md-2 col-sm-2 col-xs-3 text-right">Gender</label>
                                                                <select id="patient_sex" name="patient_sex"
                                                                    class="form-control col-md-4 col-sm-4 col-xs-4"
                                                                    required="required">
                                                                    <option disabled selected>Select Gender</option>
                                                                    <option value="Male" <?php if($p_details['patient_sex'] == 'Male') { echo 'selected'; } ?>>Male</option>
                                                                    <option value="Female" <?php if($p_details['patient_sex'] == 'Female') { echo 'selected'; } ?>>Female</option>
                                                                    <option value="Others" <?php if($p_details['patient_sex'] == 'Others') { echo 'selected'; } ?>>Others</option>
                                                                </select>
                                                            </div>
                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label
                                                                    class="col-md-2 col-sm-2 col-xs-6 text-right">Phone</label>
                                                                <input type="text" id="patient_phone" name="patient_phone"
                                                                    class="form-control col-md-8 col-sm-8 col-xs-6" value="<?php echo $p_details['patient_phone']; ?>">
                                                            </div>

                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 float-right text-right">
                                                        <h5>Receipt No. <?php echo sprintf('%06d', $bills['registration']); ?></h5>                                                        
                                                        <input name="registration" type="hidden" value="<?php echo $bills['registration']; ?>">
                                                        <address>
                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label class="col-md-4 col-sm-4 col-xs-5 text-right">
                                                                    Doctor
                                                                </label>
                                                                <input id="doctor_show" name="doctor_name" type="text"
                                                                class="form-control col-md-8 col-sm-8 col-xs-6" required="required" value="<?php echo $bills['doctor_name']; ?>">
                                                                <input id="doctor_id" name="doctor_id" type="hidden" value="<?php echo $bills['doctor_id']; ?>">
                                                            </div>
                                                            <!-- <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label class="col-md-4 col-sm-4 col-xs-6 text-right">Lab
                                                                    Code</label>
                                                                <input type="text" name="lab_code"
                                                                    class="form-control col-md-8 col-sm-8 col-xs-6"
                                                                    required="required" value="<?php echo $bills['lab_code']; ?>">
                                                            </div> -->
                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label
                                                                    class="col-md-4 col-sm-4 col-xs-6 text-right">Sample Collection Date</label>
                                                                <input type="date" name="bill_date"
                                                                    class="form-control col-md-8 col-sm-8 col-xs-6"
                                                                    required="required" value="<?php echo date("Y-m-d", strtotime($bills['bill_date'])); ?>">
                                                            </div>

                                                            <div class="row form-group col-md-12 col-sm-12 col-xs-12">
                                                                <label class="col-md-4 col-sm-4 col-xs-6 text-right mt-2">Report Status</label>
                                                                <select id="status" name="status"
                                                                    class="form-control col-md-8 col-sm-8 col-xs-6"
                                                                    required="required">
                                                                    <option disabled selected>Select</option>
                                                                    <option value="Hold" <?php if($bills['status'] == 'Hold') { echo 'selected'; } ?>>Hold</option>
                                                                    <option value="Pending"  <?php if($bills['status'] == 'Pending') { echo 'selected'; } ?>>Pending</option>
                                                                    <option value="Deliverd"  <?php if($bills['status'] == 'Deliverd') { echo 'selected'; } ?>>Deliverd</option>
                                                                    <option value="Cancel"  <?php if($bills['status'] == 'Cancel') { echo 'selected'; } ?>>Cancel</option>
                                                                </select>
                                                            </div>

                                                        </address>
                                                    </div>
                                                </div><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <span class="panel-title"><strong>Add Test</strong></span>
                                                        <select id="test_select" name="test_id" onchange="addTest();"
                                                            class="form-control col-md-3 col-sm-3 col-xs-4 select2"
                                                            required="required">
                                                            <option disabled selected>Select Test</option>
                                                            <?php if($tests != NULL) { foreach($tests as $tst) { ?>
                                                            <option value="<?php echo $tst['test_id']; ?>">
                                                                    <?php echo $tst['test_name']; ?>
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addTestFromHome">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-condensed" id="bills">
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong>Sl. No.</strong></td>
                                                                        <td><strong>Investigation Name</strong></td>
                                                                        <td class="text-right"><strong>Price</strong></td>
                                                                        <td>Action</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i=1; $sub = 0; foreach ($t_detail as $tst) { ?>
                                                                        <tr>
                                                                            <td><?php echo $i; ?></td>
                                                                            <td><?php echo $tst['test_name']; ?></td>
                                                                            <td class="text-right">
                                                                                <i class="fa fa-inr" style="padding-right: 12px;"></i>
                                                                                <input type="hidden"  name="tid[]" value="<?php echo $tst['pt_id']; ?>">
                                                                                <input class="test_price" name="test_price[]" type="number" min="1" value="<?php echo $tst['price']; ?>" 
                                                                                    onchange="calculateBill()" style="width: 80px;" required="required">
                                                                            </td>
                                                                            <td> <button class="btn btn-sm btn-danger" onclick = "event.preventDefault(); del_bill_test(<?php echo $tst['pt_id']; ?>);" ><i class="fa fa-trash"></i></button></td>
                                                                            
                                                                        </tr>
                                                                    <?php $sub += $tst['price']; $i++; } ?>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-condensed">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-right">
                                                                            <strong>Subtotal</strong>
                                                                        </td>
                                                                        <td class="thick-line text-right"><i
                                                                                class="fa fa-inr"></i> <span id="sub_total"> <?php echo $sub; ?></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-right"><strong>Collection
                                                                                Charge</strong></td>
                                                                        <td class="no-line text-right">
                                                                            <i class="fa fa-inr"></i> 
                                                                            <input style="width: 80px;" name="collection_charge" id="collection_charge" type="number" 
                                                                            min="0" onchange="collection_change()" value="<?php echo $bills['collection_charge']; ?>">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-right">
                                                                            <strong>Discount</strong>
                                                                        </td>
                                                                        <td class="no-line text-right"> 
                                                                            <input style="width: 80px;" name="discount" id="percent_discount" type="number" min="0" 
                                                                            onchange="percent_discount1()" value="<?php echo $bills['discount']; ?>"> %
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-right">
                                                                            <strong>Total</strong></td>
                                                                        <td class="no-line text-right">
                                                                            <i class="fa fa-inr"></i>  
                                                                            <span id="total"><?php echo $bills['total_amount']; ?></span> 
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <span id="toWords"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group  col-md-12 col-sm-12 col-xs-12">
                                                <label class="mr-2 text-right mt-2">Amount Collected by</label>
                                                <input id="amount_collected_show" name="amount_collected_name" value="<?php echo $bills['amount_collected']; ?>"
                                                    type="text" class="form-control col-md-8 col-sm-8 col-xs-6"
                                                    required="required">
                                
                                            </div>
                                    <div class="row">
                                        <input type="submit" class="btn btn-success" value='Generate Bill'>                           
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
<!-- END container-fluid -->
<?php } ?>