<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fungsi {
	protected $ci;

	function __construct() {
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('User_m');
		$user_id = $this->ci->session->userdata('user_id');
		$user_data = $this->ci->User_m->get($user_id)->row();
		return $user_data;
	}

	function PdfGenerator($html, $filename,$paper, $orientation) {
		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paper, $orientation );

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream($filename, ['Attachment' => 0]);
	}


	function count_item() {
		$this->ci->load->model('Item_m');
		return $this->ci->Item_m->get()->num_rows();
	}


	function count_supplier() {
		$this->ci->load->model('Supplier_m');
		return $this->ci->Supplier_m->get()->num_rows();
	}


	function count_customer() {
		$this->ci->load->model('Customer_m');
		return $this->ci->Customer_m->get()->num_rows();
	}


	function count_user() {
		$this->ci->load->model('User_m');
		return $this->ci->User_m->get()->num_rows();
	}	

	
}