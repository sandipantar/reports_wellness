<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends CI_Controller {

          //show lc of consignee
	public function show_json_lab() {
                $search = $this->input->post('search');    
                // Get data
                $data = $this->Lab_model->search_lab($search);
                echo json_encode($data);
            }

	public function add_lab( ){

                
		//  $lab_name = $this->input->post('lab_name');

		
		// if (!is_dir('./assets/images/lab/'.$lab_name)) {
		// 	mkdir('./assets/images/lab/'.$lab_name, 0777, TRUE);                    
		// }
        
		
		// $config['upload_path']      = './assets/images/lab/'.$lab_name;
		// $config['allowed_types']    = 'gif|jpg|jpeg|png';
		// // $config['max_size']         = 1000;

		// $this->load->library('upload', $config);		
		// $file_name = NULL;
		// if( $this->upload->do_upload('lab_picture')) {                    
		// 	$data = $this->upload->data();
		// 	$file_name =  $data['file_name'];
		// } 

                //         $data_qb= array(
                //                 'lab_picture'	=> $file_name,
                                
                //                 'lab_name'      => $this->input->post('lab_name')
                                                
                //         );
        
                        $this->Lab_model->add_lab();
        
                        
                        $referer = $_SERVER['HTTP_REFERER'];
                        header("Location: $referer");
                
		
	}	

	public function edit_lab( ) {
                $lab=$this->Lab_model->show_lab($this->input->post('lab_id'));
                $data = '';
                $data .= '<form class="form-horizontal form-label-left" method="post" action="lab/edit_lab123">';
                $data .= '<div class="row" style="padding:10px 20px";>';
                $data .= '<div class="row form-group">';
                $data .= '<label>Lab Name</label>';
                $data .= '<input type="hidden" name="lab_id" value="'.$this->input->post('lab_id').'">';
                $data .= '<input type="text" name="lab_name" class="form-control" value="'.$lab['lab_name'].'">';
                $data .= '</div>';
              
                $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
                $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
                $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
                $data .= '</div>';
                $data .= '</div>';
                $data .= '</form>';
                echo $data;
	}	

	public function edit_lab123( ){
                $this->Lab_model->edit_lab();
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}	

	public function del_lab( ){
                $this->Lab_model->del_lab();
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}	
	
}