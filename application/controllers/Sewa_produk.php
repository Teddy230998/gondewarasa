<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sewa_produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sewa_produk_model');
        $this->load->model('pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'sewa_produk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sewa_produk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sewa_produk/index.html';
            $config['first_url'] = base_url() . 'sewa_produk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sewa_produk_model->total_rows($q);
        $sewa_produk = $this->Sewa_produk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sewa_produk_data' => $sewa_produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/sewa_produk/sewa_produk_list",
            "footer" => "admin/footer",
            "nav" => "admin/nav",
        );
        $this->load->view('admin/template', $data);
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
                "container" => "admin/sewa_produk/sewa_produk_read",
                "footer" => "admin/footer",
                "nav" => "admin/nav",
            );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Maaf Pelanggan belum bayar');
            redirect(site_url('sewa_produk'));
        }
    }
    // public function read($id) 
    // {
    //     $row = $this->Sewa_produk_model->get_by_id($id);
    //     if ($row) {
    //         $data = array(
    // 	'id_sp' => $row->id_sp,
    // 	'id_user' => $row->id_user,
    // 	'id_produk' => $row->id_produk,
    // 	'tgl_sewa' => $row->tgl_sewa,
    // 	'biaya' => $row->biaya,
    // 	'alamat' => $row->alamat,
    // 	'tgl_acara' => $row->tgl_acara,
    // 	'jml_pesan' => $row->jml_pesan,
    //     );
    //         $this->load->view('sewa_produk/sewa_produk_read', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('sewa_produk'));
    //     }
    // }
    public function konfirmasi()
    {
        $data = array(
            'status' => $this->input->post('status', TRUE),
        );
        $this->pembayaran_model->update($data, $this->input->post('id_pem', TRUE));
        $this->session->set_flashdata('message', 'Konfirmasi Record Success');
        redirect(site_url('sewa_produk'));
    }

    public function notif($id)
    {
        $this->db->query('UPDATE pembayaran SET status_notif = 1 where id_pem="' . $id . '"');
        $this->session->set_flashdata('message', 'Konfirmasi Record Success');
        redirect(site_url('sewa_produk'));
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sewa_produk/create_action'),
            'id_sp' => set_value('id_sp'),
            'id_user' => set_value('id_user'),
            'id_produk' => set_value('id_produk'),
            'tgl_sewa' => set_value('tgl_sewa'),
            'biaya' => set_value('biaya'),
            'alamat' => set_value('alamat'),
            'tgl_acara' => set_value('tgl_acara'),
            'jml_pesan' => set_value('jml_pesan'),
        );
        $this->load->view('sewa_produk/sewa_produk_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'tgl_sewa' => $this->input->post('tgl_sewa', TRUE),
                'biaya' => $this->input->post('biaya', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tgl_acara' => $this->input->post('tgl_acara', TRUE),
                'jml_pesan' => $this->input->post('jml_pesan', TRUE),
            );

            $this->Sewa_produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sewa_produk'));
        }
    }

    public function update($id)
    {
        $row = $this->Sewa_produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sewa_produk/update_action'),
                'id_sp' => set_value('id_sp', $row->id_sp),
                'id_user' => set_value('id_user', $row->id_user),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'tgl_sewa' => set_value('tgl_sewa', $row->tgl_sewa),
                'biaya' => set_value('biaya', $row->biaya),
                'alamat' => set_value('alamat', $row->alamat),
                'tgl_acara' => set_value('tgl_acara', $row->tgl_acara),
                'jml_pesan' => set_value('jml_pesan', $row->jml_pesan),
            );
            $this->load->view('sewa_produk/sewa_produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sewa_produk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sp', TRUE));
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'tgl_sewa' => $this->input->post('tgl_sewa', TRUE),
                'biaya' => $this->input->post('biaya', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tgl_acara' => $this->input->post('tgl_acara', TRUE),
                'jml_pesan' => $this->input->post('jml_pesan', TRUE),
            );

            $this->Sewa_produk_model->update($this->input->post('id_sp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sewa_produk'));
        }
    }

    public function delete($id)
    {
        $row = $this->Sewa_produk_model->get_by_id($id);

        if ($row) {
            $this->Sewa_produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sewa_produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sewa_produk'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('tgl_sewa', 'tgl sewa', 'trim|required');
        $this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('tgl_acara', 'tgl acara', 'trim|required');
        $this->form_validation->set_rules('jml_pesan', 'jml pesan', 'trim|required');

        $this->form_validation->set_rules('id_sp', 'id_sp', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Sewa_produk.php */
/* Location: ./application/controllers/Sewa_produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-09 15:02:20 */
/* http://harviacode.com */