<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mantri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mantri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mantri/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mantri/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mantri/index.html';
            $config['first_url'] = base_url() . 'mantri/index.html';
        }

        $config['per_page'] = 112;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mantri_model->total_rows($q);
        $mantri = $this->Mantri_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mantri_data' => $mantri,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mantri/mantri_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mantri_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pn' => $row->id_pn,
		'branch' => $row->branch,
		'pn' => $row->pn,
		'nama_mantri' => $row->nama_mantri,
	    );
            $this->load->view('mantri/mantri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mantri'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mantri/create_action'),
	    'id_pn' => set_value('id_pn'),
	    'branch' => set_value('branch'),
	    'pn' => set_value('pn'),
	    'nama_mantri' => set_value('nama_mantri'),
	);
        $this->load->view('mantri/mantri_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'branch' => $this->input->post('branch',TRUE),
		'pn' => $this->input->post('pn',TRUE),
		'nama_mantri' => $this->input->post('nama_mantri',TRUE),
	    );

            $this->Mantri_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mantri'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mantri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mantri/update_action'),
		'id_pn' => set_value('id_pn', $row->id_pn),
		'branch' => set_value('branch', $row->branch),
		'pn' => set_value('pn', $row->pn),
		'nama_mantri' => set_value('nama_mantri', $row->nama_mantri),
	    );
            $this->load->view('mantri/mantri_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mantri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pn', TRUE));
        } else {
            $data = array(
		'branch' => $this->input->post('branch',TRUE),
		'pn' => $this->input->post('pn',TRUE),
		'nama_mantri' => $this->input->post('nama_mantri',TRUE),
	    );

            $this->Mantri_model->update($this->input->post('id_pn', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mantri'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mantri_model->get_by_id($id);

        if ($row) {
            $this->Mantri_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mantri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mantri'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('branch', 'branch', 'trim|required');
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('nama_mantri', 'nama mantri', 'trim|required');

	$this->form_validation->set_rules('id_pn', 'id_pn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Mantri.php */
/* Location: ./application/controllers/Mantri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-06 08:06:42 */
/* http://harviacode.com */