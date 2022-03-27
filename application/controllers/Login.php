<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }

  function index(){
    $this->load->view('login');
  }

  function auth(){
    $pn    = $this->input->post('pn',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($pn,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $idpn  = $data['id_pn'];
        $pn  = $data['pn'];
        $nama_mantri  = $data['nama_mantri'];
        $ico = $data['ico'];
        $saving = $data['saving'];
        $brimo = $data['brimo'];
        $qris = $data['qris'];
        $stroberikasir = $data['stroberikasir'];
        $kunjual = $data['kunjual'];
        
        $bsaving = $data['bsaving'];
        $bbrimo = $data['bbrimo'];
        $bqris = $data['bqris'];
        $bstroberikasir = $data['bstroberikasir'];
        $bkunjual = $data['bkunjual'];
        $side = $data['side'];
       
        
        $level = $data['id_level'];
        $sesdata = array(
          'id_pn'  => $idpn,
            'pn'  => $pn,
            'nama_mantri'     => $nama_mantri,
            'ico'     => $ico,
            'saving'     => $saving,
            'qris'     => $qris,
            'brimo'     => $brimo,
            'stroberikasir'     => $stroberikasir,
            'kunjual'     => $kunjual,
            'bsaving'     => $bsaving,
            'bqris'     => $bqris,
            'bbrimo'     => $bbrimo,
            'bstroberikasir'     => $bstroberikasir,
            'bkunjual'     => $bkunjual,
            'side'     => $side,
            

            'id_level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('page');

        // access login for staff
        }elseif($level === '2'){
            redirect('page/user');
        }
        elseif($level === '4'){
          redirect('page/user');
        }
        elseif($level === '5'){
          redirect('page/user');
        }
        elseif($level === '6'){
          redirect('page/user');
        }
        else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Personal Number or Password is Wrong');
        redirect('login');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      $this->load->view('login');
  }

}
