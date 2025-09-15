<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/kolkata");

    class User_model extends CI_Model {

        //show users
        public function show_user($id='') {
            if($id != NULL) {
                $this->db->where('user_id',$id);
                $q = $this->db->get('user');
                return $q->row_array();
            } else {
                $this->db->order_by('user_email','ASC');
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
                'user_type'      => $this->input->post('user_type'),
                'note'          => $this->input->post('note'),
                'billLog'          => $this->input->post('user_bill'),
                'passkey'          => $this->input->post('passkey'),
                'u_status'         => 1
            );
            //insert
            $this->db->insert('user',$data);
            return $this->db->insert_id();
            $error=$this->db->error();
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
                            'note' => $this->input->post('note'),
                            'billLog' => $this->input->post('billLog'),
                            'passkey' => $this->input->post('passkey'),
                            'user_type' => $this->input->post('user_type')
        );
            
            $this->db->where('user_id',$id);
            return $this->db->update('user',$data);


        } 

    }
    //user permission change
    public function userPermissionOn() {
            
            $id = $this->input->post('user_id');
            // $a = md5($this->input->post('user_password')) ;
            // if (!empty($a)) {
                
            
            //user updated data
            $data = array( 'u_status' => 1  );
            
            $this->db->where('user_id',$id);
            return $this->db->update('user',$data);


        // } 

    }
    
    public function userPermissionOff() {
            
            $id = $this->input->post('user_id');
            // $a = md5($this->input->post('user_password')) ;
            // if (!empty($a)) {
                
            
            //user updated dat
             $data = array( 'u_status' => 0  );
            
            $this->db->where('user_id',$id);
            return $this->db->update('user',$data);


        // } 

    }
    
    
        
    public function show_page($id='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            $this->db->order_by('page_id','DESC');
            $q = $this->db->get('page');
            return $q->result_array();
        } else {
            $this->db->order_by('pages','DESC');
            $q = $this->db->get('page');
            return $q->result_array();
        }
    } 
     
    //     public function given_History($id='') {
    //         $this->db->order_by('envelope.envelope_id','DESC');
    //         $this->db->select('envelope.envelopes, envelope.manager, envelope.user_id, page.pages, page.delete_by, page.time as pTime, envelope.time as eTime');
    //         $this->db->from('envelope');
    //         $this->db->join('page','page.user_id=envelope.user_id');
    //         $this->db->where('envelope.envelopes !=',"");
    //         $this->db->where('page.pages !=',"");
    //         $this->db->distinct();
    //         return $this->db->get()->result_array();
    // }       
    public function todaySyncHistrory($id='') {
            $curdt = date('l\, F jS\, Y ');
            $this->db->where('UrgentReports',"0");
            $this->db->where('file_name !=',"");
            $this->db->like('time',$curdt);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
    }
     public function given_envelope_History($id='') {
            $this->db->where('envelopes !=',"");
            $this->db->where('user_id',$id);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
     }
     public function given_page_History($id='') {
            $this->db->where('pages !=',"");
            $this->db->where('user_id',$id);
            $this->db->order_by('page_id','DESC');
            $q = $this->db->get('page');
            return $q->result_array();
     }
    public function assigned_Files($fdt='',$tdt='') {
            $this->db->where('assign_status',"1");
            $this->db->where('date >=', $fdt);
            $this->db->where('date <=', $tdt);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
    } 
        public function sync_delete($id='') {
            $this->db->where('delete_by !=',"");
            $this->db->where('file_name !=',"");
            $this->db->order_by('page_id','DESC');
            $q = $this->db->get('page');
            return $q->result_array();
    } 
            public function urgent_upload($fdt='',$tdt='') {
            $this->db->where('UrgentReports',"1");
            $this->db->where('date >=', $fdt);
            $this->db->where('date <=', $tdt);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
    } 
                public function urgent_delete($id='') {
            $this->db->where('assign_status',"2");
            $this->db->order_by('page_id','DESC');
            $q = $this->db->get('page');
            return $q->result_array();
    } 
        public function all_given_page($id='') {
            $this->db->where('pages !=',"");
            $this->db->order_by('page_id','DESC');
            $q = $this->db->get('page');
            return $q->result_array();
    } 
        public function all_given_envelope($id='') {
            $this->db->where('envelopes !=',"");
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
    } 
    
    public function show_old_envelope($id='',$fdt='',$tdt='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            $this->db->where('date >=', $fdt);
            $this->db->where('date <=', $tdt);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope_old');
            return $q->result_array();
        } else {
            $this->db->order_by('envelope_id','DESC');
            $this->db->where('date >=', $fdt);
            $this->db->where('date <=', $tdt);
            $q = $this->db->get('envelope_old');
            return $q->result_array();
        }
    }

    public function show_envelope($id='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            // $this->db->where('UrgentReports',1);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
        } else {
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
        }
    } 
        public function show_urReports($id='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            $this->db->where('UrgentReports',1);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
        } else {
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
        }
    }
    
        public function show_uploads_to_user($fdt='',$tdt='') {
            $this->db->where('file_name !=','');
            $this->db->where('date >=', $fdt);
            $this->db->where('date <=', $tdt);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
    } 
    
    
    public function show_file() {
            $this->db->where('user_id',0);
            $this->db->order_by('time','DESC');
            $q = $this->db->get('envelope');
            return $q->result_array();
    }

    public function search_filename_exists($id='') {
        if($id != NULL) {
            $this->db->like('file_name',$id);
            // $this->db->where('user_id',0);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            // $row = $q->num_rows();
            return $q->result_array();
            
        } 
    } 
    
    public function search_filename_envelope($id='') {
        if($id != NULL) {
            $this->db->like('file_name',$id);
            $this->db->where('user_id',0);
            $this->db->order_by('envelope_id','DESC');
            $q = $this->db->get('envelope');
            $row = $q->num_rows();
            return $q->result_array();
            
        } 
    } 
    public function edit_envelope(){
            $userEmail = $this->input->post('user_email');
            //user updated data
            $data = array( 'user_id' => $this->input->post('user_id'));
            
            $this->db->like('file_name',$userEmail);
            $this->db->update('envelope',$data);

    }

         //update user
         public function del_user() {
            
            $id = $this->input->post('user_id');
            
            $this->db->where('user_id',$id);
            return $this->db->delete('user');
        }

        public function del_envelope() {
    
        $id = $this->input->post('envelope_id');
        $deleteby =$this->session->userdata('user_email') ;
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
          $curdt = date('h:i:s a l\, F jS\, Y ');
          $data = array(
            'user_id'=>$this->input->post('user_id'),
            'time'=>$curdt,
            'file_name'=>$pdfname,
            'delete_by'=>$deleteby,
            'page_used'=> -$pages
        );
        // unlink($pdfname);
        $this->db->insert('page',$data);
        return $this->db->insert_id();
    
        }
        
        public function del_ur() {
    
        $id = $this->input->post('envelope_id');
        $deleteby =$this->session->userdata('user_email') ;
        $user_id = $this->input->post('user_id');
        
        $this->db->where('envelope_id',$id);
        $a = $this->db->get('envelope');
         $q=$a->row_array();
         $this->db->where('envelope_id',$id);
         $this->db->delete('envelope');

 
        $a = $q['file_name'];
          $pdfname = './wellness_file/'.$a;
          $curdt = date('h:i:s a l\, F jS\, Y ');
          $data = array(
            'user_id'=>$this->input->post('user_id'),
            'time'=>$curdt,
            'file_name'=>$pdfname,
            'delete_by'=>$deleteby,
            'assign_status'=> 2 //2 for urgent reports
        );
        $this->db->insert('page',$data);
        return $this->db->insert_id();
    
        }
        
        public function del_file() {
    
        $id = $this->input->post('envelope_id');
        $this->db->where('envelope_id',$id);
        $a = $this->db->get('envelope');
         $q=$a->row_array();
      
        $a = $q['file_name'];
          $pdfname = './wellness_file/'.$a;
          
        unlink($pdfname);
        $this->db->where('envelope_id',$id);
        return $this->db->delete('envelope');
    
        }
       
            //add pages
            public function assign_page() {
                $id = $this->input->post('user_id');
                $curdatep = date('h:i:s a l\, F jS\, Y ');
                //user data array
                $data = array(
                    'user_id'=>$id,
                    'time'=>$curdatep,
                    'pages'      => $this->input->post('pages'),
                    'delete_by' => $this->session->userdata('user_email')
                );
    
            $this->db->insert('page',$data);
            return $this->db->insert_id();
            }
    
            public function assign_envs() {
                $id = $this->input->post('user_id');
                $curdate = date('h:i:s a l\, F jS\, Y ');
                //user data array
                $data = array(
                    'user_id'=>$id,
                    'time'=>$curdate,
                    'envelopes'      => $this->input->post('envelopes'),
                    'manager' => $this->session->userdata('user_email')
                );
                $this->db->insert('envelope',$data);
            return $this->db->insert_id();
            }
            
            
            public function add_envelope($data) {
                
                
                $this->db->insert('envelope',$data);
                return $this->db->insert_id();
            }
            public function add_urgent_file($file_name) {
                return $this->db->insert('envelope',$file_name);
            }
            
            public function add_file_envelope($file_name) {
                return $this->db->insert('envelope',$file_name);
            }
            
             public function add_page_used($data) {
            
                $this->db->insert('page',$data);
            return $this->db->insert_id();
            }

    }