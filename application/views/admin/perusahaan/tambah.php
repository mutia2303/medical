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

        <?php echo $this->session->flashdata('pesan');?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo base_url('admin/Home/perusahaan') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <form action="<?php echo base_url('admin/Home/proses_tambah_perusahaan') ?>" method="post" enctype="multipart/form-data" role="form">
          
              <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control form-control-sm" required="required">
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control form-control-sm" required="required"></textarea>
              </div>

              <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <input type="text" id="jadwal" name="jadwal" class="form-control form-control-sm" required="required">
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="no_hp">No HP</label>
                  <input type="tel" pattern="[0-9]{13}|[0-9]{12}|[0-9]{11}" id="no_hp" name="no_hp" class="form-control form-control-sm" required="required">
                  <small class="text-muted">contoh: <b>081212345678</b></small>
                </div>

                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-sm" required="required">
                </div>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" class="form-control form-control-sm" required="required"></textarea>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="twitter">Twitter</label>
                  <input type="text" id="twitter" name="twitter" class="form-control form-control-sm" required="required">
                </div>

                <div class="form-group col-md-6">
                  <label for="facebook">Facebook</label>
                  <input type="text" id="facebook" name="facebook" class="form-control form-control-sm" required="required">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="instagram">Instagram</label>
                  <input type="text" id="instagram" name="instagram" class="form-control form-control-sm" required="required">
                </div>
              </div> <br>

              <input class="btn btn-primary btn-sm" type="submit" value="Simpan">

            </form>

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
