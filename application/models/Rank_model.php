<?php
class Rank_model extends CI_Model{

  function get_rank() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
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
      WHERE YEAR(saving.tgl) = 2022  and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
      FROM umi
      WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
      GROUP BY umi.pn";

$this->db->select('mantri.nama_mantri,account.unit,
 
 IFNULL(count_saving.tot_saving, 0) as tot_s,
 IFNULL(count_brimo.tot_brimo, 0) as tot_b,
 IFNULL(count_qris.tot_qris, 0) as tot_q,
 IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
 IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
 IFNULL(count_umi.tot_umi, 0) as tot_u,

 ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
 ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
 ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
 ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
 ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
 ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
 ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');

$this->db->from('mantri');
$this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
$this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
$this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
$this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
$this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
$this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
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
  WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
  GROUP by branch";
  $query_count_brimo = "select account.branch, count(brimo.pn) as p_brimo
  from mantri
  join account on mantri.branch = account.branch
  join brimo on brimo.pn = mantri.pn
  WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
  GROUP by branch";
  $query_count_qris = "select account.branch, count(qris.pn) as p_qris
  from mantri
  join account on mantri.branch = account.branch
  join qris on qris.pn = mantri.pn
  WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
  GROUP by branch";
  $query_count_stroberikasir = "select account.branch, count(stroberikasir.pn) as p_stroberi
  from mantri
  join account on mantri.branch = account.branch
  join stroberikasir on stroberikasir.pn = mantri.pn
  WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
  GROUP by branch";

  $query_count_kunjual = "select account.branch, count(kunjual.pn) as p_kunjual
  from mantri
  join account on mantri.branch = account.branch
  join kunjual on kunjual.pn = mantri.pn
  WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
  GROUP by branch";

  $query_count_umi = "select account.branch, count(umi.pn) as p_umi
  from mantri
  join account on mantri.branch = account.branch
  join umi on umi.pn = mantri.pn
  WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
  GROUP by branch";

  $query_count_mantri = "select branch, count(mantri.pn)-1 as jmlmantri 
  
  from mantri GROUP by branch";

  $query_count_target = "select account.branch, 
  sum(mantri.brimo) as tbrimo, 
  sum(mantri.saving) as tsaving, 
  sum(mantri.kunjual) as tkunjual, 
  sum(mantri.qris) as tqris, 
  sum(mantri.stroberikasir) as tstroberikasir,
  sum(mantri.umi) as tumi, 
  sum(mantri.bbrimo) as bbrimo, 
  sum(mantri.bsaving) as bsaving, 
  sum(mantri.bkunjual) as bkunjual, 
  sum(mantri.bqris) as bqris, 
  sum(mantri.bstroberikasir) as bstroberikasir,
  sum(mantri.bumi) as bumi
  
  from account join mantri on mantri.branch = account.branch 
  
  GROUP by branch";

  $this->db->select('account.branch, account.unit,tbrimo,
    
    IFNULL(count_saving.p_saving, 0) as tot_s,
    IFNULL(count_brimo.p_brimo, 0) as tot_b,
    IFNULL(count_qris.p_qris, 0) as tot_q,
    IFNULL(count_stroberikasir.p_stroberi, 0) as tot_str,
    IFNULL(count_kunjual.p_kunjual, 0) as tot_k,
    IFNULL(count_umi.p_umi, 0) as tot_u,

    (((SELECT(tot_s))/tsaving)) * bsaving as real_saving,
    ((SELECT(tot_b))/tbrimo)* bbrimo as real_brimo,
    ((SELECT(tot_q))/tqris)* bqris as real_qris,
    ((SELECT(tot_str))/tstroberikasir)* bstroberikasir as real_stroberikasir,
    ((SELECT(tot_k))/tkunjual) * bkunjual as real_kunjual,
    ((SELECT(tot_u))/tumi) * bumi as real_umi,
    ROUND(((SELECT(real_saving + real_brimo + real_qris + real_kunjual + real_stroberikasir + real_umi )/jmlmantri ) * 1), 2) as scores');
  $this->db->from('account');
  $this->db->join("($query_count_saving) as count_saving", 'account.branch = count_saving.branch', 'left');
  $this->db->join("($query_count_brimo) as count_brimo", 'account.branch = count_brimo.branch', 'left');
  $this->db->join("($query_count_qris) as count_qris", 'account.branch = count_qris.branch', 'left');
  $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'account.branch = count_stroberikasir.branch', 'left');
  $this->db->join("($query_count_kunjual) as count_kunjual", 'account.branch = count_kunjual.branch', 'left'); 
  $this->db->join("($query_count_umi) as count_umi", 'account.branch = count_umi.branch', 'left');
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
      WHERE YEAR(bankgaransi.tgl) = 2022 and MONTH(bankgaransi.tgl)= 6
      GROUP BY bankgaransi.pn";
    $query_count_bristore = "SELECT bristore.pn as pn, count(bristore.pn) as tot_bristore
      FROM bristore
      WHERE YEAR(bristore.tgl) = 2022 and MONTH(bristore.tgl)= 6
      GROUP BY bristore.pn";
    $query_count_ibbiz = "SELECT ibbiz.pn as pn, IFNULL(count(ibbiz.pn), 0) as tot_ibbiz
      FROM ibbiz
      WHERE YEAR(ibbiz.tgl) = 2022 and MONTH(ibbiz.tgl)= 6
      GROUP BY ibbiz.pn";
    $query_count_britamabisnis = "SELECT britamabisnis.pn as pn, IFNULL(count(britamabisnis.norek), 0) as tot_britamabisnis
      FROM britamabisnis
      WHERE YEAR(britamabisnis.tgl) = 2022 and MONTH(britamabisnis.tgl)= 6
      GROUP BY britamabisnis.pn";
    $query_sum_premi = "SELECT premi.pn as pn, sum(premi.plafond) as tot_premi FROM premi
      WHERE YEAR(premi.tgl) = 2022 and MONTH(premi.tgl)= 6
      GROUP BY premi.pn";
    $query_sum_penyalurankur = "SELECT penyalurankur.pn as pn, sum(penyalurankur.plafond) as tot_penyalurankur FROM penyalurankur
      WHERE YEAR(penyalurankur.tgl) = 2022 and MONTH(penyalurankur.tgl)= 6
      GROUP BY penyalurankur.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_sum_realkecil = "SELECT realkecil.pn as pn, sum(realkecil.plafond) as tot_realkecil FROM realkecil
      WHERE YEAR(realkecil.tgl) = 2022 and MONTH(realkecil.tgl)= 6
      GROUP BY realkecil.pn";
    $query_sum_ekstrakom = "SELECT ekstrakom.pn as pn, sum(ekstrakom.plafond) as tot_ekstrakom FROM ekstrakom
      WHERE YEAR(ekstrakom.tgl) = 2022 and MONTH(ekstrakom.tgl)= 6
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
      $this->db->where('mantri.side',4);
      $result = $this->db->get();
      return $result;
	}
  function get_dana()
	{
   

    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
      
    $query_count_pkspayroll = "SELECT pkspayroll.pn as pn, IFNULL(count(pkspayroll.pn), 0) as tot_pkspayroll
      FROM pkspayroll
      WHERE YEAR(pkspayroll.tgl) = 2022 and MONTH(pkspayroll.tgl)= 6
      GROUP BY pkspayroll.pn";
      
    $query_count_edcmerchant = "SELECT edcmerchant.pn as pn, IFNULL(count(edcmerchant.pn), 0) as tot_edcmerchant
      FROM edcmerchant
      WHERE YEAR(edcmerchant.tgl) = 2022 and MONTH(edcmerchant.tgl)= 6
      GROUP BY edcmerchant.pn";

    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";

    $query_sum_bankgaransi = "SELECT bankgaransi.pn as pn, sum(bankgaransi.plafond) as tot_bankgaransi FROM bankgaransi
      WHERE YEAR(bankgaransi.tgl) = 2022 and MONTH(bankgaransi.tgl)= 6
      GROUP BY bankgaransi.pn";

    $query_count_rekgiro = "SELECT rekgiro.pn as pn, IFNULL(count(rekgiro.pn), 0) as tot_rekgiro
      FROM rekgiro
      WHERE YEAR(rekgiro.tgl) = 2022 and MONTH(rekgiro.tgl)= 6
      GROUP BY rekgiro.pn";

    $query_count_rektab = "SELECT rektab.pn as pn, IFNULL(count(rektab.pn), 0) as tot_rektab
      FROM rektab
      WHERE YEAR(rektab.tgl) = 2022 and MONTH(rektab.tgl)= 6
      GROUP BY rektab.pn";
  
    $query_sum_premi = "SELECT premi.pn as pn, sum(premi.plafond) as tot_premi FROM premi
      WHERE YEAR(premi.tgl) = 2022 and MONTH(premi.tgl)= 6
      GROUP BY premi.pn";

    $query_count_brimolajs = "SELECT brimolajs.pn as pn, IFNULL(count(brimolajs.pn), 0) as tot_brimolajs
      FROM brimolajs
      WHERE YEAR(brimolajs.tgl) = 2022 and MONTH(brimolajs.tgl)= 6
      GROUP BY brimolajs.pn";

    $query_sum_ekstrakom = "SELECT ekstrakom.pn as pn, sum(ekstrakom.plafond) as tot_ekstrakom FROM ekstrakom
      WHERE YEAR(ekstrakom.tgl) = 2022 and MONTH(ekstrakom.tgl)= 6
      GROUP BY ekstrakom.pn";

    $query_count_dgsaving = "SELECT dg_saving.pn as pn, IFNULL(count(dg_saving.pn), 0) as tot_dgsaving
      FROM dg_saving
      WHERE YEAR(dg_saving.tgl) = 2022 and MONTH(dg_saving.tgl)= 6
      GROUP BY dg_saving.pn";
      
    $query_count_targetmantri = "select mantri.pn, 
    sum(mantri.brimo) as tbrimo, 
    sum(ritel.t_payrol) as tpayrol,
    sum(ritel.t_edc) as tedc, 
    sum(mantri.qris) as tqris,
    sum(ritel.t_bankgaransi) as tbankgaransi, 
    sum(ritel.t_giro) as tgiro,
    sum(ritel.t_tabungan) as ttabungan,
    sum(ritel.t_pemi) as tpremi, 
    sum(ritel.t_brimola) as tbrimola,  
    sum(ritel.t_digitalsav) as tdigitalsav,  
    
     
    sum(mantri.bbrimo) as bbrimo, 
    sum(ritel.b_payrol) as bpayrol,
    sum(ritel.b_edc) as bedc, 
    sum(mantri.bqris) as bqris, 
    sum(ritel.b_bankgaransi) as bbankgaransi,
    sum(ritel.b_giro) as bgiro,
    sum(ritel.b_tabungan) as btabungan, 
    sum(ritel.b_premi) as bpremi, 
    sum(ritel.b_brimola) as bbrimola,
    sum(ritel.b_digitalsav) as bdigitalsav
    
    from mantri join ritel on ritel.id_target = mantri.side 
    
    GROUP by mantri.pn";
    

	  $this->db->select('mantri.pn, mantri.nama_mantri,
    mantri.bbrimo,
    bpayrol,
    bedc,
    mantri.bqris,
    bbankgaransi,
    bgiro,
    btabungan, 
    bpremi,  
    bbrimola,
    bdigitalsav,
  
      
      IFNULL(count_brimo.tot_brimo, 0) as a,  
      IFNULL(count_pkspayroll.tot_pkspayroll, 0) as b,
      IFNULL(count_edcmerchant.tot_edcmerchant, 0) as c,
      IFNULL(count_qris.tot_qris, 0) as d,
      IFNULL(sum_bankgaransi.tot_bankgaransi, 0) as e,
      IFNULL(count_rekgiro.tot_rekgiro, 0) as f,
      IFNULL(count_rektab.tot_rektab, 0) as g,
      IFNULL(sum_premi.tot_premi, 0) as h,
      IFNULL(count_brimolajs.tot_brimolajs, 0) as i, 
      IFNULL(count_dgsaving.tot_dgsaving, 0) as j,

      ((SELECT(a))/count_targetmantri.tbrimo) * 100 as real_a,   
      ((SELECT(b))/count_targetmantri.tpayrol) * 100 as real_b,
      ((SELECT(c))/count_targetmantri.tedc) * 100 as real_c,
      ((SELECT(d))/count_targetmantri.tqris) * 100 as real_d,
      ((SELECT(e))/count_targetmantri.tbankgaransi) * 100 as real_e,
      ((SELECT(f))/count_targetmantri.tgiro) * 100 as real_f,
      ((SELECT(g))/count_targetmantri.ttabungan) *100 as real_g,
      ((SELECT(h))/count_targetmantri.tpremi) * 100 as real_h,
      ((SELECT(i))/count_targetmantri.tbrimola) * 100 as real_i,
      ((SELECT(j))/count_targetmantri.tdigitalsav) * 100 as real_j,
     
      ROUND(((SELECT(real_a + real_b + real_c + real_d + real_e + real_f + real_g + real_h + real_i + real_j)/1) * 1), 2) as scores');
    $this->db->from('mantri');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_pkspayroll) as count_pkspayroll", 'mantri.pn = count_pkspayroll.pn', 'left');
    $this->db->join("($query_count_edcmerchant) as count_edcmerchant", 'mantri.pn = count_edcmerchant.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_sum_bankgaransi) as sum_bankgaransi", 'mantri.pn = sum_bankgaransi.pn', 'left');
    $this->db->join("($query_count_rekgiro) as count_rekgiro", 'mantri.pn = count_rekgiro.pn', 'left');
    $this->db->join("($query_count_rektab) as count_rektab", 'mantri.pn = count_rektab.pn', 'left');
    $this->db->join("($query_sum_premi) as sum_premi", 'mantri.pn = sum_premi.pn', 'left');
    $this->db->join("($query_count_brimolajs) as count_brimolajs", 'mantri.pn = count_brimolajs.pn', 'left');
    
    
    $this->db->join("($query_count_dgsaving) as count_dgsaving", 'mantri.pn = count_dgsaving.pn', 'left');
    $this->db->join("($query_count_targetmantri) as count_targetmantri", 'mantri.pn = count_targetmantri.pn', 'left'); 
    $this->db->join("ritel", 'ritel.id_target = mantri.side'); 
     
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('real_a','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.side',5);
      $result = $this->db->get();
      return $result;
	}


  // function rmall()
	// {
    
  //   $query_count_britamabisnis = "SELECT britamabisnis.pn as pn, IFNULL(count(britamabisnis.norek), 0) as tot_britamabisnis
  //     FROM britamabisnis
  //     WHERE YEAR(britamabisnis.tgl) = 2022 and MONTH(britamabisnis.tgl)= 6
  //     GROUP BY britamabisnis.pn";

  //   $query_sum_kpr = "SELECT kpr.pn as pn, sum(kpr.plafond) as tot_kpr FROM kpr
  //   WHERE YEAR(kpr.tgl) = 2022 and MONTH(kpr.tgl)= 6
  //   GROUP BY kpr.pn";

  // $query_count_kpr = "SELECT kpr.pn as pn, IFNULL(count(kpr.norek), 0) as tot_debkpr
  //   FROM kpr
  //   WHERE YEAR(kpr.tgl) = 2022 and MONTH(kpr.tgl)= 6
  //   GROUP BY kpr.pn";

  // $query_count_kk = "SELECT kk.pn as pn, IFNULL(count(kk.norek), 0) as tot_kk
  //   FROM kk
  //   WHERE YEAR(kk.tgl) = 2022 and MONTH(kk.tgl)= 6
  //   GROUP BY kk.pn";

  // $query_sum_briguna = "SELECT briguna.pn as pn, sum(briguna.plafond) as tot_briguna FROM briguna
  //   WHERE YEAR(briguna.tgl) = 2022 and MONTH(briguna.tgl)= 6
  //   GROUP BY briguna.pn";

  // $query_count_briguna = "SELECT briguna.pn as pn, IFNULL(count(briguna.norek), 0) as tot_debbriguna
  //   FROM briguna
  //   WHERE YEAR(briguna.tgl) = 2022 and MONTH(briguna.tgl)= 6
  //   GROUP BY briguna.pn";

  //   $query_sum_realkecil = "SELECT realkecil.pn as pn, sum(realkecil.plafond) as tot_realkecil FROM realkecil
  //     WHERE YEAR(realkecil.tgl) = 2022 and MONTH(realkecil.tgl)= 6
  //     GROUP BY realkecil.pn"

  //   $query_sum_penyalurankur = "SELECT penyalurankur.pn as pn, sum(penyalurankur.plafond) as tot_penyalurankur FROM penyalurankur
  //     WHERE YEAR(penyalurankur.tgl) = 2022 and MONTH(penyalurankur.tgl)= 6
  //     GROUP BY penyalurankur.pn";

  //   $query_count_bristore = "SELECT bristore.pn as pn, count(bristore.pn) as tot_bristore
  //     FROM bristore
  //     WHERE YEAR(bristore.tgl) = 2022 and MONTH(bristore.tgl)= 6
  //     GROUP BY bristore.pn";

  //   $query_count_ibbiz = "SELECT ibbiz.pn as pn, IFNULL(count(ibbiz.pn), 0) as tot_ibbiz
  //     FROM ibbiz
  //     WHERE YEAR(ibbiz.tgl) = 2022 and MONTH(ibbiz.tgl)= 6
  //     GROUP BY ibbiz.pn";

  //   $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
  //     FROM brimo
  //     WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
  //     GROUP BY brimo.pn";
      
  //   $query_count_pkspayroll = "SELECT pkspayroll.pn as pn, IFNULL(count(pkspayroll.pn), 0) as tot_pkspayroll
  //     FROM pkspayroll
  //     WHERE YEAR(pkspayroll.tgl) = 2022 and MONTH(pkspayroll.tgl)= 6
  //     GROUP BY pkspayroll.pn";
      
  //   $query_count_edcmerchant = "SELECT edcmerchant.pn as pn, IFNULL(count(edcmerchant.pn), 0) as tot_edcmerchant
  //     FROM edcmerchant
  //     WHERE YEAR(edcmerchant.tgl) = 2022 and MONTH(edcmerchant.tgl)= 6
  //     GROUP BY edcmerchant.pn";

  //   $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
  //     FROM qris
  //     WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
  //     GROUP BY qris.pn";

  //   $query_sum_bankgaransi = "SELECT bankgaransi.pn as pn, sum(bankgaransi.plafond) as tot_bankgaransi FROM bankgaransi
  //     WHERE YEAR(bankgaransi.tgl) = 2022 and MONTH(bankgaransi.tgl)= 6
  //     GROUP BY bankgaransi.pn";

  //   $query_count_rekgiro = "SELECT rekgiro.pn as pn, IFNULL(count(rekgiro.pn), 0) as tot_rekgiro
  //     FROM rekgiro
  //     WHERE YEAR(rekgiro.tgl) = 2022 and MONTH(rekgiro.tgl)= 6
  //     GROUP BY rekgiro.pn";

  //   $query_count_rektab = "SELECT rektab.pn as pn, IFNULL(count(rektab.pn), 0) as tot_rektab
  //     FROM rektab
  //     WHERE YEAR(rektab.tgl) = 2022 and MONTH(rektab.tgl)= 6
  //     GROUP BY rektab.pn";
  
  //   $query_sum_premi = "SELECT premi.pn as pn, sum(premi.plafond) as tot_premi FROM premi
  //     WHERE YEAR(premi.tgl) = 2022 and MONTH(premi.tgl)= 6
  //     GROUP BY premi.pn";

  //   $query_count_brimolajs = "SELECT brimolajs.pn as pn, IFNULL(count(brimolajs.pn), 0) as tot_brimolajs
  //     FROM brimolajs
  //     WHERE YEAR(brimolajs.tgl) = 2022 and MONTH(brimolajs.tgl)= 6
  //     GROUP BY brimolajs.pn";

  //   $query_sum_ekstrakom = "SELECT ekstrakom.pn as pn, sum(ekstrakom.plafond) as tot_ekstrakom FROM ekstrakom
  //     WHERE YEAR(ekstrakom.tgl) = 2022 and MONTH(ekstrakom.tgl)= 6
  //     GROUP BY ekstrakom.pn";

  //   $query_count_dgsaving = "SELECT dg_saving.pn as pn, IFNULL(count(dg_saving.pn), 0) as tot_dgsaving
  //     FROM dg_saving
  //     WHERE YEAR(dg_saving.tgl) = 2022 and MONTH(dg_saving.tgl)= 6
  //     GROUP BY dg_saving.pn";
      
  //   $query_count_targetmantri = "select mantri.pn,
  //   sum(ritel.t_britama) as tbritama, 
  //   sum(ritel.t_kpr) as tkpr, 
  //   sum(ritel.t_debkpr) as tdebkpr,
  //   sum(ritel.t_briguna) as tbriguna, 
  //   sum(ritel.t_kk) as tkk, 
  //   sum(ritel.t_debbriguna) as tdebbriguna,
  //   sum(ritel.t_realkeci) as trealkeci,
  //   sum(ritel.t_penyalurankur) as tpenyalurankur, 
  //   sum(ritel.t_bristore) as tbristore,
  //   sum(ritel.t_ibbiz) as tibbiz, 
  //   sum(ritel.t_ekstrakom) as tekstrakom,  
  //   sum(mantri.brimo) as tbrimo, 
  //   sum(ritel.t_payrol) as tpayrol,
  //   sum(ritel.t_edc) as tedc, 
  //   sum(mantri.qris) as tqris,
  //   sum(ritel.t_bankgaransi) as tbankgaransi, 
  //   sum(ritel.t_giro) as tgiro,
  //   sum(ritel.t_tabungan) as ttabungan,
  //   sum(ritel.t_pemi) as tpremi, 
  //   sum(ritel.t_brimola) as tbrimola,  
  //   sum(ritel.t_digitalsav) as tdigitalsav,  
    
  //   sum(ritel.b_britama) as bbritama, 
  //   sum(ritel.b_kpr) as bkpr,
  //   sum(ritel.b_debkpr) as bdebkpr,
  //   sum(ritel.b_kk) as bkk,
  //   sum(ritel.b_briguna) as bbriguna,
  //   sum(ritel.b_bbriguna) as bdebbriguna,
  //   sum(ritel.b_realkecil) as brealkecil,
  //   sum(ritel.b_penyalurankur) as bpenyalurankur,
  //   sum(ritel.b_bristore) as bbristore,
  //   sum(ritel.b_ibbiz) as bibbiz,
  //   sum(ritel.b_ekstrakom) as beksreakom,
  //   sum(mantri.bbrimo) as bbrimo, 
  //   sum(ritel.b_payrol) as bpayrol,
  //   sum(ritel.b_edc) as bedc, 
  //   sum(mantri.bqris) as bqris, 
  //   sum(ritel.b_bankgaransi) as bbankgaransi,
  //   sum(ritel.b_giro) as bgiro,
  //   sum(ritel.b_tabungan) as btabungan, 
  //   sum(ritel.b_premi) as bpremi, 
  //   sum(ritel.b_brimola) as bbrimola,
  //   sum(ritel.b_digitalsav) as bdigitalsav
    
  //   from mantri join ritel on ritel.id_target = mantri.side 
    
  //   GROUP by mantri.pn";
    

	//   $this->db->select('mantri.pn, mantri.nama_mantri, ritel.rm_sege men,
  //   mantri.bbrimo,
  //   bpayrol,
  //   bedc,
  //   mantri.bqris,
  //   bbankgaransi,
  //   bgiro,
  //   btabungan, 
  //   bpremi,  
  //   bbrimola,
  //   bdigitalsav,
  
      
  //     IFNULL(count_brimo.tot_brimo, 0) as a,  
  //     IFNULL(count_pkspayroll.tot_pkspayroll, 0) as b,
  //     IFNULL(count_edcmerchant.tot_edcmerchant, 0) as c,
  //     IFNULL(count_qris.tot_qris, 0) as d,
  //     IFNULL(sum_bankgaransi.tot_bankgaransi, 0) as e,
  //     IFNULL(count_rekgiro.tot_rekgiro, 0) as f,
  //     IFNULL(count_rektab.tot_rektab, 0) as g,
  //     IFNULL(sum_premi.tot_premi, 0) as h,
  //     IFNULL(count_brimolajs.tot_brimolajs, 0) as i, 
  //     IFNULL(count_dgsaving.tot_dgsaving, 0) as j,

  //     ((SELECT(a))/count_targetmantri.tbrimo) * 100 as real_a,   
  //     ((SELECT(b))/count_targetmantri.tpayrol) * 100 as real_b,
  //     ((SELECT(c))/count_targetmantri.tedc) * 100 as real_c,
  //     ((SELECT(d))/count_targetmantri.tqris) * 100 as real_d,
  //     ((SELECT(e))/count_targetmantri.tbankgaransi) * 100 as real_e,
  //     ((SELECT(f))/count_targetmantri.tgiro) * 100 as real_f,
  //     ((SELECT(g))/count_targetmantri.ttabungan) *100 as real_g,
  //     ((SELECT(h))/count_targetmantri.tpremi) * 100 as real_h,
  //     ((SELECT(i))/count_targetmantri.tbrimola) * 100 as real_i,
  //     ((SELECT(j))/count_targetmantri.tdigitalsav) * 100 as real_j,
     
  //     ROUND(((SELECT(real_a + real_b + real_c + real_d + real_e + real_f + real_g + real_h + real_i + real_j)/1) * 1), 2) as scores');
  //   $this->db->from('mantri');
  //   $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
  //   $this->db->join("($query_count_pkspayroll) as count_pkspayroll", 'mantri.pn = count_pkspayroll.pn', 'left');
  //   $this->db->join("($query_count_edcmerchant) as count_edcmerchant", 'mantri.pn = count_edcmerchant.pn', 'left');
  //   $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
  //   $this->db->join("($query_sum_bankgaransi) as sum_bankgaransi", 'mantri.pn = sum_bankgaransi.pn', 'left');
  //   $this->db->join("($query_count_rekgiro) as count_rekgiro", 'mantri.pn = count_rekgiro.pn', 'left');
  //   $this->db->join("($query_count_rektab) as count_rektab", 'mantri.pn = count_rektab.pn', 'left');
  //   $this->db->join("($query_sum_premi) as sum_premi", 'mantri.pn = sum_premi.pn', 'left');
  //   $this->db->join("($query_count_brimolajs) as count_brimolajs", 'mantri.pn = count_brimolajs.pn', 'left');
    
    
  //   $this->db->join("($query_count_dgsaving) as count_dgsaving", 'mantri.pn = count_dgsaving.pn', 'left');
  //   $this->db->join("($query_count_targetmantri) as count_targetmantri", 'mantri.pn = count_targetmantri.pn', 'left'); 
  //   $this->db->join("ritel", 'ritel.id_target = mantri.side'); 
     
  //     //$this->db->select_sum('tbl_real.plafon');
  //     $this->db->order_by('real_a','DESC');
  //     //$this->db->limit(10);
  //     //$this->db->where('mantri.side',5);
  //     $result = $this->db->get();
  //     return $result;
	// }


  function get_colo() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','8122');
      $result = $this->db->get();
      return $result;
	}
  function get_kota() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','3409');
      $result = $this->db->get();
      return $result;
	}
  function get_jati() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','3410');
      $result = $this->db->get();
      return $result;
	}
  function get_bae() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5921');
      $result = $this->db->get();
      return $result;
	}
  function get_dawe() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5922');
      $result = $this->db->get();
      return $result;
	}

  function get_gebog() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5923');
      $result = $this->db->get();
      return $result;
	}
  function get_gondosari() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5924');
      $result = $this->db->get();
      return $result;
	}
  function get_kaliwungu() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5925');
      $result = $this->db->get();
      return $result;
	}
  function get_mejobo() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5926');
      $result = $this->db->get();
      return $result;
	}
  function get_ngetuk() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5927');
      $result = $this->db->get();
      return $result;
	}
  function get_jember() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5928');
      $result = $this->db->get();
      return $result;
	}
  function get_undaan () 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5929');
      $result = $this->db->get();
      return $result;
	}
  function get_wates() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5930');
      $result = $this->db->get();
      return $result;
	}
  function get_jekulo() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','5931');
      $result = $this->db->get();
      return $result;
	}
  function get_jati2() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','7059');
      $result = $this->db->get();
      return $result;
	}
  function get_gulang() 
	{
    $query_count_saving = "SELECT saving.pn as pn, count(saving.pn) as tot_saving FROM saving
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 6
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 6
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 6
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 6
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 6
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 6
     GROUP BY umi.pn";
   
    

	  $this->db->select('mantri.branch,mantri.nama_mantri,account.unit,
      
      IFNULL(count_saving.tot_saving, 0) as tot_s,
      IFNULL(count_brimo.tot_brimo, 0) as tot_b,
      IFNULL(count_qris.tot_qris, 0) as tot_q,
      IFNULL(count_stroberikasir.tot_stroberikasir, 0) as tot_str,
      IFNULL(count_kunjual.tot_kunjual, 0) as tot_k,
      IFNULL(count_umi.tot_umi, 0) as tot_u,

      ((SELECT(tot_s))/mantri.saving) * mantri.bsaving as real_saving,
      ((SELECT(tot_b))/mantri.brimo) * mantri.bbrimo as real_brimo,
      ((SELECT(tot_q))/mantri.qris) * mantri.bqris  as real_qris,
      ((SELECT(tot_str))/mantri.stroberikasir) * mantri.bstroberikasir as real_stroberikasir,
      ((SELECT(tot_k))/mantri.kunjual) * mantri.bkunjual as real_kunjual,
      ((SELECT(tot_u))/mantri.umi) * mantri.bumi as real_umi,
      ROUND(((SELECT(real_saving + real_brimo + real_qris + real_stroberikasir + real_kunjual + real_umi )/1) * 1), 2) as scores');
   
    $this->db->from('mantri');
    $this->db->join("($query_count_saving) as count_saving", 'mantri.pn = count_saving.pn', 'left');
    $this->db->join("($query_count_brimo) as count_brimo", 'mantri.pn = count_brimo.pn', 'left');
    $this->db->join("($query_count_qris) as count_qris", 'mantri.pn = count_qris.pn', 'left');
    $this->db->join("($query_count_stroberikasir) as count_stroberikasir", 'mantri.pn = count_stroberikasir.pn', 'left');
    $this->db->join("($query_count_kunjual) as count_kunjual", 'mantri.pn = count_kunjual.pn', 'left'); 
    $this->db->join("($query_count_umi) as count_umi", 'mantri.pn = count_umi.pn', 'left'); 
    $this->db->join("account", 'mantri.branch = account.branch'); 
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('scores','DESC');
      //$this->db->limit(10);
      $this->db->where('mantri.id_level','2');
      $this->db->where('mantri.branch','7541');
      $result = $this->db->get();
      return $result;
	}
}