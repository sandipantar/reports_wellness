<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Doctor_model extends CI_Model {

        //show doctors
        public function show_doctor($id='') {
            if($id != NULL) {
                $this->db->where('doctor_id',$id);
                $q = $this->db->get('doctors');
                return $q->row_array();
            } else {
                $this->db->order_by('doctor_name','ASC');
                $q = $this->db->get('doctors');
                return $q->result_array();
            }
        }  
        public function search_doctor_name($name) {
            $this->db->where('doctor_name',$name);
            $q = $this->db->get('doctors');
            return $q->row_array();
        }    

        //add doctor
        public function add_doctor() {
            
            //user data array
            $data = array(
                'doctor_name'      => $this->input->post('doctor_name')
            );
            //insert
            $this->db->insert('doctors',$data);
            return $this->db->insert_id();
        }
        
        //update doctor
        public function edit_doctor() {
            
            $id = $this->input->post('doctor_id');
            
            //people updated data
            $data = array( 'doctor_name' => $this->input->post('doctor_name') );
            
            $this->db->where('doctor_id',$id);
            return $this->db->update('doctors',$data);
        }
        
        //update doctor
        public function del_doctor() {
            
            $id = $this->input->post('doctor_id');
            
            $this->db->where('doctor_id',$id);
            return $this->db->delete('doctors');
        }

        //search doctor
        public function search_doc($search) {
            $response = array();
    
            // Select record	
            $this->db->select('doctor_id,doctor_name');
            $this->db->from('doctors');  
            $this->db->where("doctor_name LIKE '%".$search."%' ");
            $records = $this->db->get()->result();
    
            foreach($records as $row ){
                $response[] = array(
                    "value"     =>$row->doctor_id,
                    "label"     =>$row->doctor_name
                );
            }
    
            return $response;
        }
    }