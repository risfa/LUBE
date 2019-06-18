<?php 
class Motor extends CI_Model {

	function getMotor(){
    
  $this->db->select("*"); 
  $this->db->from('tb_jenisbrand');
  $this->db->where('JenisBrand',$this->uri->segment(2));
  $show_tb_series = $this->db->get()->result_array();


  $this->db->select("*");
  $this->db->from('tb_brand');
  $this->db->join('tb_series', 'tb_series.IdBrand = tb_brand.IdBrand');
  $this->db->where_in('tb_series.ID_jenisbrand',$show_tb_series[0]['ID_jenisbrand']);
  $this->db->group_by('NamaBrand');
  
  $query = $this->db->get();
  return $query->result();
	}
}
 ?>
