<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Customer_m');
	}


	public function index() {
		$data['row'] = $this->Customer_m->get();
		$data['title'] = "Customer menu";
		$this->template->load('template','customer/customer_data', $data);
	}

	function get_json() {
		$this->load->library('datatables');
		$this->datatables->add_column('no', 'ID-$1', 'customer_id');
		$this->datatables->select('customer_id, name, gender, phone, address');
		$this->datatables->add_column('action', anchor('customer/edit/$1','Update', ['class' => 'btn btn-primary btn-xs'])." ".anchor('customer/del/$1','Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm(\'Apakah anda benar-benar ingin mengahpus data ini?\')']), 'customer_id');
		$this->datatables->from('customer');
		return print_r($this->datatables->generate());	
	}

	public function add() {
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->address = null;

		$data= [
			'page' => 'Add',
			'row' => $customer
		];

		$data['title'] = "Add customer page";
		$this->template->load('template','customer/customer_form', $data);
	}


	public function edit($id) {
		$query = $this->Customer_m->get($id);
		if($query->num_rows() > 0) {
			$customer = $query->row();
			$data= [
			'page' => 'Update',
			'row' => $customer
			];

			$data['title'] = "Update customer page";
			$this->template->load('template','customer/customer_form', $data);
		} else {
			echo "
					<script>
						alert('Not found data');
						window.location ='".site_url('customer')."' ;
					</script>
				";
		}
	}


	public function process() {
		$post = $this->input->post(null, TRUE);
		if($this->input->post('Add')) {
			$this->Customer_m->add($post);
			if($this->db->affected_rows() > 0) {
			echo "
					<script>
						alert('Succesfully Added data');
						window.location ='".site_url('customer')."' ;
					</script>
				";
			} 

		} elseif($this->input->post('Update')) {
			$this->Customer_m->edit($post);
			if($this->db->affected_rows() > 0) {
			echo "
				<script>
					alert('Succesfully Updated data');
					window.location ='".site_url('customer')."' ;
				</script>
			";
			}
		}
	}


	public function del($id) {
		$this->Customer_m->del($id);
		if($this->db->affected_rows() > 0) {
			echo "
					<script>
						alert('Succesfully deleted data');
						window.location ='".site_url('customer')."' ;
					</script>
				";
		}
	}

}