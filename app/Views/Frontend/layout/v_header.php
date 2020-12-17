<body>

  <!-- Static navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Sistem Pendukung Keputusan</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <li><a href="<?= base_url('listlowongan') ?>">List Lowongan</a></li>
          <li class="active"><a href="<?= base_url('auth_front/login') ?>">Login</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>