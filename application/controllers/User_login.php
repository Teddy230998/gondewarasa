<?php
class User_login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_user_model');
        $this->load->model('Jasa_model');
        $this->load->model('Produk_model');
        $this->load->model('Sewa_jasa_model');
        $this->load->model('Sewa_produk_model');
        $this->load->model('pembayaran_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $data = array("container" => "user/login", "footer" => "user/footer", "nav" => "user/nav");
        $this->load->view("user/template", $data);
    }

    function aksi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array(
            'email' => $email,
            'password' => md5($password)
        );
        $cek = $this->db->query("select * from user where email='$email' and password='$password'");
        $a = $cek->num_rows();
        if ($a == TRUE) {
            $data_session = array(
                'email' => $email,
                'password' => $password
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("user_login/home"));
        } else {
            echo "<script>alert('Email atau Password Salah');location='index';</script>";
        }
    }
    function home()
    {
        if (isset($_SESSION['email'])) {
            $data = array("container" => "user/login/home", "footer" => "user/footer", "nav" => "user/login/nav_user");
            $this->load->view("user/template", $data);
        } else {
            redirect(base_url("home/login"));
        }
    }

    function logout()
    {
        $this->session->unset_userdata(array('email' => ''));
        $this->session->sess_destroy();
        redirect(base_url("home/login"));
    }

    public function detail_jasa($id)
    {
        if (isset($_SESSION['email'])) {
            $row = $this->Jasa_model->get_by_id($id);
            $data = array(
                'id_jasa' => $row->id_jasa,
                'nama' => $row->nama,
                'harga' => $row->harga,
                'deskripsi' => $row->deskripsi,
                'foto_jasa' => $row->foto_jasa,
                'tgl_input' => $row->tgl_input,
                "container" => "user/login/detail_jasa", "footer" => "user/footer", "nav" => "user/login/nav_user"
            );
            $this->load->view('user/template', $data);
        } else {
            redirect(base_url("home/login"));
        }
    }
    public function form_jasa($id)
    {
        if (isset($_SESSION['email'])) {
            $row = $this->Jasa_model->get_by_id($id);
            $data = array(
                'id_sj' => set_value('id_sj'),
                'id_jasa' => set_value('id_jasa', $row->id_jasa),
                'id_user' => set_value('id_user'),
                'biaya' => set_value('biaya', $row->harga),
                'tgl_sewa' => set_value('tgl_sewa'),
                'alamat' => set_value('alamat'),
                'tgl_acara' => set_value('tgl_acara'),
                "container" => "user/login/form_sewa_jasa", "footer" => "user/footer", "nav" => "user/login/nav_user"
            );
            $this->load->view('user/template', $data);
        } else {
            redirect(base_url("home/login"));
        }
    }
    public function tagihan()
    {
        if (isset($_SESSION['email'])) {
            $data = array(
                "container" => "user/login/tagihan",
                "footer" => "user/footer",
                "nav" => "user/login/nav_user"
            );
            $this->load->view("user/template", $data);
        } else {
            redirect(base_url("home/login"));
        }
    }
    public function jasa_action($id)
    {
        $row = $this->Jasa_model->get_by_id($id);

        $data = array(
            'id_sj' => $this->input->post('id_sj', TRUE),
            'id_jasa' => $this->input->post('id_jasa', TRUE),
            'id_user' => $this->input->post('id_user', TRUE),
            'biaya' => $this->input->post('biaya', TRUE),
            'tgl_sewa' => $this->input->post('tgl_sewa', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'tgl_acara' => $this->input->post('tgl_acara', TRUE),
        );
        $z = $this->input->post('tgl_acara', TRUE);
        $cek = $this->db->query("select tgl_acara from sewa_jasa where tgl_acara='$z'");
        $a = $cek->num_rows();
        if ($a == FALSE) {
            $this->Sewa_jasa_model->insert($data);
            redirect(base_url("user_login/tagihan"));
        } else {
            $this->session->set_flashdata('message', 'Maaf Tanggal Sudah Ada yang booking');
            redirect(site_url('user_login/form_jasa/' . $id));
        }
    }
    public function bayaran()
    {
        $data = array(
            'id_sewa' => $this->input->post('id_sewa', TRUE),
            'biaya' => $this->input->post('biaya', TRUE),
            'foto' => $this->_uploadImage(),
            'tgl_bayar' => $this->input->post('tgl_bayar', TRUE),
            'status' => $this->input->post('status', TRUE),
        );

        $this->pembayaran_model->insert($data);
        redirect(site_url('user_login/tagihan'));
    }

    private function _uploadImage()
    {
        $liatdata = $this->db->query("SELECT * FROM pembayaran");
        $idsementara = $liatdata->num_rows() + 1;
        $id_pembayaran = "P$idsementara";
        $id_pembayaran = $this->id_pem = uniqid();

        $config['upload_path']          = './user/bukti/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->$id_pembayaran;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }


    public function form_produk($id)
    {
        if (isset($_SESSION['email'])) {
            $row = $this->Produk_model->get_by_id($id);
            $data = array(
                'id_sp' => set_value('id_sp'),
                'id_user' => set_value('id_user'),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'tgl_sewa' => set_value('tgl_sewa'),
                'biaya' => set_value('biaya', $row->harga),
                'alamat' => set_value('alamat'),
                'tgl_acara' => set_value('tgl_acara'),
                'jml_pesan' => set_value('jml_pesan'),
                "container" => "user/login/form_sewa_produk", "footer" => "user/footer", "nav" => "user/login/nav_user"
            );
            $this->load->view('user/template', $data);
        } else {
            redirect(base_url("home/login"));
        }
    }

    public function detail_produk($id)
    {
        if (isset($_SESSION['email'])) {
            $row = $this->Produk_model->get_by_id($id);
            $data = array(
                'id_produk' => $row->id_produk,
                'judul' => $row->judul,
                'harga' => $row->harga,
                'deskripsi' => $row->deskripsi,
                'foto' => $row->foto,
                'tgl_input' => $row->tglinput,
                "container" => "user/login/detail_produk", "footer" => "user/footer", "nav" => "user/login/nav_user"
            );
            $this->load->view('user/template', $data);
        } else {
            redirect(base_url("home/login"));
        }
    }

    public function produk_action($id)
    {
        $row = $this->Produk_model->get_by_id($id);

        $data = array(
            'id_sp' => $this->input->post('id_sp', TRUE),
            'id_user' => $this->input->post('id_user', TRUE),
            'id_produk' => $this->input->post('id_produk', TRUE),
            'tgl_sewa' => $this->input->post('tgl_sewa', TRUE),
            'biaya' => $this->input->post('biaya', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'tgl_acara' => $this->input->post('tgl_acara', TRUE),
            'jml_pesan' => $this->input->post('jml_pesan', TRUE),
        );
        $z = $this->input->post('jml_pesan', TRUE);
        $cek = $this->db->query("select * from produk where id_produk='$id'");
        $a = $cek->row();
        if ($z > $a->stok) {
            $this->session->set_flashdata('message', 'Maaf Stok Tidak Cukup');
            redirect(site_url('user_login/form_produk/' . $id));
        } else {
            $this->Sewa_produk_model->insert($data);
            redirect(base_url("user_login/tagihan"));
        }
    }
    // public function re(){
    // 	$this->load->view("user/login/reload");
    // }

}
