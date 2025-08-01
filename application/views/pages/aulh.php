<?php if(!$this->session->userdata('logged_in')) {
    redirect('home');
} else { 
    $this->load->view('all_modals'); 
    if($this->session->userdata('type') == 'Admin' || $this->session->userdata('type') == 'Manager') {
        $uDate=date('Y-m-d');
        $fDate=date('Y-m-d');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['udate'])){
                $uDate= $_POST['udate'];
                $fDate= $_POST['fdate'];
            }
?>
<div class="container-fluid bg-white pt-2">
    <div class="row py-2 d-flex justify-content-center">
            <form method="POST" action="">
                            &emsp; <b>FROM</b> &emsp;
                            <input type="date" name="fdate" value="<?php echo $fDate; ?>"/>
                            &emsp; <b>TO</b> &emsp;
                            <input type="date" name="udate" value="<?php echo $uDate; ?>"/>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
        </div>
    <div id="syncUploadHistory">
        <h2 class="my-2 bg-info p-1 rounded text-center shadow text-white pb-2 font-weight-bold shadow" style="text-shadow:1px 1px 10px #000">User Login History
        <span class="badge badge-dark shadow">FROM : <span class="badge badge-pill badge-primary"><?php $date=date_create($fDate); echo date_format($date,"d-M-Y"); ?></span> TO : <span class="badge badge-pill badge-primary"><?php $date=date_create($uDate); echo date_format($date,"d-M-Y"); ?></span></span>
        </h2>
        <table  id="show_doctors" class="table table-bordered table-striped display">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Login Details</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $userLogin=$this->Page_model->show_lastlogin_from_to($fDate,$uDate);
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