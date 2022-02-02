<?php
class Rank extends CI_Controller{
    function __construct(){
      parent::__construct();
    
    $this->load->model('Rank_model');
    $this->load->model('Mantri_model');
    }

    function index(){
   
      
      $db = $this->Rank_model->get_rank()->result();
     
      $x['data'] = $db;
    
      $data = array(
            'mantri_data' => $mantri,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
      $this->load->view("rank", $x);
      $this->load->view('mantri/mantri_list',$data);
      
 }
}
