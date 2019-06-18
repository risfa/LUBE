<?php
class Mobil extends CI_Model {

 function getbrand(){


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
//SELECT * FROM `tb_mixnmatch` JOIN tb_brand ON tb_brand.IdBrand = tb_mixnmatch.IdBrand JOIN tb_series ON tb_mixnmatch.IdSeries = tb_series.IdSeries JOIN tb_type ON tb_mixnmatch.idType = tb_type.idType JOIN tb_lube ON tb_mixnmatch.IdLube = tb_lube.IdLube WHERE tb_series.IdSeries IN(SELECT IdSeries FROM tb_series WHERE ID_jenisbrand = 2)
