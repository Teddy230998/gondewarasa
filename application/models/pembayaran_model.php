<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pembayaran_model extends CI_Model
{

    public $table = 'pembayaran';
    public $id = 'id_sewa';
    public $order = 'DESC';
    public $id_pem = 'id_pem';

    function __construct()
    {
        parent::__construct();
    }
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    // insert
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function update($data,$id_pem)
    {
        $this->db->where($this->id_pem, $id_pem);
        $this->db->update($this->table, $data);
    }
    
    

}
