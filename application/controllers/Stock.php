<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['Item_m','Supplier_m','Stock_m']);
	}



	public function stock_in_data() {
		$data['title'] = "Stock in page"; 
		$data['row'] = $this->Stock_m->get_stock_in()->result();
		$this->template->load('template','transaction/stock_in/stock_in_data', $data);
	}


	public function stock_in_add() {
		$item = $this->Item_m->get()->result();
		$supplier = $this->Supplier_m->get()->result();
		$data = ['item' => $item, 'supplier' => $supplier, 'title' => 'Stock in pages'];
		$this->template->load('template','transaction/stock_in/stock_in_form', $data);
	}


	public function stock_out_data() {
		$data['title'] = "Stock in page"; 
		$data['row'] = $this->Stock_m->get_stock_out()->result();
		$this->template->load('template','transaction/stock_out/stock_out_data', $data);
	}


	public function stock_out_add() {
		$item = $this->Item_m->get()->result();
		$data = ['item' => $item, 'title' => 'Stock out pages'];
		$this->template->load('template','transaction/stock_out/stock_out_form', $data);
	}


	public function process() {
		$post = $this->input->post(null, TRUE);
		if($this->input->post('in_add')) {
			$this->Stock_m->add_stock_in($post);
			$this->Item_m->update_stock_in($post);

			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes','Succesfully <b>added</b> data');
				redirect(base_url('stock/in'));
			}
		} elseif($this->input->post('out_add')) {
			$id = $post['barcode'];
			$cek = $this->Item_m->cobaCheck($id)->row_array();
			if($post['qty'] > $cek['stock'])  {
				$this->session->set_flashdata('error','Stock out melebihi stock yang ada'); 
				redirect(base_url('stock/out'));
			}
			$this->Stock_m->add_stock_out($post);
			$this->Item_m->update_stock_out($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes','Succesfully <b>added</b> data');
				redirect(base_url('stock/out'));
			}
		}
	}


	public function stock_in_del() {
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->Stock_m->get($stock_id)->row()->qty;
		$data = [
			'qty' => $qty,
			'item_id' => $item_id
		];

		$this->Item_m->update_stock_out($data);
		$this->Stock_m->del($stock_id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes','Succesfully <b>deleted</b> data');
			redirect(base_url('stock/in'));
			}
	}


	public function stock_out_del() {
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->Stock_m->get($stock_id)->row()->qty;
		$data = [
			'qty' => $qty,
			'item_id' => $item_id
		];

		$this->Item_m->update_stock_in($data);
		$this->Stock_m->del($stock_id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes','Succesfully <b>deleted</b> data');
			redirect(base_url('stock/out'));
			}
	}


}