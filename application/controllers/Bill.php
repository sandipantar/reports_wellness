<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

	public function add_bill() {

        if($this->input->post('agent_id') == NULL) {
            $a_id = $this->Agent_model->add_agent();	
        } else {
            $this->Agent_model->edit_agent($this->input->post('agent_id'));	
            $a_id = $this->input->post('agent_id');
        }

        if($this->input->post('lab_id') == NULL) {
            $l_id = $this->Lab_model->add_lab();	
        } else {
            $this->Lab_model->edit_lab($this->input->post('lab_id'));	
            $l_id = $this->input->post('lab_id');
        }

        if($this->input->post('sample_collected_id') == NULL) {
            $sc_id = $this->Collector_model->add_collector();	
        } else {
            $this->Collector_model->update_collector($this->input->post('sample_collected_id'));	
            $sc_id = $this->input->post('sample_collected_id');
        }


        if($this->input->post('patient_id') == NULL) {
            $p_id = $this->Patient_model->add_patient();	
        } else {
            $this->Patient_model->update_patient($this->input->post('patient_id'));	
            $p_id = $this->input->post('patient_id');
        }
        if($this->input->post('doctor_id') == NULL) {
            $d_id = $this->Doctor_model->add_doctor();	
        } else {
            $d_id = $this->input->post('doctor_id');
        }
        $input_price=$this->input->post('test_price');

        //to calculate the total here
        $total = 0;
        if(is_array($input_price)) {
            for($i=0;$i<count($input_price);$i++) {
                $total += $input_price[$i];
            }
        } else {
            if($input_price != NULL) {
                $total = $input_price;
            }
        }
        
        $col_charge = 0;
        if($this->input->post('collection_charge') != NULL) {
            $col_charge = $this->input->post('collection_charge');
        } 
        
        $discount = 0;
        if($this->input->post('discount') != NULL) {
            $discount = $this->input->post('discount');
        } 
        
        $total = ($total + $col_charge);
        $total = $total - ($total * $discount)/100;

        $bill_id = $this->Bill_model->add_bill( $a_id,$l_id,$p_id,$d_id,$sc_id,$total);

        $test_id = $this->input->post('tid');
        if(is_array($test_id)) {
            for($i=0;$i<count($test_id);$i++) {
                $this->Test_model->patient_tests( $bill_id,$test_id[$i],$input_price[$i]);
            }
        } else {
            if($test_id == NULL) return FALSE; else {
                $this->Test_model->patient_tests( $bill_id,$test_id,$input_price);
            }
        }

        redirect('final_bill/'.$bill_id);
	}	

	public function update_bill() {
        $bill_id = $this->input->post('bill_id');

        $this->Patient_model->update_patient($this->input->post('patient_id'));	
        $p_id = $this->input->post('patient_id');

        $this->Collector_model->update_collector($this->input->post('sample_collected_id'));	
        $sc_id = $this->input->post('sample_collected_id');

        $this->Agent_model->edit_agent($this->input->post('agent_id'));	
        $a_id = $this->input->post('agent_id');

        $this->Lab_model->edit_lab($this->input->post('lab_id'));	
        $l_id = $this->input->post('lab_id');

        $input_price=$this->input->post('test_price');

        //to calculate the total here
        $total = 0;
        if(is_array($input_price)) {
            for($i=0;$i<count($input_price);$i++) {
                $total += $input_price[$i];
            }
        } else {
            if($input_price != NULL) {
                $total = $input_price;
            }
        }
        
        $col_charge = 0;
        if($this->input->post('collection_charge') != NULL) {
            $col_charge = $this->input->post('collection_charge');
        } 
        
        $discount = 0;
        if($this->input->post('discount') != NULL) {
            $discount = $this->input->post('discount');
        } 
        
        $total = ($total + $col_charge);
        $total = $total - ($total * $discount)/100;
        
        $this->Bill_model->update_bill($a_id,$l_id,$p_id,$sc_id,$total);

        $test_id = $this->input->post('tid');
        if(is_array($test_id)) {
            for($i=0;$i<count($test_id);$i++) {
                $this->Test_model->patient_test_update( $bill_id,$test_id[$i],$input_price[$i]);
            }
        } else {
            if($test_id == NULL) return FALSE; else {
                $this->Test_model->patient_test_update( $bill_id,$test_id,$input_price);
            }
        }

        redirect('final_bill/'.$bill_id);
    }

    public function delete_bill(){

        
         $this->Bill_model->delete_bill();	
         $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
}


public function del_bill_test(){     
    $this->Test_model->del_bill_test();	
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    
}

  //show lc of consignee
  public function show_json_sample() {
    $search = $this->input->post('search');    
    // Get data
    $data = $this->Bill_model->search_sample($search);
    echo json_encode($data);
}
	
}