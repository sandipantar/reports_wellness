<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

    public function login($email,$pswd){
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $pswd);
        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return $result->row_array();
        } else {
             echo "<script>
                alert('Wrong User ID / Password Please Try Again');
                window.location.href='/home';
            </script>";
        }
    }

    public function lastlogin($user_id) {
        $curdt = date('h:i:s a l\, F jS\, Y ');
        $data = array(
            'user_id'      => $user_id,
            'last_login' => $curdt
        );

        //insert
        $this->db->insert('lastlogin',$data);
        return $this->db->insert_id();
    }

    public function show_lastlogin($id='') {
        if($id != NULL) {
            $this->db->where('user_id',$id);
            $this->db->order_by('login_id','DESC');
            $q = $this->db->get('lastlogin');
            return $q->result_array();
        } else {
            $this->db->order_by('login_id','DESC');
            $q = $this->db->get('lastlogin');
            return $q->result_array();
        }
    } 

}