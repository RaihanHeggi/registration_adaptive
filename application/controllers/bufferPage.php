<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BufferPage extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('BufferPageModel');     
    }

	public function index()
	{
		$this->load->view('BufferPage');
    }

    public function nextPage(){
        $this->load->view('FormVerifikasi');
    }
    
    public function lastPage(){
        $this->load->view('LastPage');
    }
}
