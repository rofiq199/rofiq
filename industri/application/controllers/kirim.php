<?php
class kirim extends CI_Controller {
    function __construct(){
		parent::__construct();		
    $this->load->model('m_receive');
    $this->load->model('m_barang');
    $this->load->model('m_supplier');
    $this->load->model('m_kirim');
    $this->load->library('cart');
    $this->load->helper('url');
    }
    public function index(){
      $items = $this->cart->contents(); 
      $data['tampil']= $this->m_receive->show_barang()->result();
      $data['barang']= $this->m_receive->barang()->result();
      $this->load->view('tabel/navbar',$data);
      $this->load->view('v_kirim',array('items' => $items));
    }
    public function add(){
      $kode = $this->input->post('kode');
      $nama = $this->input->post('nama');
      $harga = $this->input->post('harga');
      $jumlah =$this->input->post('jumlah');
      $data=array(
        'id'=> $kode,
        'name'=> $nama,
        'qty'=> $jumlah,
        'price'=> $harga
      );
      $this->cart->insert($data);
      redirect(base_url('kirim'));
    }
    function tampil(){
      $cart= $this->cart->contents();
      echo "<pre>";
      print_r($cart);

    }
    function simpan(){
      $kode = $this->input->post('kode_kirim');
      $tanggal = $this->input->post('tanggal');
      $pengirim = $this->input->post('nama_pengirim');
      $tujuan = $this->input->post('tujuan');
      $data1=array(
        'kode_kirim'=> $kode,
        'tanggal'=>$tanggal,
        'nama_pengirim'=>$pengirim,
        'tujuan'=>$tujuan
      );
      $this->m_kirim->add($data1,'pengiriman');
      foreach ($this->cart->contents() as $item) {

        $data=array(
          'kode_kirim' => $kode,
          'kode_barang'=>$item['id'],
          'jumlah' =>$item['qty'],
          'subtotal' =>$item['subtotal']
        );
        $this->m_kirim->add($data,'detail_pengiriman');
      }
      redirect(base_url('home'));
    }

}
