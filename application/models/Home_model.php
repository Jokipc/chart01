<?php
class Home_model extends CI_Model{

  //get data from database
  function get_data(){
       
      $this->db->select('*');
      $this->db->from('mantri');
      $this->db->order_by('branch');
      $this->db->limit(1);
      $result = $this->db->get();

      return $result;
  }

   function qris(){
       
     $this->db->select('pn, count(nama_qris) as total');
      $this->db->from('qris');
     
      $this->db->where('pn', $pn);
      $this->db->group_by('pn');
      //$this->db->order_by('');
      $result = $this->db->get();

     
  }



 

}

