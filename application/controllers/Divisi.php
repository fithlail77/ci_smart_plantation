<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'Divisi';
				$data['title'] = 'Data Divisi';
				$data['user'] = $user;
				$data['divisi'] = $this->m_divisi->getDivisi();
				$data['estate'] = $this->m_estate->getEstate();
				$data['branch'] = $this->m_company->getBranch();

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/divisi', $data);
				$this->load->view('include/footer');
			
			} else {
				redirect('user');
			}
		}
	}

	public function addDivisi()
	{
		$data = [
			'company' => $this->input->post('branch_id'),
			'estate_name' => $this->input->post('estate_id'),
			'division' => $this->input->post('division')	
		];

		$this->m_divisi->save($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
		redirect('divisi');
	}

	public function editDivisi()
	{
		$data = [
			'company' => $this->input->post('branch_id'),
			'estate_name' => $this->input->post('estate_name'),
			'division' => $this->input->post('division')	
		];

		$id = $this->input->post('division_id');
		$this->m_divisi->update($data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah Data Berhasil!</div>');
		redirect('divisi');
	}

	public function delDivisi($id)
	{
		$this->m_divisi->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus Data Berhasil!</div>');
		redirect('divisi');
	}
}