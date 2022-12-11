<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Health_model extends CI_Model {
        
        /*==================================SEARCH=============================
        //Farty/Party Information
        public function company_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('people');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Garden Information
        public function garden_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('garden');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Full Stock Information
        public function stock_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('stock');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Users Information
        public function users_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('users');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //intake order Information
        public function order_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('intake_order');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //factory payment Information
        public function fac_ledger_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('payment_fac');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //party payment Information
        public function par_ledger_info() {
            
            $this->db->order_by('id');
            $q = $this->db->get('payment_par');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Single Stock Information
        public function single_stock($t,$g,$i) {
            
            $this->db->where('type',$t);
            $this->db->where('grade',$g);
            $this->db->where('invoice',$i);
   	        $q = $this->db->get('stock');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //available Stock Information
        public function sale_dropdown($f,$t,$g,$i) {
            
            $this->db->where('perticular',$f);
            $this->db->where('type',$t);
            $this->db->where('grade',$g);
            $this->db->where('invoice',$i);
   	        $q = $this->db->get('stock');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Single people Information
        public function show_people_detail($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('people');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Single people Information
        public function show_people_edit($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('people');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //garden edit Information
        public function garden_edit($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('garden');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //garden purchase Information
        public function garden_pur_info($garden) {
            
            $this->db->where('perticular',$garden);
   	      $q = $this->db->get('purchase_details');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //garden sale Information
        public function garden_sale_info($garden) {
            
            $this->db->where('perticular',$garden);
   	      $q = $this->db->get('sale_details');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Single people Transaction
        public function show_people_tran($name) {
            
            $this->db->where('fac_name',$name);
   	        $q = $this->db->get('payment_fac');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Single people Transaction
        public function show_people_tran_1($name) {
            
            $this->db->where('par_name',$name);
   	        $q = $this->db->get('payment_par');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //purchase details of a day for report
        public function purchase_report($date) {
            
            $this->db->where('date',$date);
   	        $q = $this->db->get('purchase_details');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //sale details of a day for report
        public function sale_report($date) {
            
            $this->db->where('date',$date);
   	        $q = $this->db->get('sale_details');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //stock entry of a day for report
        public function stock_entry_report($date) {
            
            $this->db->where('date',$date);
   	        $q = $this->db->get('stock');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //sale details of a day for report
        public function payment_report($date) {
            
            $this->db->where('date',$date);
   	        $q = $this->db->get('payment_fac');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //stock entry of a day for report
        public function money_report($date) {
            
            $this->db->where('date',$date);
   	        $q = $this->db->get('payment_par');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Purchase popup Information
        public function report_purchase_pop($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('purchase_details');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Sale popup Information
        public function report_sale_pop($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('sale_details');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Stock popup Information
        public function report_stock_pop($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('stock');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Stock popup Information
        public function report_order_pop($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('intake_order');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Payment popup Information
        public function report_payment_pop($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('payment_fac');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Receive popup Information
        public function report_receive_pop($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('payment_par');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Receive picture name from database
        public function search_snap($dt) {
            
            $this->db->where('date',$dt);
   	        $q = $this->db->get('upload_report');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Receive seller transaction from database
        public function print_seller($sn,$sd,$fd) {
            
            $this->db->where('fac_name',$sn);
            $this->db->where('date >=',$sd);
            $this->db->where('date <=',$fd);
   	        $q = $this->db->get('payment_fac');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        //Receive buyer transaction from database
        public function print_buyer($sn,$sd,$fd) {
            
            $this->db->where('par_name',$sn);
            $this->db->where('date >=',$sd);
            $this->db->where('date <=',$fd);
   	        $q = $this->db->get('payment_par');
            
            if($q->num_rows() >0) {
                return $q->result_array();
            } else {
                return FALSE;
            }
        }
        /*==================================SEARCH=============================*/
        
        
        /*==================================ADD=============================
        //add people to the database
        public function add_poeple() {
            
            //user data array
            $data = array(
                'type'      => $this->input->post('type'),
                'owner'     => $this->input->post('owner'),
                'phone'     => $this->input->post('phn'),
                'address'   => $this->input->post('addr')
            );
            //insert
            return $this->db->insert('people',$data);
        }
        //add garden to the database
        public function add_garden() {
            
            //user data array
            $data = array(
                'garden'    => $this->input->post('garden'),
                'extra'     => $this->input->post('info'),
            );
            //insert
            return $this->db->insert('garden',$data);
        }
        //purchase entry to database
        public function purchase($seller_name, $entry_date, $type, $garden, $grade, $invoice, $packet, $pkt_sz, $sample, $sample_size, $rate) {
            
            $a = $pkt_sz;
            $b = $packet;
            $c = $sample;
            $d = $sample_size;
            $quan = ($a * $b) + ($c * $d);
            
            //user data array
            $data = array(
                'date'              => $entry_date,
                'seller_name'       => $seller_name,
                'perticular'        => $garden,
                'type'              => $type,
                'grade'             => $grade,
                'invoice'           => $invoice,
                'quan_kg'           => $quan,
                'pkt_size'          => $pkt_sz,
                'packets'           => $packet,
                'sample'            => $sample,
                'sample_size'       => $sample_size,
                'rate'              => $rate
            );
            //insert
            return $this->db->insert('purchase_details',$data);
        }
        //sale entry to database
        public function sale($party_name, $entry_date, $pr, $t, $g, $i, $packet, $pkt_sz, $sample, $sample_size, $rate) {
            $a = $pkt_sz;
            $b = $packet;
            $c = $sample;
            $d = $sample_size;
            $quan = ($a * $b) + ($c * $d);
            
            
            //user data array
            $data = array(
                'date'              => $entry_date,
                'party_name'        => $party_name,
                'perticular'        => $pr,
                'type'              => $t,
                'grade'             => $g,
                'invoice'           => $i,
                'quan_kg'           => $quan,
                'pkt_size'          => $pkt_sz,
                'packets'           => $packet,
                'sample'            => $sample,
                'sample_size'       => $sample_size,
                'rate'              => $rate,
                'transport'         => $this->input->post('transport')
            );
            //insert
            return $this->db->insert('sale_details',$data);
        }
        //purchase entry to database
        public function stock_entry($seller_name, $entry_date, $type, $garden, $grade, $invoice, $packet, $pkt_sz, $sample, $sample_size, $rate) {
            
            $a = $pkt_sz;
            $b = $packet;
            $c = $sample;
            $d = $sample_size;
            $quan = ($a * $b) + ($c * $d);
            
            
            //user data array
            $data = array(
                'date'              => $entry_date,
                'seller'            => $seller_name,
                'perticular'        => $garden,
                'type'              => $type,
                'grade'             => $grade,
                'invoice'           => $invoice,
                'quan_kg'           => $quan,
                'pkt_size'          => $pkt_sz,
                'packets'           => $packet,
                'sample'            => $sample,
                'sample_size'       => $sample_size,
                'purchase_rate'     => $rate
            );
            //insert
            return $this->db->insert('stock',$data);
        }
        //order entry to database
        public function addOrder() {
            
            //user data array
            $data = array(
                'date'              => $this->input->post('entry_date'),
                'party_name'        => $this->input->post('party'),
                'quan_kg'           => $this->input->post('kilo'),
                'pkt_size'          => $this->input->post('pkt_sz'),
                'packets'           => $this->input->post('packet'),
                'sample'            => $this->input->post('sample'),
                'purchase_rate'     => $this->input->post('rate')
            );
            //insert
            return $this->db->insert('intake_order',$data);
        }
        /*==================================ADD=============================*/
        
        
        /*==================================UPDATE=============================
        //people entry update
        public function edit_people($id) {
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('people');
   	        
   	        
            //people updated data
            $data = array(
                'owner'     => $this->input->post('owner'),
                'phone'     => $this->input->post('phn'),
                'address'   => $this->input->post('addr')
            );
            
   		    if ( $q->num_rows() > 0 ) {
                    $this->db->where('id',$id);
                	return $this->db->update('people',$data);
   		    }
        }
        //garden entry update
        public function edit_garden($id) {
            
            $this->db->where('id', $id);
   	        $q = $this->db->get('garden');
   	        
   	        
            //people updated data
            $data = array(
                'garden'     => $this->input->post('garden'),
                'extra'     => $this->input->post('info')
            );
            
   		    if ( $q->num_rows() > 0 ) {
                    $this->db->where('id',$id);
                	return $this->db->update('garden',$data);
   		    }
        }
        //purchase entry to database
        public function stock_deduct_sale($new_pkt,$new_smpl, $new_k,$t,$g,$i) {
            
            $this->db->where('type',$t);
            $this->db->where('grade',$g);
            $this->db->where('invoice',$i);
   	      $q = $this->db->get('stock');
   		    
   		    if ( $q->num_rows() > 0 ) {
                $this->db->where('type',$t);
                $this->db->where('grade',$g);
                $this->db->where('invoice',$i);
                $this->db->set('quan_kg', $new_k, FALSE);
                $this->db->set('packets', $new_pkt, FALSE);
                $this->db->set('sample', $new_smpl, FALSE);
                $this->db->update('stock');
   		    }
        }
        //stock entry update
        public function stock_entry_update() {
            $a = $this->input->post('pkt_sz');
            $b = $this->input->post('packet');
            $c = $this->input->post('sample');
            $d = $this->input->post('sample_size');
            $quan = ($a * $b) + ($c * $d);
            
            $id = $this->input->post('id');
            
            $this->db->where('id',$id);
   	        $q = $this->db->get('stock');
   	        
            //user data array
            $data = array(
                'date'              => $this->input->post('entry_date'),
                'seller'           => $this->input->post('seller'),
                'perticular'        => $this->input->post('garden'),
                'type'              => $this->input->post('type'),
                'grade'             => $this->input->post('grade'),
                'invoice'           => $this->input->post('invoice'),
                'quan_kg'           => $quan,
                'pkt_size'          => $this->input->post('pkt_sz'),
                'packets'           => $this->input->post('packet'),
                'sample'            => $this->input->post('sample'),
                'sample_size'       => $this->input->post('sample_size'),
                'purchase_rate'     => $this->input->post('rate')
            );
            //update
   		    if ( $q->num_rows() > 0 ) {
                    $this->db->where('id',$id);
                    $this -> db -> delete('stock');
                    return $this->db->insert('stock',$data);
   		    }
            
        }
        /*==================================UPDATE=============================*/
        
        
        /*==================================PAYMENT=============================
        //balance forword
        public function fac_purchase_bal() {
            
            //user data array
            $data = array(
                'date'      => $this->input->post('entry_date'),
                'fac_name'  => $this->input->post('factory'),
                'pay_type'  => "debit",
                'amount'    => $this->input->post('amount'),
                'mode'    => $this->input->post('mode')
            );
            //insert
            return $this->db->insert('payment_fac',$data);
        }
        //purchase from factory
        public function fac_purchase($seller_name, $entry_date, $type, $garden, $grade, $invoice, $packet, $pkt_sz, $sample, $sample_size, $rate) {
            
            $p_s = $pkt_sz;
            $pkt = $packet;
            $smpl = $sample;
            $s_s = $sample_size;
            $q= $p_s * $pkt + $smpl * $s_s;
            $r=$rate;
            $a = $q * $r;
            
            //user data array
            $data = array(
                'date'      => $entry_date,
                'fac_name'  => $seller_name,
                'pay_type'  => "debit",
                'amount'    => $a
            );
            //insert
            return $this->db->insert('payment_fac',$data);
        }
        //pay to factory
        public function fac_payment() {
            
            //user data array
            $data = array(
                'date'      => $this->input->post('entry_date'),
                'fac_name'  => $this->input->post('factory'),
                'pay_type'  => "credit",
                'amount'    => $this->input->post('amount'),
                'mode'    => $this->input->post('mode')
            );
            //insert
            return $this->db->insert('payment_fac',$data);
        }
        //sale to party
        public function par_sale($party_name, $entry_date, $t, $g, $i, $packet, $pkt_sz, $sample, $sample_size, $rate) {
            
            $p_s = $pkt_sz;
            $pkt = $packet;
            $smpl = $sample;
            $s_s = $sample_size;
            $q= $p_s * $pkt + $smpl * $s_s;
            $r=$rate;
            $a = $q * $r;
            
            //user data array
            $data = array(
                'date'      => $entry_date,
                'par_name'  => $party_name,
                'pay_type'  => "credit",
                'amount'    => $a
            );
            //insert
            return $this->db->insert('payment_par',$data);
        }
        //balance forword
        public function par_sale_bal() {
            
            //user data array
            $data = array(
                'date'      => $this->input->post('entry_date'),
                'par_name'  => $this->input->post('party'),
                'pay_type'  => "credit",
                'amount'    => $this->input->post('amount')
            );
            //insert
            return $this->db->insert('payment_par',$data);
        }
        //payment from party
        public function par_payment() {
            
            //user data array
            $data = array(
                'date'      => $this->input->post('entry_date'),
                'par_name'  => $this->input->post('party'),
                'pay_type'  => "debit",
                'amount'    => $this->input->post('amount'),
                'mode'    => $this->input->post('mode')
            );
            //insert
            return $this->db->insert('payment_par',$data);
        }
        /*==================================PAYMENT=============================*/
        
        
        /*==================================UPLOAD REPORT=============================
        //upload daily docs
        public function upload_rprt($file_name,$da) {
            
            //$d=date("Y-m-d");
            //user data array
            $data = array(
                'date'      => $da,
                'file_name'  => $file_name
            );
            //insert
            return $this->db->insert('upload_report',$data);
        }
        /*==================================UPLOAD REPORT=============================*/
            
        
    }