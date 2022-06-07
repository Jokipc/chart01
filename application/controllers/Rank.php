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
 function u8122(){
  $db = $this->Rank_model->get_colo()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5921(){
  $db = $this->Rank_model->get_bae()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5922(){
  $db = $this->Rank_model->get_dawe()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5923(){
  $db = $this->Rank_model->get_gebog()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5924(){
  $db = $this->Rank_model->get_gondosari()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u3409(){
  $db = $this->Rank_model->get_kota()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u3410(){
  $db = $this->Rank_model->get_jati()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5925(){
  $db = $this->Rank_model->get_kaliwungu()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5926(){
  $db = $this->Rank_model->get_mejobo()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5927(){
  $db = $this->Rank_model->get_ngetuk()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5928(){
  $db = $this->Rank_model->get_jember()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5929(){
  $db = $this->Rank_model->get_undaan()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5930(){
  $db = $this->Rank_model->get_wates()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u5931(){
  $db = $this->Rank_model->get_jekulo()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u7059(){
  $db = $this->Rank_model->get_jati2()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
}
function u7451(){
  $db = $this->Rank_model->get_gulang()->result();
  $x['data'] = $db;
  $this->load->view("rank_mantri", $x);
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

function dana(){
   
      
  $db = $this->Rank_model->get_dana()->result();

  $x['data'] = $db;


  $this->load->view("rank_dana", $x);
  
   
}

function rmall(){
   
      
  $db = $this->Rank_model->rmall()->result();

  $x['data'] = $db;


  $this->load->view("rank_rmall", $x);
  
   
}
}
