<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function input_data($data, $tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function get_data($tabel, $param = null)
	{
		if ($param != null) {
			$this->db->order_by($param,'desc');
		}

		$data = $this->db->get($tabel);
		return $data->result();
	}

	public function test_data($tabel, $options)
	{
		$data = $this->db->get_where($tabel, $options);
		return $data->result();
	}

	public function get_num_data($tabel)
	{
		$data = $this->db->get($tabel);
		return $data->num_rows();
	}

	public function getCustomNum($query)
	{
		$data = $this->db->query($query);
		return $data->num_rows();
	}

	public function udp_data($data, $where, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function del_data($where, $tabel)
	{
		$this->db->where($where, $id);
		$this->db->delete($tabel);
	}

	function get_detail_data($id_data)
	{
	  $data = array();
	  $options = array('id_program' => $id_data);
	  $Q = $this->db->get_where('tb_program',$options,1);
	    if ($Q->num_rows() > 0){
	      $data = $Q->row_array();
	    }
	  $Q->free_result();
	  return $data;
	}

	public function get_num_detail($where, $tabel)
	{
		$data = $this->db->where($where)->get($tabel);
		return $data->num_rows();
	}

	function get_mydata($options, $tabel)
	{
	  $data = array();
	  $Q = $this->db->get_where($tabel, $options, 1);
	    if ($Q->num_rows() > 0){
	      $data = $Q->row_array();
	    }
	  $Q->free_result();
	  return $data;
	}

	public function GetOne($table, $clause)
	{
		$data = array();
		$Q = $this->db->get_where($table, $clause, 1);
		if ($Q->num_rows() > 0){
		  $data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	public function customQuery($query){
		$data = $this->db->query($query);

		return $data->result();
	}

	public function empty_data($tabel)
	{
		$this->db->empty_table($tabel);
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
