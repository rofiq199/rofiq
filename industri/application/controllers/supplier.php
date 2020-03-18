<?php
class supplier extends CI_Controller{
    function __construct(){
		parent::__construct();		
    $this->load->model('m_supplier');
    $this->load->library('session');
                $this->load->helper('url');
    }
    public function index(){
      //menampilkan seluruh data supplier
      $data['supplier']= $this->m_supplier->tampil()->result();
      $this->load->view('tabel/navbar');
      $this->load->view('v_supplier',$data);
    }

    function add(){
      //proses penyimpanan data supplier pada database 
      $kode_supplier = $this->input->post('kode_supplier');
      $nama_supplier = $this->input->post('nama_supplier');
      $kontak = $this->input->post('kontak');
      $data = array(
        'kode_supplier' => $kode_supplier,
        'nama_supplier' => $nama_supplier,
        'kontak' => $kontak
        );
      $this->m_supplier->add($data,'supplier');
      redirect(base_url('supplier'));
    }

    function hapus($id){
      //hapus supllier berdasarkan kode supplier
      $where = array('kode_supplier' => $id);
      $this->m_supplier->hapus_data($where,'supplier');
      redirect(base_url('supplier'));
      }

    function update(){
      //proses ubah data supplier
        $kode_supplier = $this->input->post('kode_supplier1');
        $nama_supplier = $this->input->post('nama_supplier1');
        $kontak = $this->input->post('kontak1');
        $data = array(
          'nama_supplier' => $nama_supplier,
          'kontak' => $kontak
          );
      
        $where = array(
          'kode_supplier' => $kode_supplier
        );
        $this->m_supplier->update_data($where,$data,'supplier');
        redirect(base_url('supplier'));
    }
}
