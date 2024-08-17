<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
?>
<div class="container-fluid bg-white pt-2">
    <div id="syncUploadHistory">
        <h2 class="my-2 bg-warning p-1 rounded text-center shadow text-white">Urgent Files Upload History</h2>
        <!--<div class="col-lg-12">-->
        <!--          <input type="text" id="tabsearch" placeholder="Search Box" class="shadow w-25 rounded p-1 my-2">-->
        <!--      </div>-->
        <table  id="show_doctors" class="table table-bordered display table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Assigned File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th style="width:20% !important"> User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $urgentUpload=$this->User_model->urgent_upload();
                                                    if($urgentUpload != NULL){ foreach($urgentUpload as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['manager']; ?></td>
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