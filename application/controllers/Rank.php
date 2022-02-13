<?php
class Rank extends CI_Controller{
    function __construct(){
      parent::__construct();
    
    $this->load->model('Rank_model');
    }

    function index(){
   
      
      $db = $this->Rank_model->get_rank()->result();
     
      $x['data'] = $db;
    

      $this->load->view("rank", $x);
      
      
 }

  function unit(){
   
      
      $db = $this->Rank_model->get_rank_unit()->result();
     
      $x['data'] = $db;
    

      $this->load->view("rank_unit", $x);

     
      
 }
}
