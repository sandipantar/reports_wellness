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
        <h2 class="my-2 bg-success p-1 rounded text-center shadow text-white">Sync Files Upload History
        <span class="badge badge-dark shadow">FROM : <span class="badge badge-pill badge-primary"><?php $date=date_create($fDate); echo date_format($date,"d-M-Y"); ?></span> TO : <span class="badge badge-pill badge-primary"><?php $date=date_create($uDate); echo date_format($date,"d-M-Y"); ?></span></span>
        </h2>
        <!--<div class="col-lg-12">-->
        <!--          <input type="text" id="tabsearch" placeholder="Search Box" class="shadow w-25 rounded p-1 my-2">-->
        <!--      </div>-->
        <table  id="show_doctors" class="table table-bordered display table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Assigned File</th>
                                                        <th>Time</th>
                                                        <th>By</th>
                                                        <th>Matched User</th>
                            
                                                    </tr>
                                                </thead>	
                                                <tbody>
                                                    <?php
                                                    $ShowPage=$this->User_model->assigned_Files($fDate,$uDate);
                                                    if($ShowPage != NULL){ foreach($ShowPage as $ph) {?>
                                                    <tr>
                                                        <td>
                                                             <a target="_blank" href="<?=base_url()?>wellness_file/<?php echo $ph['file_name']; ?>" >
                                                                <?php echo $ph['file_name']; ?> <i class="fa fa-download"></i>
                                                             </a>
                                                        </td>
                                                        <td ><?php echo $ph['time']; ?></td>
                                                        <td><?php echo $ph['manager']; ?></td>
                                                        <td>
                                                             <?php $users=$this->User_model->show_user();
                                                            if($users != NULL) { foreach($users as $usr) {
                                                            $fileName = $ph['file_name'];
                                                            $userEmail   = $usr['user_email'];
                                                            if (strpos($fileName, $userEmail) !== false) {
                                                            echo $usr['user_email']; }}}?>
                                                        </td>
                                                    </tr>
                                                    <?php }}?>
                                                </tbody>  
                                            </table>
    </div>
</div>
<?php }} ?>