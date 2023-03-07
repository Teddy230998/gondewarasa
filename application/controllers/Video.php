<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Video_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'video/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'video/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'video/index.html';
            $config['first_url'] = base_url() . 'video/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Video_model->total_rows($q);
        $video = $this->Video_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'video_data' => $video,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            "container" => "admin/video/video_list", 
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
        $row = $this->Video_model->get_by_id($id);
        if ($row) {
        $data = array(
            'id_video' => $row->id_video,
            'ket_video' => $row->ket_video,
            'link_video' => $row->link_video,
            'tglinput_video' => $row->tglinput_video,
            "container" => "admin/video/video_read", 
            "footer" => "admin/footer",
            "nav" => "admin/nav"
	    );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/video'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('video/create_action'),
            'id_video' => set_value('id_video'),
            'ket_video' => set_value('ket_video'),
            'link_video' => set_value('link_video'),
            'tglinput_video' => set_value('tglinput_video'),
            "container" => "admin/video/video_form", 
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
                'id_video' => $this->input->post('id_video',TRUE),
                'ket_video' => $this->input->post('ket_video',TRUE),
                'link_video' => $this->input->post('link_video',TRUE),
                'tglinput_video' => $this->input->post('tglinput_video',TRUE),
            );

            $this->Video_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/video'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Video_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('video/update_action'),
                'id_video' => set_value('id_video', $row->id_video),
                'ket_video' => set_value('ket_video', $row->ket_video),
                'link_video' => set_value('link_video', $row->link_video),
                'tglinput_video' => set_value('tglinput_video', $row->tglinput_video),
                "container" => "admin/video/video_form", 
                "footer" => "admin/footer",
                "nav" => "admin/nav"
	    );
            $this->load->view('admin/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/video'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_video', TRUE));
        } else {
            $data = array(
            'ket_video' => $this->input->post('ket_video',TRUE),
            'link_video' => $this->input->post('link_video',TRUE),
            'tglinput_video' => $this->input->post('tglinput_video',TRUE),
            );

            $this->Video_model->update($this->input->post('id_video', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/video'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Video_model->get_by_id($id);

        if ($row) {
            $this->Video_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/video'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/video'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ket_video', 'ket video', 'trim|required');
	$this->form_validation->set_rules('link_video', 'link video', 'trim|required');
	$this->form_validation->set_rules('tglinput_video', 'tglinput video', 'trim|required');

	$this->form_validation->set_rules('id_video', 'id_video', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Video.php */
/* Location: ./application/controllers/Video.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-25 05:02:30 */
/* http://harviacode.com */