<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view( $page = 'home'){
		if ( !file_exists('application/views/pages/'.$page.'.php')) {
			show_404();		
		}	
		
		$this->load->view('templates/header');
		if($page != 'home') {
			$this->load->view('templates/nav');
		}
		$this->load->view('pages/'.$page);
		if($page != 'home') {
			$this->load->view('templates/footer');
		}
		
	}	


    //login
	public function login(){		
		
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('password', 'Password','required');
		
		if($this->form_validation->run() === FALSE) {	
			$this->load->view('templates/header');
			// $this->load->view('templates/nav');
			$this->load->view('pages/home');
			// $this->load->view('templates/footer');
		} else {
			$username = $this->input->post('email');
			$password = md5($this->input->post('password'));
			
			$user = $this->Page_model->login($username,$password);
			
			if($user) {
			    $user_dataaa = array(
					'user_id'   	=> $user['user_id'],
					'user_name'  	=> $user['user_name'],
					'user_email' 	=> $username,
					'type'  		=> $user['user_type'],
					'logged_in'     => true
				);
				
				$this->session->set_userdata($user_dataaa);		    
			    redirect('dashboard');
			} 
			
		}
		
	}

	//logout
	public function logout() {
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('type');
		$this->session->unset_userdata('logged_in');
			
		redirect('home');
	}
	
}