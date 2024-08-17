<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
?>
<div class="container-fluid bg-white pt-2">
    <div id="syncUploadHistory">
        <h2 class="my-2 bg-dark p-1 rounded text-center shadow text-white pb-2 font-weight-bold shadow" style="text-shadow:1px 1px 10px #000">User Assets Given History</h2>
        <table  id="show_doctors" class="table table-bordered display">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Given Details</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $ShowPage=$this->User_model->show_user();
                                                    if($ShowPage != NULL){ foreach($ShowPage as $ph) {?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>userDetails/<?php echo $ph['user_id'];?>" class="btn btn-sm btn-primary">
                                                            <?php echo $ph['user_email']; ?>
                                                            <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="row">
                                                            <div class="col-xl-6">
                                                                 <table class="border border-success shadow table-striped">
                                                                    <tr class="bg-success"><th>Pages</th><th>Time</th><th>By</th></tr>
                                                                <?php $given_envelope_History= $this->User_model->given_page_History($ph['user_id']); 
                                                                if($given_envelope_History != NULL){ foreach($given_envelope_History as $geh) {?>
                                                                <tr><td><? echo $geh['pages'];?></td>
                                                                <td><? echo $geh['time'];?></td>
                                                                <td><? echo $geh['delete_by'];?></td></tr>
                                                                <?}}?>
                                                                </table>
                                                            </div>
                                                            <div class="col-xl-6">
                                                               <table class=" border border-warning shadow table-striped">
                                                                    <tr class="bg-warning"><th>Envelopes</th><th>Time</th><th>By</th></tr>
                                                                <?php $given_envelope_History= $this->User_model->given_envelope_History($ph['user_id']); 
                                                                if($given_envelope_History != NULL){ foreach($given_envelope_History as $geh) {?>
                                                                <tr><td><? echo $geh['envelopes'];?></td>
                                                                <td><? echo $geh['time'];?></td>
                                                                <td><? echo $geh['manager'];?></td></tr>
                                                                <?}}?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>   
                                            </table>
    </div>
</div>
<?php }} ?>