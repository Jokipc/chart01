<?php

class Home extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load Home_model from model
      $this->load->model('Home_model');
      $this->load->model('Mantri_model');
     
    
    }

    function index(){
      $kode = $this->input->get('kode');
      $pn = $this->session->userdata('pn');
      
      
      $qris = $this->Home_model->qris($pn)->num_rows();
      $brimo = $this->Home_model->brimo($pn)->num_rows();
      $saving = $this->Home_model->saving($pn)->num_rows();
      $stroberikasir = $this->Home_model->stroberikasir($pn)->num_rows();
      $kunjual = $this->Home_model->kunjual($pn)->num_rows();
     
      
     
      $x['data_qris'] = $qris;
      $x['data_brimo'] = $brimo;
      $x['data_stroberikasir'] = $stroberikasir;
      $x['data_saving'] = $saving;
      $x['data_kunjual'] = $kunjual;
      
     
      $this->load->view("templates/home", $x);
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        
    }
   
    function ritel(){
       
      $this->load->view('templates/meta');
      $this->load->view('templates/sidebarritel');
      $this->load->view('templates/js');
      $pn = $this->session->userdata('pn');
 
      $bankgaransi = $this->Home_model->bankgaransi($pn)->result();
      $bristore = $this->Home_model->bristore($pn)->num_rows();
      $ibbiz = $this->Home_model->ibbiz($pn)->num_rows();
      $britama = $this->Home_model->britamabisnis($pn)->num_rows();
      $premi = $this->Home_model->premi($pn)->result();
      $penyaluran = $this->Home_model->penyalurankur($pn)->result();
      $brimo = $this->Home_model->brimo($pn)->num_rows();
      $qris = $this->Home_model->qris($pn)->num_rows();
      $realkecil = $this->Home_model->realkecil($pn)->result();
      $ekstrakom = $this->Home_model->ekstrakom($pn)->result();
      $target = $this->Home_model->target($pn)->result();
      
      
      $x['bankgaransi'] = $bankgaransi;
      $x['bristore'] = $bristore;
      $x['ibbiz'] = $ibbiz;
      $x['d_hsl'] = $britama;
      $x['premi'] = $premi;
      $x['penyaluran'] = $penyaluran;
      $x['brimo'] = $brimo;
      $x['qris'] = $qris;
      $x['kecil'] = $realkecil;
      $x['ekstrakom'] = $ekstrakom;
      $x['target'] = $target;
      $this->load->view("templates/home_ritel", $x);
      $this->load->view("chart2", $x);
    
      }
      
}


   
