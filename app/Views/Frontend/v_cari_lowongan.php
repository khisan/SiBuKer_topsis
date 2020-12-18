<div id="aboutwrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
      </div>
    </div>
  </div>
  <!-- /container -->
</div>

<div class="container">
  <div class="row mt mb">
    <div class="col-lg-12">
      <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
          <form class="form-horizontal form-material" action="/listlowongan/cari" method="POST">
            <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Cari Lowongan" name="keyword"> <button class="btn btn-primary">Cari</button> </div>
          </form>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($cari_lowongan as $key => $hasil) { ?>
          <div class="col-sm-4">
            <div class="caption" style="width: 18rem;margin-top: 50px">
              <img src="/lowongan/<?= $hasil['gambar'] ?>" class="card-img-top" width="125px" height="150px">
              <div class="card-body">
                <h5 class="card-title"><?= $hasil['nama_perusahaan'] ?></h5>
                <p class="card-text"><?= $hasil['nama_lowongan'] ?></p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <!-- Pagination -->
      <div style="margin-top: 50px;margin-right:auto;text-align:center">
        <?php if ($pager) : ?>
          <?php $pagi_path = 'listlowongan'; ?>
          <?php $pager->setPath($pagi_path); ?>
          <?= $pager->links() ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>