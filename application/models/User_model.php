<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model {

        //show users
        public function show_user($id='') {
            if($id != NULL) {
                $this->db->where('user_id',$id);
                $q = $this->db->get('user');
                return $q->row_array();
            } else {
                $this->db->order_by('user_name','ASC');
                $q = $this->db->get('user');
                return $q->result_array();
            }
        }  
        

        //add users
        public function add_user() {
            
            //user data array
            $data = array(
                'user_name'      => $this->input->post('user_name'),
                'user_email'      => $this->input->post('user_email'),
                'user_password'   => md5($this->input->post('user_password')),
                'user_type'      => $this->input->post('user_type')
            );

            
            //insert
            $this->db->insert('user',$data);
            return $this->db->insert_id();
        }
        //  //add pages
        // public function assign_page() {
            
        //     //user data array
        //     $data = array(
        //         'pages'      => $this->input->post('pages')
        //     );

            
        //     //insert
        //     $this->db->insert('user_assets',$data);
        //     return $this->db->insert_id();
        // }

        //update user
        public function edit_user() {
            
            $id = $this->input->post('user_id');
            $a = md5($this->input->post('user_password')) ;
            if (!empty($a)) {
                
            
            //user updated data
            $data = array( 'user_name' => $this->input->post('user_name') ,
                            'user_email' => $this->input->post('user_email'),
                            'user_password' =>  $a,
                            'user_type' => $this->input->post('user_type')
        );
            
            $this->db->where('user_id',$id);
            return $this->db->update('user',$data);


        } 

    }
        
        //update user

         //update user
         public function del_user() {
            
            $id = $this->input->post('user_id');
            
            $this->db->where('user_id',$id);
            return $this->db->delete('user');
        }

    }