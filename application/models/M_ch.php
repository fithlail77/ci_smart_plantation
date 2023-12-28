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

	public function delCH($ch)
	{
		return $this->db->delete('m_ch',['ch_id' => $ch]);
	}

	public function update($dataedit, $id)
	{
		return $this->db->update('m_ch', $dataedit, ['ch_id' => $id]);
	}

	public function getChByDate()
	{
		$this->db->select('*')
			     ->from('m_ch')
				 ->where('date = SUBDATE(CURRENT_DATE(),1)');
		$get = $this->db->get();
		return $get->result();
	}

	public function data_grafik($filter)
	{
		$this->db->select('count(*) as data, ch_estate');
		$this->db->from('m_ch');
		$this->db->where($filter);
		$this->db->group_by('ch_estate');
		return $this->db->get()->result();
	}

	public function get_estate()
	{
		$this->db->select('distinct(ch_estate)');
		return $this->db->get('m_ch')->result();
	}

	public function data_grafik_stack($estate)
	{
		$this->db->select("$estate as estate, (SELECT SUM('ch') from m_ch where ch_estate = '$estate' and date = 'SUBDATE(CURRENT_DATE(),1)') as data_sedadung,
			(SELECT SUM('ch') from m_ch where ch_estate = '$estate' and date = 'SUBDATE(CURRENT_DATE(),1)') as data_melamor");
		$this->db->from('m_ch');
		$this->db->limit(1);
		return $this->db->get()->result();
	}
}