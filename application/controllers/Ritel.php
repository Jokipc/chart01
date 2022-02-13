<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ritel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ritel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ritel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ritel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ritel/index.html';
            $config['first_url'] = base_url() . 'ritel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ritel_model->total_rows($q);
        $ritel = $this->Ritel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ritel_data' => $ritel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('ritel/ritel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ritel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'branch' => $row->branch,
		'pn' => $row->pn,
		'nama_rm' => $row->nama_rm,
		'koderm' => $row->koderm,
		'rm_segemen' => $row->rm_segemen,
		't_ibbiz' => $row->t_ibbiz,
		'b_ibbiz' => $row->b_ibbiz,
		't_bristore' => $row->t_bristore,
		'b_bristore' => $row->b_bristore,
		't_bankgaransi' => $row->t_bankgaransi,
		'b_bankgaransi' => $row->b_bankgaransi,
		't_penyalurankur' => $row->t_penyalurankur,
		'b_penyalurankur' => $row->b_penyalurankur,
		't_realkeci' => $row->t_realkeci,
		'b_realkecil' => $row->b_realkecil,
		't_pemi' => $row->t_pemi,
		'b_premi' => $row->b_premi,
		't_ekstrakom' => $row->t_ekstrakom,
		'b_ekstrakom' => $row->b_ekstrakom,
		't_britama' => $row->t_britama,
		'b_britama' => $row->b_britama,
		't_payrol' => $row->t_payrol,
		'b_payrol' => $row->b_payrol,
		't_edc' => $row->t_edc,
		'b_edc' => $row->b_edc,
		't_giro' => $row->t_giro,
		'b_giro' => $row->b_giro,
		't_tabungan' => $row->t_tabungan,
		'b_tabungan' => $row->b_tabungan,
		't_brimola' => $row->t_brimola,
		'b_brimola' => $row->b_brimola,
		't_digitalsav' => $row->t_digitalsav,
		'b_digitalsav' => $row->b_digitalsav,
		't_kpr' => $row->t_kpr,
		'b_kpr' => $row->b_kpr,
		't_debkpr' => $row->t_debkpr,
		'b_debkpr' => $row->b_debkpr,
		't_kk' => $row->t_kk,
		'b_kk' => $row->b_kk,
		't_briguna' => $row->t_briguna,
		'b_briguna' => $row->b_briguna,
		't_debbriguna' => $row->t_debbriguna,
		'b_debbriguna' => $row->b_debbriguna,
	    );
            $this->load->view('ritel/ritel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ritel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ritel/create_action'),
	    'id' => set_value('id'),
	    'branch' => set_value('branch'),
	    'pn' => set_value('pn'),
	    'nama_rm' => set_value('nama_rm'),
	    'koderm' => set_value('koderm'),
	    'rm_segemen' => set_value('rm_segemen'),
	    't_ibbiz' => set_value('t_ibbiz'),
	    'b_ibbiz' => set_value('b_ibbiz'),
	    't_bristore' => set_value('t_bristore'),
	    'b_bristore' => set_value('b_bristore'),
	    't_bankgaransi' => set_value('t_bankgaransi'),
	    'b_bankgaransi' => set_value('b_bankgaransi'),
	    't_penyalurankur' => set_value('t_penyalurankur'),
	    'b_penyalurankur' => set_value('b_penyalurankur'),
	    't_realkeci' => set_value('t_realkeci'),
	    'b_realkecil' => set_value('b_realkecil'),
	    't_pemi' => set_value('t_pemi'),
	    'b_premi' => set_value('b_premi'),
	    't_ekstrakom' => set_value('t_ekstrakom'),
	    'b_ekstrakom' => set_value('b_ekstrakom'),
	    't_britama' => set_value('t_britama'),
	    'b_britama' => set_value('b_britama'),
	    't_payrol' => set_value('t_payrol'),
	    'b_payrol' => set_value('b_payrol'),
	    't_edc' => set_value('t_edc'),
	    'b_edc' => set_value('b_edc'),
	    't_giro' => set_value('t_giro'),
	    'b_giro' => set_value('b_giro'),
	    't_tabungan' => set_value('t_tabungan'),
	    'b_tabungan' => set_value('b_tabungan'),
	    't_brimola' => set_value('t_brimola'),
	    'b_brimola' => set_value('b_brimola'),
	    't_digitalsav' => set_value('t_digitalsav'),
	    'b_digitalsav' => set_value('b_digitalsav'),
	    't_kpr' => set_value('t_kpr'),
	    'b_kpr' => set_value('b_kpr'),
	    't_debkpr' => set_value('t_debkpr'),
	    'b_debkpr' => set_value('b_debkpr'),
	    't_kk' => set_value('t_kk'),
	    'b_kk' => set_value('b_kk'),
	    't_briguna' => set_value('t_briguna'),
	    'b_briguna' => set_value('b_briguna'),
	    't_debbriguna' => set_value('t_debbriguna'),
	    'b_debbriguna' => set_value('b_debbriguna'),
	);
        $this->load->view('ritel/ritel_form', $data);
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
		'nama_rm' => $this->input->post('nama_rm',TRUE),
		'koderm' => $this->input->post('koderm',TRUE),
		'rm_segemen' => $this->input->post('rm_segemen',TRUE),
		't_ibbiz' => $this->input->post('t_ibbiz',TRUE),
		'b_ibbiz' => $this->input->post('b_ibbiz',TRUE),
		't_bristore' => $this->input->post('t_bristore',TRUE),
		'b_bristore' => $this->input->post('b_bristore',TRUE),
		't_bankgaransi' => $this->input->post('t_bankgaransi',TRUE),
		'b_bankgaransi' => $this->input->post('b_bankgaransi',TRUE),
		't_penyalurankur' => $this->input->post('t_penyalurankur',TRUE),
		'b_penyalurankur' => $this->input->post('b_penyalurankur',TRUE),
		't_realkeci' => $this->input->post('t_realkeci',TRUE),
		'b_realkecil' => $this->input->post('b_realkecil',TRUE),
		't_pemi' => $this->input->post('t_pemi',TRUE),
		'b_premi' => $this->input->post('b_premi',TRUE),
		't_ekstrakom' => $this->input->post('t_ekstrakom',TRUE),
		'b_ekstrakom' => $this->input->post('b_ekstrakom',TRUE),
		't_britama' => $this->input->post('t_britama',TRUE),
		'b_britama' => $this->input->post('b_britama',TRUE),
		't_payrol' => $this->input->post('t_payrol',TRUE),
		'b_payrol' => $this->input->post('b_payrol',TRUE),
		't_edc' => $this->input->post('t_edc',TRUE),
		'b_edc' => $this->input->post('b_edc',TRUE),
		't_giro' => $this->input->post('t_giro',TRUE),
		'b_giro' => $this->input->post('b_giro',TRUE),
		't_tabungan' => $this->input->post('t_tabungan',TRUE),
		'b_tabungan' => $this->input->post('b_tabungan',TRUE),
		't_brimola' => $this->input->post('t_brimola',TRUE),
		'b_brimola' => $this->input->post('b_brimola',TRUE),
		't_digitalsav' => $this->input->post('t_digitalsav',TRUE),
		'b_digitalsav' => $this->input->post('b_digitalsav',TRUE),
		't_kpr' => $this->input->post('t_kpr',TRUE),
		'b_kpr' => $this->input->post('b_kpr',TRUE),
		't_debkpr' => $this->input->post('t_debkpr',TRUE),
		'b_debkpr' => $this->input->post('b_debkpr',TRUE),
		't_kk' => $this->input->post('t_kk',TRUE),
		'b_kk' => $this->input->post('b_kk',TRUE),
		't_briguna' => $this->input->post('t_briguna',TRUE),
		'b_briguna' => $this->input->post('b_briguna',TRUE),
		't_debbriguna' => $this->input->post('t_debbriguna',TRUE),
		'b_debbriguna' => $this->input->post('b_debbriguna',TRUE),
	    );

            $this->Ritel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ritel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ritel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ritel/update_action'),
		'id' => set_value('id', $row->id),
		'branch' => set_value('branch', $row->branch),
		'pn' => set_value('pn', $row->pn),
		'nama_rm' => set_value('nama_rm', $row->nama_rm),
		'koderm' => set_value('koderm', $row->koderm),
		'rm_segemen' => set_value('rm_segemen', $row->rm_segemen),
		't_ibbiz' => set_value('t_ibbiz', $row->t_ibbiz),
		'b_ibbiz' => set_value('b_ibbiz', $row->b_ibbiz),
		't_bristore' => set_value('t_bristore', $row->t_bristore),
		'b_bristore' => set_value('b_bristore', $row->b_bristore),
		't_bankgaransi' => set_value('t_bankgaransi', $row->t_bankgaransi),
		'b_bankgaransi' => set_value('b_bankgaransi', $row->b_bankgaransi),
		't_penyalurankur' => set_value('t_penyalurankur', $row->t_penyalurankur),
		'b_penyalurankur' => set_value('b_penyalurankur', $row->b_penyalurankur),
		't_realkeci' => set_value('t_realkeci', $row->t_realkeci),
		'b_realkecil' => set_value('b_realkecil', $row->b_realkecil),
		't_pemi' => set_value('t_pemi', $row->t_pemi),
		'b_premi' => set_value('b_premi', $row->b_premi),
		't_ekstrakom' => set_value('t_ekstrakom', $row->t_ekstrakom),
		'b_ekstrakom' => set_value('b_ekstrakom', $row->b_ekstrakom),
		't_britama' => set_value('t_britama', $row->t_britama),
		'b_britama' => set_value('b_britama', $row->b_britama),
		't_payrol' => set_value('t_payrol', $row->t_payrol),
		'b_payrol' => set_value('b_payrol', $row->b_payrol),
		't_edc' => set_value('t_edc', $row->t_edc),
		'b_edc' => set_value('b_edc', $row->b_edc),
		't_giro' => set_value('t_giro', $row->t_giro),
		'b_giro' => set_value('b_giro', $row->b_giro),
		't_tabungan' => set_value('t_tabungan', $row->t_tabungan),
		'b_tabungan' => set_value('b_tabungan', $row->b_tabungan),
		't_brimola' => set_value('t_brimola', $row->t_brimola),
		'b_brimola' => set_value('b_brimola', $row->b_brimola),
		't_digitalsav' => set_value('t_digitalsav', $row->t_digitalsav),
		'b_digitalsav' => set_value('b_digitalsav', $row->b_digitalsav),
		't_kpr' => set_value('t_kpr', $row->t_kpr),
		'b_kpr' => set_value('b_kpr', $row->b_kpr),
		't_debkpr' => set_value('t_debkpr', $row->t_debkpr),
		'b_debkpr' => set_value('b_debkpr', $row->b_debkpr),
		't_kk' => set_value('t_kk', $row->t_kk),
		'b_kk' => set_value('b_kk', $row->b_kk),
		't_briguna' => set_value('t_briguna', $row->t_briguna),
		'b_briguna' => set_value('b_briguna', $row->b_briguna),
		't_debbriguna' => set_value('t_debbriguna', $row->t_debbriguna),
		'b_debbriguna' => set_value('b_debbriguna', $row->b_debbriguna),
	    );
            $this->load->view('ritel/ritel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ritel'));
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
		'nama_rm' => $this->input->post('nama_rm',TRUE),
		'koderm' => $this->input->post('koderm',TRUE),
		'rm_segemen' => $this->input->post('rm_segemen',TRUE),
		't_ibbiz' => $this->input->post('t_ibbiz',TRUE),
		'b_ibbiz' => $this->input->post('b_ibbiz',TRUE),
		't_bristore' => $this->input->post('t_bristore',TRUE),
		'b_bristore' => $this->input->post('b_bristore',TRUE),
		't_bankgaransi' => $this->input->post('t_bankgaransi',TRUE),
		'b_bankgaransi' => $this->input->post('b_bankgaransi',TRUE),
		't_penyalurankur' => $this->input->post('t_penyalurankur',TRUE),
		'b_penyalurankur' => $this->input->post('b_penyalurankur',TRUE),
		't_realkeci' => $this->input->post('t_realkeci',TRUE),
		'b_realkecil' => $this->input->post('b_realkecil',TRUE),
		't_pemi' => $this->input->post('t_pemi',TRUE),
		'b_premi' => $this->input->post('b_premi',TRUE),
		't_ekstrakom' => $this->input->post('t_ekstrakom',TRUE),
		'b_ekstrakom' => $this->input->post('b_ekstrakom',TRUE),
		't_britama' => $this->input->post('t_britama',TRUE),
		'b_britama' => $this->input->post('b_britama',TRUE),
		't_payrol' => $this->input->post('t_payrol',TRUE),
		'b_payrol' => $this->input->post('b_payrol',TRUE),
		't_edc' => $this->input->post('t_edc',TRUE),
		'b_edc' => $this->input->post('b_edc',TRUE),
		't_giro' => $this->input->post('t_giro',TRUE),
		'b_giro' => $this->input->post('b_giro',TRUE),
		't_tabungan' => $this->input->post('t_tabungan',TRUE),
		'b_tabungan' => $this->input->post('b_tabungan',TRUE),
		't_brimola' => $this->input->post('t_brimola',TRUE),
		'b_brimola' => $this->input->post('b_brimola',TRUE),
		't_digitalsav' => $this->input->post('t_digitalsav',TRUE),
		'b_digitalsav' => $this->input->post('b_digitalsav',TRUE),
		't_kpr' => $this->input->post('t_kpr',TRUE),
		'b_kpr' => $this->input->post('b_kpr',TRUE),
		't_debkpr' => $this->input->post('t_debkpr',TRUE),
		'b_debkpr' => $this->input->post('b_debkpr',TRUE),
		't_kk' => $this->input->post('t_kk',TRUE),
		'b_kk' => $this->input->post('b_kk',TRUE),
		't_briguna' => $this->input->post('t_briguna',TRUE),
		'b_briguna' => $this->input->post('b_briguna',TRUE),
		't_debbriguna' => $this->input->post('t_debbriguna',TRUE),
		'b_debbriguna' => $this->input->post('b_debbriguna',TRUE),
	    );

            $this->Ritel_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ritel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ritel_model->get_by_id($id);

        if ($row) {
            $this->Ritel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ritel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ritel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('branch', 'branch', 'trim|required');
	$this->form_validation->set_rules('pn', 'pn', 'trim|required');
	$this->form_validation->set_rules('nama_rm', 'nama rm', 'trim|required');
	$this->form_validation->set_rules('koderm', 'koderm', 'trim|required');
	$this->form_validation->set_rules('rm_segemen', 'rm segemen', 'trim|required');
	$this->form_validation->set_rules('t_ibbiz', 't ibbiz', 'trim|required');
	$this->form_validation->set_rules('b_ibbiz', 'b ibbiz', 'trim|required');
	$this->form_validation->set_rules('t_bristore', 't bristore', 'trim|required');
	$this->form_validation->set_rules('b_bristore', 'b bristore', 'trim|required');
	$this->form_validation->set_rules('t_bankgaransi', 't bankgaransi', 'trim|required');
	$this->form_validation->set_rules('b_bankgaransi', 'b bankgaransi', 'trim|required');
	$this->form_validation->set_rules('t_penyalurankur', 't penyalurankur', 'trim|required');
	$this->form_validation->set_rules('b_penyalurankur', 'b penyalurankur', 'trim|required');
	$this->form_validation->set_rules('t_realkeci', 't realkeci', 'trim|required');
	$this->form_validation->set_rules('b_realkecil', 'b realkecil', 'trim|required');
	$this->form_validation->set_rules('t_pemi', 't pemi', 'trim|required');
	$this->form_validation->set_rules('b_premi', 'b premi', 'trim|required');
	$this->form_validation->set_rules('t_ekstrakom', 't ekstrakom', 'trim|required');
	$this->form_validation->set_rules('b_ekstrakom', 'b ekstrakom', 'trim|required');
	$this->form_validation->set_rules('t_britama', 't britama', 'trim|required');
	$this->form_validation->set_rules('b_britama', 'b britama', 'trim|required');
	$this->form_validation->set_rules('t_payrol', 't payrol', 'trim|required');
	$this->form_validation->set_rules('b_payrol', 'b payrol', 'trim|required');
	$this->form_validation->set_rules('t_edc', 't edc', 'trim|required');
	$this->form_validation->set_rules('b_edc', 'b edc', 'trim|required');
	$this->form_validation->set_rules('t_giro', 't giro', 'trim|required');
	$this->form_validation->set_rules('b_giro', 'b giro', 'trim|required');
	$this->form_validation->set_rules('t_tabungan', 't tabungan', 'trim|required');
	$this->form_validation->set_rules('b_tabungan', 'b tabungan', 'trim|required');
	$this->form_validation->set_rules('t_brimola', 't brimola', 'trim|required');
	$this->form_validation->set_rules('b_brimola', 'b brimola', 'trim|required');
	$this->form_validation->set_rules('t_digitalsav', 't digitalsav', 'trim|required');
	$this->form_validation->set_rules('b_digitalsav', 'b digitalsav', 'trim|required');
	$this->form_validation->set_rules('t_kpr', 't kpr', 'trim|required');
	$this->form_validation->set_rules('b_kpr', 'b kpr', 'trim|required');
	$this->form_validation->set_rules('t_debkpr', 't debkpr', 'trim|required');
	$this->form_validation->set_rules('b_debkpr', 'b debkpr', 'trim|required');
	$this->form_validation->set_rules('t_kk', 't kk', 'trim|required');
	$this->form_validation->set_rules('b_kk', 'b kk', 'trim|required');
	$this->form_validation->set_rules('t_briguna', 't briguna', 'trim|required');
	$this->form_validation->set_rules('b_briguna', 'b briguna', 'trim|required');
	$this->form_validation->set_rules('t_debbriguna', 't debbriguna', 'trim|required');
	$this->form_validation->set_rules('b_debbriguna', 'b debbriguna', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ritel.xls";
        $judul = "ritel";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Rm");
	xlsWriteLabel($tablehead, $kolomhead++, "Koderm");
	xlsWriteLabel($tablehead, $kolomhead++, "Rm Segemen");
	xlsWriteLabel($tablehead, $kolomhead++, "T Ibbiz");
	xlsWriteLabel($tablehead, $kolomhead++, "B Ibbiz");
	xlsWriteLabel($tablehead, $kolomhead++, "T Bristore");
	xlsWriteLabel($tablehead, $kolomhead++, "B Bristore");
	xlsWriteLabel($tablehead, $kolomhead++, "T Bankgaransi");
	xlsWriteLabel($tablehead, $kolomhead++, "B Bankgaransi");
	xlsWriteLabel($tablehead, $kolomhead++, "T Penyalurankur");
	xlsWriteLabel($tablehead, $kolomhead++, "B Penyalurankur");
	xlsWriteLabel($tablehead, $kolomhead++, "T Realkeci");
	xlsWriteLabel($tablehead, $kolomhead++, "B Realkecil");
	xlsWriteLabel($tablehead, $kolomhead++, "T Pemi");
	xlsWriteLabel($tablehead, $kolomhead++, "B Premi");
	xlsWriteLabel($tablehead, $kolomhead++, "T Ekstrakom");
	xlsWriteLabel($tablehead, $kolomhead++, "B Ekstrakom");
	xlsWriteLabel($tablehead, $kolomhead++, "T Britama");
	xlsWriteLabel($tablehead, $kolomhead++, "B Britama");
	xlsWriteLabel($tablehead, $kolomhead++, "T Payrol");
	xlsWriteLabel($tablehead, $kolomhead++, "B Payrol");
	xlsWriteLabel($tablehead, $kolomhead++, "T Edc");
	xlsWriteLabel($tablehead, $kolomhead++, "B Edc");
	xlsWriteLabel($tablehead, $kolomhead++, "T Giro");
	xlsWriteLabel($tablehead, $kolomhead++, "B Giro");
	xlsWriteLabel($tablehead, $kolomhead++, "T Tabungan");
	xlsWriteLabel($tablehead, $kolomhead++, "B Tabungan");
	xlsWriteLabel($tablehead, $kolomhead++, "T Brimola");
	xlsWriteLabel($tablehead, $kolomhead++, "B Brimola");
	xlsWriteLabel($tablehead, $kolomhead++, "T Digitalsav");
	xlsWriteLabel($tablehead, $kolomhead++, "B Digitalsav");
	xlsWriteLabel($tablehead, $kolomhead++, "T Kpr");
	xlsWriteLabel($tablehead, $kolomhead++, "B Kpr");
	xlsWriteLabel($tablehead, $kolomhead++, "T Debkpr");
	xlsWriteLabel($tablehead, $kolomhead++, "B Debkpr");
	xlsWriteLabel($tablehead, $kolomhead++, "T Kk");
	xlsWriteLabel($tablehead, $kolomhead++, "B Kk");
	xlsWriteLabel($tablehead, $kolomhead++, "T Briguna");
	xlsWriteLabel($tablehead, $kolomhead++, "B Briguna");
	xlsWriteLabel($tablehead, $kolomhead++, "T Debbriguna");
	xlsWriteLabel($tablehead, $kolomhead++, "B Debbriguna");

	foreach ($this->Ritel_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->branch);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_rm);
	    xlsWriteNumber($tablebody, $kolombody++, $data->koderm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rm_segemen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_ibbiz);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_ibbiz);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_bristore);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_bristore);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_bankgaransi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_bankgaransi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_penyalurankur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_penyalurankur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_realkeci);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_realkecil);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_pemi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_premi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_ekstrakom);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_ekstrakom);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_britama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_britama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_payrol);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_payrol);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_edc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_edc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_giro);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_giro);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_tabungan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_tabungan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_brimola);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_brimola);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_digitalsav);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_digitalsav);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_kpr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_kpr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_debkpr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_debkpr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_kk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_kk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_briguna);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_briguna);
	    xlsWriteNumber($tablebody, $kolombody++, $data->t_debbriguna);
	    xlsWriteNumber($tablebody, $kolombody++, $data->b_debbriguna);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ritel.php */
/* Location: ./application/controllers/Ritel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-13 06:51:08 */
/* http://harviacode.com */