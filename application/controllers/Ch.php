<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Ch extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_ch');
	}
	
	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'Curah Hujan';
				$data['title'] = 'Data Curah Hujan';
				$data['user'] = $user;
				$data['hujan'] = $this->m_ch->getCh();
				$data['estate'] = $this->m_estate->getEstate();
				$data['branch'] = $this->m_company->getBranch();

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/ch', $data);
				$this->load->view('include/footer');
			
			} else {
				redirect('user');
			}
		}
	}

	public function tmbCh()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$data['menu'] = 'Curah Hujan';
		$data['title'] = 'Tambah Data Curah Hujan';
		$data['user'] = $user;
		$data['hujan'] = $this->m_ch->getCh();
		$data['estate'] = $this->m_estate->getEstate();
		$data['branch'] = $this->m_company->getBranch();

		$this->load->view('include/header', $data);
		$this->load->view('include/sidebar', $data);
		$this->load->view('ch/tmbch', $data);
		$this->load->view('include/footer');

	}

	public function save()
	{
		$company = $_POST['branch_id'];
		$ch_estate = $_POST['estate_id'];
		$ch_division = $_POST['division_id'];
		$ch = $_POST['ch'];
		$date = $_POST['tgl'];
		$time = $_POST['time'];
		$createdat = date('Y-m-d');
		$createdby = $this->session->userdata('username');
		$data = array();

		$index = 0;
		foreach($company as $dtcomp) {
			array_push($data, array(
				'company' => $dtcomp,
				'ch_estate' => $ch_estate[$index],
				'ch_division' => $ch_division[$index],
				'ch' => $ch[$index],
				'date' => $date[$index],
				'time' => $time[$index],
				'createdat' => $createdat[$index],
				'createdby' => $createdby[$index]
			)); 
			
			$index++;
		}

		$sql = $this->m_ch->save_batch($data);
		if($sql) {
			echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('ch')."';</script>";
		}else {
			echo "<script>alert('Data gagal disimpan');window.location = '".base_url('ch/tmbch')."';</script>";
		}
	}

	public function uploadCh()
	{
		$uploadCh = $_FILES['uploadCh']['name'];
		$extension = pathinfo($uploadCh,PATHINFO_EXTENSION);
		if($extension == 'csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		}else if($extension == 'xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}

		$spreadsheet = $reader->load($_FILES['uploadCh']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount > 1)
		{
			$data = array();
			for ($i=1; $i<$sheetcount; $i++) {
				$company = $sheetdata[$i][0];
				$ch_estate = $sheetdata[$i][1];
				$ch_division = $sheetdata[$i][2];
				$ch = $sheetdata[$i][3];
				$date = $sheetdata[$i][4];
				$time = $sheetdata[$i][5];
				$data[] = array(
					'company' => $company,
					'ch_estate' => $ch_estate,
					'ch_division' => $ch_division,
					'ch' => $ch,
					'date' => $date,
					'time' => $time,
				);
			}
			$insertdata = $this->m_ch->upload_batch($data);
			if($insertdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Upload Berhasil.</div>');
				redirect('ch');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-success">Upload Gagal...!</div>');
				redirect('ch');
			}
		}
	}

	public function delch($ch)
	{
		$this->m_ch->delCH($ch);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus Data Berhasil....!</div>');
		redirect('ch');
	}
}