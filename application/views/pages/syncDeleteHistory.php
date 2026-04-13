<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
?>
<div class="container-fluid bg-white pt-2">
    <div id="syncUploadHistory">
        <h2 class="my-2 bg-primary p-1 rounded text-center shadow text-white">Sync Files Delete History</h2>
        <!--<div class="col-lg-12">-->
        <!--          <input type="text" id="tabsearch" placeholder="Search Box" class="shadow w-25 rounded p-1 my-2">-->
        <!--      </div>-->
        <table  id="show_doctors" class="table table-bordered display table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Deleted File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th> User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                   <?php
                                                    $sync_delete=$this->User_model->sync_delete();
                                                    if($sync_delete != NULL){ foreach($sync_delete as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?><?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['delete_by']; ?></td>
                                                        <td>
                                                             <?php $users=$this->User_model->show_user($ph['user_id']); echo $users['user_email'];?>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>
                                            </table>
    </div>
</div>
<?php }} ?>