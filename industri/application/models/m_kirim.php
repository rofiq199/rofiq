<?php

class m_kirim extends CI_Model {
    function add($data,$table){
        $this->db->insert($table,$data);
    }
    
    function show(){
        $hasil=$this->db->get('barang');
        return $hasil->result();
    }
    
}
