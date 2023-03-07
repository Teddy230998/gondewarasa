<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sewa_jasa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sewa_jasa_model');
        $this->load->model('pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sewa_jasa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sewa_jasa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sewa_jasa/index.html';
            $config['first_url'] = base_url() . 'sewa_jasa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sewa_jasa_model->total_rows($q);
        $sewa_jasa = $this->Sewa_jasa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sewa_jasa_data' => $sewa_jasa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/sewa_jasa/sewa_jasa_list", 
            "footer" => "admin/footer",
            "nav" => "admin/nav",
        );
        $this->load->view('admin/template', $data);
        } else {
            redirect(base_url("admin/index"));
        }
    }

    public function read($id) 
    {
        //$row = $this->db->query("select * from pembayaran where id_sewa='$id'");
        $row = $this->pembayaran_model->get_by_id($id);
        // $row=$row->result();
        if ($row) {
            $data = array(
                'id_pem' => $row->id_pem,
                'id_sewa' => $row->id_sewa,
                'biaya' => $row->biaya,
                'foto' => $row->foto,
                'tgl_bayar' => $row->tgl_bayar,
                "container" => "admin/sewa_jasa/sewa_jasa_read", 
                "footer" => "admin/footer",
                "nav" => "admin/nav",
	    );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Maaf Pelanggan belum bayar');
            redirect(site_url('sewa_jasa'));
        }

        // $row = $this->Sewa_jasa_model->get_by_id($id);
        // if ($row) {
        //     $data = array(
		// 'id_sj' => $row->id_sj,
		// 'id_jasa' => $row->id_jasa,
		// 'id_user' => $row->id_user,
		// 'biaya' => $row->biaya,
		// 'tgl_sewa' => $row->tgl_sewa,
		// 'alamat' => $row->alamat,
		// 'tgl_acara' => $row->tgl_acara,
		// 'status' => $row->status,
	    // );
        //     $this->load->view('sewa_jasa/sewa_jasa_read', $data);
        // } else {
        //     $this->session->set_flashdata('message', 'Record Not Found');
        //     redirect(site_url('sewa_jasa'));
        // }
    }
    public function konfirmasi() 
    {
        $data = array(
            'status' => $this->input->post('status',TRUE),
        );
        $this->pembayaran_model->update($data,$this->input->post('id_pem', TRUE));
            $this->session->set_flashdata('message', 'Konfirmasi Record Success');
            redirect(site_url('sewa_jasa'));
    }
    
    public function notif($id) 
    {
         $this->db->query('UPDATE pembayaran SET status_notif = 1 where id_pem="'.$id.'"');
         $this->session->set_flashdata('message', 'Konfirmasi Record Success');
		 redirect(site_url('sewa_jasa'));
    }
    public function re(){
        // $this->session->set_flashdata('msg', 
        // '<div class="alert alert-success">
        //     <h4>Anda Ada Pesan</h4>
        // </div>');  
        
		$this->load->view("admin/reload");
	}

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sewa_jasa/create_action'),
            'id_sj' => set_value('id_sj'),
            'id_jasa' => set_value('id_jasa'),
            'id_user' => set_value('id_user'),
            'biaya' => set_value('biaya'),
            'tgl_sewa' => set_value('tgl_sewa'),
            'alamat' => set_value('alamat'),
            'tgl_acara' => set_value('tgl_acara'),
	);
        $this->load->view('sewa_jasa/sewa_jasa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_sj' => $this->input->post('id_sj',TRUE),
		'id_jasa' => $this->input->post('id_jasa',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'tgl_sewa' => $this->input->post('tgl_sewa',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tgl_acara' => $this->input->post('tgl_acara',TRUE),
	    );

            $this->Sewa_jasa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sewa_jasa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sewa_jasa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sewa_jasa/update_action'),
                'id_sj' => set_value('id_sj', $row->id_sj),
                'id_jasa' => set_value('id_jasa', $row->id_jasa),
                'id_user' => set_value('id_user', $row->id_user),
                'biaya' => set_value('biaya', $row->biaya),
                'tgl_sewa' => set_value('tgl_sewa', $row->tgl_sewa),
                'alamat' => set_value('alamat', $row->alamat),
                'tgl_acara' => set_value('tgl_acara', $row->tgl_acara),
	    );
            $this->load->view('sewa_jasa/sewa_jasa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sewa_jasa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sj', TRUE));
        } else {
            $data = array(
		'id_jasa' => $this->input->post('id_jasa',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'tgl_sewa' => $this->input->post('tgl_sewa',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tgl_acara' => $this->input->post('tgl_acara',TRUE),
	    );

            $this->Sewa_jasa_model->update($this->input->post('id_sj', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sewa_jasa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sewa_jasa_model->get_by_id($id);

        if ($row) {
            $this->Sewa_jasa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sewa_jasa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sewa_jasa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jasa', 'id jasa', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
	$this->form_validation->set_rules('tgl_sewa', 'tgl sewa', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tgl_acara', 'tgl acara', 'trim|required');

	$this->form_validation->set_rules('id_sj', 'id_sj', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sewa_jasa.php */
/* Location: ./application/controllers/Sewa_jasa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-26 17:05:49 */
/* http://harviacode.com */