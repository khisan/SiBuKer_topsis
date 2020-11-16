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
          <div class="row align-items-center">
            <div class="col-md-10 col-8 align-self-center">
              <h4 class="card-title">Data Sub Kriteria Lowongan</h4>
            </div>
            <div class="col-md-2 col-4 align-self-right">
              <a href="/admin/sub-kriteria-lowongan/tambah" class="btn btn-primary text-white mt-4" style="display: inline;">Tambah Data</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table user-table">
              <thead>
                <tr>
                  <center>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Kriteria</th>
                    <th class="border-top-0">Sub Kriteria</th>
                    <th class="border-top-0">Bobot</th>
                    <th class="border-top-0">Cost/Benefit</th>
                    <th class="border-top-0">Aksi</th>
                  </center>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($sub_kriteria_lowongan as $key => $hasil) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $hasil['kriteria'] ?></td>
                    <td><?= $hasil['sub_kriteria'] ?></td>
                    <td><?= $hasil['bobot'] ?></td>
                    <td><?= $hasil['cost_benefit'] ?></td>
                    <td>
                      <a href="/backend/admin/subkriterialowongan/ubah/<?= $hasil['id_sub_kriteria_lowongan'] ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                      <a href="/backend/admin/subkriterialowongan/delete/<?= $hasil['id_sub_kriteria_lowongan'] ?>" class="btn btn-danger tombol-hapus"><i class="mdi mdi-delete"></i></a>
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
      text: "Data Kriteria Lowongan akan Dihapus!",
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
  // Chained Dropdown
  $(document).ready(function() {
    $('#kategori').change(function() {
      var id = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>index.php/kategori/get_subkategori",
        method: "POST",
        data: {
          id: id
        },
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option>' + data[i].subkategori_nama + '</option>';
          }
          $('.subkategori').html(html);

        }
      });
    });
  });
</script>