<?php
class Rank_model extends CI_Model{

  function get_rank()
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 3
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 3
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 3
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 3
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 3
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
      $this->db->where('mantri.id_level','2');
      $result = $this->db->get();
      return $result;
	}

  function get_end()
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022  and MONTH(saving.tgl)= 3
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 3
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 3
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 3
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 3
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
      
      
      $this->db->limit(15 ,96);
      $this->db->where('mantri.id_level','2');
      
      $result = $this->db->get();
      return $result;
	}

    function get_rank_unit()
	{
  $query_count_saving = "select account.branch, count(saving.pn) as p_saving
  from mantri
  join account on mantri.branch = account.branch
  join saving on saving.pn = mantri.pn
  WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 3
  GROUP by branch";
  $query_count_brimo = "select account.branch, count(brimo.pn) as p_brimo
  from mantri
  join account on mantri.branch = account.branch
  join brimo on brimo.pn = mantri.pn
  WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 3
  GROUP by branch";
  $query_count_qris = "select account.branch, count(qris.pn) as p_qris
  from mantri
  join account on mantri.branch = account.branch
  join qris on qris.pn = mantri.pn
  WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 3
  GROUP by branch";
  $query_count_stroberikasir = "select account.branch, count(stroberikasir.pn) as p_stroberi
  from mantri
  join account on mantri.branch = account.branch
  join stroberikasir on stroberikasir.pn = mantri.pn
  WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 3
  GROUP by branch";

  $query_count_kunjual = "select account.branch, count(kunjual.pn) as p_kunjual
  from mantri
  join account on mantri.branch = account.branch
  join kunjual on kunjual.pn = mantri.pn
  WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 3
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
    $this->db->where('account.kd',1);
    $result = $this->db->get();
    return $result;
	}

  function get_ritel()
	{
    $query_sum_bankgaransi = "SELECT bankgaransi.pn as pn, sum(bankgaransi.plafond) as tot_bankgaransi FROM bankgaransi
      WHERE YEAR(bankgaransi.tgl) = 2022 and MONTH(bankgaransi.tgl)= 3
      GROUP BY bankgaransi.pn";
    $query_count_bristore = "SELECT bristore.pn as pn, count(bristore.pn) as tot_bristore
      FROM bristore
      WHERE YEAR(bristore.tgl) = 2022 and MONTH(bristore.tgl)= 3
      GROUP BY bristore.pn";
    $query_count_ibbiz = "SELECT ibbiz.pn as pn, IFNULL(count(ibbiz.pn), 0) as tot_ibbiz
      FROM ibbiz
      WHERE YEAR(ibbiz.tgl) = 2022 and MONTH(ibbiz.tgl)= 3
      GROUP BY ibbiz.pn";
    $query_count_britamabisnis = "SELECT britamabisnis.pn as pn, IFNULL(count(britamabisnis.norek), 0) as tot_britamabisnis
      FROM britamabisnis
      WHERE YEAR(britamabisnis.tgl) = 2022 and MONTH(britamabisnis.tgl)= 3
      GROUP BY britamabisnis.pn";
    $query_sum_premi = "SELECT premi.pn as pn, sum(premi.plafond) as tot_premi FROM premi
      WHERE YEAR(premi.tgl) = 2022 and MONTH(premi.tgl)= 3
      GROUP BY premi.pn";
    $query_sum_penyalurankur = "SELECT penyalurankur.pn as pn, sum(penyalurankur.plafond) as tot_penyalurankur FROM penyalurankur
      WHERE YEAR(penyalurankur.tgl) = 2022 and MONTH(penyalurankur.tgl)= 3
      GROUP BY penyalurankur.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 3
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 3
      GROUP BY qris.pn";
    $query_sum_realkecil = "SELECT realkecil.pn as pn, sum(realkecil.plafond) as tot_realkecil FROM realkecil
      WHERE YEAR(realkecil.tgl) = 2022 and MONTH(realkecil.tgl)= 3
      GROUP BY realkecil.pn";
    $query_sum_ekstrakom = "SELECT ekstrakom.pn as pn, sum(ekstrakom.plafond) as tot_ekstrakom FROM ekstrakom
      WHERE YEAR(ekstrakom.tgl) = 2022 and MONTH(ekstrakom.tgl)= 3
      GROUP BY ekstrakom.pn";
    
    $query_count_targetmantri = "select mantri.pn, 
    sum(ritel.t_bankgaransi) as tbankgaransi, 
    sum(ritel.t_bristore) as tbristore,
    sum(ritel.t_ibbiz) as tibbiz, 
    sum(ritel.t_britama) as tbritama, 
    sum(ritel.t_pemi) as tpemi, 
    sum(ritel.t_penyalurankur) as tpenyalurankur, 
    sum(mantri.brimo) as tbrimo, 
    sum(mantri.qris) as tqris, 
    sum(ritel.t_realkeci) as trealkeci,
    sum(ritel.t_ekstrakom) as tekstrakom,  
     
    sum(ritel.b_bankgaransi) as bbankgaransi, 
    sum(ritel.b_bristore) as bbristore,
    sum(ritel.b_ibbiz) as bibbiz, 
    sum(ritel.b_britama) as bbritama, 
    sum(ritel.b_premi) as bpremi, 
    sum(ritel.b_penyalurankur) as bpenyalurankur, 
    sum(mantri.bbrimo) as bbrimo, 
    sum(mantri.bqris) as bqris, 
    sum(ritel.b_realkecil) as brealkecil,
    sum(ritel.b_ekstrakom) as bekstrakom 
    
    from mantri join ritel on ritel.id_target = mantri.side 
    
    GROUP by mantri.pn";
    

	  $this->db->select('mantri.pn, mantri.nama_mantri,
    bbankgaransi,
    bbristore,
    bibbiz,
    bbritama,
    bpremi, 
    bpenyalurankur, 
    mantri.bbrimo, 
    mantri.bqris,
    brealkecil,
    bekstrakom,
  
      
      IFNULL(sum_bankgaransi.tot_bankgaransi, 0) as a,
      IFNULL(count_bristore.tot_bristore, 0) as b,
      IFNULL(count_ibbiz.tot_ibbiz, 0) as c,
      IFNULL(count_britamabisnis.tot_britamabisnis, 0) as d,
      IFNULL(sum_premi.tot_premi, 0) as e,
      IFNULL(sum_penyalurankur.tot_penyalurankur, 0) as f,
      IFNULL(count_brimo.tot_brimo, 0) as g,
      IFNULL(count_qris.tot_qris, 0) as h,
      IFNULL(sum_realkecil.tot_realkecil, 0) as i,
      IFNULL(sum_ekstrakom.tot_ekstrakom, 0) as j,

      ((SELECT(a))/count_targetmantri.tbankgaransi) * 100 as real_a,     
      ((SELECT(b))/count_targetmantri.tbristore) * 100 as real_b,
      ((SELECT(c))/count_targetmantri.tibbiz) * 100 as real_c,
      ((SELECT(d))/count_targetmantri.tbritama) * 100 as real_d,
      ((SELECT(e))/count_targetmantri.tpemi) *100 as real_e,
      ((SELECT(f))/count_targetmantri.tpenyalurankur) * 100 as real_f,
      ((SELECT(g))/count_targetmantri.tbrimo) * 100 as real_g,
      ((SELECT(h))/count_targetmantri.tqris) * 100 as real_h,
      ((SELECT(i))/count_targetmantri.trealkeci) * 100 as real_i,
      ((SELECT(j))/count_targetmantri.tekstrakom) * 100 as real_j,
     
      ROUND(((SELECT(real_a + real_b + real_c + real_d + real_e + real_f + real_g + real_h + real_i + real_j)/1) * 1), 2) as scores');
    $this->db->from('mantri');
    $this->db->join("($query_sum_bankgaransi) as sum_bankgaransi", 'mantri.pn = sum_bankgaransi.pn', 'left');
    $this->db->join("($query_count_bristore) as count_bristore", 'mantri.pn = count_bristore.pn', 'left');
    $this->db->join("($query_count_ibbiz) as count_ibbiz", 'mantri.pn = count_ibbiz.pn', 'left');
    $this->db->join("($query_count_britamabisnis) as count_britamabisnis", 'mantri.pn = count_britamabisnis.pn', 'left');
    $this->db->join("($query_sum_premi) as sum_premi", 'mantri.pn = sum_premi.pn', 'left');
    $this->db->join("($query_sum_penyalurankur) as sum_penyalurankur", 'mantri.pn = sum_penyalurankur.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_sum_realkecil) as sum_realkecil", 'mantri.pn = sum_realkecil.pn', 'left');
    $this->db->join("($query_sum_ekstrakom) as sum_ekstrakom", 'mantri.pn = sum_ekstrakom.pn', 'left');
    $this->db->join("($query_count_targetmantri) as count_targetmantri", 'mantri.pn = count_targetmantri.pn', 'left'); 
    $this->db->join("ritel", 'ritel.id_target = mantri.side'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('real_a','DESC');
      //$this->db->limit(10);
      
      $result = $this->db->get();
      return $result;
	}
}