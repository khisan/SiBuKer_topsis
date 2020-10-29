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
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <h3 class="title">Page Daftar Alumni</h3>
      <input type="text" placeholder="Nama" />
      <select class="select" name="cars" id="cars" form="carform">
        <option value="" disabled selected>Jenis Kelamin</option>
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
      <h3 class="title">Page Login Alumni</h3>
      <input type="text" placeholder="Username" />
      <input type="password" placeholder="Password" />
      <button>Login</button>
      <p class="message">Belum punya akun? <a href="#">Daftar</a></p>
    </form>
  </div>
</div>
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script src="/template/auth/js/main.js"></script>