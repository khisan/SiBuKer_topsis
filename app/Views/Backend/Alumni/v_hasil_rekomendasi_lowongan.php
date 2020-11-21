<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <?php foreach ($alumni as $key => $value) { ?>
      <div class="col-lg-8 mx-auto">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-material" action="/backend/alumni/rekomendasi/hitung/<?= $value['id_alumni'] ?>" method="POST" enctype="multipart/form-data">
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
              <div class="form-group">
                <label class="col-md-12 mb-0">Jurusan</label>
                <div class="col-md-12">
                  <select class="form-control pl-0 form-control-line" name="jurusan">
                    <option>Pilih Jurusan</option>
                    <?php foreach ($jurusan as $key => $value) : ?>
                      <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Jenis Kelamin</label>
                <div class="col-md-12">
                  <select class="form-control pl-0 form-control-line" name="jenis_kelamin">
                    <option>Pilih Jenis Kelamin</option>
                    <?php foreach ($jenis_kelamin as $key => $value) : ?>
                      <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Umur</label>
                <div class="col-md-12">
                  <select class="form-control pl-0 form-control-line" name="umur">
                    <option>Pilih Umur</option>
                    <?php foreach ($umur as $key => $value) : ?>
                      <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">Kualifikasi Pendidikan</label>
                <div class="col-md-12">
                  <select class="form-control pl-0 form-control-line" name="kualifikasi_pendidikan">
                    <option>Pilih Kualifikasi Pendidikan</option>
                    <?php foreach ($kualifikasi_pendidikan as $key => $value) : ?>
                      <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 mb-0">IPK</label>
                <div class="col-md-12">
                  <select class="form-control pl-0 form-control-line" name="ipk">
                    <option>Pilih IPK</option>
                    <?php foreach ($ipk as $key => $value) : ?>
                      <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
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