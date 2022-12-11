<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

        


	public function add_doctor( ){

        

                
                        
                        $this->Doctor_model->add_doctor();

                        $referer = $_SERVER['HTTP_REFERER'];

                        header("Location: $referer");
	        
   
                 }



        // public function addDocHome( ){
        //         $this->Doctor_model->add_doctor();
        //         $html = '<option disabled selected>Select Doctor</option>';
        //         $doctors = $this->Doctor_model->show_doctor();
        //         if($doctors != NULL) { foreach($doctors as $doc) {
        //                 $html .= '<option value="'.$doc['doctor_id'].'">'.$doc['doctor_name'].'</option>';
        //         }}
        //         echo json_encode($html);
	// }	

	public function edit_doctor( ) {
                $doctor=$this->Doctor_model->show_doctor($this->input->post('doctor_id'));
                $data = '';
                $data .= '<form class="form-horizontal form-label-left" method="post" action="doctor/edit_doctor123">';
                $data .= '<div class="row" style="padding:10px 20px";>';
                $data .= '<div class="row form-group">';
                $data .= '<label>Doctor Name</label>';
                $data .= '<input type="hidden" name="doctor_id" value="'.$this->input->post('doctor_id').'">';
                $data .= '<input type="text" name="doctor_name" class="form-control" value="'.$doctor['doctor_name'].'">';
                $data .= '</div>';
                $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
                $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
                $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
                $data .= '</div>';
                $data .= '</div>';
                $data .= '</form>';
                echo $data;
	}	

	public function edit_doctor123( ){
                $this->Doctor_model->edit_doctor();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}	

	public function del_doctor( ){
                $this->Doctor_model->del_doctor();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}	

	public function show_doc_json( ){
                $data = $this->Doctor_model->show_doctor();	
		echo json_encode($data);
        }
        
	public function show_json_doc() {
        $search = $this->input->post('search');    
        // Get data
        $data = $this->Doctor_model->search_doc($search);
        echo json_encode($data);
    }	
	
}