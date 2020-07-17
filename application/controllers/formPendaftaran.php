<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormPendaftaran extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('PendaftaranModel');     
    }

	public function index()
	{
		$this->load->view('FormPendaftaran');
    }
    
    public function insert_data(){
        $nama = $this->input->post('name');
        $tanggal_lahir = $this->input->post('birthdate');
        $tempat_lahir = $this->input->post('placeBirth');
        $pendidikan = $this->input->post('status');
        $namaInstitusi = $this->input->post('namaInstitusi');
        $nomorHP = $this->input->post('nomorHP');
        $email = $this->input->post('email');
        $mataLomba = $this->input->post('mataLomba');
        if(!$this->PendaftaranModel->cekData($nama,$tanggal_lahir,$tempat_lahir,$namaInstitusi,$nomorHP)){
            $config['upload_path']          = './assets/registration_images/'.$nama."_".$namaInstitusi; //isi dengan nama folder temoat menyimpan gambar
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload', $config);
            if (!is_dir('./assets/registration_images/'.$nama."_".$namaInstitusi))
            {
                mkdir('./assets/registration_images/'.$nama."_".$namaInstitusi, 0777, true);
                $dir_exist = false;
            }
            if (!$this->upload->do_upload('pictValidation')){
                if(!$dir_exist){
                    rmdir('./assets/registration_images/'.$nama."_".$namaInstitusi);
                }
                $config['info'] = $this->upload->display_errors();
            }else{
                $config['info'] = 'Upload Berhasil';
                $uploadData = array('upload_data' => $this->upload->data());
                $data = array(
                    'nama' => $nama, 
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'nomor_kontak' => $nomorHP,
                    'status_pendidikan' => $pendidikan,
                    'nama_institusi' => $namaInstitusi,
                    'email' => $email,
                    'mata_lomba' => $mataLomba,
                    'bukti_scan' => $uploadData['upload_data']['file_name']
                );
                $this->PendaftaranModel->insertData($data);
                $this->_sendEmail();
                redirect('BufferPage/index');
            }
            redirect('FormPendaftaran/index');
        }else{ 
            $this->session->set_flashdata('error_messages',' <div><label for="Alert">* Peserta Sudah Pernah Mendaftar</label></div>'); 
            redirect(base_url());
        }        
    }

    private function _sendEmail($email){
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => '', //Isi dengan Host SMTP 
            'smtp_user' => '', //isi dengan Email User yang digunakan 
            'smtp_pass' => '', //isi dengan Password Email User
            'smtp_port' => 465, //isi dengan port yang digunakan
            'mailtype' => 'html', //isi dengan tipe email yang digunakan biarkan html saja
            'charset' => 'utf-8', //type charsetnya 
            'newline' => "/r/n"
            $config['wordwrap'] = TRUE;
        );
        $this->load->library('email',$config);  
        $this->email->initialize($config);
        $this->email->from('ISI DENGAN EMAIL PENGIRIM', 'NAMA ALIASNYA');
        $this->email->to($email);
        $this->email->subject('Terimakasih Sudah Mendaftar');
        $this->email->message('ISI DENGAN PESAN YANG INGIN DIKIRIMKAN');
        if($this->email->send()){
            return true;
        }else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
