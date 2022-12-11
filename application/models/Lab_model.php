<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Lab_model extends CI_Model {

         //search patient from db
         public function search_lab($search) {
            $response = array();
    
            // Select record	
            $this->db->select('lab_id,lab_name');
            $this->db->from('lab');  
            $this->db->where("lab_name LIKE '%".$search."%' ");
            $records = $this->db->get()->result();
    
            foreach($records as $row ){
                $response[] = array(
                    "value"     =>$row->lab_id,
                    "label"     =>$row->lab_name,
                  
                );
            }
    
            return $response;
        }

        //show doctors
        public function show_lab($id='') {
            if($id != NULL) {
                $this->db->where('lab_id',$id);
                $q = $this->db->get('lab');
                return $q->row_array();
            } else {
                $this->db->order_by('lab_name','ASC');
                $q = $this->db->get('lab');
                return $q->result_array();
            }
        }   

        //add doctor
        public function add_lab() { 
            $data= array(
              'lab_name'  => $this->input->post('lab_name')
                                                
                       );
            $this->db->insert("lab",$data);

            return $this->db->insert_id();
        }
        
        //update doctor
        public function edit_lab() {
            
            $id = $this->input->post('lab_id');
            
            //people updated data
            $data = array( 
                'lab_name'      => $this->input->post('lab_name')
            );
            
            $this->db->where('lab_id',$id);
            return $this->db->update('lab',$data);
        }
        
        //update doctor
        public function del_lab() {
            
            $id = $this->input->post('lab_id');
            
            $this->db->where('lab_id',$id);
            return $this->db->delete('lab');
        }
    }