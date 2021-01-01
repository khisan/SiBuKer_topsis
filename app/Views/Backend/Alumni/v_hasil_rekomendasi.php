<style>
  td,
  th {
    text-align: center;
  }
</style>
<div class="container-fluid">
  <!-- 5 Nilai Preferensi Tertinggi -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-9 col-8 align-self-center">
              <h4 class="card-title">5 Rekomendasi Lowongan Terpilih</h4>
            </div>
            <div class="col-md-3 col-4 align-self-right">
              <a href="/alumni/detail-perhitungan" class="btn btn-primary text-white mt-2" style="display: inline;">Lihat Perhitungan</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">Nama Perusahaan</th>
                  <th class="border-top-0">Nama Lowongan</th>
                  <th class="border-top-0">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($nilai_v_tertinggi_limit as $key => $hasil) { ?>
                  <tr>
                    <td><?= $hasil[0]; ?></td>
                    <td><?= $hasil[1]; ?></td>
                    <td>
                      <a href="/alumni/lamar/tambah/<?= $hasil[4] ?>/<?= $hasil[2] ?>" class="btn btn-success text-white">Lamar</a>
                    </td>
                  </tr>
                <?php $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
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