<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => $password
		);

		$cek = $this->m_login->cek_login('tb_akun',$where)->num_rows();
		if($cek > 0){
				$data_session = array(
					'username' => $username,
					'status'   => "login"
				);
				$this->session->set_userdata($data_session);
				redirect("backend/c_beranda");
			}
			else
			{
				redirect("c_login");
			}
		}
	}

