<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Collector_model extends CI_Model {

        //show patients
        public function show_collectors($id='') {
            if($id != NULL) {
                $this->db->where('sample_collected_id',$id);
                $q = $this->db->get('sample_collector');
                return $q->row_array();
            } else {
                $this->db->order_by('sample_collected_name','ASC');
                $q = $this->db->get('sample_collector');
                return $q->result_array();
            }
        }   

        //add patient
        public function add_collector() {
            
            //user data array
            $data = array(
                'sample_collected_name'  => $this->input->post('sample_collected_name'),
                'sample_address'         => $this->input->post('sample_address'),
                'sample_contact'         => $this->input->post('sample_contact')
            );
            //insert
            $this->db->insert('sample_collector',$data);
            return $this->db->insert_id();
        } 

           //update doctor
           public function edit_collector() {
            
            $id = $this->input->post('sample_collected_id');
            
            $data = array(
                'sample_collected_name'  => $this->input->post('sample_collected_name'),
                'sample_address'          => $this->input->post('sample_address'),
                'sample_contact'         => $this->input->post('sample_contact')
            );
            
            $this->db->where('sample_collected_id',$id);
            return $this->db->update('sample_collector',$data);
        }
        
        //update doctor
        public function del_collector() {
            $id = $this->input->post('sample_collected_id');
            $this->db->where('sample_collected_id',$id);
            return $this->db->delete('sample_collector');
        }

        //update patient
        public function update_collector($sample_collected_id) {
            
            //user data array
            $data = array(
                'sample_collected_name'  => $this->input->post('sample_collected_name'),
                'sample_address'          => $this->input->post('sample_address'),
                'sample_contact'         => $this->input->post('sample_contact')
            );
            //update
            $this->db->where('sample_collected_id',$sample_collected_id);
            return $this->db->update('sample_collector',$data);
        }

        //search patient from db
        public function search_collector($search) {
            $response = array();
    
            // Select record	
            $this->db->select('sample_collected_id,sample_collected_name,sample_address,sample_contact');
            $this->db->from('sample_collector');  
            $this->db->where("sample_collected_name LIKE '%".$search."%' ");
            $records = $this->db->get()->result();
    
            foreach($records as $row ){
                $response[] = array(
                    "value"     =>$row->sample_collected_id,
                    "label"     =>$row->sample_collected_name,
                    "sample_address"      =>$row->sample_address,
                    "sample_contact"     =>$row->sample_contact,
                  
                );
            }
    
            return $response;
        }
    }