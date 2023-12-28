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
				$data['estate'] = $this->m_estate->getEstate();

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/rptch', $data);
				$this->load->view('include/footer');
			
			} else {
				redirect('user');
			}
		}
	}

	public function data_grafik()
	{
		$fd = $this->filter();
		$filtering = $fd['filter'];
		$grafik = $this->m_ch->data_grafik($filtering);
		echo $data = json_encode($grafik);
	}

	public function data_grafik_stack()
	{
		$get_estate = $this->m_ch->get_estate();
		$data = [];
		foreach ($get_estate as $estate) {
			$grafik = $this->m_ch->data_grafik_stack($estate->ch_estate);
			array_push($data, $grafik);
		}
		echo $data = json_encode($data);
	}

	private function filter()
	{
		$filter_nama = $this->input->post('filter_nama');
		if ($filter_nama != '') {
			$filter_nama = ['ch_estate' => $filter_nama];
		} else {
			$filter_nama = [];
		}
		return ['filter' => $filter_nama];
	}
}