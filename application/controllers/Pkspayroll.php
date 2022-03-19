<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pkspayroll extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pkspayroll_model');
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
        elseif($this->session->userdata('id_level')==='4'):;
        $this->load->view('templates/sidebaradminritel');
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
            $config['base_url'] = base_url() . 'pkspayroll/index.html?pn=' . urlencode($pn);
            $config['first_url'] = base_url() . 'pkspayroll/index.html?pn=' . urlencode($pn);
            $config['total_rows'] = $this->Pkspayroll_model->total_rows($pn);
            $config['per_page'] = 10;
            if($this->session->userdata('id_level')==='1'):;
            $config['total_rows'] = $this->Pkspayroll_model->total_rows($pn);
            $pkspayroll = $this->Pkspayroll_model->get_limit_data1($config['per_page'], $start, $pn);
            else:   
            $config['total_rows'] = $this->Pkspayroll_model->total_rows1($pn,$pn1);    
            $pkspayroll = $this->Pkspayroll_model->get_limit_data($config['per_page'], $start, $pn, $pn1);
            endif;
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pkspayroll_data' => $pkspayroll,
            'pn' => $pn,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        } else {
            $config['base_url'] = base_url() . 'pkspayroll/index.html';
            $config['first_url'] = base_url() . 'pkspayroll/index.html';
            $config['total_rows'] = $this->Pkspayroll_model->total_rows($pn1);
            $config['per_page'] = 10;
            $pkspayroll = $this->Pkspayroll_model->get_limit_data1($config['per_page'], $start, $pn1);
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pkspayroll_data' => $pkspayroll,
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
       $this->load->view('pkspayroll/pkspayroll_list', $data);
       $this->load->view('templates/footer');
        
    }

    public function read($id) 
    {
        $row = $this->Pkspayroll_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'nama_pkspayroll' => $row->nama_pkspayroll,
	    );
            $this->load->view('pkspayroll/pkspayroll_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pkspayroll'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pkspayroll/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'nama_pkspayroll' => set_value('nama_pkspayroll'),
	);
        $this->load->view('pkspayroll/pkspayroll_form', $data);
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
		'nama_pkspayroll' => $this->input->post('nama_pkspayroll',TRUE),
	    );

            $this->Pkspayroll_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pkspayroll'));
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
        $row = $this->Pkspayroll_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pkspayroll/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'nama_pkspayroll' => set_value('nama_pkspayroll', $row->nama_pkspayroll),
	    );
            $this->load->view('pkspayroll/pkspayroll_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pkspayroll'));
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
		'nama_pkspayroll' => $this->input->post('nama_pkspayroll',TRUE),
	    );

            $this->Pkspayroll_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pkspayroll'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pkspayroll_model->get_by_id($id);

        if ($row) {
            $this->Pkspayroll_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pkspayroll'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pkspayroll'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nama_pkspayroll', 'nama pkspayroll', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pkspayroll.php */
/* Location: ./application/controllers/Pkspayroll.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-08 13:50:51 */
/* http://harviacode.com */