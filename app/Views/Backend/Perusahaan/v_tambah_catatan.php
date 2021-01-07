<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body profile-card">
          <center> <img src="/foto/<?= $perusahaan['foto'] ?>" class="rounded-circle" width="200" height="200" />
            <h4 class="card-title m-t-10"> <?= $perusahaan['nama_perusahaan'] ?> </h4>
            <div class="row text-center justify-content-center">
              <div class="col-8">
                <p class="link">
                  <i class="mdi mdi-account-card-details" aria-hidden="true"></i>
                  <span><?= $lowongan['nama_lowongan'] ?></span>
                </p>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material" action="/perusahaan/pelamar/catatan/update/<?= $lamar['id_lamar'] ?>/<?= $lamar['id_alumni'] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control pl-0 form-control-line" name="id_perusahaan" value="<?= $lamar['id_perusahaan'] ?>">
            <input type="hidden" class="form-control pl-0 form-control-line" name="id_lowongan" value="<?= $lamar['id_lowongan'] ?>">
            <div class="form-group">
              <label class="col-md-12 mb-0">Catatan</label>
              <div class="col-md-12">
                <textarea name="catatan" id="summernote"><?= $lamar['catatan'] ?></textarea>
              </div>
              <div class="form-group">
                <div class="col-sm-12 d-flex">
                  <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Input</button>
                </div>
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