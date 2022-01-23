<?php
class Home_model extends CI_Model{

  //get data from database
  function get_data($kode=5921){
       
      $this->db->select('tbl_real.*, mantri.target, account.branch, mantri.nama_mantri, sum(tbl_real.plafon) as total');
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
  function brimo($pn=271055){
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $result = $this->db->get('brimo');
  return $result;
  }
  function qris($pn=271055){
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $result = $this->db->get('qris');
  return $result;
  }
   function kunjual($pn=271055){
   $this->db->select('pn');
  $this->db->where('pn',$pn);
  $result = $this->db->get('kunjual');
  return $result;
  }
  function saving($pn=271055){
   $this->db->select('pn');
  $this->db->where('pn',$pn);
  $result = $this->db->get('saving');
  return $result;
  }
  function stroberikasir($pn=271055){
   $this->db->select('pn');
  $this->db->where('pn',$pn);
  $result = $this->db->get('stroberikasir');
  return $result;
  }




   
}
