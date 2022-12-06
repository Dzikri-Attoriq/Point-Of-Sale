<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login() {
		check_already_login();
		$data['title'] = "Halaman Login";
		$this->load->view('login', $data);
	}

	public function process() {
		$post = $this->input->post(null, TRUE);
		if( $post['login'] ) {
			$this->load->model('User_m');
			$query = $this->User_m->login($post);
			?>
				<link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
				<link rel="stylesheet" href="<?= base_url()?>assets/plugins/sweetalert2/animate.min.css">
				<script src="<?= base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
				<style>
					body {
						font-family: "Helvrtica Neue", Helvetica, Arial, sans-serif;
						font-size: 1.124em;
						font-weight: normal;
					}
				</style>
				<body></body>
			<?php
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = [
					'user_id' => $row->user_id,
					'level' => $row->level,

				];
				$this->session->set_userdata($params);
				?>
				
				<script>
					Swal.fire({
		              icon: 'success',
		              title: 'Berhasil Login!',
		              text: 'Selamat login berhasil!',
		              showClass: {
		                popup: 'animate__animated animate__zoomInDown'
		              }
		              // footer: '<a href="">Why do I have this issue?</a>'
		            }).then((result) => {
		              window.location = '<?= site_url('dashboard'); ?>';
		            })
				</script>
				<?php
			} else {
				?>
				<script>
					Swal.fire({
		              icon: 'error',
		              title: 'Gagal Login!',
		              text: 'Username/Password Salah',
		              showClass: {
		                popup: 'animate__animated animate__swing'
		              }
		              // footer: '<a href="">Why do I have this issue?</a>'
		            }).then((result) => {
		              window.location = '<?= site_url('auth/login'); ?>';
		            })
				</script>
				<?php
			}
		} 
	}


	public function logout() {
		$params = array('user_id','level');
		$this->session->unset_userdata($params);
		redirect(base_url('auth/login'));
	}


}