<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart extends CI_Model {

    public function chart_database() {
        //return $this->db->query('SELECT SUM(ch) FROM m_ch GROUP BY ch_estate,date')->result();
        //$get = $this->db->get();
        //return $get->result();      
        //return $this->db->get('m_ch')->result();

        $sql = "select ch_Estate, SUM(ch) as totalch, date from m_ch where date = SUBDATE(CURRENT_DATE(),1) GROUP BY ch_estate;";
        return $this->db->query($sql);
    }

}
