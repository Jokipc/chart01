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
      
      $db = $this->Home_model->get_data($kode)->result();
      $qris = $this->Home_model->qris($pn)->num_rows();
      $brimo = $this->Home_model->brimo($pn)->num_rows();
      $saving = $this->Home_model->saving($pn)->num_rows();
      $stroberikasir = $this->Home_model->stroberikasir($pn)->num_rows();
      $kunjual = $this->Home_model->kunjual($pn)->num_rows();
     
      $x['data'] = json_encode($db);
      $x['data_unit'] = $db;
     
      $x['data_qris'] = $qris;
      $x['data_brimo'] = $brimo;
      $x['data_stroberikasir'] = $stroberikasir;
      $x['data_saving'] = $saving;
      $x['data_kunjual'] = $kunjual;
      
      
      $x['page_url']= "UNIT BAE";
      $this->load->view("templates/home", $x);
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mantri/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mantri/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mantri/index.html';
            $config['first_url'] = base_url() . 'mantri/index.html';
        }

        $config['per_page'] = 112;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mantri_model->total_rows($q);
        $mantri = $this->Mantri_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mantri_data' => $mantri,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('mantri/mantri_list', $data);
        //$this->load->view('templates/footer');

        
    }
   
      
}


   
