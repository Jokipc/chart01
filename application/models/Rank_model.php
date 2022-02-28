<?php
class Rank_model extends CI_Model{

  function get_rank()
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 
      GROUP BY kunjual.pn";
    
    

	  $this->db->select('mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,


      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual  )/1) * 1), 2) as scores');
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      
      $result = $this->db->get();
      return $result;
	}

  function get_end()
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 
      GROUP BY kunjual.pn";
    
    

	  $this->db->select('mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,


      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual  )/1) * 1), 2)as scores');
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      
      $this->db->order_by('scores','desc');
      
      
      $this->db->limit(15 ,95);
      
      $result = $this->db->get();
      return $result;
	}

    function get_rank_unit()
	{
  $query_count_saving = "select account.branch, count(saving.pn) as p_saving
  from mantri
  join account on mantri.branch = account.branch
  join saving on saving.pn = mantri.pn
  GROUP by branch";
  $query_count_brimo = "select account.branch, count(brimo.pn) as p_brimo
  from mantri
  join account on mantri.branch = account.branch
  join brimo on brimo.pn = mantri.pn
  GROUP by branch";
  $query_count_qris = "select account.branch, count(qris.pn) as p_qris
  from mantri
  join account on mantri.branch = account.branch
  join qris on qris.pn = mantri.pn
  GROUP by branch";
  $query_count_stroberikasir = "select account.branch, count(stroberikasir.pn) as p_stroberi
  from mantri
  join account on mantri.branch = account.branch
  join stroberikasir on stroberikasir.pn = mantri.pn
  GROUP by branch";

  $query_count_kunjual = "select account.branch, count(kunjual.pn) as p_kunjual
  from mantri
  join account on mantri.branch = account.branch
  join kunjual on kunjual.pn = mantri.pn
  GROUP by branch";

  $query_count_mantri = "select branch, count(mantri.pn)-1 as jmlmantri 
  
  from mantri GROUP by branch";

  $query_count_target = "select account.branch, 
  sum(mantri.brimo) as tbrimo, 
  sum(mantri.saving) as tsaving, 
  sum(mantri.kunjual) as tkunjual, 
  sum(mantri.qris) as tqris, 
  sum(mantri.stroberikasir) as tstroberikasir,
  sum(mantri.bbrimo) as bbrimo, 
  sum(mantri.bsaving) as bsaving, 
  sum(mantri.bkunjual) as bkunjual, 
  sum(mantri.bqris) as bqris, 
  sum(mantri.bstroberikasir) as bstroberikasir
  
  from account join mantri on mantri.branch = account.branch 
  GROUP by branch";

  $this->db->select('account.branch, account.unit,tbrimo,
    
    IFNULL(count_saving.p_saving, 0) as tot_s,
    IFNULL(count_brimo.p_brimo, 0) as tot_b,
    IFNULL(count_qris.p_qris, 0) as tot_q,
    IFNULL(count_stroberikasir.p_stroberi, 0) as tot_str,
    IFNULL(count_kunjual.p_kunjual, 0) as tot_k,

    (((SELECT(tot_s))/tsaving)) * bsaving as real_saving,
    ((SELECT(tot_b))/tbrimo)* bbrimo as real_brimo,
    ((SELECT(tot_q))/tqris)* bqris as real_qris,
    ((SELECT(tot_str))/tstroberikasir)* bstroberikasir as real_stroberikasir,
    ((SELECT(tot_k))/tkunjual) * bkunjual as real_kunjual,
    ROUND(((SELECT(real_saving + real_brimo + real_qris + real_kunjual + real_stroberikasir )/jmlmantri ) * 1), 2) as scores');
  $this->db->from('account');
  $this->db->join("($query_count_saving) as count_saving", 'account.branch = count_saving.branch', 'left');
  $this->db->join("($query_count_brimo) as count_brimo", 'account.branch = count_brimo.branch', 'left');
  $this->db->join("($query_count_qris) as count_qris", 'account.branch = count_qris.branch', 'left');
  $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'account.branch = count_stroberikasir.branch', 'left');
  $this->db->join("($query_count_kunjual) as count_kunjual", 'account.branch = count_kunjual.branch', 'left'); 
   $this->db->join("($query_count_target) as count_target", 'account.branch = count_target.branch', 'left'); 
   $this->db->join("($query_count_mantri) as count_mantri", 'account.branch = count_mantri.branch', 'left');  
    //$this->db->select_sum('tbl_real.plafon');
    $this->db->order_by('scores','DESC');
    //$this->db->limit(10);
    
    $result = $this->db->get();
    return $result;
	}

}