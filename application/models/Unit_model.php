<?php
class Unit_model extends CI_Model{

  //get data from database
  function get_data($kode=5921){
       
      $this->db->select('tbl_real.*, mantri.target, account.branch, mantri.nama_mantri, sum(tbl_real.plafon)');
      $this->db->from('tbl_real','account');
      $this->db->join('mantri', 'tbl_real.pn = mantri.pn');
      $this->db->join('account', 'tbl_real.branch = account.branch');
      $this->db->where('tbl_real.branch', $kode);
      $this->db->group_by('tbl_real.pn');
      //$this->db->order_by('');
      $result = $this->db->get();

      //foreach ($result as $val)

      return $result;
  }

   function get_mantri(){
       
      $this->db->get('mantri')->result_array();

     
  }

   
}

