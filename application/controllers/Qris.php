<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Qris extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Qris_model');
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
        elseif($this->session->userdata('id_level')==''):;
        redirect(login);
        else:;
        endif;

        $this->load->view('templates/meta');
        
        $pn = urldecode($this->input->get('pn', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($pn <> '') {
            $config['base_url'] = base_url() . 'qris/index.html?pn=' . urlencode($pn);
            $config['first_url'] = base_url() . 'qris/index.html?pn=' . urlencode($pn);
            $config['total_rows'] = $this->Qris_model->total_rows($pn);
            $config['per_page'] = 10;
                if($this->session->userdata('id_level')==='1'):;
                    $config['total_rows'] = $this->Qris_model->total_rows($pn);
                    $qris = $this->Qris_model->get_limit_data1($config['per_page'], $start, $pn)->result(); 
                    
                else:   
                    $config['total_rows'] = $this->Qris_model->total_rows1($pn,$pn1);    
                    $qris = $this->Qris_model->get_limit_data1($config['per_page'], $start, $pn1)->result();
                endif;
            $config['page_query_string'] = TRUE;
            $this->load->library('pagination');
            $this->pagination->initialize($config);
                $data = array(
                        'qris_data' => $qris,
                        'pn' => $pn,
                        'pagination' => $this->pagination->create_links(),
                        'total_rows' => $config['total_rows'],
                        'start' => $start,
                    );
        }
        else 
        {
            $config['base_url'] = base_url() . 'qris/index.html';
            $config['first_url'] = base_url() . 'qris/index.html';
            $config['total_rows'] = $this->Qris_model->total_rows($pn1);
            $config['per_page'] = 10;
            $qris = $this->Qris_model->get_limit_data1($config['per_page'], $start, $pn1)->result();
            
            
            $config['page_query_string'] = TRUE;
            $this->load->library('pagination');
            $this->pagination->initialize($config);

                $data = array(
                        'qris_data' => $qris,
                        'hasil'=>$x,
                        'pn1' => $pn,
                        'pagination' => $this->pagination->create_links(),
                        'total_rows' => $config['total_rows'],
                        'start' => $start,
            );
        
        }
        
    
       $this->load->view('qris/qris_list', $data);
       $this->load->view('templates/footer');
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
            'action' => site_url('qris/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'norek' => set_value('norek'),
	    'nama_qris' => set_value('nama_qris'),
	    'hp' => set_value('hp'),
	);
        $this->load->view('qris/qris_form', $data);
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
		'norek' => $this->input->post('norek',TRUE),
		'nama_qris' => $this->input->post('nama_qris',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Qris_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('qris'));
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
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('norek', 'norek', 'trim|required');
	$this->form_validation->set_rules('nama_qris', 'nama qris', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');

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
        xlsWriteLabel($tablehead, $kolomhead++, "MID");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Merchant");
        xlsWriteLabel($tablehead, $kolomhead++, "Sales_volume");
        xlsWriteLabel($tablehead, $kolomhead++, "Saldo");
        xlsWriteLabel($tablehead, $kolomhead++, "Rekening");
        xlsWriteLabel($tablehead, $kolomhead++, "PIC");
        xlsWriteLabel($tablehead, $kolomhead++, "Unit");

	foreach ($this->Qris_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->mid);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_merchant);
            xlsWriteLabel($tablebody, $kolombody++, $data->sales_volume);
            xlsWriteLabel($tablebody, $kolombody++, $data->saldo);
            xlsWriteLabel($tablebody, $kolombody++, $data->norek);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_mantri);
            xlsWriteLabel($tablebody, $kolombody++, $data->unit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Qris.php */
/* Location: ./application/controllers/Qris.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-18 17:35:10 */
/* http://harviacode.com */
