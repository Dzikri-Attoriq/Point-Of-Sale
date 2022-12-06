<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_m');
	}


	public function index() {
		$data['row'] = $this->Category_m->get();
		$data['title'] = "category menu";
		$this->template->load('template','product/category/category_data', $data);
	}

	public function add() {
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;

		$data= [
			'page' => 'Add',
			'row' => $category
		];

		$data['title'] = "Add category page";
		$this->template->load('template','product/category/category_form', $data);
	}


	public function edit($id) {
		$query = $this->Category_m->get($id);
		if($query->num_rows() > 0) {
			$category = $query->row();
			$data= [
			'page' => 'Update',
			'row' => $category
			];

			$data['title'] = "Update category page";
			$this->template->load('template','product/category/category_form', $data);
		} else {
			echo "
					<script>
						alert('Not found data');
						window.location ='".site_url('category')."' ;
					</script>
				";
		}
	}


	public function process() {
		$post = $this->input->post(null, TRUE);
		if($this->input->post('Add')) {
			$this->Category_m->add($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes',"Succesfully added data");
				redirect(base_url('category'));
			} 

		} elseif($this->input->post('Update')) {
			$this->Category_m->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes',"Succesfully updated data");
				redirect(base_url('category'));
			}
		}
	}


	public function del($id) {
		$this->Category_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes','Succesfully deleted data');
			redirect(base_url('category'));
		}
	}

}