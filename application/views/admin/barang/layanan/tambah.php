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
            <a href="<?php echo base_url('admin/Home/layanan') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <form action="<?php echo base_url('admin/Home/proses_tambah_layanan') ?>" method="post" enctype="multipart/form-data" role="form">
            
              <div class="form-group">
                <label for="nama_layanan">Nama</label>
                <input type="text" id="nama_layanan" name="nama_layanan" class="form-control form-control-sm" required="required">
              </div>

              <div class="form-group">
                <fieldset>
                  <label>Kategori</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="kategori" id="Laboratorium" value="Laboratorium">Laboratorium&nbsp; &nbsp; &nbsp;
                  <input type="radio" name="kategori" id="Pengobatan" value="Pengobatan">Pengobatan&nbsp; &nbsp; &nbsp;
                  <input type="radio" name="kategori" id="Perawatan" value="Perawatan">Perawatan
                </fieldset>
              </div><br>

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
