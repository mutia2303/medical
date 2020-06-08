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
            <a href="<?php echo base_url('admin/Home/obat') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <form action="<?php echo base_url('admin/Home/proses_tambah_obat') ?>" method="post" enctype="multipart/form-data" role="form">
            
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nama_obat">Nama</label>
                  <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm" required="required">
                </div>

                <div class="form-group col-md-6">
                  <label for="golongan">Golongan</label>
                  <input type="text" id="golongan" name="golongan" class="form-control form-control-sm" required="required">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="kategori">Kategori</label>
                  <input type="text" id="kategori" name="kategori" class="form-control form-control-sm" required="required">
                </div>

                <div class="form-group col-md-6">
                  <label for="bentuk">Bentuk</label>
                  <input type="text" id="bentuk" name="bentuk" class="form-control form-control-sm" required="required">
                </div>
              </div>

              <div class="form-group">
                <label for="manfaat">Manfaat</label>
                <textarea id="manfaat" name="manfaat" class="form-control form-control-sm" required="required"></textarea> 
              </div> 

              <div class="form-group">
                <label for="dikonsumsi_oleh">Dikonsumsi Oleh</label>
                <input type="text" id="dikonsumsi_oleh" name="dikonsumsi_oleh" class="form-control form-control-sm" required="required">
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
