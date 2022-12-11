<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

    //show doctors
    public function show_tests($id='') {
        if($id != NULL) {
            $this->db->where('test_id',$id);
            $q = $this->db->get('tests');
            return $q->row_array();
        } else {
            $this->db->order_by('test_name','ASC');
            $q = $this->db->get('tests');
            return $q->result_array();
        }
    }   

    //add test
    public function add_test() {
        $data = array( 
            'test_name'     => $this->input->post('test_name')
            //'price'         => $this->input->post('price') 
        );
        $this->db->insert('tests',$data);
        return $this->db->insert_id();
    }
    
    //update test
    public function edit_test() {
        
        $id = $this->input->post('test_id');
        
        //updated data
        $data = array( 
            'test_name'     => $this->input->post('test_name'),
            'price'         => $this->input->post('price') 
        );
        
        $this->db->where('test_id',$id);
        return $this->db->update('tests',$data);
    }
    
    //delete tests
    public function del_test() {            
        $id = $this->input->post('test_id');
        
        $this->db->where('test_id',$id);
        return $this->db->delete('tests');
    } 

    //patient tests
    public function patient_tests($bill_id,$test_id,$price) {            
        $data = array( 
            'bill_id'   => $bill_id,
            'test_id'   => $test_id,
            'price'     => $price 
        );
        return $this->db->insert('patient_test',$data);
    }

    //patient test update
    public function patient_test_update($bill_id,$test_id,$price) {   
        
        $this->db->where('bill_id',$bill_id);
        $this->db->where('test_id',$test_id);
        //$this->db->from('patient_test',$data);  
        $q = $this->db->get('patient_test');
        $test_entry = $q->row_array(); 
        //$test_entry = $this->db->get()->row_array();

        if($test_entry != NULL) {
            $data1 = array( 
                'bill_id'   => $bill_id,
                'test_id'   => $test_id,
                'price'     => $price 
            );
            $this->db->where('pt_id',$test_entry['pt_id']);
            return $this->db->update('patient_test',$data1);
        } else {
            $data2 = array( 
                'bill_id'   => $bill_id,
                'test_id'   => $test_id,
                'price'     => $price 
            );
            return $this->db->insert('patient_test',$data2);
        }
        

        
    }

    //patient tests
    public function show_bill_tests($bill_id) {
        
        $this->db->select('patient_test.pt_id,patient_test.bill_id,patient_test.test_id,tests.test_name,patient_test.price');
        $this->db->from('patient_test');
        $this->db->join('tests','tests.test_id=patient_test.test_id', 'INNER');
        $this->db->where('patient_test.bill_id',$bill_id);
        return $this->db->get()->result_array();
    }

    
    public function del_bill_test() {
        $id = $this->input->post('pt_id');
        $this->db->where('pt_id',$id);
        return $this->db->delete('patient_test');
    }
}