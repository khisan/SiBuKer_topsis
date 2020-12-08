<style>
  td,
  th {
    text-align: center;
  }
</style>
<div class="container-fluid">
  <!-- Matrik Lowongan -->
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
                  <th class="border-top-0">Alternatif</th>
                  <th class="border-top-0">C1 (Cost)</th>
                  <th class="border-top-0">C2 (Benefit)</th>
                  <th class="border-top-0">C3 (Benefit)</th>
                  <th class="border-top-0">C4 (Benefit)</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($lowongan as $key => $hasil) { ?>
                  <tr>
                    <td><?= $hasil['nama_lowongan'] ?></td>
                    <td><?= $hasil['umur'] ?></td>
                    <td><?= $hasil['kualifikasi_pendidikan'] ?></td>
                    <td><?= $hasil['ipk'] ?></td>
                    <td><?= $hasil['pengalaman_kerja'] ?></td>
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
  <!-- Tabel Pembagi -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Tabel Pembagi</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">C1</th>
                  <th class="border-top-0">C2</th>
                  <th class="border-top-0">C3</th>
                  <th class="border-top-0">C4</th>
                  <th class="border-top-0">C5</th>
                  <th class="border-top-0">C6</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $tabel_pembagi['0'] ?></td>
                  <td><?= $tabel_pembagi['1'] ?></td>
                  <td><?= $tabel_pembagi['2'] ?></td>
                  <td><?= $tabel_pembagi['3'] ?></td>
                  <td><?= $tabel_pembagi['4'] ?></td>
                  <td><?= $tabel_pembagi['5'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
  </div>
  <!-- Matriks Normalisasi "R" -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Matriks Normalisasi "R"</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">Alternatif</th>
                  <th class="border-top-0">C1 (Cost)</th>
                  <th class="border-top-0">C2 (Benefit)</th>
                  <th class="border-top-0">C3 (Cost)</th>
                  <th class="border-top-0">C4 (Benefit)</th>
                  <th class="border-top-0">C5 (Cost)</th>
                  <th class="border-top-0">C6 (Benefit)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $no = 1;
                  foreach ($matrik_normalisasi as $key => $hasil) { ?>
                    <td><?= $hasil[6] ?></td>
                    <td><?= round($hasil[0], 6) ?></td>
                    <td><?= round($hasil[1], 6) ?></td>
                    <td><?= round($hasil[2], 6) ?></td>
                    <td><?= round($hasil[3], 6) ?></td>
                    <td><?= round($hasil[4], 6) ?></td>
                    <td><?= round($hasil[5], 6) ?></td>
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
  <!-- BOBOT (W) -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">BOBOT (W)</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">Nilai Kriteria Umur</th>
                  <th class="border-top-0">Nilai Kriteria Kualifikasi Pendidikan</th>
                  <th class="border-top-0">Nilai Kriteria IPK</th>
                  <th class="border-top-0">Nilai Kriteria Jenis Kelamin</th>
                  <th class="border-top-0">Nilai Kriteria Pengalaman Kerja</th>
                  <th class="border-top-0">Nilai Kriteria Jurusan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $alumni['umur'] ?></td>
                  <td><?= $alumni['kualifikasi_pendidikan'] ?></td>
                  <td><?= $alumni['ipk'] ?></td>
                  <td><?= $alumni['jenis_kelamin'] ?></td>
                  <td><?= $alumni['pengalaman_kerja'] ?></td>
                  <td><?= $alumni['jurusan'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
  </div>
  <!-- Matriks Normalisasi Terbobot "Y" -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Matriks Normalisasi Terbobot "Y"</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">Alternatif</th>
                  <th class="border-top-0">C1 (Cost)</th>
                  <th class="border-top-0">C2 (Benefit)</th>
                  <th class="border-top-0">C3 (Cost)</th>
                  <th class="border-top-0">C4 (Benefit)</th>
                  <th class="border-top-0">C5 (Cost)</th>
                  <th class="border-top-0">C6 (Benefit)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $no = 1;
                  foreach ($normalisasi_bobot as $key => $hasil) { ?>
                    <td><?= $hasil[6] ?></td>
                    <td><?= round($hasil[0], 6) ?></td>
                    <td><?= round($hasil[1], 6) ?></td>
                    <td><?= round($hasil[2], 6) ?></td>
                    <td><?= round($hasil[3], 6) ?></td>
                    <td><?= round($hasil[4], 6) ?></td>
                    <td><?= round($hasil[5], 6) ?></td>
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
  <!-- Matrik Solusi Ideal Positif dan Negatif -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Matrik Solusi Ideal Positif dan Negatif</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0"></th>
                  <th class="border-top-0">Y1 (Cost)</th>
                  <th class="border-top-0">Y2 (Benefit)</th>
                  <th class="border-top-0">Y3 (Cost)</th>
                  <th class="border-top-0">Y4 (Benefit)</th>
                  <th class="border-top-0">Y5 (Cost)</th>
                  <th class="border-top-0">Y6 (Benefit)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Y+</td>
                  <td><?= round($matrik_solusi_p[0], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_p[1], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_p[2], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_p[3], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_p[4], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_p[5], 6) ?>&nbsp(max)</td>
                </tr>
                <tr>
                  <td>Y-</td>
                  <td><?= round($matrik_solusi_n[0], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_n[1], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_n[2], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_n[3], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_n[4], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_n[5], 6) ?>&nbsp(min)</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
  </div>
  <!-- Matrik Solusi Ideal Positif dan Negatif -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Matrik Solusi Ideal Positif dan Negatif</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0"></th>
                  <th class="border-top-0">Y1 (Cost)</th>
                  <th class="border-top-0">Y2 (Benefit)</th>
                  <th class="border-top-0">Y3 (Cost)</th>
                  <th class="border-top-0">Y4 (Benefit)</th>
                  <th class="border-top-0">Y5 (Cost)</th>
                  <th class="border-top-0">Y6 (Benefit)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Y+</td>
                  <td><?= round($matrik_solusi_p[0], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_p[1], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_p[2], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_p[3], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_p[4], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_p[5], 6) ?>&nbsp(max)</td>
                </tr>
                <tr>
                  <td>Y-</td>
                  <td><?= round($matrik_solusi_n[0], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_n[1], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_n[2], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_n[3], 6) ?>&nbsp(min)</td>
                  <td><?= round($matrik_solusi_n[4], 6) ?>&nbsp(max)</td>
                  <td><?= round($matrik_solusi_n[5], 6) ?>&nbsp(min)</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
  </div>
  <!-- Jarak Antara Nilai Terbobot Setiap Alternatif Terhadap Solusi Ideal Positif -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Jarak Antara Nilai Terbobot Setiap Alternatif Terhadap Solusi Ideal Positif</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">D+</th>
                  <th class="border-top-0"></th>
                  <th class="border-top-0">D-</th>
                  <th class="border-top-0"></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                while ($low = $lowongan_get_nilai->getUnbufferedRow()) { ?>
                  <tr>
                    <td><?= $low->nama_lowongan ?></td>
                    <td><?= round($d_plus[$no - 1], 6) ?></td>
                    <td><?= $low->nama_lowongan ?></td>
                    <td><?= round($d_min[$no - 1], 6) ?></td>
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
  <!-- Nilai Preferensi untuk Setiap alternatif (V) -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Nilai Preferensi untuk Setiap alternatif (V)</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">Nilai Preferensi "V"</th>
                  <th class="border-top-0">V</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                while ($low = $lowongan_get_nilai_2->getUnbufferedRow()) { ?>
                  <tr>
                    <td><?= $low->nama_lowongan ?></td>
                    <td><?= round($nilai_v[$no - 1], 6) ?></td>
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
  <!-- 5 Nilai Preferensi Tertinggi -->
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">5 Nilai Preferensi Tertinggi</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <th class="border-top-0">Perankingan</th>
                  <th class="border-top-0">Nilai Preferensi Tertinggi</th>
                  <th class="border-top-0">Alternatif Lowongan Terpilih</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($nilai_v_tertinggi_limit as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $hasil[0]; ?></td>
                    <td><?= round($hasil[1], 6); ?></td>
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