<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index() {
		$data['title'] = "profil page";

		$this->template->load('template','profil/view',$data);
	}


	public function edit() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|trim|callback_username_check');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');

		if( $this->form_validation->run() == FALSE ) {
			$data['title'] = "Update profil page";
			$this->template->load('template','profil/edit', $data);
		} else {

			$user_id = $this->input->post('user_id', TRUE);
			$username = $this->input->post('username', TRUE);
			$name = $this->input->post('name', TRUE);
			$address = $this->input->post('address', TRUE);

			$upload_image = $_FILES['image']['name'];
			if($upload_image) {
				$config['allowed_types'] = 'gif|png|jpg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/images/profil/';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('image')) {
					$old_image = $this->fungsi->user_login()->image;
					if($old_image != 'default.jpg') {
						unlink(FCPATH.'assets/images/profil/'.$old_image);
					} 

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);  
				} else {
					echo $this->upload->display_errors();
				}
			}


			$this->db->set('username',$username);
			$this->db->set('name',$name);
			$this->db->set('address',$address);
			$this->db->where('user_id',$user_id);
			$this->db->update('user');

			redirect(base_url('profil'));
		}
	}


	function username_check() {
		$this->load->library('form_validation');
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]' ");
		if($query->num_rows() > 0 ) {
			$this->form_validation->set_message('username_check', 'Username has been used');
			return FALSE;
		} else {
			return TRUE;
		}
	}


	public function changePassword() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('current_password','Current password','required|trim');
		$this->form_validation->set_rules('new_password1','New password','required|trim|min_length[5]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2','Confirm Password password','required|trim|matches[new_password1]');

		if( $this->form_validation->run() == FALSE ) {
			$data['title'] = "Change Password";
			$this->template->load('template','profil/change', $data);
		} else {
			$current_password = sha1($this->input->post('current_password'));
			$new_password = sha1($this->input->post('new_password1'));
			if($current_password != $this->fungsi->user_login()->password) {
				redirect(base_url('profil/change'));
			} else {
				if($current_password == $new_password) {
					redirect(base_url('profil/change'));
				} else {
					$this->db->set('password',$new_password);
					$this->db->where('user_id', $this->fungsi->user_login()->user_id);
					$this->db->update('user');
					redirect(base_url('profil'));
				}
			}
		}

	}



}