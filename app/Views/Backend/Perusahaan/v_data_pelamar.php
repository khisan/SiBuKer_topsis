<style>
  label {
    font-size: 20px;
  }

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
              <h4 class="card-title">Data Pelamar</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table id="tables" class="table user-table">
              <thead>
                <tr>
                  <center>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Nama Lowongan</th>
                    <th class="border-top-0">Nama Alumni</th>
                    <th class="border-top-0">Berkas</th>
                    <th class="border-top-0">Status Lamaran</th>
                    <th class="border-top-0">Catatan</th>
                    <th class="border-top-0">Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($pelamar as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $hasil['nama_lowongan'] ?></td>
                    <td><?= $hasil['nama'] ?></td>
                    <td><a href="/perusahaan/pelamar/download/<?= $hasil['berkas'] ?>"><?= $hasil['berkas'] ?></a></td>
                    <td>
                      <?php if ($hasil['status'] == 0) { ?>
                        <span class="label label-warning">Belum</span>
                      <?php } elseif ($hasil['status'] == 1) { ?>
                        <span class="label label-success">ACC</span>
                      <?php } else { ?>
                        <span class="label label-danger">Tolak</span>
                      <?php } ?>
                    </td>
                    <td>
                      <?php if ($hasil['catatan'] == "") { ?>
                        <?= "-" ?>
                      <?php } else { ?>
                        <?= $hasil['catatan'] ?>
                      <?php } ?>
                    </td>
                    <td>
                      <a href="/Backend\Perusahaan\Pelamar\setuju/<?= $hasil['id_lamar'] ?>/<?= $hasil['id_alumni'] ?>" class="btn btn-success"><i class="mdi mdi-check"></i></a>
                      <a href="/Backend\Perusahaan\Pelamar\tolak/<?= $hasil['id_lamar'] ?>/<?= $hasil['id_alumni'] ?>" class="btn btn-danger"><i class="mdi mdi-close"></i></a>
                      <a href="/perusahaan/pelamar/catatan/<?= $hasil['id_lamar'] ?>/<?= $hasil['id_perusahaan'] ?>/<?= $hasil['id_lowongan'] ?>" class="btn btn-primary"><i class="mdi mdi-plus"></i></a>
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
</div>