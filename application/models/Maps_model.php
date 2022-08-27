<?php
class Maps_model extends CI_Model{


  function brimo($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(brimo.tgl)',8);
  $result = $this->db->get('brimo');
  return $result;
  }

  function qris($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(qris.tgl)',8);
  $result = $this->db->get('qris');
  return $result;
  }

  function kunjual($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(kunjual.tgl)',8);
  $result = $this->db->get('kunjual');
  return $result;
  }

  function saving($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(saving.tgl)',8);
  $result = $this->db->get('saving');
  return $result;
  }
  function stroberikasir($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(stroberikasir.tgl)',8);
  $result = $this->db->get('stroberikasir');
  return $result;
  }

  function bankgaransi($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(bankgaransi.tgl)',8);
  $result = $this->db->get('bankgaransi');
  return $result;
  }

  function bristore($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(bristore.tgl)',8);
  $result = $this->db->get('bristore');
  return $result;
  }

  function ibbiz($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(ibbiz.tgl)',8);
  $result = $this->db->get('ibbiz');
  return $result;
  }

  function pkspayroll($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(pkspayroll.tgl)',8);
  $result = $this->db->get('pkspayroll');
  return $result;
  }
  function rekgiro($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(rekgiro.tgl)',8);
  $result = $this->db->get('rekgiro');
  return $result;
  }
  function rektab($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(rektab.tgl)',8);
  $result = $this->db->get('rektab');
  return $result;
  }
  function brimolajs($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(brimolajs.tgl)',8);
  $result = $this->db->get('brimolajs');
  return $result;
  }
  function dgsaving($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(dg_saving.tgl)',8);
  $result = $this->db->get('dg_saving');
  return $result;
  }
  function edcmerchant($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(edcmerchant.tgl)',8);
  $result = $this->db->get('edcmerchant');
  return $result;
  }
  function britamabisnis($pn=271055)
  {
  $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(britamabisnis.tgl)',8);
  $result = $this->db->get('britamabisnis');
  return $result;
  }

  function premi($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(premi.tgl)',8);
  $result = $this->db->get('premi');
  return $result;
  }

  function penyalurankur($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(penyalurankur.tgl)',8);
  $result = $this->db->get('penyalurankur');
  return $result;
  }

  function realkecil($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(realkecil.tgl)',8);
  $result = $this->db->get('realkecil');
  return $result;
  }

  function ekstrakom($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(ekstrakom.tgl)',8);
  $result = $this->db->get('ekstrakom');
  return $result;
  }

  function kpr($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(kpr.tgl)',8);
  $result = $this->db->get('kpr');
  return $result;
  }

  function deb_kpr($pn=271055)
  {
    $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(kpr.tgl)',8);
  $result = $this->db->get('kpr');
  return $result;
  }

  function briguna($pn=271055)
  {
  $this->db->select_sum('plafond');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(briguna.tgl)',8);
  $result = $this->db->get('briguna');
  return $result;
  }

  function deb_briguna($pn=271055)
  {
    $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(briguna.tgl)',8);
  $result = $this->db->get('briguna');
  return $result;
  }

  function umi($pn=271055)
  {
    $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(umi.tgl)',8);
  $result = $this->db->get('umi');
  return $result;
  }


  function kartukredit($pn=271055)
  {
    $this->db->select('pn');
  $this->db->where('pn',$pn);
  $this->db->where('MONTH(kk.tgl)',8);
  $result = $this->db->get('kk');
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
