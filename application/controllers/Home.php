<?php

class Home extends CI_Controller{
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
      
     
      $this->load->view("templates/home", $x);
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        
    }
   
    function ritel(){
      if($this->session->userdata('id_level')==''):;
      redirect(login);
      else:;
      endif;

      

      
     
      
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

      function dana(){
        if($this->session->userdata('id_level')==''):;
        redirect(login);
        else:;
        endif;
 
        $pn = $this->session->userdata('pn');
   
        $brimo = $this->Home_model->brimo($pn)->num_rows();
        $pkspayroll = $this->Home_model->pkspayroll($pn)->num_rows();
        $edcmerchant = $this->Home_model->edcmerchant($pn)->num_rows();
        $qris = $this->Home_model->qris($pn)->num_rows();
        $bankgaransi = $this->Home_model->bankgaransi($pn)->result();
        $giro = $this->Home_model->rekgiro($pn)->num_rows();
        $tab = $this->Home_model->rektab($pn)->num_rows();
        $premi = $this->Home_model->premi($pn)->result();
        $brimola = $this->Home_model->brimolajs($pn)->num_rows();
        $dgsaving = $this->Home_model->dgsaving($pn)->num_rows();
        $target = $this->Home_model->target($pn)->result();
        
        
        $x['brimo'] = $brimo;
        $x['pks'] = $pkspayroll;
        $x['edc'] = $edcmerchant;
        $x['qris'] = $qris;
        $x['bankgaransi'] = $bankgaransi;
        $x['giro'] = $giro;
        $x['tab'] = $tab;
        $x['premi'] = $premi;
        $x['brimola'] = $brimola;
        $x['dgsaving'] = $dgsaving;
        $x['target'] = $target;
        $this->load->view("templates/home_dana", $x);
        $this->load->view("chart3", $x);
      
        }

        function briguna(){
          if($this->session->userdata('id_level')==''):;
          redirect(login);
          else:;
          endif;

          $pn = $this->session->userdata('pn');
     
          $briguna = $this->Home_model->briguna($pn)->result();
          $debbriguna = $this->Home_model->deb_briguna($pn)->num_rows();
          $kk = $this->Home_model->kartukredit($pn)->num_rows();
          $brimo = $this->Home_model->brimo($pn)->num_rows();
          $dgsaving = $this->Home_model->dgsaving($pn)->num_rows();
          $premi = $this->Home_model->premi($pn)->result();
          $ekstrakom = $this->Home_model->ekstrakom($pn)->result();
          
          $target = $this->Home_model->target($pn)->result();
          
          $x['briguna'] = $briguna;
          $x['deb'] = $debbriguna;
          $x['kk'] = $kk;
          $x['brimo'] = $brimo;
          $x['dgsaving'] = $dgsaving;
          $x['premi'] = $premi;
          $x['ekstrakom'] = $ekstrakom;
          $x['target'] = $target;
          $this->load->view("templates/home_briguna", $x);
          $this->load->view("chart4", $x);
        
          }

          function kpr(){
            if($this->session->userdata('id_level')==''):;
          redirect(login);
          else:;
          endif;

          $pn = $this->session->userdata('pn');
     
          $dtkpr = $this->Home_model->kpr($pn)->result();
          $debkpr = $this->Home_model->deb_kpr($pn)->num_rows();
          $kk = $this->Home_model->kartukredit($pn)->num_rows();
          $brimo = $this->Home_model->brimo($pn)->num_rows();
          $dgsaving = $this->Home_model->dgsaving($pn)->num_rows();
          $premi = $this->Home_model->premi($pn)->result();
          $ekstrakom = $this->Home_model->ekstrakom($pn)->result();
          
          $target = $this->Home_model->target($pn)->result();
          
          $x['kpr'] = $dtkpr;
          $x['deb'] = $debkpr;
          $x['kk'] = $kk;
          $x['brimo'] = $brimo;
          $x['dgsaving'] = $dgsaving;
          $x['premi'] = $premi;
          $x['ekstrakom'] = $ekstrakom;
          $x['target'] = $target;
          $this->load->view("templates/home_kpr", $x);
          $this->load->view("chart5", $x);
        
          
            }
      
}


   
