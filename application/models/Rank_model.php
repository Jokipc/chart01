    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
      WHERE YEAR(saving.tgl) = 2022 and MONTH(saving.tgl)= 8
      GROUP BY saving.pn";
    $query_count_brimo = "SELECT brimo.pn as pn, count(brimo.pn) as tot_brimo
      FROM brimo
      WHERE YEAR(brimo.tgl) = 2022 and MONTH(brimo.tgl)= 8
      GROUP BY brimo.pn";
    $query_count_qris = "SELECT qris.pn as pn, IFNULL(count(qris.pn), 0) as tot_qris
      FROM qris
      WHERE YEAR(qris.tgl) = 2022 and MONTH(qris.tgl)= 8
      GROUP BY qris.pn";
    $query_count_stroberikasir = "SELECT stroberikasir.pn as pn, IFNULL(count(stroberikasir.pn), 0) as tot_stroberikasir
      FROM stroberikasir
      WHERE YEAR(stroberikasir.tgl) = 2022 and MONTH(stroberikasir.tgl)= 8
      GROUP BY stroberikasir.pn";

    $query_count_kunjual = "SELECT kunjual.pn as pn, IFNULL(count(kunjual.pn), 0) as tot_kunjual
      FROM kunjual
      WHERE YEAR(kunjual.tgl) = 2022 and MONTH(kunjual.tgl)= 8
      GROUP BY kunjual.pn";

    $query_count_umi = "SELECT umi.pn as pn, IFNULL(count(umi.pn), 0) as tot_umi
     FROM umi
     WHERE YEAR(umi.tgl) = 2022 and MONTH(umi.tgl)= 8
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
