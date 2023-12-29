<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart extends CI_Model {

    public function chart_chdaily() 
    {
        $sql = "select ch_id, ch_estate, sum(ch) as ch, date from m_ch where date = SUBDATE(CURRENT_DATE(),2) group by ch_estate";
        return $this->db->query($sql);
    }
        
}
