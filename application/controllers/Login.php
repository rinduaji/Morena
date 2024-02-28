<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login($where)->num_rows();
		$data_login = $this->m_login->data_login($where)->row();
		if($cek > 0){
 
			$data_session = array(
				'username' => $username,
				'nama' => $data_login->nama,
				'jabatan' => $data_login->jabatan,
				'area' =>	$data_login->area,
				'layanan' => $data_login->layanan,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url('index.php/Dashboard'));
 
		}else{
			$this->session->set_flashdata('mesg', 'true');
			redirect(base_url('index.php/login'));
		}
	}

    function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}
