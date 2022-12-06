<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_m');
		check_not_login();
		check_admin();
	}

	public function index() {
		check_not_login();

		$data['row'] = $this->User_m->get();
		$data['title'] = "Halaman User";
		$this->template->load('template','user/user_data', $data);
	}


	public function add() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('username','Username','required|trim|min_length[5]|is_unique[user.username]',[
			'is_unique' => '%s has already register'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
			'matches'=> '%s dont match',
			'min_length' => '%s too short'
		]);
		$this->form_validation->set_rules('level','Level','required');
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		$this->form_validation->set_rules('address','Address','required');

		$this->form_validation->set_message('required','%s cannot be empty');

		if( $this->form_validation->run() == FALSE ) {
			$data['title'] = "Add data user page";
			$this->template->load('template', 'user/user_form_add',$data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->User_m->add($post);
			if($this->db->affected_rows() == 1) {
				echo "
					<script>
						alert('Succesfully added data');
						window.location ='".site_url('user')."' ;
					</script>
				";
			}
		}

	}


	public function del() {
		$post = $this->input->post(null, TRUE);
		$item = $this->User_m->get($post['user_id'])->row();
		if($item->image != 'default.jpg') {
			unlink(FCPATH.'./assets/images/profil/'.$item->image);
		}

		$id = $this->input->post('user_id');
		$this->User_m->del($id);
		if($this->db->affected_rows() == 1) {
				echo "
					<script>
						alert('Succesfully deleted data');
						window.location ='".site_url('user')."' ;
					</script>
				";
			}
	}


	public function edit($id) {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('level','Level','required');

		if($this->form_validation->run() == FALSE) {
			$query = $this->User_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['title'] = "Update data user page";
				$this->template->load('template', 'user/user_form_edit',$data);
			} else {
				echo "
					<script>
						alert('Not found data');
						window.location ='".site_url('user')."' ;
					</script>
				";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->User_m->edit($post);
			if($this->db->affected_rows() == 1) {
				echo "
					<script>
						alert('Succesfully update data');
						window.location ='".site_url('user')."' ;
					</script>
				";
				}

			}
	}



}