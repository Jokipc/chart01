<?php
class Rank extends CI_Controller{
    function __construct(){
      parent::__construct();
    
    $this->load->model('Rank_model');
    }

    function index(){
   
      
      $db = $this->Rank_model->get_rank()->result();
      $db1 = $this->Rank_model->get_end()->result();
      $x['data'] = $db;
      $x['end'] = $db1;

      $this->load->view("rank", $x);
      
      
 }
 function ritel(){
   
      
  $db = $this->Rank_model->get_ritel()->result();

  $x['data'] = $db;


  $this->load->view("rank_ritel", $x);
  
  
}

  function unit(){
   
      
      $db = $this->Rank_model->get_rank_unit()->result();
     
      $x['data'] = $db;
    

      $this->load->view("rank_unit", $x);

     
      
 }
 function bintang(){
   
      
  $db = $this->Rank_model->get_rank_unit()->result();
 
  $x['data'] = $db;


  $this->load->view("bintang", $x);

 
  
}
function live(){
   
      

  $this->load->view("view_live");

 
  
}
}
