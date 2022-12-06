<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller { 

	public function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('Sale_m', 'Sale');
	}

	public function sale() {
		$this->load->model('Customer_m');
		$this->load->library('pagination');

		if(isset($_POST['reset'])) {
			$this->session->unset_userdata('search');
		}

		if(isset($_POST['filter'])) {
			$post = $this->input->post(null, TRUE);
			$this->session->set_userdata('search', $post);
		} else {
			$post = $this->session->userdata('search');
		}

		$config['base_url'] = base_url('report/sale');
		$config['total_rows'] = $this->Sale->get_sale_pagination()->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		$data['customer'] = $this->Customer_m->get()->result();

		$data['bottom'] = $this->Sale->get_sale_pagination()->num_rows();
		$data['title'] = "Laporan Penjualan";
		$data['row'] = $this->Sale->get_sale_pagination($config['per_page'], $this->uri->segment(3));
		$data['post'] = $post;
		$this->template->load('template', 'report/sale_report', $data);
	}

	public function sale_product($sale_id = null) {
		$detail = $this->Sale->get_sale_detail($sale_id)->result();
		echo json_encode($detail);
	}

}