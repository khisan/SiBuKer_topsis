<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body profile-card">
          <center> <img src="/foto/<?= $alumni['foto'] ?>" class="rounded-circle" width="200" height="200" />
            <h4 class="card-title m-t-10"> <?= $alumni['nama'] ?> </h4>
            <div class="row text-center justify-content-center">
              <div class="col-8">
                <p class="link">
                  <i class="mdi mdi-account-card-details" aria-hidden="true"></i>
                  <span><?= $alumni['nim'] ?></span>
                </p>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material" action="/alumni/lamar/update/<?= $lamar['id_lamar'] ?>" method="POST" enctype="multipart/form-data">
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
              <div class="alert alert-danger" role="alert">
                <ul>
                  <?php foreach ($errors as $key => $value) { ?>
                    <li><?= esc($value) ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>
            <div class="form-group">
              <input type="hidden" class="form-control pl-0 form-control-line" name="id_perusahaan" value="<?= $lamar['id_perusahaan'] ?>">
              <input type="hidden" class="form-control pl-0 form-control-line" name="id_lowongan" value="<?= $lamar['id_lowongan'] ?>">
              <input type="hidden" class="form-control pl-0 form-control-line" name="id_alumni" value="<?= $lamar['id_alumni'] ?>">
            </div>
            <div class=" form-group">
              <label class="col-md-12 mb-0">Berkas Perlengkapan</label>
              <div class="col-md-12">
                <input type="file" name="berkas" class="form-control pl-0 form-control-line" required>
                <small class="text-muted">*Wajib file .rar dengan diberi nama nim, contoh : 1718006.rar</small>
              </div>
            </div>
            <div class=" form-group">
              <label class="col-md-12 mb-0">Berkas Perlengkapan yang Lama</label>
              <div class="col-md-12">
                <input type="text" name="berkas" class="form-control pl-0 form-control-line" disabled value="<?= $lamar['berkas'] ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 d-flex">
                <button class="btn btn-success mx-auto mx-md-0 text-white" style="text-align: center;" type="submit">Ubah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script src="/template/sweetalert/sweetalert2.all.min.js"></script>
<!--Sweet Alert Message-->
<script>
  const swal = $('.swal').data('swal');
</script>
<?php if (session()->get('validasi') != TRUE) : ?>
  <script>
    Swal.fire({
      title: 'Ada Kesalahan',
      text: "<?= $validate->listErrors() ?>",
      icon: 'error'
    })
  </script>
<?php endif; ?>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $this.remove();
    });
  }, 3000);
</script>