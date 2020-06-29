<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormVerifikasi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('VerifikasiModel');     
    }

	public function index()
	{
		$this->load->view('FormVerifikasi');
    }
    
    public function insert_data(){
        $nama = $this->input->post('name');
        $namaRekening = $this->input->post('namaRekening');
        $jumlahTransfer = $this->input->post('jumlahTransfer');
        $nomorHP = $this->input->post('nomorHP');
        $email = $this->input->post('email');
        $mataLomba = $this->input->post('mataLomba');
        if($this->VerifikasiModel->cekData($nama,$email,$nomorHP)){
            $this->session->set_flashdata('error_messages',' <div><label for="Alert">* Peserta Tidak Valid</label></div>'); 
            redirect('FormVerifikasi/index');
        }else{ 
            if(!$this->VerifikasiModel->cekDataVerifikasi($nama,$email,$nomorHP)){
                $config['upload_path']          = './assets/verification_images/'.$nama; //isi dengan nama folder temoat menyimpan gambar
                $config['allowed_types']        = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if (!is_dir('./assets/verification_images/'.$nama))
                {
                    mkdir('./assets/verification_images/'.$nama, 0777, true);
                    $dir_exist = false;
                }
                if (!$this->upload->do_upload('pictValidation')){
                    if(!$dir_exist){
                        rmdir('./assets/verification_images/'.$nama);
                    }
                    $config['info'] = $this->upload->display_errors();
                }else{
                    $config['info'] = 'Upload Berhasil';
                    $uploadData = array('upload_data' => $this->upload->data());
                    $data = array(
                        'nama_verifikasi' => $nama, 
                        'email_verifikasi' => $email,
                        'nomor_kontak' => $nomorHP,
                        'nama_rekening' => $namaRekening,
                        'jumlah_transfer' => $jumlahTransfer,    
                        'bukti_bayar' => $uploadData['upload_data']['file_name']
                    );
                    $this->VerifikasiModel->insertData($data);
                    redirect('BufferPage/LastPage');
                }
                redirect('FormVerifikasi/index');
            }else {
                $this->session->set_flashdata('error_messages',' <div><label for="Alert">* Peserta Sudah Melakukan Verifikasi</label></div>'); 
                redirect('FormVerifikasi/index');
            }
                  
        }        
    }
}
