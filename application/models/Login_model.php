<?php
class Login_model extends CI_Model{

  function validate($pn,$password){
   
    $this->db->where('pn',$pn);
    $this->db->where('password',$password);
    $result = $this->db->get('mantri',1);
    return $result;
  }

}
