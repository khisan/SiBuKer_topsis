<link rel="stylesheet" type="text/css" href="/template/auth/css/main.css">
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="Nama" />
      <select name="cars" id="cars" form="carform">
        <option value="" selected>Jenis Kelamin</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
      </select>
      <input type="number" placeholder="Umur" />
      <input type="text" placeholder="Username" />
      <input type="password" placeholder="Password" />
      <button>Daftar</button>
      <p class="message">Sudah punya akun? <a href="#">Login</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="Username" />
      <input type="password" placeholder="Password" />
      <button>Login</button>
      <p class="message">Belum punya akun? <a href="#">Daftar</a></p>
    </form>
  </div>
</div>
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script src="/template/auth/js/main.js"></script>