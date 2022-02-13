<?php
class Rank extends CI_Controller{
    function __construct(){
      parent::__construct();
    
    $this->load->model('Rank_model');
    }

    function index(){
   
      
      $db = $this->Rank_model->get_rank()->result();
      $db_unit = $this->Rank_model->get_rank_unit()->result();
     
      $x['data'] = $db;
      $x['data_unit'] = $db_unit;
    
      $this->load->view("rank", $x);
      
      
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
}
