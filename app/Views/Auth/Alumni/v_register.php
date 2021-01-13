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
<!-- Favicons -->
<link href="/foto/itn.png" rel="icon">
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
      <input type="number" placeholder="NIM" id="nim" name="nim" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);myFunction()" maxlength="7" />
      <input type="hidden" placeholder="" id="kualifikasi_pendidikan" name="kualifikasi_pendidikan" />
      <input type="hidden" placeholder="" id="jurusan" name="jurusan" />
      <input type="text" placeholder="Email" name="email" />
      <input type="text" placeholder="Nama" name="nama" />
      <input type="password" placeholder="Password" name="password" />
      <button type="submit">Daftar</button>
      <p class="message">Sudah punya akun? <a href="/alumni/login">Login</a></p>
    </form>
  </div>
</div>
<!-- Coba Fungsi on input -->
<script>
  function myFunction() {
    var x = document.getElementById("nim").value;
    var res = x.substr(2, 2);

    if (res == "18") {
      document.getElementById("jurusan").value = "informatika";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "51") {
      document.getElementById("jurusan").value = "mesin";
      document.getElementById("kualifikasi_pendidikan").value = 3;
    } else if (res == "11") {
      document.getElementById("jurusan").value = "mesin";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "53") {
      document.getElementById("jurusan").value = "industri";
      document.getElementById("kualifikasi_pendidikan").value = 3;
    } else if (res == "13") {
      document.getElementById("jurusan").value = "industri";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "12") {
      document.getElementById("jurusan").value = "elektro";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "52") {
      document.getElementById("jurusan").value = "elektro";
      document.getElementById("kualifikasi_pendidikan").value = 3;
    } else if (res == "14") {
      document.getElementById("jurusan").value = "kimia";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "21") {
      document.getElementById("jurusan").value = "sipil";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "26") {
      document.getElementById("jurusan").value = "lingkungan";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "24") {
      document.getElementById("jurusan").value = "planologi";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "25") {
      document.getElementById("jurusan").value = "geodesi";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else if (res == "22") {
      document.getElementById("jurusan").value = "arsitek";
      document.getElementById("kualifikasi_pendidikan").value = 5;
    } else {
      document.getElementById("jurusan").value = "";
      document.getElementById("kualifikasi_pendidikan").value = "";
    }
  }
</script>
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
      text: 'Berhasil Melakukan Registrasi ! Silahkan aktivasi email anda',
      icon: 'success'
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