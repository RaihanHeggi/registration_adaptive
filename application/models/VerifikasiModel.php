<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class VerifikasiModel extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('user_verification',$data);
    }

    function cekData($nama,$email,$nomorHP){
        $this->db->where('nama',$nama);
        $this->db->where('email',$email);
        $this->db->where('nomor_kontak',$nomorHP);
        $query = $this->db->get('user_registration');
        if($query->num_rows() == 0){  
            return true;  
        }else{  
            return false;       
        } 
    }

    function cekDataVerifikasi($nama,$email,$nomorHP){
        $this->db->where('nama_verifikasi',$nama);
        $this->db->where('email_verifikasi',$email);
        $this->db->where('nomor_kontak',$nomorHP);
        $query = $this->db->get('user_verification');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }
}

?>