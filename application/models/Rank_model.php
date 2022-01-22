<?php
class Rank_model extends CI_Model{

  function get_rank()
	{
	  $this->db->select('tbl_real.*, mantri.target, account.branch, mantri.nama_mantri,sum(tbl_real.plafon) as total');
      $this->db->from('tbl_real','account');
      $this->db->join('mantri', 'tbl_real.pn = mantri.pn');
      $this->db->join('account', 'tbl_real.branch = account.branch');
      //$this->db->where('tbl_real.pn',271055);
     
     $this->db->group_by('tbl_real.pn');
      
      //$this->db->select_sum('tbl_real.plafon');
      $this->db->order_by('total','DESC');
      $this->db->limit(3);
      
      $result = $this->db->get();
      return $result;
	}

 

}