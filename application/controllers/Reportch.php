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
				$data['chartch'] = $this->m_chart->chart_chdaily()->result();
				$data['chartchy'] = $this->m_chart->chart_yearly()->result();
				$data['chartsdg'] = $this->m_chart->chart_estate_sdg()->result();
				$data['chartmlr'] = $this->m_chart->chart_estate_mlr()->result();
				$data['charttgg'] = $this->m_chart->chart_estate_tgg()->result();
				$data['chartmlu'] = $this->m_chart->chart_estate_mlu()->result();
				$data['chartngr'] = $this->m_chart->chart_estate_ngr()->result();
				$data['chartgmo'] = $this->m_chart->chart_estate_gmo()->result();
				
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