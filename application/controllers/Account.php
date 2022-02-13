<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'account/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'account/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'account/index.html';
            $config['first_url'] = base_url() . 'account/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Account_model->total_rows($q);
        $account = $this->Account_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'account_data' => $account,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('account/account_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Account_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'branch' => $row->branch,
		'unit' => $row->unit,
		'purchase' => $row->purchase,
		'sale' => $row->sale,
	    );
            $this->load->view('account/account_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('account/create_action'),
	    'id' => set_value('id'),
	    'branch' => set_value('branch'),
	    'unit' => set_value('unit'),
	    'purchase' => set_value('purchase'),
	    'sale' => set_value('sale'),
	);
        $this->load->view('account/account_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'branch' => $this->input->post('branch',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'purchase' => $this->input->post('purchase',TRUE),
		'sale' => $this->input->post('sale',TRUE),
	    );

            $this->Account_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('account'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Account_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('account/update_action'),
		'id' => set_value('id', $row->id),
		'branch' => set_value('branch', $row->branch),
		'unit' => set_value('unit', $row->unit),
		'purchase' => set_value('purchase', $row->purchase),
		'sale' => set_value('sale', $row->sale),
	    );
            $this->load->view('account/account_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'branch' => $this->input->post('branch',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'purchase' => $this->input->post('purchase',TRUE),
		'sale' => $this->input->post('sale',TRUE),
	    );

            $this->Account_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('account'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Account_model->get_by_id($id);

        if ($row) {
            $this->Account_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('account'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('branch', 'branch', 'trim|required');
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');
	$this->form_validation->set_rules('purchase', 'purchase', 'trim|required');
	$this->form_validation->set_rules('sale', 'sale', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "account.xls";
        $judul = "account";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Branch");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit");
	xlsWriteLabel($tablehead, $kolomhead++, "Purchase");
	xlsWriteLabel($tablehead, $kolomhead++, "Sale");

	foreach ($this->Account_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->branch);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->purchase);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sale);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 06:51:08 */
/* http://harviacode.com */