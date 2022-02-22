<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ibbiz extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ibbiz_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pn = $this->session->userdata('pn');
        $this->load->view('templates/js');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebarritel');
        $this->load->view('templates/meta');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ibbiz/index.html?q=' . urlencode($pn);
            $config['first_url'] = base_url() . 'ibbiz/index.html?q=' . urlencode($pn);
        } else {
            $config['base_url'] = base_url() . 'ibbiz/index.html';
            $config['first_url'] = base_url() . 'ibbiz/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ibbiz_model->total_rows($pn);
        $ibbiz = $this->Ibbiz_model->get_limit_data($config['per_page'], $start, $pn);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ibbiz_data' => $ibbiz,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('ibbiz/ibbiz_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $row = $this->Ibbiz_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'norek' => $row->norek,
		'nama' => $row->nama,
		'no_hp' => $row->no_hp,
	    );
            $this->load->view('ibbiz/ibbiz_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ibbiz'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ibbiz/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'norek' => set_value('norek'),
	    'nama' => set_value('nama'),
	    'no_hp' => set_value('no_hp'),
	);
        $this->load->view('ibbiz/ibbiz_form', $data);
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
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Ibbiz_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ibbiz'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ibbiz_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ibbiz/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'norek' => set_value('norek', $row->norek),
		'nama' => set_value('nama', $row->nama),
		'no_hp' => set_value('no_hp', $row->no_hp),
	    );
            $this->load->view('ibbiz/ibbiz_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ibbiz'));
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
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Ibbiz_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ibbiz'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ibbiz_model->get_by_id($id);

        if ($row) {
            $this->Ibbiz_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ibbiz'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ibbiz'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('norek', 'norek', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ibbiz.xls";
        $judul = "ibbiz";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");

	foreach ($this->Ibbiz_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->norek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ibbiz.php */
/* Location: ./application/controllers/Ibbiz.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 17:16:04 */
/* http://harviacode.com */