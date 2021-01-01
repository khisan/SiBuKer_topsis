<div class="container-fluid">
  <div class="col-lg-12">
    <div class="card">
      <div class="wrapper row">
        <div class="preview col-md-4">

          <div class="preview-pic tab-content" style="margin-top: 20px;margin-bottom: 20px;">
            <div class="tab-pane active"><img src="/lowongan/<?= $lowongan['gambar'] ?>" width="250px" height="400px" /></div>
          </div>
        </div>
        <div class="details col-md-6" style="margin-top: 20px;margin-bottom: 20px;">
          <h3 class="product-title"><?= $lowongan['nama_lowongan'] ?></h3>
          <h4 class="price"><?= $lowongan['nama_perusahaan'] ?></h4>
          <p class="product-description"><?= $lowongan['deskripsi_lowongan'] ?></p>
          <a href="" class="btn btn-primary">Lamar</a>
        </div>
      </div>
    </div>
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