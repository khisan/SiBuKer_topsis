<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <?php foreach ($alumni as $key => $value) { ?>
      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
          <div class="card-body profile-card">
            <center class="m-t-30"> <img src="" class="rounded-circle" width="150" />
              <h4 class="card-title m-t-10"> <?= $value['nama'] ?> </h4>
              <h6 class="card-subtitle"> <?= $value['kualifikasi_pendidikan'] ?>." " . <?= $value['jurusan'] ?></h6>
              <div class="row text-center justify-content-center">
                <div class="col-8">
                  <p class="link">
                    <i class="mdi mdi-account-card-details" aria-hidden="true"></i>
                    <span class="value-digit"><?= $value['umur'] ?></span>
                  </p>
                </div>
              </div>
            </center>
          </div>
        </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-material">
              <div class="form-group">
                <label class="col-md-12 mb-0">Username</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Username" class="form-control pl-0 form-control-line" name="username" value="<?= $value['username'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Password</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Password" class="form-control pl-0 form-control-line" name="nama" value="<?= $value['password'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Nama</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Nama" class="form-control pl-0 form-control-line" name="nama" value="<?= $value['nama'] ?>">
                </div>
              </div>
              <div class=" form-group">
                <label class="col-sm-12">Pilih Jenis Kelamin</label>
                <div class="col-sm-12">
                  <select class="form-control pl-0 form-control-line">
                    <?php if ($value['jenis_kelamin'] == "L") : ?>
                      <option value="<?= $value['jenis_kelamin']; ?>" selected>Laki-laki</option>
                      <option value="P">Perempuan</option>
                    <?php elseif ($value['jenis_kelamin'] == "P") : ?>
                      <option value="<?= $value['jenis_kelamin']; ?>" selected>Perempuan</option>
                      <option value="L">Laki-laki</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Umur</label>
                <div class="col-md-12">
                  <input type="number" placeholder="Umur" class="form-control pl-0 form-control-line" name="umur" value="<?= $value['umur'] ?>">
                </div>
              </div>
              <div class=" form-group">
                <label class="col-md-12 mb-0">Foto</label>
                <div class="col-md-12">
                  <input type="file" value="Jenis Kelamin" class="form-control pl-0 form-control-line" name="jenis_kelamin" value="<?= $value['jenis_kelamin'] ?>">
                </div>
              </div>

              <div class=" form-group">
                <label class="col-sm-12">Kualifikasi Pendidikan</label>
                <div class="col-sm-12">
                  <select class="form-control pl-0 form-control-line">
                    <option selected disabled>Pilih Kualifikasi Pendidikan</option>
                    <option>S1</option>
                    <option>D3</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">IPK</label>
                <div class="col-md-12">
                  <input type="number" placeholder="IPK" class="form-control pl-0 form-control-line" name="ipk" value="<?= $value['ipk'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Keahlian 1</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Kehalian 1" class="form-control pl-0 form-control-line" name="ipk" value="<?= $value['keahlian_1'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Keahlian 2</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Kehalian 2" class="form-control pl-0 form-control-line" name="ipk" value="<?= $value['keahlian_2'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">Keahlian 3</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Kehalian 3" class="form-control pl-0 form-control-line" name="ipk" value="<?= $value['keahlian_3'] ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 d-flex">
                  <button class="btn btn-success mx-auto mx-md-0 text-white">Ubah Profil</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- Column -->
  </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->