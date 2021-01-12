<style>
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
          <div class="row align-items-center" style="margin-bottom: 10px;">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Data Kriteria</h4>
            </div>
            <div class="col-md-2 col-4 align-self-right">
              <a href="/admin/kriteria/tambah" class="btn btn-primary text-white mt-4" style="display: inline;">Tambah Data</a>
            </div>
          </div>
          <div class="table-responsive">
            <table id="tables" class="table user-table">
              <thead>
                <tr>
                  <center>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Kode</th>
                    <th class="border-top-0">Kriteria</th>
                    <th class="border-top-0">Cost/Benefit</th>
                    <th class="border-top-0">Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($kriteria as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $hasil['kode'] ?></td>
                    <td><?= $hasil['kriteria'] ?></td>
                    <td><?= $hasil['cost_benefit'] ?></td>
                    <td>
                      <a href="/admin/kriteria/ubah/<?= $hasil['id_kriteria'] ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                      <a href="/admin/kriteria/delete/<?= $hasil['id_kriteria'] ?>" class="btn btn-danger tombol-hapus"><i class="mdi mdi-delete"></i></a>
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
<!--Sweet Alert Message-->
<script>
  $('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Data Kriteria akan Dihapus!",
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