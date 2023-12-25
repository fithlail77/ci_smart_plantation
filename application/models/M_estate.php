<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_estate extends CI_Model {

	public function getEstate($estate_id = '')
	{
		if($estate_id) {
			return $this->db->get_where('m_estate', ['estate_id' => $estate_id])->row_array();
		} else {
			return $this->db->get('m_estate')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('m_estate', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('m_estate', $data, ['estate_id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('m_estate', ['estate_id' => $id]);
	}
}