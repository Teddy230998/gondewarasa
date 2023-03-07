<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'agenda/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'agenda/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'agenda/index.html';
            $config['first_url'] = base_url() . 'agenda/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Agenda_model->total_rows($q);
        $agenda = $this->Agenda_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'agenda_data' => $agenda,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/agenda/agenda_list", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
        );
        $this->load->view('admin/template', $data);
        } else {
            redirect(base_url("admin/index"));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agenda/create_action'),
            'id_agenda' => set_value('id_agenda'),
            'judul_agenda' => set_value('judul_agenda'),
            'isi_agenda' => set_value('isi_agenda'),
            'tempat_agenda' => set_value('tempat_agenda'),
            'tgl_agenda' => set_value('tgl_agenda'),
            'waktu_agenda' => set_value('waktu_agenda'),
            'foto_agenda' => set_value('foto_agenda'),
            'tglinput_agenda' => set_value('tglinput_agenda'),
            "container" => "admin/agenda/agenda_form", 
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
            'id_agenda' => $this->input->post('id_agenda',TRUE),
            'judul_agenda' => $this->input->post('judul_agenda',TRUE),
            'isi_agenda' => $this->input->post('isi_agenda',TRUE),
            'tempat_agenda' => $this->input->post('tempat_agenda',TRUE),
            'tgl_agenda' => $this->input->post('tgl_agenda',TRUE),
            'waktu_agenda' => $this->input->post('waktu_agenda',TRUE),
            'foto_agenda' => $this->_uploadImage(),
            'tglinput_agenda' => $this->input->post('tglinput_agenda',TRUE),
            );

            $this->Agenda_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/agenda'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agenda/update_action'),
                'id_agenda' => set_value('id_agenda', $row->id_agenda),
                'judul_agenda' => set_value('judul_agenda', $row->judul_agenda),
                'isi_agenda' => set_value('isi_agenda', $row->isi_agenda),
                'tempat_agenda' => set_value('tempat_agenda', $row->tempat_agenda),
                'tgl_agenda' => set_value('tgl_agenda', $row->tgl_agenda),
                'waktu_agenda' => set_value('waktu_agenda', $row->waktu_agenda),
                'foto_agenda' => set_value('foto_agenda', $row->foto_agenda),
                'tglinput_agenda' => set_value('tglinput_agenda', $row->tglinput_agenda),
                "container" => "admin/agenda/agenda_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
                );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/agenda'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_agenda', TRUE));
        } else {
            if (!empty($_FILES["foto"])) {
            $data = array(
            'judul_agenda' => $this->input->post('judul_agenda',TRUE),
            'isi_agenda' => $this->input->post('isi_agenda',TRUE),
            'tempat_agenda' => $this->input->post('tempat_agenda',TRUE),
            'tgl_agenda' => $this->input->post('tgl_agenda',TRUE),
            'waktu_agenda' => $this->input->post('waktu_agenda',TRUE),
            'foto_agenda' => $this->_uploadImage(),
            'tglinput_agenda' => $this->input->post('tglinput_agenda',TRUE),
            );
            } else {
                $data = array(
                    'judul_agenda' => $this->input->post('judul_agenda',TRUE),
                    'isi_agenda' => $this->input->post('isi_agenda',TRUE),
                    'tempat_agenda' => $this->input->post('tempat_agenda',TRUE),
                    'tgl_agenda' => $this->input->post('tgl_agenda',TRUE),
                    'waktu_agenda' => $this->input->post('waktu_agenda',TRUE),
                    'foto_agenda' => $this->input->post('old_image',TRUE),
                    'tglinput_agenda' => $this->input->post('tglinput_agenda',TRUE),
                    );
            }
            $this->Agenda_model->update($this->input->post('id_agenda', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/agenda'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agenda_model->get_by_id($id);

        if ($row) {
            $this->Agenda_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/agenda'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/agenda'));
        }
    }

    private function _uploadImage(){
         
        $liatdata=$this->db->query("SELECT * FROM agenda");
        $idsementara=$liatdata->num_rows()+1;
        $id_agenda="$idsementara";
        $id_agenda=substr($id_agenda,-8);
                
        $config['upload_path']          = './user/agenda/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $id_agenda;
        $config['overwrite']		    = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_agenda')) {
                return $this->upload->data("file_name");
        }
                return "default.jpg";
        }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_agenda', 'judul agenda', 'trim|required');
	$this->form_validation->set_rules('isi_agenda', 'isi agenda', 'trim|required');
	$this->form_validation->set_rules('tempat_agenda', 'tempat agenda', 'trim|required');
	$this->form_validation->set_rules('tgl_agenda', 'tgl agenda', 'trim|required');
	$this->form_validation->set_rules('waktu_agenda', 'waktu agenda', 'trim|required');
	// $this->form_validation->set_rules('foto_agenda', 'foto agenda', 'trim|required');
	$this->form_validation->set_rules('tglinput_agenda', 'tglinput agenda', 'trim|required');

	$this->form_validation->set_rules('id_agenda', 'id_agenda', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-25 06:49:33 */
/* http://harviacode.com */