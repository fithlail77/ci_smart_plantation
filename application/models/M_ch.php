<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ch extends CI_Model {

	public function getCh($ch_id = '')
	{
		if($ch_id) {
			return $this->db->get_where('m_ch', ['ch_id' => $ch_id])->row_array();
		} else {
			return $this->db->get('m_ch')->result();
		}
	}

	public function save_batch($data)
	{
		return $this->db->insert_batch('m_ch', $data);
	}

	public function upload_batch($data)
	{
		$this->db->insert_batch('m_ch', $data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
}