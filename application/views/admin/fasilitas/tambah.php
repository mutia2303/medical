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
            <a href="<?php echo base_url('admin/Home/fasilitas') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <form action="<?php echo base_url('admin/Home/proses_tambah_fasilitas') ?>" method="post" enctype="multipart/form-data" role="form">

            <div class="form-group">
              <label for="nama_fasilitas">Nama fasilitas</label>
              <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control form-control-sm" required="required">
            </div>

            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea id="keterangan" name="keterangan" class="form-control form-control-sm" required="required"></textarea>
            </div>

            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" id="gambar" name="gambar" class="form-control-file">
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
