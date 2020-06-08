<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("admin/layout/header.php") ?>

</head>

<body id="page-top">

  <?php $this->load->view("admin/layout/navbar.php") ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/layout/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php $this->load->view("admin/layout/breadcrumb.php") ?>

        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users fa-sm"></i>
                </div>
                <?php foreach ($jumlah_pasien->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Pasien</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/pasien') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-md fa-sm"></i>
                </div>
                <?php foreach ($jumlah_dokter->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Dokter</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/dokter') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-md fa-sm"></i>
                </div>
                <?php foreach ($jumlah_perawat->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Perawat</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/perawat') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-md fa-sm"></i>
                </div>
                <?php foreach ($jumlah_bidan->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Bidan</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/bidan') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-medkit fa-sm"></i>
                </div>
                <?php foreach ($jumlah_obat->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Obat</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/obat') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-medkit fa-sm"></i>
                </div>
                <?php foreach ($jumlah_layanan->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Layanan</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/layanan') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">              
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-stethoscope fa-sm"></i>
                </div>
                <?php foreach ($jumlah_transaksi->result_array() as $jumlah) { ?>
                  <h3><?php echo $jumlah['jumlah']; ?></h3>
                  <div class="mr-5">Jumlah Transaksi</div>
                <?php } ?>
              </div>

              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/Home/transaksi') ?>">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

        </div>

      </div>

      <!-- Sticky Footer -->
      <?php $this->load->view("admin/layout/footer.php") ?> 

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/layout/scrolltop.php") ?> 

  <!-- Logout Modal-->
  <?php $this->load->view("admin/layout/modal.php") ?> 
  
  <?php $this->load->view("admin/layout/js.php") ?>

</body>

</html>
