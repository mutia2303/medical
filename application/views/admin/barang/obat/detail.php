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

        <div class="card mb-3">

          <div class="card-header">
            <a href="<?php echo base_url('admin/Home/obat') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">

            <div class="post">
              <h3>Detail obat</h3><hr><br>

              <?php foreach ($detail_obat->result_array() as $detail ) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_obat">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="<?php echo $detail['nama_obat']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="golongan">Golongan</label>
                  <div class="col-sm-9">
                    <input type="text" id="golongan" name="golongan" class="form-control" value="<?php echo $detail['golongan']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="kategori">Kategori</label>
                  <div class="col-sm-9">
                    <input type="text" id="kategori" name="kategori" class="form-control" value="<?php echo $detail['kategori']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="bentuk">Bentuk</label>
                  <div class="col-sm-9">
                    <input type="text" id="bentuk" name="bentuk" class="form-control" value="<?php echo $detail['bentuk']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="manfaat">Manfaat</label>
                  <div class="col-sm-9">
                    <input type="text" id="manfaat" name="manfaat" class="form-control" value="<?php echo $detail['manfaat']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="dikonsumsi_oleh">Dikonsumsi Oleh</label>
                  <div class="col-sm-9">
                    <input type="text" id="dikonsumsi_oleh" name="dikonsumsi_oleh" class="form-control" value="<?php echo $detail['dikonsumsi_oleh']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>
            </div>
            
          </div>
          
        </div>
        
      </div>
      <!-- /.container-fluid -->

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
