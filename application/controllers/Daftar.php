<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
	public function index(){
            $data = array(
                'id_user' => $this->input->post('id_user',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'email' => $this->input->post('email',TRUE),
                'password' => $this->input->post('password',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
            );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('login'));
    }
}
