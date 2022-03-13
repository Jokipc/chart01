<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Realkecil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Realkecil_model');
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
            $config['base_url'] = base_url() . 'realkecil/index.html?pn=' . urlencode($pn);
            $config['first_url'] = base_url() . 'realkecil/index.html?pn=' . urlencode($pn);
            $config['total_rows'] = $this->Realkecil_model->total_rows($pn);
            $config['per_page'] = 10;
            if($this->session->userdata('id_level')==='1'):;
            $config['total_rows'] = $this->Realkecil_model->total_rows($pn);
            $realkecil = $this->Realkecil_model->get_limit_data1($config['per_page'], $start, $pn);
            else:   
            $config['total_rows'] = $this->Realkecil_model->total_rows1($pn,$pn1);    
            $realkecil = $this->Realkecil_model->get_limit_data($config['per_page'], $start, $pn, $pn1);
            endif;
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'realkecil_data' => $realkecil,
            'pn' => $pn,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        } else {
            $config['base_url'] = base_url() . 'realkecil/index.html';
            $config['first_url'] = base_url() . 'realkecil/index.html';
            $config['total_rows'] = $this->Realkecil_model->total_rows($pn1);
            $config['per_page'] = 10;
            $realkecil = $this->Realkecil_model->get_limit_data1($config['per_page'], $start, $pn1);
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'realkecil_data' => $realkecil,
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
       $this->load->view('realkecil/realkecil_list', $data);
       $this->load->view('templates/footer');
        
    }

    public function read($id) 
    {
        $row = $this->Realkecil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'tgl' => $row->tgl,
		'norek' => $row->norek,
		'nama' => $row->nama,
		'plafond' => $row->plafond,
	    );
            $this->load->view('realkecil/realkecil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realkecil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('realkecil/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'tgl' => set_value('tgl'),
	    'norek' => set_value('norek'),
	    'nama' => set_value('nama'),
	    'plafond' => set_value('plafond'),
	);
        $this->load->view('realkecil/realkecil_form', $data);
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

            $this->Realkecil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('realkecil'));
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
        $row = $this->Realkecil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('realkecil/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'tgl' => set_value('tgl', $row->tgl),
		'norek' => set_value('norek', $row->norek),
		'nama' => set_value('nama', $row->nama),
		'plafond' => set_value('plafond', $row->plafond),
	    );
            $this->load->view('realkecil/realkecil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realkecil'));
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

            $this->Realkecil_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('realkecil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Realkecil_model->get_by_id($id);

        if ($row) {
            $this->Realkecil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('realkecil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('realkecil'));
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
        $namaFile = "realkecil.xls";
        $judul = "realkecil";
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

	foreach ($this->Realkecil_model->get_all() as $data) {
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

/* End of file Realkecil.php */
/* Location: ./application/controllers/Realkecil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 17:46:37 */
/* http://harviacode.com */