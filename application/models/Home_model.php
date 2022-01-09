<?php
class Home_model extends CI_Model{

  //get data from database
  function get_data(){
       
      $this->db->select('*');
      $this->db->from('account');
      $this->db->order_by('branch');
      $result = $this->db->get();

      return $result;
  }

   function get_mantri(){
       
      $this->db->get('mantri')->result_array();

     
  }

 

}

