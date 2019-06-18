<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('poin');
	}

	public function insertPoinRaffle(){

		$userId = $_POST['userId'];

		$random = mt_rand(300,800);

		$data = array(
		'userId' => $userId,
		'poin' => $random ,
		'category' => 'Poin Random'
		);

			$this->db->set('flag_redeem_poin', 1);
			$this->db->where('userId', $userId);
			// $this->db->order_by("id_history_mixnmatch", "desc");
			// $this->db->limit(3);
			$update = $this->db->update('tb_history_mixnmatch');


		$this->db->insert('tb_poin', $data);


		$this->db->select("flag_update");
		$this->db->where('userId',$userId);
		$this->db->from('tb_user');
		$data_user_flag = $this->db->get()->result_array();

		echo json_encode(array('userId'=>$userId,'point_dapat' => $random,'data_user_flag' => $data_user_flag));


	}

	public function cekPoin(){
		$userId = $_POST['userId'];

		$this->db->select("* FROM tb_poin WHERE category = 'Poin Random' AND userId = $userId AND waktu > DATE_ADD(NOW(), INTERVAL -3 HOUR) ORDER BY id_poin DESC LIMIT 1");
		$data = $this->db->get()->result_array();

		echo json_encode(array('data' => $data));
	}

	public function cekHistory(){

		$userId = $this->input->post('userId');

		$this->db->select("*");
		$this->db->where('userId',$userId);
		$this->db->where('flag_redeem_poin',0);
		$this->db->from('tb_history_mixnmatch');
		$this->db->limit(3);
		$data = $this->db->get()->num_rows();

		$this->db->select("poin");
		$this->db->where('userId',$userId);
		$this->db->where('category','Poin Random');
		$this->db->order_by("id_poin", "desc");
		$this->db->limit(1);
		$this->db->from('tb_poin');
		$data_poin = $this->db->get()->result_array();


		echo json_encode(array('data'=>$data,'poin'=>$data_poin));
	}



}

/* End of file Poin.php */
/* Location: .//Users/hrdys/Library/Caches/com.binarynights.ForkLift-3/B8FB724B-093F-4330-8338-A07FF641864C/Poin.php */
