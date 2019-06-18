<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mix extends CI_Controller {

	function __Construct(){
    parent::__Construct ();
   $this->load->database(); // load database
 }

	public function index()
	{
		redirect('/Mix/mobil');
	}

	public function mobil()
	{
        $this->load->model('Mobil'); // load model
		$this->data['brand'] = $this->Mobil->getbrand();
		$this->load->view('mix_mobil',$this->data);
	}

	public function motor()
	{
		$this->load->model('Motor'); // load model
		$this->data['mtr'] = $this->Motor->getMotor();
		$this->load->view('mix_motor',$this->data);
	}
	public function bus()
	{
		$this->load->model('Bustruk'); // load model
		$this->data['bis'] = $this->Bustruk->getBisTruk();
		$this->load->view('mix_bis_truk',$this->data);
	}


	public function api_varian_merek_motor($id_select_brand){
		$this->db->select("*");
		$this->db->where('IdBrand',$id_select_brand);
		$this->db->where('ID_jenisbrand',2);
		$this->db->from('tb_series');
		$data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function api_varian_merek_mobil($id_select_brand){
		$this->db->select("*");
		$this->db->where('IdBrand',$id_select_brand);
		$this->db->where('ID_jenisbrand',1);
		$this->db->from('tb_series');
		$data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function api_varian_merek_bus($id_select_brand){
		$this->db->select("*");
		$this->db->where('IdBrand',$id_select_brand);
		$this->db->where('ID_jenisbrand',3);
		$this->db->from('tb_series');
		$data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function api_varian_series($id_series){
			$this->db->select("*");
			$this->db->where('IdSeries',$id_series);
			$this->db->from('tb_type');
			$data = $this->db->get()->result_array();
			echo json_encode($data);
	}

	public function insertHistoryMixnMatch(){
			$userId = $this->input->post('userId');
			$idSeries = $this->input->post('idSeries');
			$data = array(
			'userId' => $userId,
			'flag_redeem_poin' => 0,
			'idSeries' => $idSeries
			);

			$this->db->insert('tb_history_mixnmatch', $data);

			$data_poin = array(
				'userId' => $userId,
				'poin' => 20 ,
				'category' => 'mixmatch'
			);
			$this->db->insert('tb_poin', $data_poin);

	}

	public function result($idBrand,$idSeries,$idType)
	{

	  $this->db->select("*");
	  $this->db->where('IdSeries',$idSeries);
	  $this->db->from('tb_series');
  	  $data['mixnmatch_series'] = $this->db->get()->result_array();


  	  $this->db->select("*");
	  $this->db->where('IdBrand',$idBrand);
	  $this->db->from('tb_brand');
  	  $data['mixnmatch_brand'] = $this->db->get()->result_array();

  	  $this->db->select("*");
	  $this->db->where('idType',$idType);
	  $this->db->from('tb_type');
  	  $data['mixnmatch_type'] = $this->db->get()->result_array();

  	  $this->db->select("*");
	  $this->db->where('IdSeries',$idSeries);
	  $this->db->where('IdBrand',$idBrand);
	  $this->db->where('idType',$idType);
	  $this->db->from('tb_mixnmatch');
  	  $lube = $this->db->get()->result_array();


  	  $this->db->select("*");
	  $this->db->where('IdLube',$lube[0]['IdLube']);
	  $this->db->from('tb_lube');
  	  $data['lube'] = $this->db->get()->result_array();

  	  $this->db->select("*");
	  $this->db->where('idfuel',$lube[0]['idfuel']);
	  $this->db->from('tb_fuel');
  	  $data['fuel'] = $this->db->get()->result_array();

  	  $this->db->select("*");
	  $this->db->where('IdCoolant',$lube[0]['IdCoolant']);
	  $this->db->from('tb_coolant');
  	  $data['coolant'] = $this->db->get()->result_array();


		// $this->load->getBrand(1,2,3);
		$this->load->view('mix_result',$data);
		
	}


}

/* End of file Mobil.php */
/* Location: .//Users/hrdys/Library/Caches/com.binarynights.ForkLift-3/99D2CD29-B24E-4C31-8C43-EC2CE1293BC6/Mobil.php */
