<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guests extends CI_Model {

	function input_data($data, $tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
