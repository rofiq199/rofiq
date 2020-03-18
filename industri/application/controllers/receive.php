<?php
class receive extends CI_Controller{
    function __construct(){
		parent::__construct();		
    $this->load->model('m_receive');
    $this->load->model('m_barang');
    $this->load->model('m_supplier');
    $this->load->library('cart');
    $this->load->helper('url');
    }
    public function index(){
      $data['supplier']= $this->m_supplier->tampil()->result();
      $data['tampil']= $this->m_receive->show_barang()->result();
      $data['barang']= $this->m_receive->barang()->result();
      $this->load->view('tabel/navbar');
      $this->load->view('v_receive',$data);
    }
    function add(){
      //membuat waktu sehingga tanggal otomatis terisi berdasarkan waktu saat input 
      $timezone = time() + (60 * 60 * 6);
      $date = Date("Y-m-d H:i:s",$timezone);
      $kode_receive = $this->input->post('kode_receive');
      $kode_supplier = $this->input->post('kode_supplier');
      $kode_barang = $this->input->post('kode_barang');
      $jumlah = $this->input->post('jumlah');
      $data = array(
        'kode_receive' =>$kode_receive ,
        'kode_supplier' =>$kode_supplier ,
        'tanggal_receive' => $date
    );
    //pada prosess receive hanya ada 1 barang pada tiap receiver karena pada tiap satu kode receive hanya memiliki 1 kode barang
    $data1 = array(
      'kode_receive' =>$kode_receive ,
      'kode_barang' =>$kode_barang ,
      'jumlah' => $jumlah
  );
    $this->m_receive->add($data,'recieve');
    $this->m_receive->add($data1,'detail_receive');
    redirect(base_url('receive'));
    }
}