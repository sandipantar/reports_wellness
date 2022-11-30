<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	
    
    //show lc of consignee
	public function show_json_agent() {
        $search = $this->input->post('search');    
        // Get data
        $data = $this->Agent_model->search_agent($search);
        echo json_encode($data);
    }

    public function add_agent( ){
        $this->Agent_model->add_agent();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }	

    public function edit_agent() {
        $doctor=$this->Agent_model->show_agent($this->input->post('agent_id'));
        $data = '';
        $data .= '<form class="form-horizontal form-label-left" method="post" action="agent/edit_agent123">';
        $data .= '<div class="row" style="padding:10px 20px";>';
        $data .= '<div class="row form-group">';
        $data .= '<label>Agent Code</label>';
        $data .= '<input type="hidden" name="agent_id" value="'.$this->input->post('agent_id').'">';
        $data .= '<input type="text" name="agent_code" class="form-control" value="'.$doctor['agent_code'].'">';

        $data .= '</div>';
        $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
        $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
        $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</form>';
        echo $data;
}	

public function edit_agent123(){
        $this->Agent_model->edit_agent();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
}	

public function del_agent(){
        $this->Agent_model->del_agent();	
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
}	



}