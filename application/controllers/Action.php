<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Action extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Action_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'action/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'action/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'action/index.html';
            $config['first_url'] = base_url() . 'action/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Action_model->total_rows($q);
        $action = $this->Action_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'action_data' => $action,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('action/action_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Action_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pn' => $row->pn,
		'tgl_action' => $row->tgl_action,
		'kunjual' => $row->kunjual,
		'trgt_kunjual' => $row->trgt_kunjual,
		'lupus' => $row->lupus,
		'trgt_lupus' => $row->trgt_lupus,
		'tagih' => $row->tagih,
		'trgt_penagihan' => $row->trgt_penagihan,
	    );
            $this->load->view('action/action_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('action'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('action/create_action'),
	    'pn' => set_value('pn'),
	    'tgl_action' => set_value('tgl_action'),
	    'kunjual' => set_value('kunjual'),
	    'trgt_kunjual' => set_value('trgt_kunjual'),
	    'lupus' => set_value('lupus'),
	    'trgt_lupus' => set_value('trgt_lupus'),
	    'tagih' => set_value('tagih'),
	    'trgt_penagihan' => set_value('trgt_penagihan'),
	);
        $this->load->view('action/action_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pn' => $this->input->post('pn',TRUE),
		'tgl_action' => $this->input->post('tgl_action',TRUE),
		'kunjual' => $this->input->post('kunjual',TRUE),
		'trgt_kunjual' => $this->input->post('trgt_kunjual',TRUE),
		'lupus' => $this->input->post('lupus',TRUE),
		'trgt_lupus' => $this->input->post('trgt_lupus',TRUE),
		'tagih' => $this->input->post('tagih',TRUE),
		'trgt_penagihan' => $this->input->post('trgt_penagihan',TRUE),
	    );

            $this->Action_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('action'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Action_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('action/update_action'),
		'pn' => set_value('pn', $row->pn),
		'tgl_action' => set_value('tgl_action', $row->tgl_action),
		'kunjual' => set_value('kunjual', $row->kunjual),
		'trgt_kunjual' => set_value('trgt_kunjual', $row->trgt_kunjual),
		'lupus' => set_value('lupus', $row->lupus),
		'trgt_lupus' => set_value('trgt_lupus', $row->trgt_lupus),
		'tagih' => set_value('tagih', $row->tagih),
		'trgt_penagihan' => set_value('trgt_penagihan', $row->trgt_penagihan),
	    );
            $this->load->view('action/action_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('action'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'pn' => $this->input->post('pn',TRUE),
		'tgl_action' => $this->input->post('tgl_action',TRUE),
		'kunjual' => $this->input->post('kunjual',TRUE),
		'trgt_kunjual' => $this->input->post('trgt_kunjual',TRUE),
		'lupus' => $this->input->post('lupus',TRUE),
		'trgt_lupus' => $this->input->post('trgt_lupus',TRUE),
		'tagih' => $this->input->post('tagih',TRUE),
		'trgt_penagihan' => $this->input->post('trgt_penagihan',TRUE),
	    );

            $this->Action_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('action'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Action_model->get_by_id($id);

        if ($row) {
            $this->Action_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('action'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('action'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('tgl_action', 'tgl action', 'trim|required');
	$this->form_validation->set_rules('kunjual', 'kunjual', 'trim|required');
	$this->form_validation->set_rules('trgt_kunjual', 'trgt kunjual', 'trim|required');
	$this->form_validation->set_rules('lupus', 'lupus', 'trim|required');
	$this->form_validation->set_rules('trgt_lupus', 'trgt lupus', 'trim|required');
	$this->form_validation->set_rules('tagih', 'tagih', 'trim|required');
	$this->form_validation->set_rules('trgt_penagihan', 'trgt penagihan', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "action.xls";
        $judul = "action";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Action");
	xlsWriteLabel($tablehead, $kolomhead++, "Kunjual");
	xlsWriteLabel($tablehead, $kolomhead++, "Trgt Kunjual");
	xlsWriteLabel($tablehead, $kolomhead++, "Lupus");
	xlsWriteLabel($tablehead, $kolomhead++, "Trgt Lupus");
	xlsWriteLabel($tablehead, $kolomhead++, "Tagih");
	xlsWriteLabel($tablehead, $kolomhead++, "Trgt Penagihan");

	foreach ($this->Action_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_action);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kunjual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->trgt_kunjual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->lupus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->trgt_lupus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tagih);
	    xlsWriteNumber($tablebody, $kolombody++, $data->trgt_penagihan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Action.php */
/* Location: ./application/controllers/Action.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 06:51:08 */
/* http://harviacode.com */