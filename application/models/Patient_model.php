<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Patient_model extends CI_Model {

        //show patients
        public function show_patients($id='') {
            if($id != NULL) {
                $this->db->where('patient_id',$id);
                $q = $this->db->get('patients');
                return $q->row_array();
            } else {
                $this->db->order_by('patient_name','ASC');
                $q = $this->db->get('patients');
                return $q->result_array();
            }
        }   

        //add patient
        public function add_patient() {
            
            //user data array
            $data = array(
                'patient_name'  => $this->input->post('patient_name'),
                'year'          => $this->input->post('year'),
                'month'         => $this->input->post('month'),
                'day'           => $this->input->post('day'),
                'patient_sex'   => $this->input->post('patient_sex'),
                'patient_phone' => $this->input->post('patient_phone')
            );
            //insert
            $this->db->insert('patients',$data);
            return $this->db->insert_id();
        } 

        //update patient
        public function update_patient($patient_id) {
            
            //user data array
            $data = array(
                'patient_name'  => $this->input->post('patient_name'),
                'year'          => $this->input->post('year'),
                'month'         => $this->input->post('month'),
                'day'           => $this->input->post('day'),
                'patient_sex'   => $this->input->post('patient_sex'),
                'patient_phone' => $this->input->post('patient_phone')
            );
            //update
            $this->db->where('patient_id',$patient_id);
            return $this->db->update('patients',$data);
        }

        //search patient from db
        public function search_patient($search) {
            $response = array();
    
            // Select record	
            $this->db->select('patient_id,patient_name,year,month,day,patient_sex,patient_phone');
            $this->db->from('patients');  
            $this->db->where("patient_name LIKE '%".$search."%' ");
            $records = $this->db->get()->result();
    
            foreach($records as $row ){
                $response[] = array(
                    "value"     =>$row->patient_id,
                    "label"     =>$row->patient_name,
                    "year"      =>$row->year,
                    "month"     =>$row->month,
                    "day"       =>$row->day,
                    "p_sex"     =>$row->patient_sex,
                    "p_phn"     =>$row->patient_phone
                );
            }
    
            return $response;
        }
    }