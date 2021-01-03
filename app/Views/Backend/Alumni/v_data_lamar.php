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
                    <th class="border-top-0">Status Lamaran</th>
                    <th class="border-top-0">Status Lamaran</th>
                    <th class="border-top-0">Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($lamar as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $hasil['nama_perusahaan'] ?></td>
                    <td><?= $hasil['nama_lowongan'] ?></td>
                    <td><a href="/alumni/lamar/download/<?= $hasil['berkas'] ?>"><?= $hasil['berkas'] ?></a></td>
                    <td><?= $hasil['status'] ?></td>
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
                      <a href="/alumni/lamar/ubah/<?= $hasil['id_lamar'] ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                      <a href="/alumni/lamar/delete/<?= $hasil['id_lamar'] ?>" class="btn btn-danger tombol-hapus"><i class="mdi mdi-delete"></i></a>
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
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script src="/template/sweetalert/sweetalert2.all.min.js"></script>
<script>
  // Sweet Alert Message
  $('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Data Lamaran akan Dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    })
  })
</script>