<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportch extends CI_Controller {

    public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'Laporan Curah Hujan';
				$data['title'] = 'Laporan CH';
				$data['user'] = $user;

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/rptch', $data);
				$this->load->view('include/footer');
			
			} else {
				redirect('user');
			}
		}
	}
}