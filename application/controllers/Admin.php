<?php
class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_admin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
	function index(){
		$this->load->view('admin/login_admin');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek= $this->db->query("select * from admin where username='$username' and password='$password'");
                $a=$cek->num_rows();
		if($a==TRUE){
           
			$data_session = array(
				'username' => $username,
                'password' => $password
				);
                        $this->session->set_userdata($data_session);
                        redirect(base_url("admin/home"));
		}else{
			echo "<script>alert('Username atau Password Salah');location='index';</script>";
		}
	}
        function home(){
            if(isset($_SESSION['username'])){
             $data = array("container" => "admin/home", "footer" => "admin/footer", "nav" => "admin/nav");
             $this->load->view("admin/template", $data);
            } else {
                redirect(base_url("admin/index"));
            }
        }
                
	function logout(){
            $this->session->unset_userdata(array('username'=>''));
		$this->session->sess_destroy();
		$this->load->view('admin/login_admin');
	}
}
?>