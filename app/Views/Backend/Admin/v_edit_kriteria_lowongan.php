<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-8 col-xs-4">
      <div class="card">
        <div class="card-body">
          <div>
            <h3 class="card-title">Form Edit Kriteria Lowongan</h3>
          </div>
          <form class="form-horizontal form-material" action="/backend/admin/kriterialowongan/update/<?= $kriteria_lowongan['id_kriteria_lowongan'] ?>" method="POST">
            <div class="form-group">
              <label class="col-md-12 mb-0">Kode</label>
              <div class="col-md-12">
                <input type="text" placeholder="Kode" class="form-control pl-0 form-control-line" name="kode" value="<?= $kriteria_lowongan['kode'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Kriteria</label>
              <div class="col-md-12">
                <input type="text" placeholder="Kriteria" class="form-control pl-0 form-control-line" name="kriteria" value="<?= $kriteria_lowongan['kriteria'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Cost/Benefit</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="cost_benefit">
                  <?php if ($kriteria_lowongan['cost_benefit'] == "cost") : ?>
                    <option value="cost" selected>Cost</option>
                    <option value="benefit">Benefit</option>
                  <?php elseif ($kriteria_lowongan['cost_benefit'] == "benefit") : ?>
                    <option value="benefit" selected>Benefit</option>
                    <option value="cost">Cost</option>
                  <?php endif; ?>
                </select>
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
<!-- ============================================================== -->
<!-- End Container fluid  -->