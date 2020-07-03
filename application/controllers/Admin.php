<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		if (empty($this->session->userdata('id_user'))) {
        redirect(base_url().'login/index');
    }
	}

	public function index(){
		redirect(base_url().'admin/dashboard');
	}

	public function Dashboard()
	{
		$data['judul'] 	= 'Dashboard | Balai Besar POM Palembang';
		$data['umum']		= $this->M_admin->getCustomNum("SELECT * FROM tamu WHERE tipe_tamu = 'UMUM'");
		$data['iai']		= $this->M_admin->getCustomNum("SELECT * FROM tamu WHERE tipe_tamu = 'IAI'");

		$this->template->display('admin/index', $data);
	}

	public function Tamu()
	{
		$data['judul'] = 'Tamu | Balai Besar POM Palembang';
		$this->template->display('admin/tamu', $data);
	}

	public function Laporan(){
		$data['judul'] = 'Laporan | Balai Besar POM Palembang';
		$this->template->display('admin/laporan', $data);
	}

	public function Result()
	{
		$start = date('Y-m-d', strtotime($this->input->post('start')));
		$end = date('Y-m-d', strtotime($this->input->post('end')));
		$jenis_tamu = $this->input->post('jenis_tamu');

		$output['start']  = date('d F Y', strtotime($this->input->post('start')));
		$output['end']		= date('d F Y', strtotime($this->input->post('end')));

		if($jenis_tamu == 'all'){
			$output['output'] = $this->M_admin->customQuery("SELECT * FROM tamu WHERE tanggal between '$start' AND '$end'");
		}else{
			$output['output'] = $this->M_admin->customQuery("SELECT * FROM tamu WHERE tanggal between '$start' AND '$end' AND tipe_tamu = '$jenis_tamu' ");
		}


		$mpdf = new \Mpdf\Mpdf([
			'setAutoBottomMargin' => 'pad',
			'setAutoTopMargin' => 'stretch',
    	'autoMarginPadding' => 50,
			'A4'
		]);
		$data = $this->load->view('admin/hasilPrint', $output, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}

	// public function pdf()
	// {
	// 	$mpdf = new \Mpdf\Mpdf();
	// 	$data = $this->load->view('admin/hasilPrint', [], TRUE);
	// 	$mpdf->WriteHTML($data);
	// 	$mpdf->Output();
	// }

	public function get_tamu()
	{
		if($this->input->post('param') == '100'){
			$tamu = $this->M_admin->get_data('tamu', 'Id');
		} else {
			if($this->input->post('param') == 1){$tamu = 'UMUM';}else{$tamu = 'IAI';}

			$options = array('tipe_tamu' => $tamu);
			$tamu = $this->M_admin->test_data('tamu',$options);
		}

		 echo json_encode($tamu);
	}

	public function proses_tamu()
	{
		if($_POST){

      $data = array(
          'status' => 1
      );

      $where = array('Id' => $this->input->post('Id'));
      $this->M_admin->udp_data($data, $where, 'tamu');

    } else {
        redirect('admin/tamu');
    }
	}

	public function data_line()
	{
		$year = date('Y');
		$data = array(
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '01' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '02' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '03' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '04' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '05' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '06' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '07' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '08' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '09' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '10' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '11' AND year(tanggal) = '$year'"),
			$this->M_admin->getCustomNum("SELECT * FROM tamu WHERE month(tanggal) = '12' AND year(tanggal) = '$year'")
		);

		echo json_encode($data);
	}

	public function upd_pass()
	{
		$where = array('password' => md5($this->input->post('pass_lama')));
		$result = $this->M_admin->get_num_detail($where, 'admin');

		if($result == 1){
			$param['oke']['alert'] = 'masuk pak eko';
		} else {
			$param['error']['reject'] = 'Maaf password anda tidak cocok';
		}

		if (empty($param['error'])) {
			$data = array('password' => md5($this->input->post('pass_baru')));

      $where = array('Id' => $this->input->post('id_user'));
      $this->M_admin->udp_data($data, $where, 'admin');

			$param['hasil'] = 'success';
		} else {
			$param['hasil'] = 'fail';
		}

		echo json_encode($param);
	}

	public function upd_profile()
	{
		if (empty($_FILES['foto_baru']['name'])) {
				$data = array(
							'username' => $this->input->post('username'),
							'foto' => $this->input->post('foto_lama')
				);

				$param['success']['alert'] = 'sip';
		} else {
				$config['upload_path'] = './assets/admin/img/admin/';
				$config['max_size'] = '50000';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto_baru')){
					unlink("./assets/admin/img/admin/".$this->input->post('foto_lama'));

					$gbr = $this->upload->data();
					$config['image_library']='gd2';
					$config['source_image']='./assets/admin/img/admin/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['quality']= '100%';
					$config['width']= 140;
					$config['height']= 140;
					$config['new_image']= './assets/admin/img/admin/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$data = array(
							'username' => $this->input->post('username'),
							'foto' => $gbr['file_name']
					);

					$param['success']['alert'] = 'sip';
				} else {
					$error = array('error' => $this->upload->display_errors());
					$param['error']['not_typical'] = implode(" ", $error);
				}
		}

		if (empty($param['error'])) {
			$where = array('Id' => $this->input->post('id_user'));
			$this->M_admin->udp_data($data, $where, 'admin');

			$param['hasil'] = 'success';
		} else {
			$param['hasil'] = 'fail';
		}

		echo json_encode($param);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'admin/dashboard');
	}

}
