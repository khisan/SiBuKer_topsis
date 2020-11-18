<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-md-8 col-xs-4">
      <div class="card">
        <div class="card-body">
          <div>
            <h3 class="card-title">Form Tambah Lowongan</h3>
          </div>
          <form class="form-horizontal form-material" action="/admin/lowongan/add" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-md-12 mb-0">Nama Perusahaan</label>
              <div class="col-md-12">
                <input type="text" placeholder="Nama Perusahaan" class="form-control pl-0 form-control-line" name="nama_perusahaan" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Nama Lowongan</label>
              <div class="col-md-12">
                <input type="text" placeholder="Nama Lowongan" class="form-control pl-0 form-control-line" name="nama_lowongan" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Umur</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="umur">
                  <option>Pilih Umur</option>
                  <?php foreach ($umur as $key => $value) : ?>
                    <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Kualifikasi Pendidikan</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="kualifikasi_pendidikan">
                  <option>Pilih Kualifikasi Pendidikan</option>
                  <?php foreach ($kualifikasi_pendidikan as $key => $value) : ?>
                    <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">IPK</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="ipk">
                  <option>Pilih IPK</option>
                  <?php foreach ($ipk as $key => $value) : ?>
                    <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Jenis Kelamin</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="jenis_kelamin">
                  <option>Pilih Jenis Kelamin</option>
                  <?php foreach ($jenis_kelamin as $key => $value) : ?>
                    <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Pengalaman Kerja</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="pengalaman_kerja">
                  <option>Pilih Pengalaman Kerja</option>
                  <?php foreach ($pengalaman_kerja as $key => $value) : ?>
                    <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Jurusan</label>
              <div class="col-md-12">
                <select class="form-control pl-0 form-control-line" name="jurusan">
                  <option>Pilih Jurusan</option>
                  <?php foreach ($jurusan as $key => $value) : ?>
                    <option value="<?php echo $value['sub_kriteria']; ?>"><?php echo $value['sub_kriteria']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Deskripsi Lowongan</label>
              <div class="col-md-12">
                <textarea name="deskripsi_lowongan" id="summernote"></textarea>
              </div>
            </div>
            <div class=" form-group">
              <label class="col-md-12 mb-0">Gambar</label>
              <div class="col-md-12">
                <input type="file" name="gambar" class="form-control pl-0 form-control-line">
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
  // summernote
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300,
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Gotham-Medium'],
      fontNamesIgnoreCheck: ['Gotham-Medium'],
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ],

      onPaste: function(e) {
        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
        e.preventDefault();
        document.execCommand('insertText', false, bufferText);
      }
    });
  });
</script>