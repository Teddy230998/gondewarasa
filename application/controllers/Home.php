<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Agenda_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data = array("container" => "user/index", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function berita()
	{
		$data = array("container" => "user/berita", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function bacaberita($id)
	{
		$row = $this->Agenda_model->get_by_id($id);
		$data = array(
			'id_agenda' => $row->id_agenda,
			'judul_agenda' => $row->judul_agenda,
			'isi_agenda' => $row->isi_agenda,
			'tempat_agenda' => $row->tempat_agenda,
			'tgl_agenda' => $row->tgl_agenda,
			'waktu_agenda' => $row->waktu_agenda,
			'foto_agenda' => $row->foto_agenda,
			'tglinput_agenda' => $row->tglinput_agenda,
			"container" => "user/baca_berita", "footer" => "user/footer", "nav" => "user/nav"
		);
		$this->load->view('user/template', $data);
	}
	public function profil()
	{
		$data = array("container" => "user/profil", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function kontak()
	{
		$data = array("container" => "user/kontak", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function produk()
	{
		$data = array("container" => "user/produk", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function jasa()
	{
		$data = array("container" => "user/jasa", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function kelas()
	{
		$data = array("container" => "user/kelas", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function galeri()
	{
		$data = array("container" => "user/galeri", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function login()
	{
		$data = array("container" => "user/login", "footer" => "user/footer", "nav" => "user/nav");
		$this->load->view("user/template", $data);
	}
	public function daftar()
	{
		$data = array(
			'button' => 'Daftar',
			'action' => site_url('home/create_action'),
			'id_user' => set_value('id_user'),
			'nama_user' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'alamat_user' => set_value('alamat'),
			'no_hp' => set_value('no_hp'),
			"container" => "user/login",
			"footer" => "user/footer",
			"nav" => "user/nav"
		);
		$this->load->view('user/template', $data);
	}

	public function daftar_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->daftar();
		} else {
			$data = array(
				'id_user' => $this->input->post('id_user', TRUE),
				'nama_user' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'password' => $this->input->post('password', TRUE),
				'alamat_user' => $this->input->post('alamat', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
			);

			$this->User_model->insert($data);
			// $this->session->set_flashdata('message', 'Create Record Success');
			echo "<script>alert('Daftar Berhasil');location='login';</script>";
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

		$this->form_validation->set_rules('id_user', 'id_user', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
