<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material" action="/backend/alumni/rekomendasi/hitung/<?= $alumni['id_alumni'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-md-12 mb-0">NIM</label>
              <div class="col-md-12">
                <input type="text" placeholder="NIM" class="form-control pl-0 form-control-line" name="nim" value="<?= $alumni['nim'] ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Nama</label>
              <div class="col-md-12">
                <input type="text" placeholder="Nama" class="form-control pl-0 form-control-line" name="nama" value="<?= $alumni['nama'] ?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Jurusan</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="jurusan">
                  <option>Pilih Jurusan</option>
                  <option value="informatika" <?php if ($jurusan['jurusan'] == "informatika") { ?> selected="selected" <?php } ?>>Teknik Informatika</option>
                  <option value="mesin" <?php if ($jurusan['jurusan'] == "mesin") { ?> selected="selected" <?php } ?>>Teknik Mesin</option>
                  <option value="elektro" <?php if ($jurusan['jurusan'] == "elektro") { ?> selected="selected" <?php } ?>>Teknik Elektro</option>
                  <option value="industri" <?php if ($jurusan['jurusan'] == "industri") { ?> selected="selected" <?php } ?>>Teknik Industri</option>
                  <option value="kimia" <?php if ($jurusan['jurusan'] == "kimia") { ?> selected="selected" <?php } ?>>Teknik Kimia</option>
                  <option value="sipil" <?php if ($jurusan['jurusan'] == "sipil") { ?> selected="selected" <?php } ?>>Teknik Sipil</option>
                  <option value="arsitektur" <?php if ($jurusan['jurusan'] == "arsitektur") { ?> selected="selected" <?php } ?>>Arsitektur</option>
                  <option value="planologi" <?php if ($jurusan['jurusan'] == "pwk") { ?> selected="selected" <?php } ?>>Perencanaan Wilayah dan Kota</option>
                  <option value="geodesi" <?php if ($jurusan['jurusan'] == "geodesi") { ?> selected="selected" <?php } ?>>Teknik Geodesi</option>
                  <option value="lingkungan" <?php if ($jurusan['jurusan'] == "lingkungan") { ?> selected="selected" <?php } ?>>Teknik Lingkungan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Umur</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="umur">
                  <option>Pilih Umur</option>
                  <?php foreach ($umur as $key => $jurusan) : ?>
                    <?php if ($alumni['umur'] == $jurusan['bobot']) : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>" selected><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>"><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Kualifikasi Pendidikan</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="kualifikasi_pendidikan">
                  <option>Pilih Kualifikasi Pendidikan</option>
                  <?php foreach ($kualifikasi_pendidikan as $key => $jurusan) : ?>
                    <?php if ($alumni['kualifikasi_pendidikan'] == $jurusan['bobot']) : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>" selected><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>"><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">IPK</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="ipk">
                  <option>Pilih IPK</option>
                  <?php foreach ($ipk as $key => $jurusan) : ?>
                    <?php if ($alumni['ipk'] == $jurusan['bobot']) : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>" selected><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>"><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Pengalaman Kerja</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="pengalaman_kerja">
                  <option>Pilih Pengalaman Kerja</option>
                  <?php foreach ($pengalaman_kerja as $key => $jurusan) : ?>
                    <?php if ($alumni['pengalaman_kerja'] == $jurusan['bobot']) : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>" selected><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $jurusan['bobot']; ?>"><?php echo $jurusan['sub_kriteria']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 d-flex mx-auto justify-content-center">
                <button class="btn btn-primary mx-md-0 text-white" type="submit">Mulai Rekomendasi</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
<script src="/template/sweetalert/sweetalert2.all.min.js"></script>
<!--Sweet Alert Message-->
<?php if (session()->get('pesan') == 'success') : ?>
  <script>
    Swal.fire({
      title: 'Sukses',
      text: 'Data Berhasil Dirubah',
      icon: 'success'
    })
  </script>
<?php endif; ?>