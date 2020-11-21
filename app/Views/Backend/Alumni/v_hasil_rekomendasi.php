<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Matrik Lowongan</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <center>
                    <th class="border-top-0">Alternatif</th>
                    <th class="border-top-0">C1 (Cost)</th>
                    <th class="border-top-0">C2 (Benefit)</th>
                    <th class="border-top-0">C3 (Cost)</th>
                    <th class="border-top-0">C4 (Benefit)</th>
                    <th class="border-top-0">C5 (Cost)</th>
                    <th class="border-top-0">C6 (Benefit)</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($lowongan as $key => $hasil) { ?>
                  <tr>
                    <td><?= "A", $no++ ?></td>
                    <td><?= $hasil['umur'] ?></td>
                    <td><?= $hasil['kualifikasi_pendidikan'] ?></td>
                    <td><?= $hasil['ipk'] ?></td>
                    <td><?= $hasil['jenis_kelamin'] ?></td>
                    <td><?= $hasil['pengalaman_kerja'] ?></td>
                    <td><?= $hasil['jurusan'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
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