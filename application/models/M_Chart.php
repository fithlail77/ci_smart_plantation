<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart extends CI_Model {

    public function chart_chdaily() 
    {
        $sql = "select ch_id, ch_estate, sum(ch) as ch, date from m_ch where date = SUBDATE(CURRENT_DATE(),1) group by ch_estate";
        return $this->db->query($sql);
    }

    public function chart_yearly()
    {
        $sqly = "select YEAR(date) as tahun, SUM(ch) as totalch from m_ch group by YEAR(date)";
        return $this->db->query($sqly);
    }

    public function chart_estate_sdg()
    {
        $sqlsdg = "select ch_estate, YEAR(date) as tahun, SUM(ch) as totalch from m_ch where ch_estate = 'SEDADUNG' group by YEAR(date)";
        return $this->db->query($sqlsdg);
    }

    public function chart_estate_mlr()
    {
        $sqlmlr = "select ch_estate, YEAR(date) as tahun, SUM(ch) as totalch from m_ch where ch_estate = 'MELAMOR' group by YEAR(date)";
        return $this->db->query($sqlmlr);
    }

    public function chart_estate_tgg()
    {
        $sqltgg = "select ch_estate, YEAR(date) as tahun, SUM(ch) as totalch from m_ch where ch_estate = 'TUGANG' group by YEAR(date)";
        return $this->db->query($sqltgg);
    }
    
    public function chart_estate_mlu()
    {
        $sqltgg = "select ch_estate, YEAR(date) as tahun, SUM(ch) as totalch from m_ch where ch_estate = 'MULAU' group by YEAR(date)";
        return $this->db->query($sqltgg);
    }

    public function chart_estate_ngr()
    {
        $sqlngr = "select ch_estate, YEAR(date) as tahun, SUM(ch) as totalch from m_ch where ch_estate = 'NGARING' group by YEAR(date)";
        return $this->db->query($sqlngr);
    }

    public function chart_estate_gmo()
    {
        $sqlngr = "select ch_estate, YEAR(date) as tahun, SUM(ch) as totalch from m_ch where ch_estate = 'GMO' group by YEAR(date)";
        return $this->db->query($sqlngr);
    }
}
