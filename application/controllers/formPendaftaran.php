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
                    'bukti_scan' => $uploadData['upload_data']['file_name']
                );
                $this->PendaftaranModel->insertData($data);
                redirect('BufferPage/index');
            }
            redirect('FormPendaftaran/index');
        }else{ 
            $this->session->set_flashdata('error_messages',' <div><label for="Alert">* Peserta Sudah Pernah Mendaftar</label></div>'); 
            redirect(base_url());
        }        
    }
}
