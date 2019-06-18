<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->select('*')
		->where('username', $username)
		->where('password', md5($password))
		->from('tb_user');
		$data = $this->db->get()->result_array();

		if (count($data) >= 1) {
			echo json_encode(array('status' => true,'data'=>$data));

		}else{
			echo json_encode(array('status' => false,'msg'=>'Username & Password Anda Salah'));

		}



	}

}

/* End of file Login.php */
/* Location: .//Users/hrdys/Library/Caches/com.binarynights.ForkLift-3/B91E36B5-FFF9-4264-9010-8D21A0897DDA/Login.php */
