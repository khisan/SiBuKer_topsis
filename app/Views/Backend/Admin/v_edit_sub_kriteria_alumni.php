<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-8 col-xs-4">
      <div class="card">
        <div class="card-body">
          <div>
            <h3 class="card-title">Form Edit Sub Kriteria Alumni</h3>
          </div>
          <form class="form-horizontal form-material" action="/backend/admin/subkriteriaalumni/update/<?= $sub_kriteria_alumni['id_sub_kriteria_alumni'] ?>" method="POST">
            <div class="form-group">
              <label class="col-md-12 mb-0">Kriteria</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="kode" id="kriteria">
                  <option>Pilih Kriteria</option>
                  <?php foreach ($kriteria_lowongan as $key => $value) : ?>
                    <?php if ($sub_kriteria_alumni['kode'] == $value['kode']) : ?>
                      <option value="<?php echo $value['kode']; ?>" selected><?php echo $value['kriteria']; ?></option>
                    <?php else : ?>
                      <option value="<?php echo $value['kode']; ?>"><?php echo $value['kriteria']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Sub Kriteria</label>
              <div class="col-md-12">
                <input type="text" class="form-control pl-0 form-control-line" name="sub_kriteria" value="<?= $sub_kriteria_alumni['sub_kriteria'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Bobot</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="bobot">
                  <option value='1' <?php if ($sub_kriteria_alumni["bobot"] == 1) echo "selected" ?>>Sangat Rendah</option>
                  <option value='2' <?php if ($sub_kriteria_alumni["bobot"] == 2) echo "selected" ?>>Rendah</option>
                  <option value='3' <?php if ($sub_kriteria_alumni["bobot"] == 3) echo "selected" ?>>Cukup</option>
                  <option value='4' <?php if ($sub_kriteria_alumni["bobot"] == 4) echo "selected" ?>>Tinggi</option>
                  <option value='5' <?php if ($sub_kriteria_alumni["bobot"] == 5) echo "selected" ?>>Sangat Tinggi</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Cost/Benefit</label>
              <div class="col-md-12">
                <input type="text" class="cost_benefit form-control pl-0 form-control-line" required readonly name="cost_benefit" value="<?= $sub_kriteria_alumni['cost_benefit'] ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 d-flex">
                <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Ubah</button>
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