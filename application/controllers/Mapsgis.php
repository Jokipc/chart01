<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapsgis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mapsgis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mapsgis/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mapsgis/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mapsgis/index.html';
            $config['first_url'] = base_url() . 'mapsgis/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mapsgis_model->total_rows($q);
        $mapsgis = $this->Mapsgis_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mapsgis_data' => $mapsgis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('mapsgis/mapsgis_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mapsgis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pn' => $row->pn,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'hp' => $row->hp,
		'email' => $row->email,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
		'rek' => $row->rek,
		'brimo' => $row->brimo,
		'qris' => $row->qris,
		'edc' => $row->edc,
	    );
            $this->load->view('mapsgis/mapsgis_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapsgis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mapsgis/create_action'),
	    'id' => set_value('id'),
	    'pn' => set_value('pn'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'hp' => set_value('hp'),
	    'email' => set_value('email'),
	    'latitude' => set_value('latitude'),
	    'longitude' => set_value('longitude'),
	    'rek' => set_value('rek'),
	    'brimo' => set_value('brimo'),
	    'qris' => set_value('qris'),
	    'edc' => set_value('edc'),
	);
        $this->load->view('mapsgis/mapsgis_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pn' => $this->input->post('pn',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'rek' => $this->input->post('rek',TRUE),
		'brimo' => $this->input->post('brimo',TRUE),
		'qris' => $this->input->post('qris',TRUE),
		'edc' => $this->input->post('edc',TRUE),
	    );

            $this->Mapsgis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mapsgis'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mapsgis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mapsgis/update_action'),
		'id' => set_value('id', $row->id),
		'pn' => set_value('pn', $row->pn),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'hp' => set_value('hp', $row->hp),
		'email' => set_value('email', $row->email),
		'latitude' => set_value('latitude', $row->latitude),
		'longitude' => set_value('longitude', $row->longitude),
		'rek' => set_value('rek', $row->rek),
		'brimo' => set_value('brimo', $row->brimo),
		'qris' => set_value('qris', $row->qris),
		'edc' => set_value('edc', $row->edc),
	    );
            $this->load->view('mapsgis/mapsgis_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapsgis'));
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
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'latitude' => $this->input->post('latitude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
		'rek' => $this->input->post('rek',TRUE),
		'brimo' => $this->input->post('brimo',TRUE),
		'qris' => $this->input->post('qris',TRUE),
		'edc' => $this->input->post('edc',TRUE),
	    );

            $this->Mapsgis_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mapsgis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mapsgis_model->get_by_id($id);

        if ($row) {
            $this->Mapsgis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mapsgis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapsgis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
	$this->form_validation->set_rules('rek', 'rek', 'trim|required');
	$this->form_validation->set_rules('brimo', 'brimo', 'trim|required');
	$this->form_validation->set_rules('qris', 'qris', 'trim|required');
	$this->form_validation->set_rules('edc', 'edc', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mapsgis.xls";
        $judul = "mapsgis";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Latitude");
	xlsWriteLabel($tablehead, $kolomhead++, "Longitude");
	xlsWriteLabel($tablehead, $kolomhead++, "Rek");
	xlsWriteLabel($tablehead, $kolomhead++, "Brimo");
	xlsWriteLabel($tablehead, $kolomhead++, "Qris");
	xlsWriteLabel($tablehead, $kolomhead++, "Edc");

	foreach ($this->Mapsgis_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->latitude);
	    xlsWriteLabel($tablebody, $kolombody++, $data->longitude);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->brimo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->qris);
	    xlsWriteLabel($tablebody, $kolombody++, $data->edc);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mapsgis.php */
/* Location: ./application/controllers/Mapsgis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-28 17:35:26 */
/* http://harviacode.com */