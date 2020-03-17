<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct(){
		parent::__construct();
        //load model admin
		$this->load->model('m_login');
		$this->load->library('session');
	}
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
	public function index()
	{
		$this->load->view('login');
	}

	public function hai() 
	{
		$this->load->view('navbar');
	}

function aksi_login(){
	$username = $this->input->post('username'); //mengambil values dari username
	$password = $this->input->post('password'); //mengambil values dari password
	//menjadikan data yang diambil tadi menjadi array
	$where = array(
		'username' => $username, //diberi penamaan nama karena pada database nama rownya adalah nama
		'password' => $password //diberi penamaan pekerjaan karena pada database nama rownya adalah pekerjaan
		);
	//cek kesamaan inputan 
	$cek = $this->m_login->cek_login("user",$where)->num_rows();
	if($cek > 0){
	//apabila data telah ditemukan maka
	//membuat array
		$data_session = array(
			'username' => $username,
			'status' => "login"
			);
		//membuat session
		$this->session->set_userdata($data_session);
		//direct ke halaman admin 
		redirect(base_url("barang"));

	}else{
		echo "Username dan password salah !";
	}
}

function logout(){
	//menghapus session
	$this->session->sess_destroy();
	redirect(base_url('home/'));
}
}
