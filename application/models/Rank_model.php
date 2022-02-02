<?php
class Rank_model extends CI_Model{

  function get_rank()
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      
      GROUP BY stroberikasir.pn";

	  $this->db->select('mantri.nama_mantri,
      mantri.stroberikasir,
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      ((SELECT(tot_s))/mantri.saving) as real_saving,
      ((SELECT(tot_b))/mantri.brimo) as real_brimo,
      ((SELECT(tot_q))/mantri.qris) as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) as real_stroberikasir,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir)/4) * 100), 2) as scores');
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      $this->db->limit(10);
      
      $result = $this->db->get();
      return $result;
	}

 

}