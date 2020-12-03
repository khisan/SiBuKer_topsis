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
<link rel="stylesheet" href="/template/sweetalert/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="/template/auth/css/main.css">
<div class="login-page">
  <div class="form">
    <form class="login-form" action="/backend/admin/auth_adm/login" method="post">
      <h3 class="title">Page Login Admin</h3>
      <?php session()->get('pesan') ?>
      <input type="text" placeholder="Username" name="username" />
      <input type="password" placeholder="Password" name="password" />
      <button>Login</button>
    </form>
  </div>
</div>
<script src="/template/auth/js/jquery-3.2.1.min.js"></script>
<script src="/template/sweetalert/sweetalert2.all.min.js"></script>
<!--Sweet Alert Message-->
<?php if (session()->get('pesan') == 'errorU') : ?>
  <script>
    Swal.fire({
      title: 'Ada Kesalahan',
      text: 'Username Anda Salah',
      icon: 'error'
    })
  </script>
<?php elseif (session()->get('pesan') == 'errorP') : ?>
  <script>
    Swal.fire({
      title: 'Ada Kesalahan',
      text: 'Password Anda Salah',
      icon: 'error'
    })
  </script>
<?php endif; ?>