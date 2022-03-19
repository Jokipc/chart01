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
        redirect('saving');
      }else{
          echo "Access Denied";
      }

  }

  function user(){
    //Allowing akses to staff only
    if($this->session->userdata('id_level')==='2'){
      redirect('home');
    }
    elseif($this->session->userdata('id_level')==='4'){

      redirect('brimo');
    }
    else{
        echo "Access Denied";
    }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('id_level')==='3'){
      redirect('home/ritel');
    }else{
        echo "Access Denied";
    }
  }

}
