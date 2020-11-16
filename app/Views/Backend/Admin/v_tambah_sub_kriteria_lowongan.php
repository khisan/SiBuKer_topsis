<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-8 col-xs-4">
      <div class="card">
        <div class="card-body">
          <div>
            <h3 class="card-title">Form Tambah Sub Kriteria Lowongan</h3>
          </div>
          <form class="form-horizontal form-material" action="/admin/sub-kriteria-lowongan/add" method="POST">
            <div class="form-group">
              <label class="col-md-12 mb-0">Kriteria</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="kode" id="kriteria">
                  <option>Pilih Kriteria</option>
                  <?php foreach ($kriteria_lowongan as $key => $value) : ?>
                    <option value="<?php echo $value['kode']; ?>"><?php echo $value['kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Sub Kriteria</label>
              <div class="col-md-12">
                <input type="text" placeholder="Sub Kriteria" class="form-control pl-0 form-control-line" name="sub_kriteria" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Bobot</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="bobot">
                  <option>Pilih Bobot</option>
                  <option value="1">Sangat Rendah</option>
                  <option value="2">Rendah</option>
                  <option value="3">Cukup</option>
                  <option value="4">Tinggi</option>
                  <option value="5">Sangat Tinggi</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Cost/Benefit</label>
              <div class="col-md-12">
                <input type="text" class="cost_benefit form-control pl-0 form-control-line" name="cost_benefit" required readonly>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 d-flex">
                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script>
  // Chained Dropdown
  $(document).ready(function() {
    $('#kriteria').change(function() {
      var kode = $(this).val();
      $.ajax({
        url: "/backend/admin/subkriterialowongan/get_subkategori",
        method: "POST",
        data: {
          kode: kode
        },
        // async: false,
        dataType: 'json',
        success: function(data) {
          var isi = '';
          isi += data.cost_benefit;
          $('.cost_benefit').val(isi);
        }
      });
    });
  });
</script>