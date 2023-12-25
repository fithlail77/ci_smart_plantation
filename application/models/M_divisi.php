<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_divisi extends CI_Model {

	public function getDivisi($division_id = '')
	{
		if($division_id) {
			return $this->db->get_where('m_division', ['division_id' => $division_id])->row_array();
		} else {
			return $this->db->get('m_division')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('m_division', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('m_division', $data, ['division_id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('m_division', ['division_id' => $id]);
	}
}