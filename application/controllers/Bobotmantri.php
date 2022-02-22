<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bobotmantri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bobotmantri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bobotmantri/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bobotmantri/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bobotmantri/index.html';
            $config['first_url'] = base_url() . 'bobotmantri/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bobotmantri_model->total_rows($q);
        $bobotmantri = $this->Bobotmantri_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bobotmantri_data' => $bobotmantri,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('bobotmantri/mantri_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bobotmantri_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pn' => $row->id_pn,
		'branch' => $row->branch,
		'pn' => $row->pn,
		'nama_mantri' => $row->nama_mantri,
		'id_level' => $row->id_level,
		'password' => $row->password,
		'ico' => $row->ico,
		'target' => $row->target,
		'bsaving' => $row->bsaving,
		'bbrimo' => $row->bbrimo,
		'bqris' => $row->bqris,
		'bkunjual' => $row->bkunjual,
		'bstroberikasir' => $row->bstroberikasir,
		'saving' => $row->saving,
		'qris' => $row->qris,
		'brimo' => $row->brimo,
		'kunjual' => $row->kunjual,
		'pasar_id' => $row->pasar_id,
		'trx_pasarid' => $row->trx_pasarid,
		'stroberikasir' => $row->stroberikasir,
	    );
            $this->load->view('bobotmantri/mantri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobotmantri'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bobotmantri/create_action'),
	    'id_pn' => set_value('id_pn'),
	    'branch' => set_value('branch'),
	    'pn' => set_value('pn'),
	    'nama_mantri' => set_value('nama_mantri'),
	    'id_level' => set_value('id_level'),
	    'password' => set_value('password'),
	    'ico' => set_value('ico'),
	    'target' => set_value('target'),
	    'bsaving' => set_value('bsaving'),
	    'bbrimo' => set_value('bbrimo'),
	    'bqris' => set_value('bqris'),
	    'bkunjual' => set_value('bkunjual'),
	    'bstroberikasir' => set_value('bstroberikasir'),
	    'saving' => set_value('saving'),
	    'qris' => set_value('qris'),
	    'brimo' => set_value('brimo'),
	    'kunjual' => set_value('kunjual'),
	    'pasar_id' => set_value('pasar_id'),
	    'trx_pasarid' => set_value('trx_pasarid'),
	    'stroberikasir' => set_value('stroberikasir'),
	);
        $this->load->view('bobotmantri/mantri_form', $data);
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
		'id_level' => $this->input->post('id_level',TRUE),
		'password' => $this->input->post('password',TRUE),
		'ico' => $this->input->post('ico',TRUE),
		'target' => $this->input->post('target',TRUE),
		'bsaving' => $this->input->post('bsaving',TRUE),
		'bbrimo' => $this->input->post('bbrimo',TRUE),
		'bqris' => $this->input->post('bqris',TRUE),
		'bkunjual' => $this->input->post('bkunjual',TRUE),
		'bstroberikasir' => $this->input->post('bstroberikasir',TRUE),
		'saving' => $this->input->post('saving',TRUE),
		'qris' => $this->input->post('qris',TRUE),
		'brimo' => $this->input->post('brimo',TRUE),
		'kunjual' => $this->input->post('kunjual',TRUE),
		'pasar_id' => $this->input->post('pasar_id',TRUE),
		'trx_pasarid' => $this->input->post('trx_pasarid',TRUE),
		'stroberikasir' => $this->input->post('stroberikasir',TRUE),
	    );

            $this->Bobotmantri_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bobotmantri'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bobotmantri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bobotmantri/update_action'),
		
		'bsaving' => set_value('bsaving', $row->bsaving),
		'bbrimo' => set_value('bbrimo', $row->bbrimo),
		'bqris' => set_value('bqris', $row->bqris),
		'bkunjual' => set_value('bkunjual', $row->bkunjual),
		'bstroberikasir' => set_value('bstroberikasir', $row->bstroberikasir),
		'saving' => set_value('saving', $row->saving),
		'qris' => set_value('qris', $row->qris),
		'brimo' => set_value('brimo', $row->brimo),
		'kunjual' => set_value('kunjual', $row->kunjual),
		'stroberikasir' => set_value('stroberikasir', $row->stroberikasir),
	    );
            $this->load->view('bobotmantri/mantri_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobotmantri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		
         $data = array(
		
		'bsaving' => $this->input->post('bsaving',TRUE),
		'bbrimo' => $this->input->post('bbrimo',TRUE),
		'bqris' => $this->input->post('bqris',TRUE),
		'bkunjual' => $this->input->post('bkunjual',TRUE),
		'bstroberikasir' => $this->input->post('bstroberikasir',TRUE),
		'saving' => $this->input->post('saving',TRUE),
		'qris' => $this->input->post('qris',TRUE),
		'brimo' => $this->input->post('brimo',TRUE),
		'kunjual' => $this->input->post('kunjual',TRUE),
		'stroberikasir' => $this->input->post('stroberikasir',TRUE),
	    );

            $this->Bobotmantri_model->update($data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rank/bintang'));
       
    }
    
    public function delete($id) 
    {
        $row = $this->Bobotmantri_model->get_by_id($id);

        if ($row) {
            $this->Bobotmantri_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bobotmantri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bobotmantri'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('target', 'target', 'trim|required');
	$this->form_validation->set_rules('bsaving', 'bsaving', 'trim|required');
	$this->form_validation->set_rules('bbrimo', 'bbrimo', 'trim|required');
	$this->form_validation->set_rules('bqris', 'bqris', 'trim|required');
	$this->form_validation->set_rules('bkunjual', 'bkunjual', 'trim|required');
	$this->form_validation->set_rules('bstroberikasir', 'bstroberikasir', 'trim|required');
	$this->form_validation->set_rules('saving', 'saving', 'trim|required');
	$this->form_validation->set_rules('qris', 'qris', 'trim|required');
	$this->form_validation->set_rules('brimo', 'brimo', 'trim|required');
	$this->form_validation->set_rules('kunjual', 'kunjual', 'trim|required');
	$this->form_validation->set_rules('stroberikasir', 'stroberikasir', 'trim|required');

	
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mantri.xls";
        $judul = "mantri";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pn");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Mantri");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Ico");
	xlsWriteLabel($tablehead, $kolomhead++, "Target");
	xlsWriteLabel($tablehead, $kolomhead++, "Bsaving");
	xlsWriteLabel($tablehead, $kolomhead++, "Bbrimo");
	xlsWriteLabel($tablehead, $kolomhead++, "Bqris");
	xlsWriteLabel($tablehead, $kolomhead++, "Bkunjual");
	xlsWriteLabel($tablehead, $kolomhead++, "Bstroberikasir");
	xlsWriteLabel($tablehead, $kolomhead++, "Saving");
	xlsWriteLabel($tablehead, $kolomhead++, "Qris");
	xlsWriteLabel($tablehead, $kolomhead++, "Brimo");
	xlsWriteLabel($tablehead, $kolomhead++, "Kunjual");
	xlsWriteLabel($tablehead, $kolomhead++, "Pasar Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Trx Pasarid");
	xlsWriteLabel($tablehead, $kolomhead++, "Stroberikasir");

	foreach ($this->Bobotmantri_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->branch);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mantri);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ico);
	    xlsWriteNumber($tablebody, $kolombody++, $data->target);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bsaving);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bbrimo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bqris);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bkunjual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bstroberikasir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->saving);
	    xlsWriteNumber($tablebody, $kolombody++, $data->qris);
	    xlsWriteNumber($tablebody, $kolombody++, $data->brimo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kunjual);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pasar_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->trx_pasarid);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stroberikasir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Bobotmantri.php */
/* Location: ./application/controllers/Bobotmantri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 07:24:38 */
/* http://harviacode.com */