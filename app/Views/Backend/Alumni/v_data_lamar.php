<style>
  /* table {
    table-layout: fixed;
    word-wrap: break-word;
  } */

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
              <h4 class="card-title">Data Lamaran</h4>
            </div>
          </div>
          <div class="table-responsive">
            <table id="tables" class="table user-table">
              <thead>
                <tr>
                  <center>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Nama Perusahaan</th>
                    <th class="border-top-0">Nama Lowongan</th>
                    <th class="border-top-0">Berkas</th>
                    <th class="border-top-0">Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($lowongan as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $hasil['nama_perusahaan'] ?></td>
                    <td><?= $hasil['nama_lowongan'] ?></td>
                    <td><?= $hasil['berkas'] ?></td>
                    <td><img src="/lowongan/<?= $hasil['gambar'] ?>" class="rounded mx-auto d-block" width="200" height="200" /></td>
                    <td>
                      <a href="/alumni/lowongan/detail/<?= $hasil['id_lowongan'] ?>" class="btn btn-primary">Detail</a>
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