<?php

class Template {

    function __construct(){
        $this->CI = & get_instance();
    }

    function display($template, $data=null){
    	$this->CI->load->model('M_admin');
      $id_adm = $this->CI->session->userdata('id_user');
    	$response['user'] = $this->CI->M_admin->get_mydata(array('Id', $id_adm),'admin');

    	$data['_content'] = $this->CI->load->view($template, $data, true);
    	$data['_header'] = $this->CI->load->view('components/header', $response, true);
    	$data['_sidebar'] = $this->CI->load->view('components/sidebar', $response, true);
      $data['_footer'] = $this->CI->load->view('components/footer', $data, true);
    	$this->CI->load->view('/admin/template.php', $data);
    }
}

?>
