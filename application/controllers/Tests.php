<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Controller {

        public function add_test( ){
                $this->Test_model->add_test();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}	
        public function addTestHome( ){
                $this->Test_model->add_test();	
                $html = '<option disabled selected>Select Test</option>';
                $tests = $this->Test_model->show_tests();
                if($tests != NULL) { foreach($tests as $tst) {
                        $html .= '<option value="'.$tst['test_id'].'">'.$tst['test_name'].'</option>';
                }}
                echo $html;
	}	

	public function edit_test( ) {
                $test=$this->Test_model->show_tests($this->input->post('test_id'));
                $data = '';
                $data .= '<form class="form-horizontal form-label-left" method="post" action="tests/edit_test123">';
                $data .= '<input type="hidden" name="test_id" value="'.$this->input->post('test_id').'">';
                $data .= '<div class="row" style="padding:10px 20px";>';
                $data .= '<div class="row form-group">';
                $data .= '<label>Test Name</label>';
                $data .= '<input type="text" name="test_name" class="form-control" value="'.$test['test_name'].'">';
                $data .= '</div>';
                $data .= '<div class="row form-group">';
                $data .= '<label>Price</label>';
                $data .= '<input type="text" name="price" class="form-control" value="'.$test['price'].'">';
                $data .= '</div>';
                $data .= '<div class="row form-group col-md-12 col-sm-12 col-xs-12">';
                $data .= '<button type="button" data-dismiss="modal" class="btn btn-danger btn-sm col-md-6 col-sm-6 col-xs-12">Cancel</button>';
                $data .= '<button type="submit" class="btn btn-success btn-sm col-md-6 col-sm-6 col-xs-12">Update</button>';
                $data .= '</div>';
                $data .= '</div>';
                $data .= '</form>';
                echo $data;
	}		

	public function edit_test123( ){
                $this->Test_model->edit_test();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}	

	public function del_test( ){
                $this->Test_model->del_test();	
                $referer = $_SERVER['HTTP_REFERER'];
                header("Location: $referer");
	}

        public function search_test_cost( ){
                $search = $this->input->post('test_id');
                if(is_array($search)) {
                        $total = 0;
                        foreach($search as $as) {
                                $as = number_format($as);
                                $test_details = $this->Test_model->show_tests($as);
                                $total += $test_details['price'];
                        }
                        echo $total;
                } else {
                        if($search == NULL) return FALSE; else {
                                $test_details = $this->Test_model->show_tests($search);
                                $total = $test_details['price'];        
                                echo $total;
                        }
                }
                

	}	
	
}