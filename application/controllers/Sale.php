<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	public function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('Sale_m');
	}

	public function index() {
		$this->load->model(['Customer_m', 'Item_m']);
		$customer = $this->Customer_m->get()->result();
		$item = $this->Item_m->get()->result();
		$cart = $this->Sale_m->get_cart();
		$data = [
			'title' => 'Sale transaction',
			'customer' => $customer,
			'item' => $item,
			'cart' => $cart,
			'invoice' => $this->Sale_m->invoice_no()
		];
		$this->template->load('template','transaction/sale/sale_form',$data);
	}

	public function get_item() {
		$this->load->model('Item_m');
		$barcode = $this->input->post('barcode', TRUE);
		$item = $this->Item_m->get_barcode($barcode)->row();
		if($this->db->affected_rows() > 0 ) {
				$params = ['success' => true, 'item' => $item];
			} else {
				$params = ['success' => false];
			}
		echo json_encode($params);
	}

	public function process() {
		$data = $this->input->post(null, TRUE);
		
		if($this->input->post('add_cart', TRUE)) {
			$item_id = $this->input->post('item_id');
			$check_cart = $this->Sale_m->get_cart(['t_cart.item_id' => $item_id])->num_rows();
			if($check_cart > 0) {
				$this->Sale_m->update_cart_qty($data);
			} else {
				$this->Sale_m->add_cart($data);
			}
			if($this->db->affected_rows() > 0 ) {
				$params = ['success' => true];
			} else {
				$params = ['success' => false];
			}
			echo json_encode($params);
		}

		if($this->input->post('edit_cart', TRUE)) {
			$this->Sale_m->edit_cart($data);
			
			if($this->db->affected_rows() > 0 ) {
				$params = ['success' => true];
			} else {
				$params = ['success' => false];
			}
			echo json_encode($params);
		}

		if($this->input->post('process_payment', TRUE)) {
			$sale_id = $this->Sale_m->add_sale($data);
			$cart = $this->Sale_m->get_cart()->result();
			$cek = $this->Sale_m->get_cart()->num_rows();

			foreach($cart as $c => $value ) {
				$row[] = [
					'sale_id' => $sale_id,
					'item_id' => $value->item_id,
					'price' => $value->price,
					'qty' => $value->qty,
					'discount_item' => $value->discount_item,
					'total' => $value->total
				];
			}
			
			$this->Sale_m->add_sale_detail($row);
			$this->Sale_m->del_cart(['user_id' => $this->session->userdata('user_id')]);
			if($this->db->affected_rows() > 0 ) {
				$params = ['success' => true, "sale_id" => $sale_id];
			} else {
				$params = ['success' => false];
			}
			echo json_encode($params);
		}

	}


	public function cart_data() {
		$cart = $this->Sale_m->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaction/sale/cart_data', $data);
	}


	public function cart_del() {
		if(isset($_POST['cancel_payment'])) {
			$this->Sale_m->del_cart(['user_id' => $this->session->userdata('user_id')]);
		} else {
			$cart_id = $this->input->post('cart_id');
			$this->Sale_m->del_cart(['cart_id' => $cart_id]);
		}

		if($this->db->affected_rows() > 0 ) {
			$params = ['success' => true];
		} else {
			$params = ['success' => false];
		}
		echo json_encode($params);
	}



	public function cetak($id) {
		$data = [
			'sale' => $this->Sale_m->get_sale($id)->row(),
			'sale_detail' => $this->Sale_m->get_sale_detail($id)->result(),
		];
		$this->load->view('transaction/sale/receipt_print', $data);
	}



	public function del($id) {
		$this->Sale_m->del_sale($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Penjualan Berhasi dihapus');
			window.location='".site_url('report/sale')."';</script>";
		} else {
			echo "<script>alert('Data Penjualan Berhasi dihapus');
			window.location='".site_url('report/sale')."';</script>";
		}
	}










}