<?php
class m_supplier extends CI_Model {
    function tampil(){
        return $this->db->get('supplier');
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
        }
    
    function add($data,$table){
        $this->db->insert($table,$data);
    }
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}
