<?php
class Home_model extends CI_Model{


  function brimo($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(brimo.tgl)',3);
  $result = $this->db->get('brimo');
  return $result;
  }

  function qris($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(qris.tgl)',3);
  $result = $this->db->get('qris');
  return $result;
  }

  function kunjual($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(kunjual.tgl)',3);
  $result = $this->db->get('kunjual');
  return $result;
  }

  function saving($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(saving.tgl)',3);
  $result = $this->db->get('saving');
  return $result;
  }
  function stroberikasir($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(stroberikasir.tgl)',3);
  $result = $this->db->get('stroberikasir');
  return $result;
  }

  function bankgaransi($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(bankgaransi.tgl)',3);
  $result = $this->db->get('bankgaransi');
  return $result;
  }

  function bristore($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(bristore.tgl)',3);
  $result = $this->db->get('bristore');
  return $result;
  }

  function ibbiz($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(ibbiz.tgl)',3);
  $result = $this->db->get('ibbiz');
  return $result;
  }

  function britamabisnis($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(britamabisnis.tgl)',3);
  $result = $this->db->get('britamabisnis');
  return $result;
  }

  function premi($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(premi.tgl)',3);
  $result = $this->db->get('premi');
  return $result;
  }

  function penyalurankur($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(penyalurankur.tgl)',3);
  $result = $this->db->get('penyalurankur');
  return $result;
  }

  function realkecil($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(realkecil.tgl)',3);
  $result = $this->db->get('realkecil');
  return $result;
  }

  function ekstrakom($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(ekstrakom.tgl)',3);
  $result = $this->db->get('ekstrakom');
  return $result;
  }

  function target($pn=271055)
  {
  $this->db->select('mantri.*,  ritel.*');
  $this->db->from('mantri');
  $this->db->join('ritel','ritel.id_target = mantri.side');
  $this->db->where('pn',$pn);
  $result = $this->db->get();
  return $result;
  }
}
