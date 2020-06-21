<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormPendaftaran extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('pendaftaranModel');
        $this->load->helper('url');
     
    }

	public function index()
	{
		$this->load->view('formPendaftaran');
	}
}
