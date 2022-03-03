<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penyalurankur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penyalurankur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/js');
        $this->load->view('templates/header');
        if($this->session->userdata('side')==='3' ):;
        $this->load->view('templates/sidebaradminunit');
        elseif($this->session->userdata('id_level')==='1'):;
        $this->load->view('templates/sidebaradmin');
        elseif($this->session->userdata('id_level')==='2'):;
        $this->load->view('templates/sidebar');
        $pn = $this->session->userdata('pn');
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
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penyalurankur/index.html?q=' . urlencode($pn);
            $config['first_url'] = base_url() . 'penyalurankur/index.html?q=' . urlencode($pn);
        } else {
            $config['base_url'] = base_url() . 'penyalurankur/index.html';
            $config['first_url'] = base_url() . 'penyalurankur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penyalurankur_model->total_rows($pn);
        $penyalurankur = $this->Penyalurankur_model->get_limit_data($config['per_page'], $start, $pn);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penyalurankur_data' => $penyalurankur,
            'q' => $pn,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('penyalurankur/penyalurankur_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->Penyalurankur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'norek' => $row->norek,
		'nama' => $row->nama,
		'plafond' => $row->plafond,
	    );
            $this->load->view('penyalurankur/penyalurankur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyalurankur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penyalurankur/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'norek' => set_value('norek'),
	    'nama' => set_value('nama'),
	    'plafond' => set_value('plafond'),
	);
        $this->load->view('penyalurankur/penyalurankur_form', $data);
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
		'nama' => $this->input->post('nama',TRUE),
		'plafond' => $this->input->post('plafond',TRUE),
	    );

            $this->Penyalurankur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penyalurankur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penyalurankur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penyalurankur/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'norek' => set_value('norek', $row->norek),
		'nama' => set_value('nama', $row->nama),
		'plafond' => set_value('plafond', $row->plafond),
	    );
            $this->load->view('penyalurankur/penyalurankur_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyalurankur'));
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
		'nama' => $this->input->post('nama',TRUE),
		'plafond' => $this->input->post('plafond',TRUE),
	    );

            $this->Penyalurankur_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penyalurankur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penyalurankur_model->get_by_id($id);

        if ($row) {
            $this->Penyalurankur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penyalurankur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyalurankur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('norek', 'norek', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('plafond', 'plafond', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penyalurankur.xls";
        $judul = "penyalurankur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Plafond");

	foreach ($this->Penyalurankur_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->norek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->plafond);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
    

}

/* End of file Penyalurankur.php */
/* Location: ./application/controllers/Penyalurankur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 17:00:13 */
/* http://harviacode.com */