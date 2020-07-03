<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_guests');
	}

	public function index()
	{
		$data['judul'] = 'Form Tamu | Balai Besar POM Palembang';
		$this->load->view('guests/index', $data);
	}

	public function input_umum()
	{
		$data = array(
				'nama_tamu' => $this->input->post('nama'),
				'alamat' 		=> $this->input->post('alamat'),
				'no_telp'	 	=> $this->input->post('telp'),
				'keperluan' => $this->input->post('keperluan'),
				'tujuan' 		=> $this->input->post('tujuan'),
				'tipe_tamu' => $this->input->post('tamu')
		);

		$this->M_guests->input_data($data, 'tamu');
	}

	// public function input_iai()
	// {
	// 	$data = array(
	// 			'nama_tamu' => $this->input->post('nama'),
	// 			'alamat' 		=> $this->input->post('alamat'),
	// 			'no_telp'	 	=> $this->input->post('telp'),
	// 			'keperluan' => $this->input->post('keperluan'),
	// 			'tujuan' 		=> $this->input->post('tujuan'),
	// 			'tipe_tamu' => 'IAI'
	// 	);
	//
	// 	$this->M_guests->input_data($data, 'tamu');
	// }

}
