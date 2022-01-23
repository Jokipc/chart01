<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('id_level')==='1'){
          $this->load->view('saving/saving_list');
      }else{
          echo "Access Denied";
      }

  }

  function user(){
    //Allowing akses to staff only
    if($this->session->userdata('id_level')==='2'){
      $this->load->view('home');

    }else{
        echo "Access Denied";
    }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }

}
