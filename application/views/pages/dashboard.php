<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { ?>

<?php if($this->session->userdata('type') == 'User') { ?>  
 
<div class="container"><div class="container"> <h1>ggg</h1>hhh</div></div>

 <?php }?> 
<?php if($this->session->userdata('type') == 'Admin') { ?>   
<div class="container">                
<div class="container">
    <a href="<?php echo base_url();?>user">
  <div class="row justify-content-md-center">
    <div class="col-6 px-4">
               Total Users
    </div>
    <div class="col-6 px-4">
                7000
    </div>
</div>
</a>
    <div class="row">
    <div class="col-6 px-4">
      <span> Total Given Pages</span>
      <span> 500</span>
    </div>
    <div class="col-6 px-4">
      <span> Total Given Envelopes</span>
      <span> 500</span>
    </div>
  </div>
  <div class="row">
    <div class="col-6 px-4">
      <span> Total Used Pages</span>
      <span> 300</span>
    </div>
    <div class="col-6 px-4">
      <span> Total Used Envelopes</span>
      <span> 200</span>
    </div>
  </div>
 </div>
<!-- END container-fluid -->



 
        
   
  <?php } ?> 
<?php } ?>