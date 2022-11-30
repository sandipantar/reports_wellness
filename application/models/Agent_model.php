<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Agent_model extends CI_Model {

          //show patients
        public function show_agent($id='') {
            if($id != NULL) {
                $this->db->where('agent_id',$id);
                $q = $this->db->get('agent');
                return $q->row_array();
            } else {
                $this->db->order_by('agent_code','ASC');
                $q = $this->db->get('agent');
                return $q->result_array();
            }
        }   

        //add patient
        public function add_agent() {
            
            //user data array
            $data = array(
                'agent_code'  => $this->input->post('agent_code')
            );
            //insert
            $this->db->insert('agent',$data);
            return $this->db->insert_id();
        } 

        
        
        //update doctor
        public function del_agent() {
            $id = $this->input->post('agent_id');
            $this->db->where('agent_id',$id);
            return $this->db->delete('agent');
        }

        //update patient
        public function edit_agent() {
            $id = $this->input->post('agent_id');
            //user data array
            $data = array(
                'agent_code'  => $this->input->post('agent_code')
            );
            //update
            $this->db->where('agent_id',$id);
            return $this->db->update('agent',$data);
        }

        //search patient from db
        public function search_agent($search) {
            $response = array();
    
            // Select record	
            $this->db->select('agent_id,agent_code');
            $this->db->from('agent');  
            $this->db->where("agent_code LIKE '%".$search."%' ");
            $records = $this->db->get()->result();
    
            foreach($records as $row ){
                $response[] = array(
                    "value"     =>$row->agent_id,
                    "label"     =>$row->agent_code,
                    
                );
            }
    
            return $response;
        }
    }