<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_real extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_real_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_real/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_real/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_real/index.html';
            $config['first_url'] = base_url() . 'tbl_real/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_real_model->total_rows($q);
        $tbl_real = $this->Tbl_real_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_real_data' => $tbl_real,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tbl_real/tbl_real_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_real_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'branch' => $row->branch,
		'pn' => $row->pn,
		'tgl_real' => $row->tgl_real,
		'plafon' => $row->plafon,
		'code_des' => $row->code_des,
	    );
            $this->load->view('tbl_real/tbl_real_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_real'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_real/create_action'),
	    'id' => set_value('id'),
	    'branch' => set_value('branch'),
	    'pn' => set_value('pn'),
	    'tgl_real' => set_value('tgl_real'),
	    'plafon' => set_value('plafon'),
	    'code_des' => set_value('code_des'),
	);
        $this->load->view('tbl_real/tbl_real_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'branch' => $this->input->post('branch',TRUE),
		'pn' => $this->input->post('pn',TRUE),
		'tgl_real' => $this->input->post('tgl_real',TRUE),
		'plafon' => $this->input->post('plafon',TRUE),
		'code_des' => $this->input->post('code_des',TRUE),
	    );

            $this->Tbl_real_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbl_real'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_real_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_real/update_action'),
		'id' => set_value('id', $row->id),
		'branch' => set_value('branch', $row->branch),
		'pn' => set_value('pn', $row->pn),
		'tgl_real' => set_value('tgl_real', $row->tgl_real),
		'plafon' => set_value('plafon', $row->plafon),
		'code_des' => set_value('code_des', $row->code_des),
	    );
            $this->load->view('tbl_real/tbl_real_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_real'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'branch' => $this->input->post('branch',TRUE),
		'pn' => $this->input->post('pn',TRUE),
		'tgl_real' => $this->input->post('tgl_real',TRUE),
		'plafon' => $this->input->post('plafon',TRUE),
		'code_des' => $this->input->post('code_des',TRUE),
	    );

            $this->Tbl_real_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_real'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_real_model->get_by_id($id);

        if ($row) {
            $this->Tbl_real_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_real'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_real'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('branch', 'branch', 'trim|required');
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl_real', 'tgl real', 'trim|required');
	$this->form_validation->set_rules('plafon', 'plafon', 'trim|required');
	$this->form_validation->set_rules('code_des', 'code des', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_real.xls";
        $judul = "tbl_real";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Branch");
	xlsWriteLabel($tablehead, $kolomhead++, "Pn");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Real");
	xlsWriteLabel($tablehead, $kolomhead++, "Plafon");
	xlsWriteLabel($tablehead, $kolomhead++, "Code Des");

	foreach ($this->Tbl_real_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->branch);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_real);
	    xlsWriteNumber($tablebody, $kolombody++, $data->plafon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->code_des);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Tbl_real.php */
/* Location: ./application/controllers/Tbl_real.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 06:51:08 */
/* http://harviacode.com */