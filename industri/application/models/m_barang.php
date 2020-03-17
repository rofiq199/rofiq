<?php 
class m_barang extends CI_Model
{
    function show_barang(){
         return $this->db->get('barang');
    }
    function barang()
  {
      $this->db->select('
          barang.*, supplier.kode_supplier, supplier.nama_supplier
      ');
      $this->db->join('supplier', 'barang.kode_supplier = supplier.kode_supplier');
      $this->db->from('barang');
      $query = $this->db->get();
      return $query;
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
