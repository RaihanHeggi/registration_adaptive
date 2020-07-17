<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class PendaftaranModel extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('user_registration',$data);
    }

    function cekData($nama,$tanggal_lahir,$email,$tempat_lahir,$namaInstitusi,$nomorHP){
        $this->db->where('nama',$nama);
        $this->db->where('tempat_lahir',$tempat_lahir);
        $this->db->where('email',$email);
        $this->db->where('tanggal_lahir',$tanggal_lahir);
        $this->db->or_where('nomor_kontak',$nomorHP);
        $this->db->or_where('nama_institusi',$namaInstitusi);
        $query = $this->db->get('user_registration');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

}

?>