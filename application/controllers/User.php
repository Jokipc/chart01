<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('user/mantri_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
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
            $this->load->view('user/mantri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
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
        $this->load->view('user/mantri_form', $data);
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

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
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
        elseif($this->session->userdata('id_level')==='3'):;
        $this->load->view('templates/sidebarritel');
        $pn = $this->session->userdata('pn');
        elseif($this->session->userdata('side')==='2'):;
        $this->load->view('templates/sidebarritel');
        else:;
        endif;
        $this->load->view('templates/meta');
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_pn' => set_value('id_pn', $row->id_pn),
		'branch' => set_value('branch', $row->branch),
		'pn' => set_value('pn', $row->pn),
		'nama_mantri' => set_value('nama_mantri', $row->nama_mantri),
		
		'password' => set_value('password', $row->password),
		
	    );
            $this->load->view('user/mantri_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
		$mdpass= $this->input->post('password',TRUE);
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pn', TRUE));
        } else {
            $data = array(
		'branch' => $this->input->post('branch',TRUE),
		'pn' => $this->input->post('pn',TRUE),
		'nama_mantri' => $this->input->post('nama_mantri',TRUE),
		
		'password' => md5($mdpass)
		
	    );

            $this->User_model->update($this->input->post('id_pn', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            if($this->session->userdata('id_level')==='1' ):;
            redirect(site_url('rank/bintang'));
            elseif($this->session->userdata('id_level')==='2'):;
            redirect(site_url('home'));
            else:;
            redirect(site_url('home/ritel'));
            endif;
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('branch', 'branch', 'trim|required');
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('nama_mantri', 'nama mantri', 'trim|required');
	
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	
	$this->form_validation->set_rules('id_pn', 'id_pn', 'trim');
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
	

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->branch);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mantri);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	   
	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-12 18:36:00 */
/* http://harviacode.com */