<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
?>
<div class="container-fluid bg-white pt-2">
    <div id="syncUploadHistory">
        <h2 class="my-2 bg-info p-1 rounded text-center shadow text-white pb-2 font-weight-bold shadow" style="text-shadow:1px 1px 10px #000">User Login History</h2>
        <table  id="show_doctors" class="table table-bordered table-striped display">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Login Details</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $userLogin=$this->Page_model->show_lastlogin();
                                                    if($userLogin != NULL){ foreach($userLogin as $ph) {?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>userDetails/<?php echo $ph['user_id'];?>" class="btn btn-sm btn-primary">
                                                            <?php 
                                                                $ShowPage=$this->User_model->show_user($ph['user_id']);  
                                                                 echo $ShowPage['user_email'];
                                                            ?>
                                                            <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo $ph['last_login']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>   
                                            </table>
    </div>
</div>
<?php }} ?>