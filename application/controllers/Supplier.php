<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Supplier_m');
	}


	public function index() {
		$data['row'] = $this->Supplier_m->get();
		$data['title'] = "Supplier menu";
		$this->template->load('template','supplier/supplier_data', $data);
	}

	public function add() {
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;

		$data= [
			'page' => 'Add',
			'row' => $supplier
		];

		$data['title'] = "Add supplier page";
		$this->template->load('template','supplier/supplier_form', $data);
	}


	public function edit($id) {
		$query = $this->Supplier_m->get($id);
		if($query->num_rows() > 0) {
			$supplier = $query->row();
			$data= [
			'page' => 'Update',
			'row' => $supplier
			];

			$data['title'] = "Update supplier page";
			$this->template->load('template','supplier/supplier_form', $data);
		} else {
			echo "
					<script>
						alert('Not found data');
						window.location ='".site_url('supplier')."' ;
					</script>
				";
		}
	}


	public function process() {
		$post = $this->input->post(null, TRUE);
		if($this->input->post('Add')) {
			$this->Supplier_m->add($post);
			if($this->db->affected_rows() > 0) {
			echo "
					<script>
						alert('Succesfully Added data');
						window.location ='".site_url('supplier')."' ;
					</script>
				";
			} 

		} elseif($this->input->post('Update')) {
			$this->Supplier_m->edit($post);
			if($this->db->affected_rows() > 0) {
			echo "
				<script>
					alert('Succesfully Updated data');
					window.location ='".site_url('supplier')."' ;
				</script>
			";
			}
		}
	}


	public function del($id) {
		$this->Supplier_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0) {
			echo "
					<script>
						alert('Cannot deleted data. Data has been relation');
					</script>
				";
		} else {
			echo "
					<script>
						alert('Succesfully deleted data');
					</script>
				";
		}
		
		echo "
			<script>
				window.location ='".site_url('supplier')."' ;
			</script>
		";
	}

}