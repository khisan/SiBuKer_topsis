<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <?php foreach ($alumni as $key => $value) { ?>
      <div class="col-lg-12 col-xlg-9 col-md-7">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-material" action="/backend/alumni/profil/update/<?= $value['id_alumni'] ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-md-12 mb-0">NIM</label>
                <div class="col-md-12">
                  <input type="text" placeholder="NIM" class="form-control pl-0 form-control-line" name="nim" value="<?= $value['nim'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Nama</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Nama" class="form-control pl-0 form-control-line" name="nama" value="<?= $value['nama'] ?>" disabled>
                </div>
              </div>
              <div class=" form-group">
                <label class="col-sm-12">Pilih Jurusan</label>
                <div class="col-sm-12">
                  <select class="form-control pl-0 form-control-line" name="jurusan">
                    <?php foreach ($jurusan as $row => $valueJurusan) : ?>
                      <?php if ($value['id_jurusan'] == $valueJurusan['id_jurusan']) : ?>
                        <option value="<?php echo $valueJurusan['id_jurusan']; ?>" selected><?php echo $valueJurusan['jurusan']; ?></option>
                      <?php else : ?>
                        <option value="<?php echo $valueJurusan['id_jurusan']; ?>"><?php echo $valueJurusan['jurusan']; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class=" form-group">
                <label class="col-sm-12">Pilih Jenis Kelamin</label>
                <div class="col-sm-12">
                  <select class="form-control pl-0 form-control-line" name="jenis_kelamin">
                    <?php if ($value['jenis_kelamin'] == "L") : ?>
                      <option value="L" selected>Laki-laki</option>
                      <option value="P">Perempuan</option>
                    <?php elseif ($value['jenis_kelamin'] == "P") : ?>
                      <option value="P" selected>Perempuan</option>
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
                <label class="col-sm-12">Kualifikasi Pendidikan</label>
                <div class="col-sm-12">
                  <select class="form-control pl-0 form-control-line" name="kualifikasi_pendidikan">
                    <?php if ($value['kualifikasi_pendidikan'] == "S1") : ?>
                      <option value="S1" selected>S1</option>
                      <option value="D3">D3</option>
                    <?php elseif ($value['kualifikasi_pendidikan'] == "D3") : ?>
                      <option value="D3" selected>D3</option>
                      <option value="S1">S1</option>
                    <?php else : ?>
                      <option value="" selected>Pilih Kualifikasi Pendidikan</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="example-email" class="col-md-12">IPK</label>
                <div class="col-md-12">
                  <input type="number" placeholder="IPK" class="form-control pl-0 form-control-line" name="ipk" value="<?= $value['ipk'] ?>" step="any">
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
    <?php } ?>
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