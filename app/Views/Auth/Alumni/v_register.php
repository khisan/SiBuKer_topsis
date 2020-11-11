<style>
  .title {
    margin-bottom: 35px;
    color: #2c3e50;
  }

  .select {
    font-family: "Roboto", sans-serif;
    color: #757575;
    background: #f2f2f2;
    width: 100%;
    border: none;
    margin: 0 0 15px;
    padding: 15px 10px;
    box-sizing: border-box;
    font-size: 14px;
  }
</style>
<link rel="stylesheet" type="text/css" href="/template/auth/css/main.css">
<link rel="stylesheet" type="text/css" href="/template/bootstrap/css/bootstrap.min.css">
<div class="login-page">
  <div class="form">
    <form class="login-form" action="/Backend/Alumni/Auth_alu/register" method="POST">
      <h3 class="title">Page Daftar Alumni</h3>
      <?php
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
          <ul>
            <?php foreach ($errors as $key => $value) { ?>
              <li><?= esc($value) ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
      <input type="number" placeholder="NIM" name="nim" maxlength="7" />
      <input type="password" placeholder="Password" name="password" />
      <input type="text" placeholder="Nama" name="nama" />
      <select class="select" name="jurusan">
        <option>Pilih Jurusan</option>
        <?php foreach ($jurusan as $key => $value) : ?>
          <option value="<?php echo $value['id_jurusan']; ?>"><?php echo $value['jurusan']; ?></option>
        <?php endforeach; ?>
      </select>
      <select class="select" name="jenis_kelamin">
        <option value="" disabled selected>Jenis Kelamin</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
      <input type="number" placeholder="Umur" name="umur" />
      <button type="submit">Daftar</button>
      <p class="message">Sudah punya akun? <a href="/alumni/login">Login</a></p>
    </form>
  </div>
</div>
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script src="/template/sweetalert/sweetalert2.all.min.js"></script>
<!--Sweet Alert Message-->
<script>
  const swal = $('.swal').data('swal');
</script>
<?php if (session()->get('pesan') == 'success') : ?>
  <script>
    Swal.fire({
      title: 'Sukses',
      text: 'Berhasil Melakukan Registrasi ! Silahkan Login',
      icon: 'success'
    })
  </script>
<?php elseif (session()->get('validasi') != TRUE) : ?>
  <script>
    Swal.fire({
      title: 'Ada Kesalahan',
      text: "<?= $validate->listErrors() ?>",
      icon: 'error'
    })
  </script>
<?php endif; ?>
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $this.remove();
    });
  }, 3000);
</script>