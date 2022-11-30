<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collectors extends CI_Controller {

	public function add_collector( ){
        $this->Collector_model->add_collector();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }	
    
    //show lc of consignee
	public function show_json_collector() {
        $search = $this->input->post('search');    
        // Get data
        $data = $this->Collector_model->search_collector($search);
        echo json_encode($data);
    }


    public function edit_collector() {
        $doctor=$this->Collector_model->show_collectors($this->input->post('sample_collected_id'));
        $data = '';
        $data .= '<form class="form-horizontal form-label-left" method="post" action="collectors/edit_collector123">';
        $data .= '<div class="row" style="padding:10px 20px";>';
        $data .= '<div class="row form-group">';
        $data .= '<label>Collector Name</label>';
        $data .= '<input type="hidden" name="sample_collected_id" value="'.$this->input->post('sample_collected_id').'">';
        $data .= '<input type="text" name="sample_collected_name" class="form-control" value="'.$doctor['sample_collected_name'].'">';
        
        $data .= '<label>Address</label>';;
        $data .= '<input type="text" name="sample_address" class="form-control" value="'.$doctor['sample_address'].'">';

        
        $data .= '<label>Contact</label>';
        $data .= '<input type="text" name="sample_contact" class="form-control" value="'.$doctor['sample_contact'].'">';

        $data .= '</div>';
        $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
        $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
        $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</form>';
        echo $data;
}	

public function edit_collector123(){
        $this->Collector_model->edit_collector();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
}	

public function del_collector(){
        $this->Collector_model->del_collector();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
}	


}