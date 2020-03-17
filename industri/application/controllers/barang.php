<?php 
class barang extends CI_Controller{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_barang');
                $this->load->helper('url');
    }
    
    public function index(){
        $data['barang']= $this->m_barang->barang()->result();
        $this->load->view('tabel/navbar');
		    $this->load->view('v_tabel',$data);
    }
      function hapus($id){
      $where = array('kd_barang' => $id);
      $this->m_barang->hapus_data($where,'barang');
      redirect(base_url('barang'));
      }
      function add(){
        $kode_barang = $this->input->post('kode_barang');
        $nama_supplier = $this->input->post('nama_supplier');
        $nama_barang = $this->input->post('nama_barang');
        $stok = $this->input->post('stok');
        $harga = $this->input->post('harga');
    
        $data = array(
          'kd_barang' => $kode_barang,
          'kode_supplier' => $nama_supplier,
          'nama_barang' => $nama_barang,
          'harga' => $harga,
          'stok' => $stok
          );
        $this->m_barang->add($data,'barang');
        redirect(base_url('barang'));
      }
        function update(){

          $kode_barang = $this->input->post('kode_barang1');
          $nama_supplier = $this->input->post('nama_supplier1');
          $nama_barang = $this->input->post('nama_barang1');
          $stok = $this->input->post('stok1');
          $harga = $this->input->post('harga1');
        
          $data = array(
            'kode_supplier' => $nama_supplier,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'stok' => $stok
            );
        
          $where = array(
            'kd_barang' => $kode_barang
          );
          $this->m_barang->update_data($where,$data,'barang');
          redirect(base_url('barang'));
        }
        function kirim(){
          $faktur = $this->input->post('faktur');
          $kode_barang = $this->input->post('kode_barang2');
          $tanggal = $this->input->post('tanggal');
          $pengirim = $this->input->post('pengirim');
          $tujuan = $this->input->post('tujuan');
          $jumlah = $this->input->post('jumlah');

          $data = array(
            'kode_kirim' => $faktur,
            'tanggal' => $tanggal,
            'nama_pengirim' => $pengirim,
            'tujuan' => $tujuan,
            );
          $data1 = array(
            'kode_kirim' => $faktur,
            'kode_barang' => $kode_barang,
            'jumlah' => $jumlah
            );
          $this->m_barang->add($data,'pengiriman');
          $this->m_barang->add($data1,'detail_pengiriman');
          redirect(base_url('barang'));

        }
}
