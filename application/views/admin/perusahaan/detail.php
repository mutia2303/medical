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
            <a href="<?php echo base_url('admin/Home/perusahaan') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">

            <div class="post">
              <h3>Detail Perusahaan</h3><hr><br>

              <?php foreach ($detail_perusahaan->result_array() as $detail ) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_perusahaan">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="<?php echo $detail['nama_perusahaan']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="deskripsi">Deskripsi</label>
                  <div class="col-sm-9">
                    <textarea id="deskripsi" name="deskripsi" class="form-control" readonly><?php echo $detail['deskripsi']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="jadwal">Jadwal</label>
                  <div class="col-sm-9">
                    <input type="text" id="jadwal" name="jadwal" class="form-control" value="<?php echo $detail['jadwal']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="no_hp">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $detail['no_hp']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="email">Email</label>
                  <div class="col-sm-9">
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $detail['email']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="alamat">Alamat</label>
                  <div class="col-sm-9">
                    <textarea id="alamat" name="alamat" class="form-control" readonly><?php echo $detail['alamat']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="twitter">Twitter</label>
                  <div class="col-sm-9">
                    <input type="text" id="twitter" name="twitter" class="form-control" value="<?php echo $detail['twitter']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="facebook">Facebook</label>
                  <div class="col-sm-9">
                    <input type="text" id="facebook" name="facebook" class="form-control" value="<?php echo $detail['facebook']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="instagram">Instagram</label>
                  <div class="col-sm-9">
                    <input type="text" id="instagram" name="instagram" class="form-control" value="<?php echo $detail['instagram']; ?>" readonly>
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
