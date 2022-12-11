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

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Final Bill</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><b><?php echo date("d M, Y"); ?></b></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <?php 
        $bill_id = $this->uri->segment(2);
        $bills=$this->Bill_model->old_bills($bill_id); 
        $p_details = $this->Patient_model->show_patients($bills['patient_id']);
        $t_detail =  $this->Test_model->show_bill_tests($bills['bill_id']);
        if($bills['lab_image_id'] == NULL) {
            $img = base_url()."assets/images/logo.png";
        } else {
            $img = base_url()."assets/images/lab/".$bills['lab_picture'];
        }
    ?>	

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <div class="card mb-3 final-bill-ready">
                <div class="card-head" style="padding:10px;">
                    <button class=" btn btn-sm btn-info" id="print_page"> <i class="fa fa-print"></i> Print </button>
                    <a class="print btn btn-sm btn-success" href="<?php echo base_url(); ?>old_bill"> Check all bills </a>
                </div>
                <div> <h4 class="text-center"><u>MONEY RECEIPT</u></h4></div>
                <div class="card-body">

                    <div class="container">
                        <div id="printable">
                            <div style="margin:30px 50px 0px">
                                <!-- <div class="row"> -->
                                    <!-- <div class="col-md-12 ml-2"> -->
                                        <!-- onload="inwords_final(<?php echo $bills['total_amount']; ?>);" -->
                                        <!-- <img alt="Logo" src="<?php echo $img; ?>" class="img-fluid" width="250px;">
                                        <span class="float-right">
                                            <div class="row">
                                            <img src="<?php echo base_url(); ?>assets/images/logo.jpg" width="150px">
                                           
                                            <small>
                                                <strong>Wellness Centre</strong><br>
                                                Bharat Nagar (North)<br>
                                                Near Tarun Tirtha Club<br>
                                                Siliguri - 734006<br>
                                                Contact - 9475157977<br>
                                                Email - wellness.siliguri@gmail.com<br>
                                                Website - www.wellnessslg.com
                                            </small>
                                            </div>
                                        </span> -->
                                        <div class="row">
                                                <div class="col-6 float-left">
                                                    <address>
                                                        <?php 
                                                            echo '<b>Sample Collected By: </b>'.$bills['sample_collected_name'].'<br>';
                                                            echo '<b>Address: </b>'.$bills['sample_address'].'<br>'; 
                                                            if($p_details['patient_phone'] != NULL ) { echo '<b>Contact No.: </b>'.$bills['sample_contact'].'<br>';}
                                                             
                                                        ?>

                                                    </address>
                                                </div>
                                                <div class="col-6 float-right text-right">
                                                   

                                                    <address>
                                                        <?php 
                                                            echo '<b>Agent Code: </b>'.$bills['agent_code'].'<br>';
                                                            echo '<b>Sample Source: </b>'.$bills['sample_source'].'<br>'; 
                                                            echo '<b>Test Done At: </b>'.$bills['lab_name'].'<br>';
                                                             
                                                        ?>

                                                    </address>
                                                </div>
                                            </div><br>

                                    <!-- </div> -->
                                <!-- </div> -->
                                <div id="bg_img" style="width:100%; height:100%;>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 float-left">
                                                    <address>
                                                        <?php 
                                                            echo '<b>Patient Name: </b><span class="h6">'.$p_details['patient_name'].'</span><br>';
                                                            echo '<b>Gender: </b>'.$p_details['patient_sex'].'<br>'; 
                                                            if($p_details['year']===NULL && $p_details['month']===NULL && $p_details['day']===NULL){     
                                                            } elseif($p_details['year']===NULL){                                                        
                                                                echo '<b>Age: </b>'.$p_details['month'].' Month(s) '.$p_details['day']. ' Day(s) <br>'; 
                                                            } elseif($p_details['month']===NULL && $p_details['day']===NULL) { 
                                                                echo '<b>Age: </b>'.$p_details['year'].' Year(s) <br>';
                                                            } else {
                                                                echo '<b>Age: </b>'.$p_details['year'].' Year(s) '.$p_details['month'].' Month(s) '.$p_details['day']. ' Day(s) <br>';
                                                            }   
                                                        ?>


                                                        <strong>Ref. Doctor:</strong> <?php echo $bills['doctor_name']; ?><br>
                                                        <?php if($p_details['patient_phone'] != NULL ) { echo '<b>Phone: </b>'.$p_details['patient_phone']; } ?><br>
                                                    </address>
                                                </div>
                                                <div class="col-6 float-right text-right">
                                                    <h5>Receipt No.: <?php echo sprintf('%06d', $bills['registration']); ?></h5>
                                                    <address>
                                                        
                                                        <strong>Sample Collection Date:</strong> <?php echo date("d M, Y", strtotime($bills['bill_date'])); ?><br>
                                                        <strong>Report Status:</strong> <?php echo $bills['status']; ?><br>
                                                    </address>
                                                </div>
                                            </div><br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><strong>Test Summary</strong></h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        
                                                        <!-- table div START-->
                                                        <div class="ml-4 mr-4" >
                                                            <!-- table header-->
                                                            <div class="row bill-header">
                                                                <div class="row1 col-lg-1 col-md-1 col-sm-1 col-xs-1"><strong>Sl. No.</strong></div>
                                                                <div class="row2 col-lg-8 col-md-7 col-sm-6 col-xs-7"><strong>Investigation Name</strong></div>
                                                                <div class="row3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3"><strong>Amount</strong></div>
                                                            </div>
                                                            <!-- // table header-->
                                                            <div >
                                                                <?php $i=1; $sub = 0; foreach ($t_detail as $tst) { ?>
                                                                    <div class="row bill-header border-bottom border-dark">
                                                                        <div class="row1 col-lg-1 col-md-1 col-sm-1 col-xs-1"><?php echo $i; ?></div>
                                                                        <div class="row2 col-lg-8 col-md-7 col-sm-6 col-xs-7"><?php echo $tst['test_name']; ?></div>
                                                                        <div class="row3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3"><i class="fa fa-inr"></i> <?php echo $tst['price']; ?></div>
                                                                    </div>
                                                                <?php $sub += $tst['price']; $i++; } ?>
                                                                
                                                                <!-- <div class="row bill-header"><hr></div> -->
                                                                <div class="row bill-header line-border-top">
                                                                    <div class="row1 col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                                                                    <div class="row2 text-right col-lg-8 col-md-7 col-sm-6 col-xs-7"><strong>Subtotal</strong></div>
                                                                    <div class="row3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3"><i class="fa fa-inr"></i> <?php echo $sub; ?></div>
                                                                </div>
                                                                <div class="row bill-header">
                                                                    <div class="row1 col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                                                                    <div class="row2 text-right col-lg-8 col-md-7 col-sm-6 col-xs-7"><strong>Collection Charge</strong></div>
                                                                    <div class="row3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3"><i class="fa fa-inr"></i> <?php echo $bills['collection_charge']; ?></div>
                                                                </div>
                                                                <div class="row bill-header">
                                                                    <div class="row1 col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                                                                    <div class="row2 text-right col-lg-8 col-md-7 col-sm-6 col-xs-7"><strong>Discount</strong></div>
                                                                    <div class="row3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3"><?php echo $bills['discount']; ?>%</div>
                                                                </div>
                                                                <div class="row bill-header line-border-bottom">
                                                                    <div class="row1 col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
                                                                    <div class="row2 text-right col-lg-8 col-md-7 col-sm-6 col-xs-7"><strong>Total</strong></div>
                                                                    <div class="row3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3"><i class="fa fa-inr"></i> <span id="total_amt"><b><?php echo $bills['total_amount']; ?></b></span></div>
                                                                </div>
                                                            </div><hr>
                                                        </div>
                                                        <!-- table div END-->
                                                    </div>
<?php 
    $number = $bills['total_amount'];
    $no = floor($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
        '60' => 'Sixty', '70' => 'Seventy',
        '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $inwords = ucfirst($result . "Rupees");
    $strwww = '<br><br>Received with thanks an amount of (Rupees)'.$inwords.' Only<br>(Full Payment Before Investigation)'; 
?>                                                     
                                                    <span id="toWords"><?php echo $strwww ?> </span>
                                                    <h6>Amount collected By <?php echo $bills['amount_collected']; ?></h6><br>
                                                    <h6>This is a Computer generated invoice no Signature is required.</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- end card body -->

            </div><!-- end card-->

        </div><!-- end col-->

    </div><!-- end row-->


</div>
<!-- <script>
    function inwords_final(total) {
        var inWords = numberToWords(total);

        $("#toWords").html(inWords);
    }
</script> -->
<?php } ?>