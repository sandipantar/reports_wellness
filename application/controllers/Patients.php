<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

	public function add_doctor( ){
        $this->Doctor_model->add_doctor();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }	
    
    //show lc of consignee
	public function show_json_ptnt() {
        $search = $this->input->post('search');    
        // Get data
        $data = $this->Patient_model->search_patient($search);
        echo json_encode($data);
    }

}
