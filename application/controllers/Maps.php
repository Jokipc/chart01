<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapsgis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Maps_model');
        $this->load->model('Mantri_model');
        $this->load->library('form_validation');
    }

    function index(){
      if($this->session->userdata('id_level')==''):;
      redirect(login);
      else:;
      endif;
      $kode = $this->input->get('kode');
      $pn = $this->session->userdata('pn');
       
      // $qris = $this->Home_model->qris($pn)->num_rows();
      // $brimo = $this->Home_model->brimo($pn)->num_rows();
      // $saving = $this->Home_model->saving($pn)->num_rows();
      // $stroberikasir = $this->Home_model->stroberikasir($pn)->num_rows();
      // $kunjual = $this->Home_model->kunjual($pn)->num_rows();
      // $umi = $this->Home_model->umi($pn)->num_rows();
     
      // $x['data_qris'] = $qris;
      // $x['data_brimo'] = $brimo;
      // $x['data_stroberikasir'] = $stroberikasir;
      // $x['data_saving'] = $saving;
      // $x['data_kunjual'] = $kunjual;
      // $x['umi'] = $umi;
 
      $this->load->view("templates/maps", $x);
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
    
    }
    public function read($id) 
    {
        $row = $this->Qris_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'norek' => $row->norek,
		'nama_qris' => $row->nama_qris,
		'hp' => $row->hp,
	    );
            $this->load->view('qris/qris_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('qris'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('maps/create_action'),
	    'id' => set_value('id')
	    // 'pn'=> set_value('pn'),
	    // 'nama' => set_value('nama'),
	    // 'alamat' => set_value('alamat'),
	    // 'hp' => set_value('hp'),
	    // 'email' => set_value('email'),
	    // 'latitude' => set_value('latitude'),
	    // 'longitude' => set_value('longitude'),
	    // 'rek' => set_value('rek'),
	    // 'brimo' => set_value('brimo'),
	    // 'qris' => set_value('qris'),
	    // 'edc' => set_value('edc'),
	);
        $this->load->view('templates/maps_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'id' => $this->input->post('id',TRUE),
            //   'pn' => $this->input->post('pn',TRUE),
            //   'nama' => $this->input->post('nama',TRUE),
            //   'alamat' => $this->input->post('alamat',TRUE),
            //   'hp' => $this->input->post('hp',TRUE),
            //   'email' => $this->input->post('email',TRUE),
            //   'latitude' => $this->input->post('latitude',TRUE),
            //   'longitude' => $this->input->post('longitude',TRUE),
            //   'rek' => $this->input->post('rek',TRUE),
            //   'brimo' => $this->input->post('brimo',TRUE),
            //   'qris' => $this->input->post('qris',TRUE),
            //   'edc' => $this->input->post('edc',TRUE),
	    );

            $this->Maps_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('maps'));
        }
    }
    
    public function update($id) 
    {
        $this->load->view('templates/js');
        $this->load->view('templates/header');
        if($this->session->userdata('side')==='3' ):;
        $this->load->view('templates/sidebaradminunit');
        elseif($this->session->userdata('id_level')==='1'):;
        $this->load->view('templates/sidebaradmin');
        elseif($this->session->userdata('id_level')==='4'):;
        $this->load->view('templates/sidebaradminritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='2'):;
        $this->load->view('templates/sidebar');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='3'):;
        $this->load->view('templates/sidebarritel');
        $pn = $this->session->userdata('pn');
        elseif($this->session->userdata('side')==='2'):;
        $this->load->view('templates/sidebarritel');
        elseif($this->session->userdata('id_level')==''):;
        redirect(login);
        else:;
        endif;

        $this->load->view('templates/meta');
        $row = $this->Qris_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('qris/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'norek' => set_value('norek', $row->norek),
		'nama_qris' => set_value('nama_qris', $row->nama_qris),
		'hp' => set_value('hp', $row->hp),
	    );
            $this->load->view('qris/qris_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('qris'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'pn' => $this->input->post('pn',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'norek' => $this->input->post('norek',TRUE),
		'nama_qris' => $this->input->post('nama_qris',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Qris_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('qris'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Qris_model->get_by_id($id);

        if ($row) {
            $this->Qris_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('qris'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('qris'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
	$this->form_validation->set_rules('rek', 'rek', 'trim|required');
	$this->form_validation->set_rules('brimo', 'brimo', 'trim|required');
	$this->form_validation->set_rules('qris', 'qris', 'trim|required');
	$this->form_validation->set_rules('edc', 'edc', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "qris.xls";
        $judul = "qris";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Pn");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Norek");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Qris");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");

	foreach ($this->Qris_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->norek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_qris);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    
    
}
   
    



   
