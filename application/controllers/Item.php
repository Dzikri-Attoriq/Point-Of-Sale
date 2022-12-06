<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(['Item_m','Category_m','Unit_m']);
	}


	public function get_ajax() {
        $list = $this->Item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->name;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = indo_currency($item->price);
            $row[] = $item->stock;
            $row[] = $item->image != null ? '<img src="'.base_url('assets/images/product/'.$item->image).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }


	public function index() {
		// $this->load->library('pagination');

		// $config['base_url'] = base_url('item');
		// $config['total_rows'] = $this->Item_m->get_pagination()->num_rows;
		// $config['per_page'] = 4;
		// $config['uri_segment'] = 3;
		// $config['first_link'] = 'First';
		// $config['last_link'] = 'Last';
		// $config['next_link'] = 'Next';
		// $config['prev_link'] = 'Prev';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="active"><a>';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';

		// $this->pagination->initialize($config);

		// $data['pagination'] = $this->pagination->create_links();

		// $data['row'] = $this->Item_m->get_pagination($config['per_page'], $this->uri->segment(3));
		$data['row'] = $this->Item_m->get();
		$data['title'] = "item menu";
		$this->template->load('template','product/item/item_data', $data);
	}

	public function add() {
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->category_id = null;
		$item->name = null;
		$item->price = null;
		$item->image = null;

		$category_id = $this->Category_m->get();

		$unit_id = $this->Unit_m->get();
		$unit[null] = '>- Choose -<';
		foreach($unit_id->result() as $unt) {
			$unit[$unt->unit_id] = $unt->name;
		}

		$data= [
			'page' => 'Add',
			'row' => $item,
			'category_id' => $category_id,
			'unit_id' => $unit,'selectedunit' => null,
		];

		$data['title'] = "Add item page";
		$this->template->load('template','product/item/item_form', $data);
	}


	public function edit($id) {
		$query = $this->Item_m->get($id);
		if($query->num_rows() > 0) {
			$item = $query->row();
			$category_id = $this->Category_m->get();

			$unit_id = $this->Unit_m->get();
			$unit[null] = '>- Choose -<';
			foreach($unit_id->result() as $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}

			$data= [
				'page' => 'Update',
				'row' => $item,
				'category_id' => $category_id,
				'unit_id' => $unit,'selectedunit' => $item->unit_id
			];

			$data['title'] = "Update item page";
			$this->template->load('template','product/item/item_form', $data);
		} else {
			echo "
					<script>
						alert('Not found data');
						window.location ='".site_url('item')."' ;
					</script>
				";
		}
	}


	public function process() {
		$post = $this->input->post(null, TRUE);
		if($this->input->post('Add')) {
			if($this->Item_m->check_barcode($post['barcode'])->num_rows() > 0) {
				$this->session->set_flashdata('error'," Barcode $post[barcode] <b>has been used</b>");
				redirect(base_url('item/add'));
			} else {
				if($_FILES['image']['name'] != null) {
					$config['upload_path'] = './assets/images/product/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = 2048;
					$config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
					$this->load->library('upload',$config);
					if($this->upload->do_upload('image')) {
						$post['image'] = $this->upload->data('file_name');
						$this->Item_m->add($post);
						if($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('succes','Succesfully <b>added</b> data');
							redirect(base_url('item'));
						}
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error'," $error");
						redirect(base_url('item/add'));
					}
				} else {
					$post['image'] = null;
					$this->Item_m->add($post);
					if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('succes','Succesfully <b>added</b> data');
						redirect(base_url('item'));
					}
				}
			}

		} elseif($this->input->post('Update')) {
			if($this->Item_m->check_barcode($post['barcode'],$post['item_id'])->num_rows() > 0) {
				$this->session->set_flashdata('error'," Barcode $post[barcode] <b>has been used</b>");
				redirect(base_url('item/edit/'.$post['item_id']));
			} else {
				if($_FILES['image']['name'] != null) {
					$config['upload_path'] = './assets/images/product/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = 2048;
					$config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
					$this->load->library('upload',$config);
					if($this->upload->do_upload('image')) {
						$item = $this->Item_m->get($post['item_id'])->row();
						if($item->image != null) {
							unlink(FCPATH.'./assets/images/product/'.$item->image);
						}

						$post['image'] = $this->upload->data('file_name');
						$this->Item_m->edit($post);
						if($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('succes','Succesfully <b>updated</b> data');
							redirect(base_url('item'));
						}
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error'," $error");
						redirect(base_url('item/add'));
					}
				} else {
					$post['image'] = null;
					$this->Item_m->edit($post);
					if($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('succes','Succesfully <b>updated</b> data');
						redirect(base_url('item'));
					}
				}
			}
		} if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes','Succesfully <b>updated</b> data');
				redirect(base_url('item'));
		}
	}


	public function del($id) {
		$item = $this->Item_m->get($id)->row();
		if($item->image != null) {
			unlink(FCPATH.'./assets/images/product/'.$item->image);
		}

		$this->Item_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes','Succesfully <b>deleted</b> data');
			redirect(base_url('item'));
		}
	}


	public function barcode_qrcode($id) {
		$data['row'] = $this->Item_m->get($id)->row();
		$data['title'] = "Barcode menu";
		$this->template->load('template','product/item/barcode_qrcode', $data);

	}


	public function barcode_print($id) {
		$data['row'] = $this->Item_m->get($id)->row();
		$html = $this->load->view('product/item/barcode_print', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Barcode'.$data['row']->barcode, 'A4', 'Landscape');
	}


	public function qrcode_print($id) {
		$data['row'] = $this->Item_m->get($id)->row();
		$html = $this->load->view('product/item/qrcode_print', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'QR-code'.$data['row']->barcode, 'A4', 'Potrait');
	}

}
