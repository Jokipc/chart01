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
        $pn  = $data['pn'];
        $nama_mantri  = $data['nama_mantri'];
        $ico = $data['ico'];
        $level = $data['id_level'];
        $sesdata = array(
            'pn'  => $pn,
            'nama_mantri'     => $nama_mantri,
            'ico'     => $ico,
            'id_level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('page');

        // access login for staff
        }elseif($level === '2'){
            redirect('page/User');

        // access login for author
        }else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Personal Number or Password is Wrong');
        redirect('login');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}
