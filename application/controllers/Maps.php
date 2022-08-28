<?php

class Maps extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load Home_model from model
      $this->load->model('Home_model');
      $this->load->model('Mantri_model');
     
    
    }

    function index(){
      if($this->session->userdata('id_level')==''):;
      redirect(login);
      else:;
      endif;
      $kode = $this->input->get('kode');
      $pn = $this->session->userdata('pn');
      
      
      $qris = $this->Home_model->qris($pn)->num_rows();
      $brimo = $this->Home_model->brimo($pn)->num_rows();
      $saving = $this->Home_model->saving($pn)->num_rows();
      $stroberikasir = $this->Home_model->stroberikasir($pn)->num_rows();
      $kunjual = $this->Home_model->kunjual($pn)->num_rows();
      $umi = $this->Home_model->umi($pn)->num_rows();
     
      
     
      $x['data_qris'] = $qris;
      $x['data_brimo'] = $brimo;
      $x['data_stroberikasir'] = $stroberikasir;
      $x['data_saving'] = $saving;
      $x['data_kunjual'] = $kunjual;
      $x['umi'] = $umi;
      
     
      $this->load->view("templates/maps", $x);
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        
    }
   
    
      
}


   
