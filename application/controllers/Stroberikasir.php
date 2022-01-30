<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stroberikasir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stroberikasir_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stroberikasir/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stroberikasir/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stroberikasir/index.html';
            $config['first_url'] = base_url() . 'stroberikasir/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stroberikasir_model->total_rows($q);
        $stroberikasir = $this->Stroberikasir_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stroberikasir_data' => $stroberikasir,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->load->view('stroberikasir/stroberikasir_list', $data);
        
    }

    public function read($id) 
    {
        $row = $this->Stroberikasir_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'nama_toko' => $row->nama_toko,
		'hp' => $row->hp,
	    );
            $this->load->view('stroberikasir/stroberikasir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stroberikasir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stroberikasir/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'nama_toko' => set_value('nama_toko'),
	    'hp' => set_value('hp'),
	);
        $this->load->view('Stroberikasir/stroberikasir_form', $data);
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
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Stroberikasir_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('home'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Stroberikasir_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stroberikasir/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'nama_toko' => set_value('nama_toko', $row->nama_toko),
		'hp' => set_value('hp', $row->hp),
	    );
            $this->load->view('stroberikasir/stroberikasir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stroberikasir'));
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
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Stroberikasir_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stroberikasir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stroberikasir_model->get_by_id($id);

        if ($row) {
            $this->Stroberikasir_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stroberikasir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stroberikasir'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nama_toko', 'nama toko', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "stroberikasir.xls";
        $judul = "stroberikasir";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");

	foreach ($this->Stroberikasir_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_toko);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Stroberikasir.php */
/* Location: ./application/controllers/Stroberikasir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-18 17:58:44 */
/* http://harviacode.com */