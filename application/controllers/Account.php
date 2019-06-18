<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}


	public function index()
	{



		$this->db->select('sum(poin) as jml_poin')
		->where('userId', $this->session->userdata('userId'))
		->from('tb_poin');
		$data['jml_poin'] = $this->db->get()->result_array();

		$this->load->view('account',$data);
	}

	public function get_user(){

		$userId = $this->input->post('userId');

		$this->db->select('*')
		->where('userId', $userId)
		->from('tb_user');
		$data = $this->db->get()->result_array();

		$this->db->select('SUM(poin) as total_poin')
		->where('userId', $userId)
		->from('tb_poin');
		$data_poin = $this->db->get()->result_array();


		echo json_encode(array('data' => $data,'data_poin' => $data_poin));

	}

  	public function update_user($userId){
      	$this->db->select('*')
				->where('userId', $userId)
				->from('tb_user');
				$data['user'] = $this->db->get()->result_array();
 	    	$this->load->view('account_update',$data);
     }

    public function update(){

     	$username = $this->input->post('username');
			$email_user = $this->input->post('email');
			$no_telp_user = $this->input->post('telp');
			$password_user = $this->input->post('password');
			$userId = $this->input->post('userId');


					$this->db->set('username', $username);
					$this->db->set('email', $email_user);
					$this->db->set('no_telp', $no_telp_user);
					$this->db->set('password',md5($password_user));
					$this->db->set('flag_update',1);
					$this->db->where('userId', $userId);
					$update = $this->db->update('tb_user');
	
     }

		 public function logout(){
			 		$this->session->sess_destroy();
 						redirect('/login');
      }

	 //  public function update_userdetail(){

		// $user_id    =   $this->input->post('user_id');
  //       $username   =   $this->input->post('username');
  //       $email      =   $this->input->post('email');
  //       $password   =   $this->input->post('password');
  //       $telp       =   $this->input->post('telp');

		// $this->load->model('Account_users');
  //       if($this->Account_users->update_user($user_id, $username, $email, $password, $telp)) {
  //           $this->session->set_flashdata('notice','<div class="success">Your details updated Successfully!</div>');
  //           redirect('Account');
  //       } else {
  //           $this->session->set_flashdata('msg', '<div class="error">Problem with update your detail!</div>');
  //           redirect('Account');
  //       }

	    // $this->Account_users->update_user($user_id, $username, $email, $password, $telp);
	// }

}

/* End of file Account.php */
/* Location: .//Users/hrdys/Library/Caches/com.binarynights.ForkLift-3/DEC55807-05B2-48AA-B8FB-1F040AF85986/Account.php */
