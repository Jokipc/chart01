<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trx_pasarid extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Trx_pasarid_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'trx_pasarid/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'trx_pasarid/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'trx_pasarid/index.html';
            $config['first_url'] = base_url() . 'trx_pasarid/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Trx_pasarid_model->total_rows($q);
        $trx_pasarid = $this->Trx_pasarid_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'trx_pasarid_data' => $trx_pasarid,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('trx_pasarid/trx_pasarid_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Trx_pasarid_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'nama_toko' => $row->nama_toko,
	    );
            $this->load->view('trx_pasarid/trx_pasarid_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trx_pasarid'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('trx_pasarid/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'nama_toko' => set_value('nama_toko'),
	);
        $this->load->view('trx_pasarid/trx_pasarid_form', $data);
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
		'nama_toko' => $this->input->post('nama_toko',TRUE),
	    );

            $this->Trx_pasarid_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('trx_pasarid'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Trx_pasarid_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('trx_pasarid/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'nama_toko' => set_value('nama_toko', $row->nama_toko),
	    );
            $this->load->view('trx_pasarid/trx_pasarid_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trx_pasarid'));
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
		'nama_toko' => $this->input->post('nama_toko',TRUE),
	    );

            $this->Trx_pasarid_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('trx_pasarid'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Trx_pasarid_model->get_by_id($id);

        if ($row) {
            $this->Trx_pasarid_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('trx_pasarid'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trx_pasarid'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nama_toko', 'nama toko', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "trx_pasarid.xls";
        $judul = "trx_pasarid";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Toko");

	foreach ($this->Trx_pasarid_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_toko);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Trx_pasarid.php */
/* Location: ./application/controllers/Trx_pasarid.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 06:51:08 */
/* http://harviacode.com */