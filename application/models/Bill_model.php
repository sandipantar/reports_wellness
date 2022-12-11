<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Bill_model extends CI_Model {

        //show doctors
        public function last_bill($id='') {
            $this->db->order_by('bill_id',"desc");
            $this->db->limit(1);
            $q = $this->db->get('billing');
            return $q->row_array();
        }

        //add bill
        public function add_bill( $a_id,$l_id,$p_id,$d_id,$sc_id,$total) {

            //user data array
            $data = array(
                'registration'      => $this->input->post('registration'),
                'bill_date'         => $this->input->post('bill_date'),
                'sample_collected_id'=>$sc_id,
                'patient_id'        => $p_id,
                'doctor_id'         => $d_id,
                'lab_id'            =>$l_id,
                'agent_id'          => $a_id,
                'sample_source'          =>$this->input->post('sample_source'),
                'amount_collected'  =>$this->input->post('amount_collected_name'),
                 'status'          => $this->input->post('status'),
                // 'lab_image_id'      => $this->input->post('lab_image_id'),
                'collection_charge' => $this->input->post('collection_charge'),
                'discount'          => $this->input->post('discount'),
                'total_amount'      => $total
            );
            //insert
            $this->db->insert('billing',$data);
            return $this->db->insert_id();
        }

        //update bill
        public function update_bill($a_id,$l_id,$p_id,$sc_id,$total) {

            $bill_id = $this->input->post('bill_id');
            //user data array
            $data = array(
               

                'registration'      => $this->input->post('registration'),
                'bill_date'         => $this->input->post('bill_date'),
                'lab_id'            =>$l_id,
                'agent_id'          => $a_id,
                'patient_id'        => $p_id,
                'sample_collected_id'=>$sc_id,
                'doctor_id'         => $this->input->post('doctor_id'),
                'lab_id'            => $this->input->post('lab_id'),
                'agent_id'          => $this->input->post('agent_id'),
                'sample_source'     =>$this->input->post('sample_source'),
                'amount_collected'  =>$this->input->post('amount_collected_name'),
                 'status'          => $this->input->post('status'),
                // 'lab_image_id'      => $this->input->post('lab_image_id'),
                'collection_charge' => $this->input->post('collection_charge'),
                'discount'          => $this->input->post('discount'),
                'total_amount'      => $total
            );
            //update
            $this->db->where('bill_id',$bill_id);
            return $this->db->update('billing',$data);
        }

        //show old bill
        public function old_bills($id='') {
            if($id != NULL) {
                $this->db->order_by('billing.date','DESC');
                $this->db->select('billing.registration,billing.bill_date,billing.patient_id,billing.doctor_id,
                billing.collection_charge,billing.discount,billing.total_amount,billing.sample_source,billing.status,billing.amount_collected,patients.patient_name,doctors.doctor_name,
                billing.date,billing.bill_id,lab.lab_id,lab.lab_name,agent.agent_id,agent.agent_code,billing.sample_collected_id,
                sample_collector.sample_collected_name,sample_collector.sample_address,sample_collector.sample_contact');
                $this->db->from('billing');
                $this->db->join('patients','patients.patient_id=billing.patient_id', 'INNER');
                $this->db->join('doctors','doctors.doctor_id=billing.doctor_id', 'INNER');
                $this->db->join('lab','lab.lab_id=billing.lab_id', 'LEFT');
                $this->db->join('agent','agent.agent_id=billing.agent_id', 'LEFT');
                
                $this->db->join('sample_collector','sample_collector.sample_collected_id=billing.sample_collected_id', 'LEFT');
                $this->db->where('bill_id',$id);
                return $this->db->get()->row_array();
            } else {
                $this->db->order_by('billing.date','DESC');
                $this->db->select('billing.registration,billing.bill_date,billing.patient_id,billing.doctor_id,
                billing.collection_charge,billing.discount,billing.total_amount,billing.sample_source,billing.status,billing.amount_collected,patients.patient_name,doctors.doctor_name,
                billing.date,billing.bill_id,lab.lab_name,agent.agent_code,billing.sample_collected_id,sample_collector.sample_collected_name,sample_collector.sample_address,sample_collector.sample_contact');
                $this->db->from('billing');
                $this->db->join('patients','patients.patient_id=billing.patient_id', 'INNER');
                $this->db->join('doctors','doctors.doctor_id=billing.doctor_id', 'INNER');
                $this->db->join('lab','lab.lab_id=billing.lab_id', 'LEFT');
                $this->db->join('agent','agent.agent_id=billing.agent_id', 'LEFT');
                $this->db->join('sample_collector','sample_collector.sample_collected_id=billing.sample_collected_id', 'LEFT');

                return $this->db->get()->result_array();
            }
        }  
        
        public function delete_bill(){   
        
        $this->db->from('billing');
        $this->db->join('patients','patients.patient_id=billing.patient_id', 'INNER');
        $this->db->join('doctors','doctors.doctor_id=billing.doctor_id', 'INNER');
        $this->db->join('lab','lab.lab_id=billing.lab_image_id', 'LEFT');
        $id = $this->input->post('bill_id');
        $this->db->where('bill_id',$id);
        return $this->db->delete('billing');
        }

            //search patient from db
        public function search_sample($search) {
            $response = array();
    
            // Select record	
            $this->db->select('sample_source');
            $this->db->from('billing');  
            $this->db->where("sample_source LIKE '%".$search."%' ");
            $records = $this->db->get()->result();
    
            foreach($records as $row ){
                $response[] = array(
                    "value"     =>$row->sample_source,
                    "label"     =>$row->sample_source,
                    
                );
            }
    
            return $response;
        }  
    }