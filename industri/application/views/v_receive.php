        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>
            <div class="card-body">
            <div>
            <form action="<?=base_url('receive/add');?>" method="post">
            <label for="">kode receive</label>
            <input type="text" name="kode_receive" placeholder="receive" id="">
            <label for="">kode supplier</label>
            <label for="">barang</label>
            <select name="kode_barang" id="kode_barang">
              <?php foreach ($barang as $d) {
                                    ?>
              <option value="<?= $d->kd_barang?>"><?= $d->nama_barang ?></option>
              <?php }?>
              </select>
              <label for="">jumlah</label>
            <input type="number" name="jumlah" placeholder="jumlah" id="">
            <input type="submit" class="btn btn-primary" value="baru">
            </form>
            </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode Supplier</th>
                      <th>Tanggal</th>
                      <th>Nama Supplier</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($tampil as $s){
                  ?>
                    <tr>
                      <td><?= $s->kode_receive;?></td>
                      <td><?= $s->tanggal_receive;?></td>
                      <td><?= $s->nama_supplier;?></td>
                      <td><?=$s->nama_barang;?></td>
                      <td><?= $s->jumlah; ?></td>
                      <td>
                      <a href="" data-toggle="modal" data-target="#edit<?= $s->kode_receive; ?>">Edit</a><br>
                              <?php echo anchor( base_url('receive/hapus/').$s->kode_receive,'Hapus'); ?>
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
  <?php foreach ($tampil as $c) {

  ?>
                      <form action="<?php echo base_url(); ?>supplier/update" method="post">
                        <div class="modal fade" id="edit<?= $c->kode_receive;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input type="text"  value="<?= $c->kode_receive; ?>" name="kode_supplier1" id="" placeholder="Masukkan Kode Barang">
                              </div>
                              <div class="md-form mb-2">
                              <input type="text"  value="<?= $c->nama_supplier; ?>" name="nama_supplier1" id="" placeholder="Masukkan Nama Supplier">
                              </div>
                              <div class="md-form mb-2">
                              <input type="text"  value="<?= $c->nama_barang; ?>" name="kontak1" id="" placeholder="Masukkan Nama Barang">
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
  <?php }?>
  </body>

</html>
