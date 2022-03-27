<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/js');
        $this->load->view('templates/header');
        if($this->session->userdata('side')==='3' ):;
        $this->load->view('templates/sidebaradminunit');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='1'):;
        $this->load->view('templates/sidebaradmin');
        elseif($this->session->userdata('id_level')==='2'):;
        $this->load->view('templates/sidebar');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='3'):;
        $this->load->view('templates/sidebarritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('side')==='2'):;
        $this->load->view('templates/sidebarritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='4'):;
        $this->load->view('templates/sidebaradminritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='5'):;
        $this->load->view('templates/sidebarkpr');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='6'):;
        $this->load->view('templates/sidebarbriguna');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==''):;
        redirect(login);
        else:;
        endif;

        $this->load->view('templates/meta');
        
        $pn = urldecode($this->input->get('pn', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($pn <> '') {
            $config['base_url'] = base_url() . 'kk/index.html?pn=' . urlencode($pn);
            $config['first_url'] = base_url() . 'kk/index.html?pn=' . urlencode($pn);
            $config['total_rows'] = $this->Kk_model->total_rows($pn);
            $config['per_page'] = 10;
            if($this->session->userdata('id_level')==='1'):;
            $config['total_rows'] = $this->Kk_model->total_rows($pn);
            $kk = $this->Kk_model->get_limit_data1($config['per_page'], $start, $pn);
            else:   
            $config['total_rows'] = $this->Kk_model->total_rows1($pn,$pn1);    
            $kk = $this->Kk_model->get_limit_data($config['per_page'], $start, $pn, $pn1);
            endif;
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kk_data' => $kk,
            'pn' => $pn,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        } else {
            $config['base_url'] = base_url() . 'kk/index.html';
            $config['first_url'] = base_url() . 'kk/index.html';
            $config['total_rows'] = $this->Kk_model->total_rows($pn1);
            $config['per_page'] = 10;
            $kk = $this->Kk_model->get_limit_data1($config['per_page'], $start, $pn1);
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kk_data' => $kk,
            'pn1' => $pn,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        }

        // $config['per_page'] = 10;
        // $config['page_query_string'] = TRUE;
        // $this->load->library('pagination');
        // $this->pagination->initialize($config);

        // $data = array(
        //     'kk_data' => $kk,
        //     'pn' => $pn,
        //     'pagination' => $this->pagination->create_links(),
        //     'total_rows' => $config['total_rows'],
        //     'start' => $start,
        // );
       $this->load->view('kk/kk_list', $data);
       $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->Kk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'hp' => $row->hp,
	    );
            $this->load->view('kk/kk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kk/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'hp' => set_value('hp'),
	);
        $this->load->view('kk/kk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pn' => $this->input->post('pn',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Kk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kk'));
        }
    }
    
    public function update($id) 
    {
        $this->load->view('templates/js');
        $this->load->view('templates/header');
        if($this->session->userdata('side')==='3' ):;
        $this->load->view('templates/sidebaradminunit');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='1'):;
        $this->load->view('templates/sidebaradmin');
        elseif($this->session->userdata('id_level')==='2'):;
        $this->load->view('templates/sidebar');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='3'):;
        $this->load->view('templates/sidebarritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('side')==='2'):;
        $this->load->view('templates/sidebarritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='4'):;
        $this->load->view('templates/sidebaradminritel');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='5'):;
        $this->load->view('templates/sidebarkpr');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==='6'):;
        $this->load->view('templates/sidebarbriguna');
        $pn1= $this->session->userdata('pn');
        elseif($this->session->userdata('id_level')==''):;
        redirect(login);
        else:;
        endif;

        $this->load->view('templates/meta');
        $row = $this->Kk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kk/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'hp' => set_value('hp', $row->hp),
	    );
            $this->load->view('kk/kk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kk'));
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
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Kk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kk_model->get_by_id($id);

        if ($row) {
            $this->Kk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kk.xls";
        $judul = "kk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");

	foreach ($this->Kk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kk.php */
/* Location: ./application/controllers/Kk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-27 08:13:01 */
/* http://harviacode.com */