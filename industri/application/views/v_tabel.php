        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
            <a  class="btn btn-primary" href="#" data-toggle="modal" data-target="#tambah">Tambah</a> 
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Supplier</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($barang as $b){
                  ?>
                    <tr>
                      <td><?= $b->kd_barang; ?></td>
                      <td><?= $b->nama_supplier ?></td>
                      <td><?= $b->nama_barang ?></td>
                      <td><?= $b->stok ?></td>
                      <td><?= $b->harga ?></td>
                      <td>
                      <a href="" data-toggle="modal" data-target="#edit<?= $b->kd_barang; ?>">Edit</a><br>
                              <?php echo anchor( base_url('barang/hapus/').$b->kd_barang,'Hapus'); ?><br>
                      </td>
                    </tr>
                    <?php }?>
                    
                  </tbody>
                </table>
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

          
  <!-- Logout Modal-->
  <form action="<?php echo base_url(); ?>barang/add" method="post">
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Label">Tambah Barang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body mx-3">
        <div class="md-form mb-2">
        <input type="text"  name="kode_barang" id="" placeholder="Masukkan Kode Barang">
        </div>
        <div class="md-form mb-2">
        <select name="nama_supplier" id="nama_supplier">
        <?php foreach ($barang as $a) {
        ?>
        <option value="<?= $a->kode_supplier?>"><?= $a->nama_supplier ?></option>
        <?php }?>
        </select>
        </div>
        <div class="md-form mb-2">
        <input type="text"  name="nama_barang" id="" placeholder="Masukkan Nama Barang">
        </div>
        <div class="md-form mb-2">
        <input type="text"  name="stok" id="" placeholder="Masukkan stok">
        </div>
        <div class="md-form mb-2">
        <input type="text"  name="harga" id="" placeholder="Masukkan Harga">
        </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
         <input type="submit" class="btn btn-primary" value="Tambah">
        </div>
      </div>
    </div>
  </div>
  </form>

  <?php
  foreach ($barang as $c) {
    # code...
  ?>
                      <form action="<?php echo base_url(); ?>barang/update" method="post">
                        <div class="modal fade" id="edit<?= $c->kd_barang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="Label">Update Barang</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body mx-3">
                              <div class="md-form mb-2">
                              <input type="text"  value="<?= $c->kd_barang; ?>" name="kode_barang1" id="" placeholder="Masukkan Kode Barang">
                              </div>
                              <div class="md-form mb-2">
                              <input type="text"  value="<?= $c->kode_supplier; ?>" name="nama_supplier1" id="" placeholder="Masukkan Nama Supplier">
                              </div>
                              <div class="md-form mb-2">
                              <input type="text"  value="<?= $c->nama_barang; ?>" name="nama_barang1" id="" placeholder="Masukkan Nama Barang">
                              </div>
                              <div class="md-form mb-2">
                              <input type="text" value="<?= $c->stok; ?>" name="stok1" id="" placeholder="Masukkan stok">
                              </div>
                              <div class="md-form mb-2">
                              <input type="text" value="<?= $c->harga; ?>" name="harga1" id="" placeholder="Masukkan Harga">
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <input type="submit" class="btn btn-primary" value="update">
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>   


<?php  }?>

<?php  
  $timezone = time() + (60 * 60 * 6);
  $date = Date("Y-m-d H:i:s",$timezone);
?>
<!-- form kirim -->
              <form action="<?php echo base_url(); ?>barang/kirim" method="post">
                        <div class="modal fade" id="kirim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="Label">Kirim Barang</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body mx-3">
                              <div class="md-form mb-2">
                              <label>No Faktur</label><br>
                              <input type="text"  name="faktur" placeholder="Masukkan Invoice">
                              </div>
                              <div class="md-form mb-2">
                                    <select name="kode_barang2" id="kode_barang">
                                    <?php foreach ($barang as $d) {
                                    ?>
                                    <option value="<?= $d->kd_barang?>"><?= $d->nama_barang ?></option>
                                    <?php }?>
                                    </select>
                                </div>
                              <div class="md-form mb-2">
                              <label>Tanggal</label><br>
                              <input type="text"  value="<?= $date ;?>" name="tanggal" >
                              </div>
                              <div class="md-form mb-2">
                              <label>Nama pengirim</label><br>
                              <input type="text"  name="pengirim"  placeholder="Masukkan Pengirim">
                              <div class="md-form mb-2">
                              <label>Tujuan</label><br>
                              <input type="text"  name="tujuan"  placeholder="Masukkan Tujuan">
                              </div>
                              <div class="md-form mb-2">
                              <label>Jumlah</label><br>
                              <input type="number" name="jumlah" placeholder="Masukkan stok">
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <input type="submit" class="btn btn-primary" value="Kirim">
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>

<!-- form Masuk -->
<div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>
