<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/kolkata");

class User extends CI_Controller {

	public function add_user( ){
        
                $this->User_model->add_user();
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
                
	}
	
		public function assign_page( ){
        
                $this->User_model->assign_page();
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
                
	        }
	       // public function assign_page() {
        //         $users=$this->User_model->assign_page($this->input->post('user_id'));
        //         $data = '';
        //         $data .= '<form class="form-horizontal form-label-left" method="post" action="user/assign_page">';
        //         $data .= '<div class="row" style="padding:10px 20px";>';
        //         $data .= '<div class="row form-group">';
        
        //         $data .= '<input type="hidden" name="user_id" value="' + id + '">';
                
        //         $data .= '<label>Assign pages </label>';
        //         $data .= '<input type="text" name="pages" class="form-control" required="required">';
                
        //         $data .= '</div>';
        //         $data .= '</div>';

        //         $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
        //         $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';

        //         $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Add</button>';
        //         $data .= '</div>';
                

        //         $data .= '</div>';
        //         $data .= '</form>';
        //         echo $data;
        // }

                public function assign_envs( ){
        
                        $this->User_model->assign_envs();
                        $referer = $_SERVER['HTTP_REFERER'];
                        header("Location: $referer");
                        
                        }

    
	public function edit_user() {
                $users=$this->User_model->show_user($this->input->post('user_id'));
                $data = '';
                $data .= '<form class="form-horizontal form-label-left" method="post" action="user/edit_user123">';
                $data .= '<input type="hidden" name="user_id" value="'.$this->input->post('user_id').'">';
                $data .= '<div class="row" style="padding:10px 20px";>';
                $data .= '<div class="row form-group">';
                // $data .= '<label>User Name</label>';
        
                // $data .= '<input type="text" name="user_name" class="form-control" value="'.$users['user_name'].'">';
                 $data .= '<select  name="user_name" class="form-control">';
        
                $data .= '<option value="admin.jpg"';
                if($users['user_name'] == 'admin.jpg') { $data .= 'selected'; }
                $data .= '> Admin </option>';
                $data .= '<option value="manager.png"';
                if($users['user_name'] == 'manager.png') { $data .= 'selected'; }
                $data .= '>Manager</option>';
                $data .= '<option value="nucleus.png"';
                if($users['user_name'] == 'nucleus.png') { $data .= 'selected'; }
                $data .= '>Nucleus</option>';
                $data .= '<option value="serum.png"';
                if($users['user_name'] == 'serum.png') { $data .= 'selected'; }
                $data .= '>Serum</option>';
                $data .= '<option value="veins.png"';
                if($users['user_name'] == 'veins.png') { $data .= 'selected'; }
                $data .= '>Veins</option>';
                $data .= '<option value="ldpl.jpeg"';
                if($users['user_name'] == 'ldpl.jpeg') { $data .= 'selected'; }
                $data .= '>LDPL</option>';
                $data .= '</select>';
                
                $data .= '<label>User Id</label>';
                $data .= '<input type="text" name="user_email" class="form-control" value="'.$users['user_email'].'">';
                
                $data .= '<label>Whatsapp Number</label>';
                $data .= '<input type="text" name="user_wa" class="form-control" value="'.$users['user_wa'].'">';

                $data .= '<label>User Password</label>';
                $data .= '<input type="text" name="user_password" class="form-control">';

                $data .= '<label>Note</label>';
                $data .= '<textarea name="note" class="form-control">'.$users['note'].'</textarea>';
                

                $data .= '<label> Type Of User</label>';


                $data .= '<select  name="user_type" class="form-control">';
        
                $data .= '<option value="Admin"';
                if($users['user_type'] == 'Admin') { $data .= 'selected'; }
                $data .= '> Admin </option>';
                $data .= '<option value="User"';
                if($users['user_type'] == 'User') { $data .= 'selected'; }
                $data .= '>User</option>';
                $data .= '<option value="Manager"';
                if($users['user_type'] == 'Manager') { $data .= 'selected'; }
                $data .= '>Manager</option>';
        
                $data .= '</select></td>';
        

                $data .= '</div>';
                $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
                $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
                $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
                $data .= '</div>';
                $data .= '</div>';
                $data .= '</form>';
                echo $data;
        }	



        public function edit_user123(){
                $this->User_model->edit_user();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }	

            
	public function del_user(){
                $this->User_model->del_user();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }
    
    public function userPermissionOn(){
                $this->User_model->userPermissionOn();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }
    
    public function userPermissionOff(){
                $this->User_model->userPermissionOff();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }

        public function del_envelope(){
                $this->User_model->del_envelope();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }
                public function del_file(){
                $this->User_model->del_file();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }
    public function sort_date(){
        
            $id = $this->input->post('user_id');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            // echo $id;
            $this->db->where('user_id',$id);
            $this->db->where('time >=', $start_date);
            $this->db->where('time <=', $end_date);
            return $this->db->get('envelope');
             $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }    
    
