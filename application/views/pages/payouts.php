<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    $referer = $_SERVER['HTTP_REFERER'];
    $pk = base_url().'pages/passke';
    if($this->session->userdata('type') == 'User') { 
    if($referer==$pk) {
    if ($_SESSION["passkey"] == "keypassed") {
?>
<div class="container-fluid">


    <?php 
        $user_id = $this->uri->segment(2);
        $manager =$this->session->userdata('user_email');
        $userDet=$this->User_model->show_user($user_id);
        $billLink = $userDet['billLog'];
    
        
    ?>	
    
        <div class="w-100 pt-5 mt-5">
            <div class="breadcrumb-holder rounded shadow mx-2 border border-info">
                <iframe src="<?php echo $userDet['billLog']; ?>?widget=true&amp;headers=false" style="border:0;height:600px;width:100%;"></iframe>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php 
session_start();
// unset($_SESSION["passkey"]);

}} else {redirect('passke');} } 
if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
?>
<div class="container-fluid">


    <?php 
        $user_id = $this->uri->segment(2);
        $manager =$this->session->userdata('user_email');
        $userDet=$this->User_model->show_user($user_id);
        $billLink = $userDet['billLog'];
    
        
    ?>	
        <div class="w-100">
            <div class="breadcrumb-holder">
                <iframe src="<?php echo $userDet['billLog']; ?>?widget=true&amp;headers=false" style="border:0;height:600px;width:100%;"></iframe>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php }} ?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>