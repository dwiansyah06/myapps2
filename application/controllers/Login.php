<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index()
	{
		$data['judul'] = 'Login | Balai Besar POM Palembang';
    $this->load->view('admin/login', $data);
	}

  public function login_process()
  {
    $where = array('username' => $this->input->post('username'));
		$result = $this->M_admin->get_num_detail($where, 'admin');

		if ($result == 1) {
			$options = array('username' => $this->input->post('username'));
			$data = $this->M_admin->get_mydata($options, 'admin');

			$password = md5($this->input->post('password'));

			if ($data['password'] == $password) {
				$param['oke']['alert'] = 'masuk pak eko';
			} else {
				$param['error']['not_found'] = 'Maaf password anda tidak cocok';
			}
		} else {
			$param['error']['not_found'] = 'Maaf tidak ada username <strong>'.$this->input->post('username').'</strong> di database kami';
		}

		if (empty($param['error'])) {
			$sess_data['id_user'] 	= $data['Id'];
			$sess_data['username'] 	= $data['username'];
			$this->session->set_userdata($sess_data);

			$param['hasil'] = 'success';
		} else {
			$param['hasil'] = 'fail';
		}

		echo json_encode($param);
  }

}
