<?php
// Set a 10-minute delay in seconds
$delay = 600;

// URL to redirect to after the delay  echo base_url();
$redirect_url = 'https://reports.wellnessslg.com/logout';

// Set the refresh header with the delay
header("refresh:$delay;url=$redirect_url");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Wellness - The heart of your healthcare</title>
	<meta name="description" content="Wellness - The heart of your healthcare">
	<meta name="author" content="www.grandredtechnology.com">
	
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"  media="all"/>
	<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
	<link rel="manifest" href="manifest.json">
	<style>
                  .selected {
          background-color: coral;
        }

        .red {
          background-color: #20c997; !important
        }
	.my-custom-scrollbar {
        position: relative;
        height: 300px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
	    .userNote{
            padding:0; 
            text-align: right;
        }
        .userNote span {
            font-weight:800 !important; 
            padding:5px;
            cursor: pointer !important;
            animation: mymove 2s infinite;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
        }
        @keyframes mymove {
          from {color: #ffc107; text-shadow:0 0 20px #28a745; background-color:#28a745; box-shadow:0 0 20px #28a745; border-radius:5px;}
          to {color:#28a745; text-shadow:0 0 20px #ffc107; background-color:#ffc107; box-shadow:0 0 20px #ffc107; border-radius:5px;}
        }
        
	</style>
</head>
<?php date_default_timezone_set("Asia/kolkata"); ?>