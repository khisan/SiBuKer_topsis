<style>
  th,
  td {
    text-align: center;
  }
</style>
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <div class="row">
    <!-- column -->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Data Jurusan</h4>
            </div>
            <div class="col-md-2 col-4 align-self-right">
              <a href="/admin/jurusan/tambah" class="btn btn-primary text-white mt-4" style="display: inline;">Tambah Data</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <center>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Jurusan</th>
                    <th class="border-top-0">Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($jurusan as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $hasil['jurusan'] ?></td>
                    <td>
                      <button class="btn btn-warning"><i class="mdi mdi-pencil"></i></button>
                      <button class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End PAge Content -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Right sidebar -->
  <!-- ============================================================== -->
  <!-- .right-sidebar -->
  <!-- ============================================================== -->
  <!-- End Right sidebar -->
  <!-- ============================================================== -->
</div>