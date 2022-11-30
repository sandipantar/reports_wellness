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
            return false;
        }
    }


}