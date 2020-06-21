<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class pendaftaranModel extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('user_registration',$data);
    }
}

?>