<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-8 col-xs-4">
      <div class="card">
        <div class="card-body">
          <div>
            <h3 class="card-title">Form Edit Perusahaan</h3>
          </div>
          <form class="form-horizontal form-material" action="/admin/perusahaan/update/<?= $perusahaan['id_perusahaan'] ?>" method="POST">
            <div class="form-group">
              <label class="col-md-12 mb-0">Username</label>
              <div class="col-md-12">
                <input type="text" class="form-control pl-0 form-control-line" name="username" value="<?= $perusahaan['username'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Nama Perusahaan</label>
              <div class="col-md-12">
                <input type="text" class="form-control pl-0 form-control-line" name="nama_perusahaan" value="<?= $perusahaan['nama_perusahaan'] ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 d-flex">
                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Ubah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->