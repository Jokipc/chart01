<?php
class Home extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load Home_model from model
      $this->load->model('Home_model');
      $this->load->model('Mantri_model');
     
    
    }

    function index(){
      
      
      $db = $this->Home_model->get_data()->result();
      $db = $this->Home_model->get_data()->result();
     
      $x['data'] = json_encode($db);
      
      
      $x['page_url']= "DASHBOARD";
      $this->load->view("templates/Home",$x);
        
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
        $this->load->view('mantri/mantri_list', $data);
        $this->load->view('templates/footer');

        
    }
   
      
 }

   
