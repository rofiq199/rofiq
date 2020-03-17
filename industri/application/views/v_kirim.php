        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>
            <div class="card-body">
            <form action="<?= base_url('kirim/simpan')?>" method="post">
            <?php 
              $timezone = time() + (60 * 60 * 6);
              $date = Date("Y-m-d H:i:s",$timezone); ?>
            <input type="text" name="kode_kirim" placeholder="kode kirim ">
            <input type="text"value="<?= $date?>" name="tanggal" placeholder="kode kirim ">
            <input type="text" name="nama_pengirim" placeholder="nama pengirim ">
            <input type="text" name="tujuan" placeholder="tujuan">
            <a href="" data-toggle="modal" data-target="#barang"  class="btn btn-primary" >Klik</a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Subtoal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($items as $s){
                  ?>
                    <tr>
                      <td><?php echo $s['id'];?></td>
                      <td><?php echo $s['name']; ?> </td>
                      <td><?php echo $s['price']; ?></td>
                      <td><?php echo $s['qty']; ?></td>
                      <td><?php echo $s['subtotal']; ?></td>
                      <td>
                      </td>
                    </tr>
                    <?php }?>
                    
                  </tbody>
                </table>
                <div width="100%">
                <h4 class="satu"> Total : <?php echo $this->cart->total();?> </h4>
                <center><input type="submit" class="btn btn-primary"value="Simpan"></center>
              </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>admin/js/demo/datatables-demo.js"></script>

  <div class="modal" id="barang" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">List Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table width="100%" cellspacing="0">
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>Action</th>
      <?php foreach ($barang as $p ) {
        
       ?>
       <div>

        <tr>
        <form action="<?= base_url('kirim/add');?>" method="post">
       <td> <label for=""><strong><?= $p->nama_barang; ?></strong></label></td>
        <input type="text" hidden value="<?= $p->kd_barang;?>" name="kode">
        <input type="text" hidden value="<?= $p->nama_barang;?>" name="nama" >
        <input type="text" hidden value="<?= $p->harga;?>" name="harga" >
        <td><input type="number" name="jumlah" style="width:50px ;height:24px ;"></td>
        <td><input type="submit" class="btn btn-outline-primary" value="kirim"></td>
        </form>
        </tr>
        </div>     
    <?php  }?>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  </body>

</html>
