<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
                $data .= '<label>User Name</label>';
        
                $data .= '<input type="text" name="user_name" class="form-control" value="'.$users['user_name'].'">';
                $data .= '<label>User Email</label>';
                $data .= '<input type="text" name="user_email" class="form-control" value="'.$users['user_email'].'">';

                $data .= '<label>User Password</label>';
                $data .= '<input type="text" name="user_password" class="form-control">';

                $data .= '<label>Note</label>';
                $data .= '<input type="text" name="note" class="form-control" value="'.$users['note'].'">';

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

        public function del_envelope(){
                $this->User_model->del_envelope();	
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
                $data = array(
                        'user_id'=>$this->input->post('user_id'),
                        'manager'=>$this->input->post('manager'),
                        'file_name'=>$file_name,
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
                      
                    //   echo $pages;
                        
                      
              
                // return $num;
                $dat = array(
                        'user_id'=>$this->input->post('user_id'),
                        'page_used'=>$pages
                                        
                    );
                    $this->User_model->add_page_used($dat);	

                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
        }


}