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
        
    public function show_page($id='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            $this->db->order_by('pages','ASC');
            $q = $this->db->get('page');
            return $q->result_array();
        } else {
            $this->db->order_by('pages','ASC');
            $q = $this->db->get('page');
            return $q->result_array();
        }
    } 

    public function show_envelope($id='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            $this->db->order_by('envelopes','ASC');
            $q = $this->db->get('envelope');
            return $q->result_array();
        } else {
            $this->db->order_by('envelopes','ASC');
            $q = $this->db->get('envelope');
            return $q->result_array();
        }
    } 

         //update user
         public function del_user() {
            
            $id = $this->input->post('user_id');
            
            $this->db->where('user_id',$id);
            return $this->db->delete('user');
        }

        public function del_envelope() {
            
           
        
        $id = $this->input->post('envelope_id');
        $user_id = $this->input->post('user_id');
        $this->db->where('envelope_id',$id);
        $a = $this->db->get('envelope');
         $q=$a->row_array();
         $this->db->where('envelope_id',$id);
         $this->db->delete('envelope');

         function count_pages($pdfname) {

            $pdftext = file_get_contents($pdfname);
            $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
          
            return $num;
          }
        $a = $q['file_name'];
          $pdfname = './wellness_file/'.$a;
          $pages = count_pages($pdfname);
          
        //   $path = $_SERVER['DOCUMENT_ROOT'].'items/item2.txt';
        //   echo $pages;
         $data = array(
            'user_id'=>$this->input->post('user_id'),
            
            'page_used'=> -$pages
            
                            
        );
        unlink($pdfname);
        $this->db->insert('page',$data);
        return $this->db->insert_id();
    
        }
       
            //add pages
            public function assign_page() {
                $id = $this->input->post('user_id');
                //user data array
                $data = array(
                    'user_id'=>$id,
                    'pages'      => $this->input->post('pages')
                );
    
            $this->db->insert('page',$data);
            return $this->db->insert_id();
            }
    
            public function assign_envs() {
                $id = $this->input->post('user_id');
                //user data array
                $data = array(
                    'user_id'=>$id,
                    'envelopes'      => $this->input->post('envelopes')
                );
    
                
                //insert
                $this->db->insert('envelope',$data);
            return $this->db->insert_id();
            }
            
            public function add_envelope($data) {
            
                $this->db->insert('envelope',$data);
            return $this->db->insert_id();
            }
            
             public function add_page_used($data) {
            
                $this->db->insert('page',$data);
            return $this->db->insert_id();
            }

    }