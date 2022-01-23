<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kunjual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjual_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunjual/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunjual/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunjual/index.html';
            $config['first_url'] = base_url() . 'kunjual/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunjual_model->total_rows($q);
        $kunjual = $this->Kunjual_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kunjual_data' => $kunjual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kunjual/kunjual_list', $data);
        
    }

    public function read($id) 
    {
        $row = $this->Kunjual_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'nama_nasabah' => $row->nama_nasabah,
		'nik' => $row->nik,
		'hp' => $row->hp,
	    );
            $this->load->view('kunjual/kunjual_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kunjual'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kunjual/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'nama_nasabah' => set_value('nama_nasabah'),
	    'nik' => set_value('nik'),
	    'hp' => set_value('hp'),
	);
        $this->load->view('kunjual/kunjual_form', $data);
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
		'nama_nasabah' => $this->input->post('nama_nasabah',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Kunjual_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('home'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kunjual_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kunjual/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'nama_nasabah' => set_value('nama_nasabah', $row->nama_nasabah),
		'nik' => set_value('nik', $row->nik),
		'hp' => set_value('hp', $row->hp),
	    );
            $this->load->view('kunjual/kunjual_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kunjual'));
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
		'nama_nasabah' => $this->input->post('nama_nasabah',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Kunjual_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kunjual'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kunjual_model->get_by_id($id);

        if ($row) {
            $this->Kunjual_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kunjual'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kunjual'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nama_nasabah', 'nama nasabah', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kunjual.xls";
        $judul = "kunjual";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Nasabah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");

	foreach ($this->Kunjual_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_nasabah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kunjual.php */
/* Location: ./application/controllers/Kunjual.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-18 17:45:55 */
/* http://harviacode.com */