<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('Unit_m');
	}


	public function index() {
		$data['row'] = $this->Unit_m->get();
		$data['title'] = "unit menu";
		$this->template->load('template','product/unit/unit_data', $data);
	}

	public function add() {
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;

		$data= [
			'page' => 'Add',
			'row' => $unit
		];

		$data['title'] = "Add unit page";
		$this->template->load('template','product/unit/unit_form', $data);
	}


	public function edit($id) {
		$query = $this->Unit_m->get($id);
		if($query->num_rows() > 0) {
			$unit = $query->row();
			$data= [
			'page' => 'Update',
			'row' => $unit
			];

			$data['title'] = "Update unit page";
			$this->template->load('template','product/unit/unit_form', $data);
		} else {
			echo "
					<script>
						alert('Not found data');
						window.location ='".site_url('unit')."' ;
					</script>
				";
		}
	}


	public function process() {
		$post = $this->input->post(null, TRUE);
		if($this->input->post('Add')) {
			$this->Unit_m->add($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes','Succesfully <b>added</b> data');
				redirect(base_url('unit'));
			} 

		} elseif($this->input->post('Update')) {
			$this->Unit_m->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes','Succesfully <b>updated</b> data');
				redirect(base_url('unit'));
			}
		}
	}


	public function del($id) {
		$this->Unit_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes','Succesfully <b>deleted</b> data');
			redirect(base_url('unit'));
		}
	}

}