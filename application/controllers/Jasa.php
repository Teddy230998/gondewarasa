<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jasa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jasa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jasa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jasa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jasa/index.html';
            $config['first_url'] = base_url() . 'jasa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jasa_model->total_rows($q);
        $jasa = $this->Jasa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jasa_data' => $jasa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/jasa/jasa_list", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
        );
        $this->load->view('admin/template', $data);
        } else {
            redirect(base_url("admin/index"));
        }
    }

    public function read($id) 
    {
        $row = $this->Jasa_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_jasa' => $row->id_jasa,
            'nama' => $row->nama,
            'harga' => $row->harga,
            'deskripsi' => $row->deskripsi,
            'foto_jasa' => $row->foto_jasa,
            'tgl_input' => $row->tgl_input,
            "container" => "admin/jasa/jasa_read", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
	        );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jasa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jasa/create_action'),
            'id_jasa' => set_value('id_jasa'),
            'nama' => set_value('nama'),
            'harga' => set_value('harga'),
            'deskripsi' => set_value('deskripsi'),
            'foto_jasa' => set_value('foto_jasa'),
            'tgl_input' => set_value('tgl_input'),
            "container" => "admin/jasa/jasa_form", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
        );
        $this->load->view('admin/template', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_jasa' => $this->input->post('id_jasa',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'harga' => $this->input->post('harga',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'foto_jasa' => $this->_uploadImage(),
                'tgl_input' => $this->input->post('tgl_input',TRUE),
            );
            $this->Jasa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/jasa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jasa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jasa/update_action'),
                'id_jasa' => set_value('id_jasa', $row->id_jasa),
                'nama' => set_value('nama', $row->nama),
                'harga' => set_value('harga', $row->harga),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'foto_jasa' => set_value('foto_jasa', $row->foto_jasa),
                'tgl_input' => set_value('tgl_input', $row->tgl_input),
                "container" => "admin/jasa/jasa_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
                );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jasa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jasa', TRUE));
        } else {
                $config = array(
                    'upload_path'=>'./user/produk_dan_jasa/',
                    'allowed_types'=>'jpg|png|jpeg',
                    'max_size'=>2086
                    );

                $nama = $this->input->post('nama');
                $harga = $this->input->post('harga');
                $deskripsi = $this->input->post('deskripsi');
                $tgl_input = $this->input->post('tgl_input');
                $foto = $this->db->get_where('jasa','id_jasa');

                if($foto->num_rows()>0){
                $pros=$foto->row();
                $name=$pros->foto_jasa;

                if(file_exists($lok=FCPATH.'/user/produk_dan_jasa/'.$name)){
                unlink($lok);
                }
                if(file_exists($lok=FCPATH.'/user/produk_dan_jasa/'.$name)){
                unlink($lok);
                }}

                $this->load->library('upload',$config);

                if($this->upload->do_upload('foto_jasa')){

                $finfo = $this->upload->data();
                $nama_foto = $finfo['file_name'];

                $data= array(
                                    'nama'=>$nama,
                                    'harga'=>$harga,
                                    'deskripsi'=>$deskripsi,
                                    'tgl_input'=>$tgl_input,
                                    'foto_jasa'=>$nama_foto
                                    );

                $config2 = array(
                        'source_image'=>'user/produk_dan_jasa/'.$nama_foto,
                        'image_library'=>'gd2',
                        'new_image'=>'user/produk_dan_jasa',
                        'maintain_ratio'=>true,
                        'width'=>150,
                        'height'=>200
                    );

                $this->load->library('image_lib',$config2);
                $this->image_lib->resize();    

                }else{
                $data= array(
                                    'nama'=>$nama,
                                    'harga'=>$harga,
                                    'deskripsi'=>$deskripsi,
                                    'tgl_input'=>$tgl_input,
                                    );

                }

            $this->Jasa_model->update($this->input->post('id_jasa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/jasa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jasa_model->get_by_id($id);

        if ($row) {
            $this->Jasa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/jasa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jasa'));
        }
    }

    private function _uploadImage(){
         
        $liatdata=$this->db->query("SELECT * FROM jasa");
        $idsementara=$liatdata->num_rows();
        $id_jasa="$idsementara";
        // $id_jasa=substr($id_jasa,-8);
                
        $config['upload_path']          = './user/produk_dan_jasa/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id_jasa;
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_jasa')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	// $this->form_validation->set_rules('foto_jasa', 'foto_jasa', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');

	$this->form_validation->set_rules('id_jasa', 'id_jasa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jasa.php */
/* Location: ./application/controllers/Jasa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-25 07:58:32 */
/* http://harviacode.com */