<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Edcmerchant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Edcmerchant_model');
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
        elseif($this->session->userdata('id_level')==''):;
        redirect(login);
        else:;
        endif;

        $this->load->view('templates/meta');
        
        $pn = urldecode($this->input->get('pn', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($pn <> '') {
            $config['base_url'] = base_url() . 'edcmerchant/index.html?pn=' . urlencode($pn);
            $config['first_url'] = base_url() . 'edcmerchant/index.html?pn=' . urlencode($pn);
            $config['total_rows'] = $this->Edcmerchant_model->total_rows($pn);
            $config['per_page'] = 10;
            if($this->session->userdata('id_level')==='1'):;
            $config['total_rows'] = $this->Edcmerchant_model->total_rows($pn);
            $edcmerchant = $this->Edcmerchant_model->get_limit_data1($config['per_page'], $start, $pn);
            else:   
            $config['total_rows'] = $this->Edcmerchant_model->total_rows1($pn,$pn1);    
            $edcmerchant = $this->Edcmerchant_model->get_limit_data($config['per_page'], $start, $pn, $pn1);
            endif;
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'edcmerchant_data' => $edcmerchant,
            'pn' => $pn,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        } else {
            $config['base_url'] = base_url() . 'edcmerchant/index.html';
            $config['first_url'] = base_url() . 'edcmerchant/index.html';
            $config['total_rows'] = $this->Edcmerchant_model->total_rows($pn1);
            $config['per_page'] = 10;
            $edcmerchant = $this->Edcmerchant_model->get_limit_data1($config['per_page'], $start, $pn1);
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'edcmerchant_data' => $edcmerchant,
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
        //     'brimo_data' => $brimo,
        //     'pn' => $pn,
        //     'pagination' => $this->pagination->create_links(),
        //     'total_rows' => $config['total_rows'],
        //     'start' => $start,
        // );
       $this->load->view('edcmerchant/edcmerchant_list', $data);
       $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->Edcmerchant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'id_merchant' => $row->id_merchant,
		'nama_merchant' => $row->nama_merchant,
		'hp' => $row->hp,
	    );
            $this->load->view('edcmerchant/edcmerchant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('edcmerchant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('edcmerchant/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'id_merchant' => set_value('id_merchant'),
	    'nama_merchant' => set_value('nama_merchant'),
	    'hp' => set_value('hp'),
	);
        $this->load->view('edcmerchant/edcmerchant_form', $data);
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
		'id_merchant' => $this->input->post('id_merchant',TRUE),
		'nama_merchant' => $this->input->post('nama_merchant',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Edcmerchant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('edcmerchant'));
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
        $row = $this->Edcmerchant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('edcmerchant/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'id_merchant' => set_value('id_merchant', $row->id_merchant),
		'nama_merchant' => set_value('nama_merchant', $row->nama_merchant),
		'hp' => set_value('hp', $row->hp),
	    );
            $this->load->view('edcmerchant/edcmerchant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('edcmerchant'));
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
		'id_merchant' => $this->input->post('id_merchant',TRUE),
		'nama_merchant' => $this->input->post('nama_merchant',TRUE),
		'hp' => $this->input->post('hp',TRUE),
	    );

            $this->Edcmerchant_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('edcmerchant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Edcmerchant_model->get_by_id($id);

        if ($row) {
            $this->Edcmerchant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('edcmerchant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('edcmerchant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('id_merchant', 'id merchant', 'trim|required');
	$this->form_validation->set_rules('nama_merchant', 'nama merchant', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Edcmerchant.php */
/* Location: ./application/controllers/Edcmerchant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-08 13:47:48 */
/* http://harviacode.com */