<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	public function index()
	{

		// if ($this->session->userdata('userId') == '') {
		// 	$today = date('YmdHi');
		// 	$startDate = date('YmdHi', strtotime('-0 days'));
		// 	$range = ($today - $startDate);
		// 	$rand = rand(0, $range);
		// 	$rand_final = ($startDate + $rand) * 128;
		// 	$this->session->set_userdata('userId', $rand_final);
		// 	$this->session->sess_expiration = 60*60*24*31;
		// 	$this->session->sess_expire_on_close = FALSE;
		//
		// 	$data = array(
		// 	'userId' => $rand_final,
		// 	'email' => 'guest@mail.net',
		// 	'username' => 'guest'
		// 	);
		//
		// 	$this->db->insert('tb_user', $data);
		// 	$this->db->select('count(ai_user) as count_user')
		// 	->from('tb_user');
		// 	$data['user_count'] = $this->db->get()->result_array();
		//
		// }
		$this->db->select('count(ai_user) as count_user')
		->from('tb_user');
		$data['user_count'] = $this->db->get()->result_array();



		$this->load->view('home',$data);
	}

	public function cekLocalStorage(){
		$userId = $_POST['userId'];




			$data = array(
			'userId' => $userId,
			'email' => 'guest@mail.net',
			'username' => 'guest'
			);

			$this->db->insert('tb_user', $data);
			echo json_encode(array('userId' => $rand_final)) ;




	}

	public function cekStorage(){
		$userId = $_POST['userId'];


		$this->db->select('count(ai_user) as jumlah')
		->where('userId', $userId)
		->from('tb_user');
		$data = $this->db->get()->result_array();
		if ($data[0]['jumlah'] <= 0) {

			echo json_encode(array('status'=>'not match'));

		}else{
			echo json_encode(array('status'=>'match'));

		}




	}

	public function getPoint(){

		$userId = $_POST['userId'];

		$this->db->select('sum(poin) as jml_poin')
		->where('userId', $userId)
		->from('tb_poin');
		$data = $this->db->get()->result_array();
		echo json_encode(array('data'=>$data));

	}

	public function insertPoin(){

		$userId = $_POST['userId'];


		$data = array(
		'userId' => $userId,
		'poin' => 10,
		'category' => 'News Click'
		);

		$this->db->insert('tb_poin', $data);
		echo json_encode(array('userId'=>$userId));


	}
}

/* End of file Home.php */
/* Location: .//Users/hrdys/Library/Caches/com.binarynights.ForkLift2/#8/Home.php */
