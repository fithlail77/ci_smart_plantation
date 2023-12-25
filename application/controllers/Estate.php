<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estate extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'Estate';
				$data['title'] = 'Data Estate';
				$data['user'] = $user;
				$data['estate'] = $this->m_estate->getEstate();
				$data['branch'] = $this->m_company->getBranch();

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/estate', $data);
				$this->load->view('include/footer');
			
			} else {
				redirect('user');
			}
		}
	}

	public function tmbEst()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'Estate';
				$data['title'] = 'Data Estate';
				$data['user'] = $user;
				$data['estate'] = $this->m_estate->getEstate();
				$data['branch'] = $this->m_company->getBranch();

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('estate/tmbest', $data);
				$this->load->view('include/footer');
			
			} else {
				redirect('user');
			}
		}
	}

	public function addEstate()
	{
		$data = [
			'company' => $this->input->post('branch_id'),
			'estate_code' => $this->input->post('estate_code'),
			'estate_name' => $this->input->post('estate_name')
		];

		$this->m_estate->save($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
		redirect('estate');
	}

	public function editEstate()
	{
		$data = [
			'company' => $this->input->post('branch_id'),
			'estate_code' => $this->input->post('estate_code'),
			'estate_name' => $this->input->post('estate_name')
		];

		$id = $this->input->post('estate_id');
		$this->m_estate->update($data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah Data Berhasil!</div>');
		redirect('estate');
	}

	public function delEstate($id)
	{
		$this->m_estate->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus Data Berhasil!</div>');
		redirect('estate');
	}
}