<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Real_model extends CI_Model
{

    public $table = 'real';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,branch,pn,tgl_real,plafon,code_desc');
        $this->datatables->from('real');
        //add this line for join
        //$this->datatables->join('table2', 'real.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('real/read/$1'),'Read')." | ".anchor(site_url('real/update/$1'),'Update')." | ".anchor(site_url('real/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('branch', $q);
	$this->db->or_like('pn', $q);
	$this->db->or_like('tgl_real', $q);
	$this->db->or_like('plafon', $q);
	$this->db->or_like('code_desc', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('branch', $q);
	$this->db->or_like('pn', $q);
	$this->db->or_like('tgl_real', $q);
	$this->db->or_like('plafon', $q);
	$this->db->or_like('code_desc', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Real_model.php */
/* Location: ./application/models/Real_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-08 19:32:52 */
/* http://harviacode.com */