	public function add_envelope(){
        $file_name = $this->input->post('file_name');
		if (!is_dir('./wellness_file/'.$file_name)) {
			mkdir('./wellness_file/'.$file_name, 0777, TRUE);                    
		}

		
		$config['upload_path']      = './wellness_file/'.$file_name;
		$config['allowed_types']    = 'pdf';
		//$config['max_size']         = 15000;

		$this->load->library('upload', $config);		
		$file_name = NULL;
		if( $this->upload->do_upload('file_name')) {                    
			$data = $this->upload->data();
			$file_name =  $data['file_name'];
		} 
		$curdt = date('h:i:s a l\, F jS\, Y ');
                $data = array(
                        'user_id'=>$this->input->post('user_id'),
                        'manager'=>$this->input->post('manager'),
                        'file_name'=>$file_name,
                        'time'=>$curdt,
                        'envelope_used'=>"1"
                    );
                $this->User_model->add_envelope($data);	
                function count_pages($pdfname) {

                        $pdftext = file_get_contents($pdfname);
                        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
                      
                        return $num;
                      }
                      
                      $pdfname = './wellness_file/'.$file_name;
                      $pages = count_pages($pdfname);
                $curdate = date('h:i:s a l\, F jS\, Y ');
                $dat = array(
                        'user_id'=>$this->input->post('user_id'),
                        'time'=>$curdate,
                        'file_name'=>$file_name,
                        'page_used'=>$pages
                                        
                    );
                    $this->User_model->add_page_used($dat);	

                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
                
                $NonSyncFile=$this->User_model->show_file();
                if($NonSyncFile != NULL) { foreach($NonSyncFile as $nsf) {
                    
                    $users=$this->User_model->show_user();
                    if($users != NULL) { foreach($users as $usr) {
                        $fileName = $nsf['file_name'];
                        $userEmail   = $usr['user_email'];
                        if (strpos($fileName, $userEmail) !== false)
                        {
                            
                            $data = array( 'user_id' => $usr['user_id'],
                               'assign_status' => 1
                            );
                            $this->db->where('user_id',0);
                            $this->db->like('file_name',$userEmail);
                            $this->db->update('envelope',$data);	
                            
                           $data = array( 'user_id' => $usr['user_id'],
                                           'assign_status' => 1
                            );
                            $this->db->where('user_id',0);
                            $this->db->like('file_name',$userEmail);
                            $this->db->update('page',$data);
                        }
                    }}}}
        }
        
    public function add_file(){
                // $file_name = $this->input->post('file_name');
        
                $ff = $_FILES['file_name']['name'];
                $ft = $_FILES['file_name']['type'];
                $tmp_name = $_FILES['file_name']['tmp_name'];
                $uploads_dir = 'wellness_file/';
                
                if(is_array($ff)){ $k=1;
                    for($i=0;$i<count($ff);$i++){
                        if($ft[$i] == 'application/pdf'){
                            move_uploaded_file($tmp_name[$i], $uploads_dir.$ff[$i]);
                            $data = array(
                                        'file_name' => $ff[$i],
                                        'time' => date('h:i:s a l\, F jS\, Y '),
                                        'manager'=>$this->input->post('manager'),
                                        'envelope_used'=>"1"
                                    );
                                $this->User_model->add_file_envelope($data);
                               
                                    $pdf = file_get_contents($uploads_dir.$ff[$i]);
                                     $num = preg_match_all("/\/Page\W/", $pdf, $dummy);
                                    
                                      $dat = array(
                                            'time'=>date('h:i:s a l\, F jS\, Y '),
                                            'file_name'=>$ff[$i],
                                            'page_used'=>$num
                                                            
                                        );
                                        $this->User_model->add_page_used($dat);	
                                        $pdf = NULL;
                                        $num = 0;
                                // echo '<script>alert("'.$ff[$i].'-> File uploaded")</script>';
                                
                                
                        } else{echo '<script>alert("'.$ff[$i].' -> Rules violated -> Only .pdf files are allowed")</script>'; }
                        
                    }$k++;
                    // echo '<script type="text/javascript">alert("'.$k.'-> No of File Synced")</script>';
                    
                }
                
                $NonSyncFile=$this->User_model->show_file();
                if($NonSyncFile != NULL) { foreach($NonSyncFile as $nsf) {
                    
                    $users=$this->User_model->show_user();
                    if($users != NULL) { foreach($users as $usr) {
                        $fileName = $nsf['file_name'];
                        $userEmail   = $usr['user_email'];
                        if (strpos($fileName, $userEmail) !== false)
                        {
                            
                            $data = array( 'user_id' => $usr['user_id'],
                               'assign_status' => 1
                            );
                            $this->db->where('user_id',0);
                            $this->db->like('file_name',$userEmail);
                            $this->db->update('envelope',$data);	
                            
                           $data = array( 'user_id' => $usr['user_id'],
                                           'assign_status' => 1
                            );
                            $this->db->where('user_id',0);
                            $this->db->like('file_name',$userEmail);
                            $this->db->update('page',$data);
                        }
                    }}}}
                
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }
    
    public function dump(){
        $file_name = $this->input->post('uploadFiles');
		
		
    }
    
    public function file_assign(){
            $userEmail = $this->input->post('user_email');
            $fileName = $this->input->post('file_name');
            $userId = $this->input->post('user_id');
            
            $data = array( 'user_id' => $userId,
                           'assign_status' => 1
            );
            $this->db->where('user_id',0);
            $this->db->like('file_name',$userEmail);
            $this->db->update('envelope',$data);	
            
           $data = array( 'user_id' => $userId,
                           'assign_status' => 1
            );
            $this->db->where('user_id',0);
            $this->db->like('file_name',$userEmail);
            $this->db->update('page',$data);
                    
                    redirect('/dump');
            
        }
        




}